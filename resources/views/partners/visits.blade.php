@extends('partners.crm-layout')
@section('title', 'Site Visits')
@section('content')
<section class="crm-section"><div class="crm-section-heading"><div><h2>Site Visit Tracking</h2><p>Check upcoming, completed and missed site visits. All times are IST.</p></div></div>
@forelse($visits as $visit)<article class="crm-visit-card"><div class="crm-section-heading"><h3><a href="{{ route('partners.leads.show', $visit->lead) }}">{{ $visit->lead->buyer_name }}</a></h3><span class="crm-badge badge-{{ $visit->status === 'completed' ? 'completed' : ($visit->status === 'missed' ? 'missed' : ($visit->status === 'cancelled' ? 'cancelled' : 'scheduled')) }}">{{ $visit->status === 'missed' ? 'No Show' : \App\Models\PartnerSiteVisit::STATUSES[$visit->status] }}</span></div><p class="crm-visit-date">@include('partners.icon', ['name' => 'calendar']) {{ $visit->scheduled_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}</p>@if($visit->notes)<p>{{ $visit->notes }}</p>@endif @if($visit->status === 'completed' && $visit->verified_by)<p class="crm-verified">&#10003; Verified by site team</p>@endif</article>
@empty<div class="crm-empty"><h3>No site visits yet</h3><p>Open an accepted lead in My Leads to request a visit.</p><a class="crm-detail-link" href="{{ route('partners.leads.index') }}">View my leads &rarr;</a></div>@endforelse
{{ $visits->links() }}<p class="crm-note">Site visits are marked completed only after verification by an authorised admin or site executive.</p></section>
@endsection
