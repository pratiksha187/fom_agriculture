@extends('partners.crm-layout')
@section('title', 'Bookings')
@section('content')
<section class="crm-section"><div class="crm-section-heading"><div><h2>Booking Tracking</h2><p>Official bookings recorded by the Foothills project team.</p></div><span class="crm-badge">{{ $bookings->total() }} records</span></div>
@forelse($bookings as $booking)<article class="crm-visit-card"><div class="crm-section-heading"><div><h3><a href="{{ route('partners.leads.show', $booking->lead) }}">{{ $booking->lead->buyer_name }}</a></h3><p>{{ $booking->reference }} &middot; {{ $booking->created_at->timezone('Asia/Kolkata')->format('d M Y') }}</p></div><span class="crm-badge badge-{{ $booking->status === 'cancelled' ? 'missed' : 'booked' }}">{{ \App\Models\PartnerBooking::STATUSES[$booking->status] }}</span></div><dl class="crm-key-values"><dt>Plot</dt><dd>{{ $booking->plot }}</dd><dt>Sale amount</dt><dd>&#8377;{{ number_format((float) $booking->sale_amount, 2) }}</dd></dl></article>
@empty<div class="crm-empty"><h3>No bookings recorded yet</h3><p>Bookings attributed to your buyer leads will appear here.</p></div>@endforelse
{{ $bookings->links() }}</section>
@endsection
