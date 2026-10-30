@extends('partners.crm-layout')
@section('title', 'Bookings')
@section('content')
<section class="crm-section"><div class="crm-section-heading"><div><h2>Booking Tracking</h2><p>Leads marked as Booked and booking details recorded by the Foothills project team.</p></div><span class="crm-badge">{{ $bookingLeads->total() }} records</span></div>
@forelse($bookingLeads as $lead)
    @php($booking = $lead->booking)
    <article class="crm-visit-card">
        <div class="crm-section-heading">
            <div><h3><a href="{{ route('partners.leads.show', $lead) }}">{{ $lead->buyer_name }}</a></h3><p>{{ $lead->lead_code }} @if($booking)&middot; {{ $booking->reference }} &middot; {{ $booking->created_at->timezone('Asia/Kolkata')->format('d M Y') }}@endif</p></div>
            <span class="crm-badge badge-{{ $lead->progress_status !== 'booked' && $booking?->status === 'cancelled' ? 'cancelled' : 'booked' }}">{{ $lead->progress_status === 'booked' ? 'Booked' : (\App\Models\PartnerBooking::STATUSES[$booking?->status] ?? 'Booked') }}</span>
        </div>
        <dl class="crm-key-values"><dt>Mobile</dt><dd>{{ $lead->phone }}</dd>
            @if($booking)
                <dt>Official booking status</dt><dd>{{ \App\Models\PartnerBooking::STATUSES[$booking->status] }}</dd>
                <dt>Plot</dt><dd>{{ $booking->plot }}</dd><dt>Sale amount</dt><dd>&#8377;{{ number_format((float) $booking->sale_amount, 2) }}</dd>
            @endif
        </dl>
        @unless($booking)<p class="crm-note">Booking details awaiting the project team.</p>@endunless
        <a class="crm-detail-link" href="{{ route('partners.leads.show', $lead) }}">View lead &amp; status history &rsaquo;</a>
    </article>
@empty<div class="crm-empty"><h3>No bookings recorded yet</h3><p>Mark a lead as Booked to see it here.</p></div>@endforelse
{{ $bookingLeads->links() }}</section>
@endsection
