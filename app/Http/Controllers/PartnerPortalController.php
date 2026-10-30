<?php

namespace App\Http\Controllers;

use App\Models\PartnerBooking;
use App\Models\PartnerLead;
use App\Models\PartnerSiteVisit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerPortalController extends Controller
{
    private function context(Request $request): array
    {
        return ['partner' => $request->user()->channelPartner, 'project' => config('project')];
    }

    private function visitsQuery(Request $request)
    {
        return PartnerSiteVisit::whereHas('lead', fn ($query) => $query->where('channel_partner_id', $request->user()->channelPartner->id));
    }

    private function bookingsQuery(Request $request)
    {
        return PartnerBooking::whereHas('lead', fn ($query) => $query->where('channel_partner_id', $request->user()->channelPartner->id));
    }

    private function filteredLeads(Request $request)
    {
        $filters = $request->validate(['q' => ['nullable', 'string', 'max:100'], 'status' => ['nullable', Rule::in(['all', 'new', 'scheduled', 'completed', 'missed', 'booked', 'rejected'])]]);
        $query = $request->user()->channelPartner->leads()->with(['latestVisit', 'booking']);
        if ($search = trim($filters['q'] ?? '')) {
            $query->where(function ($query) use ($search) {
                $query->where('buyer_name', 'like', '%'.$search.'%')->orWhere('city', 'like', '%'.$search.'%')->orWhere('phone', 'like', '%'.$search.'%');
                if (preg_match('/^(?:FOM-L-)?0*([1-9][0-9]*)$/i', $search, $match)) {
                    $query->orWhere('id', $match[1]);
                }
            });
        }
        $status = $filters['status'] ?? 'all';
        if ($status !== 'all') {
            $query->where(function ($query) use ($status) {
                $query->where('progress_status', $status)->orWhere(function ($query) use ($status) {
                    $query->whereNull('progress_status');
                    if ($status === 'booked') {
                        $query->whereHas('booking', fn ($booking) => $booking->where('status', '!=', 'cancelled'));
                    } else {
                        $query->whereDoesntHave('booking', fn ($booking) => $booking->where('status', '!=', 'cancelled'));
                        if ($status === 'rejected') {
                            $query->where('status', 'rejected');
                        } else {
                            $query->where('status', '!=', 'rejected');
                            if ($status === 'new') {
                                $query->whereDoesntHave('latestVisit', fn ($visit) => $visit->whereIn('status', ['requested', 'scheduled', 'completed', 'missed']));
                            } else {
                                $query->whereHas('latestVisit', fn ($visit) => $visit->whereIn('status', $status === 'scheduled' ? ['requested', 'scheduled'] : [$status]));
                            }
                        }
                    }
                });
            });
        }

        return $query->latest()->paginate(10)->withQueryString();
    }

    public function dashboard(Request $request)
    {
        $visits = $this->visitsQuery($request);
        $bookings = $this->bookingsQuery($request);

        return view('partners.dashboard', $this->context($request) + [
            'leads' => $this->filteredLeads($request),
            'upcomingVisit' => (clone $visits)->with('lead')->whereIn('status', ['scheduled', 'requested'])->where('scheduled_at', '>=', now())->oldest('scheduled_at')->first(),
            'stats' => [
                'leads' => $request->user()->channelPartner->leads()->count(),
                'visits' => (clone $visits)->whereIn('status', ['scheduled', 'requested'])->where('scheduled_at', '>=', now())->count(),
                'completed' => (clone $visits)->where('status', 'completed')->count(),
            'bookings' => $request->user()->channelPartner->leads()->where(function ($query) {
                $query->where('progress_status', 'booked')->orWhere(fn ($query) => $query->whereNull('progress_status')->whereHas('booking', fn ($booking) => $booking->where('status', '!=', 'cancelled')));
            })->count(),
            ],
        ]);
    }

    public function leads(Request $request)
    {
        return view('partners.leads', $this->context($request) + ['leads' => $this->filteredLeads($request)]);
    }

    public function createLead(Request $request)
    {
        return view('partners.lead-create', $this->context($request));
    }

    public function lead(Request $request, PartnerLead $lead)
    {
        abort_unless($lead->channel_partner_id === $request->user()->channelPartner->id, 404);

        return view('partners.lead-show', $this->context($request) + ['lead' => $lead->load(['visits' => fn ($query) => $query->latest('scheduled_at'), 'latestVisit', 'booking']), 'history' => $lead->statusHistory()->with('actor')->latest('id')->paginate(15)]);
    }

    public function visits(Request $request)
    {
        return view('partners.visits', $this->context($request) + ['visits' => $this->visitsQuery($request)->with('lead')->latest('scheduled_at')->paginate(10)]);
    }

    public function bookings(Request $request)
    {
        $leads = $request->user()->channelPartner->leads()
            ->where(fn ($query) => $query->where('progress_status', 'booked')->orWhereHas('booking'))
            ->with('booking')->latest('updated_at')->orderByDesc('id')->paginate(10);

        return view('partners.bookings', $this->context($request) + ['bookingLeads' => $leads]);
    }

    public function commissions(Request $request)
    {
        $query = $this->bookingsQuery($request);

        return view('partners.commissions', $this->context($request) + [
            'bookings' => (clone $query)->with('lead')->latest()->paginate(10),
            'totals' => [
                'bookings' => (clone $query)->where('status', '!=', 'cancelled')->count(),
                'paid' => (clone $query)->where('commission_status', 'paid')->sum('commission_amount'),
                'pending' => (clone $query)->where('status', '!=', 'cancelled')->whereIn('commission_status', ['eligible', 'processing'])->sum('commission_amount'),
            ],
        ]);
    }

    public function account(Request $request)
    {
        return view('partners.account', $this->context($request));
    }
}
