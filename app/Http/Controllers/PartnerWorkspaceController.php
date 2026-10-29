<?php

namespace App\Http\Controllers;

use App\Models\ChannelPartner;
use App\Models\PartnerBooking;
use App\Models\PartnerLead;
use App\Models\PartnerSiteVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PartnerWorkspaceController extends Controller
{
    public function storeLead(Request $request)
    {
        $partner = $request->user()->channelPartner;
        $details = $request->validate([
            'buyer_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/', Rule::unique('partner_leads')->where('channel_partner_id', $partner->id)],
            'email' => ['nullable', 'email', 'max:254'],
            'city' => ['nullable', 'string', 'max:100'],
            'requirements' => ['nullable', 'string', 'max:3000'],
            'preferred_visit_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:'.now()->timezone('Asia/Kolkata')->toDateString()],
            'buyer_consent' => ['accepted'],
        ]);
        $duplicate = PartnerLead::where('phone', $details['phone'])->exists();
        $lead = $partner->leads()->make(collect($details)->except('buyer_consent')->all() + ['buyer_consent_at' => now()]);
        $lead->status = $duplicate ? 'duplicate_review' : 'new';
        $lead->save();

        return redirect()->route('partners.leads.index')->with('success', 'Buyer lead submitted for review.');
    }

    public function requestVisit(Request $request, PartnerLead $lead)
    {
        abort_unless($lead->channel_partner_id === $request->user()->channelPartner->id, 404);
        if (! in_array($lead->status, ['accepted', 'contacted'])) {
            throw ValidationException::withMessages(['visit' => 'Site visits can be requested after the team accepts your lead.']);
        }
        $details = $request->validate(['scheduled_at' => ['required', 'date_format:Y-m-d\TH:i'], 'notes' => ['nullable', 'string', 'max:1000']]);
        $scheduled = Carbon::createFromFormat('!Y-m-d\TH:i', $details['scheduled_at'], 'Asia/Kolkata')->utc();
        if ($scheduled->isPast()) {
            throw ValidationException::withMessages(['scheduled_at' => 'Please choose a future visit time (IST).']);
        }
        if ($lead->visits()->whereIn('status', ['requested', 'scheduled'])->exists()) {
            throw ValidationException::withMessages(['visit' => 'This buyer already has an active visit. Contact the team to reschedule it.']);
        }
        $lead->visits()->create(['scheduled_at' => $scheduled, 'notes' => $details['notes'] ?? null]);

        return redirect()->route('partners.visits.index')->with('success', 'Site visit requested. Our team will confirm the appointment.');
    }

    public function show(ChannelPartner $partner)
    {
        return view('admin.partners.show', ['partner' => $partner->load('user'), 'leads' => $partner->leads()->with(['visits', 'booking'])->latest()->paginate(10)]);
    }

    public function updatePartner(Request $request, ChannelPartner $partner)
    {
        $details = $request->validate(['status' => ['required', Rule::in(array_keys(ChannelPartner::STATUSES))]]);
        $partner->status = $details['status'];
        $partner->approved_at = $details['status'] === 'approved' ? now() : null;
        $partner->approved_by = $details['status'] === 'approved' ? $request->user()->id : null;
        $partner->save();

        return back()->with('success', 'Partner account status updated.');
    }

    public function updateLead(Request $request, ChannelPartner $partner, PartnerLead $lead)
    {
        abort_unless($lead->channel_partner_id === $partner->id, 404);
        $details = $request->validate(['status' => ['required', Rule::in(array_keys(PartnerLead::STATUSES))]]);
        $lead->status = $details['status'];
        $lead->save();

        return back()->with('success', 'Lead status updated.');
    }

    public function updateVisit(Request $request, ChannelPartner $partner, PartnerSiteVisit $visit)
    {
        abort_unless($visit->lead->channel_partner_id === $partner->id, 404);
        $details = $request->validate([
            'status' => ['required', Rule::in(array_keys(PartnerSiteVisit::STATUSES))],
            'scheduled_at' => ['required', 'date_format:Y-m-d\TH:i'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);
        $scheduled = Carbon::createFromFormat('!Y-m-d\TH:i', $details['scheduled_at'], 'Asia/Kolkata')->utc();
        if ($details['status'] === 'completed' && $scheduled->isFuture()) {
            throw ValidationException::withMessages(['visit' => 'A future visit cannot be marked completed.']);
        }
        $visit->fill(['scheduled_at' => $scheduled, 'notes' => $details['notes'] ?? null]);
        $visit->status = $details['status'];
        $visit->verified_by = $details['status'] === 'completed' ? $request->user()->id : null;
        $visit->save();

        return back()->with('success', 'Visit updated. Dates are shown in IST.');
    }

    public function saveBooking(Request $request, ChannelPartner $partner, PartnerLead $lead)
    {
        abort_unless($lead->channel_partner_id === $partner->id, 404);
        if (! $lead->booking && ! in_array($lead->status, ['accepted', 'contacted'])) {
            throw ValidationException::withMessages(['booking' => 'Accept the buyer lead before recording a booking.']);
        }
        $details = $request->validate([
            'reference' => ['required', 'string', 'max:100', Rule::unique('partner_bookings')->ignore($lead->booking?->id)],
            'plot' => ['required', 'string', 'max:100'],
            'sale_amount' => ['required', 'numeric', 'decimal:0,2', 'min:0.01', 'max:999999999999.99'],
            'status' => ['required', Rule::in(array_keys(PartnerBooking::STATUSES))],
            'commission_amount' => ['nullable', 'numeric', 'decimal:0,2', 'min:0', 'lte:sale_amount'],
            'commission_status' => ['required', Rule::in(array_keys(PartnerBooking::COMMISSION_STATUSES))],
            'payment_reference' => ['nullable', 'required_if:commission_status,paid', 'string', 'max:150'],
            'paid_at' => ['nullable', 'required_if:commission_status,paid', 'date_format:Y-m-d'],
        ]);
        if ($details['commission_status'] !== 'not_eligible' && $details['commission_status'] !== 'on_hold' && empty($details['commission_amount'])) {
            throw ValidationException::withMessages(['commission_amount' => 'Enter the agreed commission amount for this status.']);
        }
        if ($details['status'] === 'cancelled' && ! in_array($details['commission_status'], ['not_eligible', 'on_hold'])) {
            throw ValidationException::withMessages(['commission_status' => 'Review the commission and set it to on hold or not eligible for a cancelled booking.']);
        }
        $details['paid_at'] = $details['commission_status'] === 'paid' ? Carbon::parse($details['paid_at'], 'Asia/Kolkata')->utc() : null;
        if ($details['paid_at']?->isFuture()) {
            throw ValidationException::withMessages(['paid_at' => 'The payment date cannot be in the future.']);
        }
        $details['payment_reference'] = $details['commission_status'] === 'paid' ? $details['payment_reference'] : null;
        $lead->booking()->updateOrCreate([], $details);

        return back()->with('success', 'Booking and commission record saved.');
    }
}
