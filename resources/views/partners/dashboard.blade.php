@extends('partners.crm-layout')
@section('title', 'Dashboard')
@section('content')
<div class="crm-stats">
    @foreach([['Total Leads', $stats['leads'], 'Buyer enquiries', 'people', 'partners.leads.index'], ['Visits Scheduled', $stats['visits'], 'Upcoming visits', 'calendar', 'partners.visits.index'], ['Visits Completed', $stats['completed'], 'Verified by site team', 'check', 'partners.visits.index'], ['Bookings', $stats['bookings'], 'Excluding cancellations', 'home', 'partners.bookings.index']] as [$label, $value, $hint, $icon, $target])
        <a class="crm-stat" href="{{ route($target) }}"><span>{{ $label }} @include('partners.icon', ['name' => $icon])</span><strong>{{ $value }}</strong><small>{{ $hint }}</small></a>
    @endforeach
</div>
<section class="crm-section crm-upcoming"><div class="crm-section-heading"><h2>Upcoming Site Visit</h2>@if($upcomingVisit)<span class="crm-badge badge-scheduled">{{ \App\Models\PartnerSiteVisit::STATUSES[$upcomingVisit->status] }}</span>@endif</div>
    @if($upcomingVisit)<a class="crm-upcoming-buyer" href="{{ route('partners.leads.show', $upcomingVisit->lead) }}">@include('partners.icon', ['name' => 'calendar'])<span><strong>{{ $upcomingVisit->lead->buyer_name }}</strong><small>{{ $upcomingVisit->scheduled_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST &middot; Foothills of Mahabaleshwar, Poladpur</small></span></a>
    @else<p class="crm-note">No upcoming visits. Once a lead is accepted, you can request a visit from its details page.</p>@endif
</section>
<section class="crm-section"><div class="crm-section-heading"><div><h2>Recent Buyer Leads</h2><p>View lead details and track sales progress.</p></div><span class="crm-badge">Recent activity</span></div>@include('partners.lead-list')</section>
@endsection
