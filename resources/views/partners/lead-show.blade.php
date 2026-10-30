@extends('partners.crm-layout')
@section('title', 'Buyer Lead Details')
@section('content')
<a class="crm-back" href="{{ route('partners.leads.index') }}">&larr; Back to My Leads</a>
<section class="crm-visit-card"><div class="crm-section-heading"><div><h2>{{ $lead->buyer_name }}</h2><p>{{ $lead->lead_code }} &middot; Submitted {{ $lead->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</p></div><span class="crm-badge badge-{{ $lead->pipeline_status }}">{{ $lead->pipeline_label }}</span></div>
    <dl class="crm-key-values"><dt>Mobile</dt><dd>{{ $lead->phone }}</dd><dt>Email</dt><dd>{{ $lead->email ?: 'Not provided' }}</dd><dt>City</dt><dd>{{ $lead->city ?: 'Not provided' }}</dd><dt>Lead review</dt><dd>{{ \App\Models\PartnerLead::STATUSES[$lead->status] }}</dd><dt>Preferred visit date</dt><dd>{{ $lead->preferred_visit_date?->format('d M Y') ?: 'Not specified' }}</dd></dl>
    @if($lead->requirements)<h3>Buyer Requirements / Remarks</h3><p class="crm-remarks">{{ $lead->requirements }}</p>@endif
</section>
<section class="crm-visit-card partner-card" aria-labelledby="lead-progress-title">
    <div class="crm-section-heading"><div><h2 id="lead-progress-title">Update lead status</h2><p>Keep this buyer's progress up to date. Visit times are in IST.</p></div></div>
    <form method="post" action="{{ route('partners.leads.status', $lead) }}" data-lead-progress>
        @csrf @method('patch')
        <div class="field"><label for="progress-status">Lead status</label><select id="progress-status" name="status" required>
            @foreach(\App\Models\PartnerLead::PROGRESS_STATUSES as $value => $label)<option value="{{ $value }}" @selected(old('status', $lead->pipeline_status) === $value)>{{ $label }}</option>@endforeach
        </select></div>
        <div class="field" data-progress-visit><label for="progress-visit">Visit date &amp; time (IST)</label><input id="progress-visit" name="scheduled_at" type="datetime-local" value="{{ old('scheduled_at', $lead->latestVisit?->scheduled_at?->timezone('Asia/Kolkata')->format('Y-m-d\TH:i')) }}"><small>Required for Visit Scheduled. Choose a future time.</small></div>
        <div class="field"><label for="progress-notes">Remarks (optional)</label><textarea id="progress-notes" name="notes" rows="3" maxlength="1000" placeholder="Add an update or reason for this change">{{ old('notes') }}</textarea></div>
        <button class="crm-primary" type="submit">Save lead status</button>
    </form>
    <p class="crm-note">Booked records the buyer's progress. Official booking details and commissions are managed by the project team.</p>
</section>
<section class="crm-visit-card" aria-labelledby="lead-history-title">
    <div class="crm-section-heading"><h2 id="lead-history-title">Status history</h2></div>
    <ol class="crm-status-history">
        @forelse($history as $entry)
            <li><div><strong>{{ \App\Models\PartnerLead::PROGRESS_STATUSES[$entry->to_status] ?? \App\Models\PartnerLead::STATUSES[$entry->to_status] ?? ucfirst($entry->to_status) }}</strong>
                @if($entry->from_status)<span class="crm-note">from {{ \App\Models\PartnerLead::PROGRESS_STATUSES[$entry->from_status] ?? \App\Models\PartnerLead::STATUSES[$entry->from_status] ?? ucfirst($entry->from_status) }}</span>@endif</div>
                <p class="crm-note"><time datetime="{{ $entry->created_at->toIso8601String() }}">{{ $entry->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</time> &middot; {{ $entry->actor?->name ?? 'Account unavailable' }}</p>
                @if($entry->visit_at)<p class="crm-note">Visit: {{ $entry->visit_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</p>@endif
                @if($entry->notes)<p class="crm-remarks">{{ $entry->notes }}</p>@endif
            </li>
        @empty<li class="crm-note">No status changes recorded yet. Updates made from now on will appear here.</li>@endforelse
    </ol>
    {{ $history->links() }}
</section>
<section class="crm-section"><div class="crm-section-heading"><h2>Site visits for this buyer</h2></div>
    @forelse($lead->visits as $visit)<article class="crm-visit-card"><div class="crm-section-heading"><h3>{{ $visit->scheduled_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</h3><span class="crm-badge badge-{{ $visit->status === 'missed' ? 'missed' : ($visit->status === 'completed' ? 'completed' : ($visit->status === 'cancelled' ? 'cancelled' : 'scheduled')) }}">{{ \App\Models\PartnerSiteVisit::STATUSES[$visit->status] }}</span></div>@if($visit->notes)<p>{{ $visit->notes }}</p>@endif @if($visit->verified_by && $visit->status === 'completed')<p class="crm-verified">&#10003; Verified by site team</p>@endif</article>
    @empty<p class="crm-note">Visit not scheduled.</p>@endforelse
</section>
@if($lead->booking)<section class="crm-visit-card"><div class="crm-section-heading"><h2>Booking</h2><span class="crm-badge badge-{{ $lead->booking->status === 'cancelled' ? 'cancelled' : 'booked' }}">{{ \App\Models\PartnerBooking::STATUSES[$lead->booking->status] }}</span></div><dl class="crm-key-values"><dt>Booking reference</dt><dd>{{ $lead->booking->reference }}</dd><dt>Plot</dt><dd>{{ $lead->booking->plot }}</dd><dt>Sale amount</dt><dd>&#8377;{{ number_format((float) $lead->booking->sale_amount, 2) }}</dd></dl><a class="crm-detail-link" href="{{ route('partners.commissions.index') }}">View commission records &rarr;</a></section>@endif
@endsection
