@extends('partners.crm-layout')
@section('title', 'Commissions')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/partner-commissions.css') }}">
@endpush
@section('workspace-intro')
<header class="commission-intro">
    <div><p class="commission-eyebrow">YOUR PARTNER ACCOUNT</p><h1>Commission Tracking</h1><p>A clear view of your commission and payments.</p></div>
    <a class="commission-bookings-link" href="{{ route('partners.bookings.index') }}">View bookings <span aria-hidden="true">&rarr;</span></a>
</header>
@endsection
@section('content')
<div class="commission-page">
    <section class="commission-overview" aria-label="Commission summary">
        <article class="commission-summary-card commission-summary-card--pending">
            <div class="commission-summary-label"><span>Pending payout</span><span class="commission-summary-icon" aria-hidden="true">@include('partners.icon', ['name' => 'wallet'])</span></div>
            <strong>&#8377;{{ number_format((float) $totals['pending'], 2) }}</strong><p>Eligible and processing commissions</p>
        </article>
        <article class="commission-summary-card commission-summary-card--paid">
            <div class="commission-summary-label"><span>Total paid</span><span class="commission-summary-icon" aria-hidden="true">@include('partners.icon', ['name' => 'check'])</span></div>
            <strong>&#8377;{{ number_format((float) $totals['paid'], 2) }}</strong><p>Commission marked as paid</p>
        </article>
        <article class="commission-summary-card">
            <div class="commission-summary-label"><span>Active bookings</span><span class="commission-summary-icon" aria-hidden="true">@include('partners.icon', ['name' => 'home'])</span></div>
            <strong>{{ number_format($totals['bookings']) }}</strong><p>Project-team records, excluding cancellations</p>
        </article>
    </section>
    <section class="commission-ledger" aria-labelledby="commission-records-title">
        <header class="commission-ledger-heading"><div><h2 id="commission-records-title">Your commissions</h2><p>Payment status for each buyer booking.</p></div><span class="commission-record-count">{{ $bookings->total() }} {{ $bookings->total() === 1 ? 'record' : 'records' }}</span></header>
        @if($bookings->isNotEmpty())<div class="commission-column-headings" aria-hidden="true"><span>Buyer &amp; booking</span><span>Commission</span><span>Payment status</span></div>@endif
        @forelse($bookings as $booking)
            @php($paymentHint = match($booking->commission_status) {
                'eligible' => 'Approved; awaiting payment',
                'processing' => 'Payment in progress',
                'paid' => 'Payment recorded',
                'on_hold' => 'On hold for review',
                default => 'Eligibility not confirmed',
            })
            <article class="commission-record">
                <div class="commission-record-main">
                    <div class="commission-buyer"><a href="{{ route('partners.leads.show', $booking->lead) }}">{{ $booking->lead->buyer_name }}</a><p>{{ $booking->reference }} <span aria-hidden="true">&middot;</span> {{ $booking->created_at->timezone('Asia/Kolkata')->format('d M Y') }}</p><p>Booking: {{ \App\Models\PartnerBooking::STATUSES[$booking->status] }}</p></div>
                    <div class="commission-amount"><span class="commission-mobile-label">Commission</span><strong>{{ $booking->commission_amount !== null ? '₹'.number_format((float) $booking->commission_amount, 2) : 'To be confirmed' }}</strong></div>
                    <div class="commission-payment"><span class="commission-state commission-state--{{ $booking->commission_status }}"><span aria-hidden="true"></span>{{ \App\Models\PartnerBooking::COMMISSION_STATUSES[$booking->commission_status] }}</span><p>{{ $paymentHint }}</p></div>
                </div>
                <details class="commission-details"><summary>View booking &amp; payment details <span aria-hidden="true">+</span></summary>
                    <dl><div><dt>Plot</dt><dd>{{ $booking->plot }}</dd></div><div><dt>Booking date</dt><dd>{{ $booking->created_at->timezone('Asia/Kolkata')->format('d M Y') }}</dd></div>
                        @if($booking->commission_status === 'paid')<div><dt>Paid on</dt><dd>{{ $booking->paid_at?->timezone('Asia/Kolkata')->format('d M Y') ?? 'Not recorded' }}</dd></div><div><dt>Payment reference</dt><dd>{{ $booking->payment_reference ?: 'Not recorded' }}</dd></div>@endif
                    </dl>
                    <a href="{{ route('partners.leads.show', $booking->lead) }}">Open buyer lead &rarr;</a>
                </details>
            </article>
        @empty
            <div class="commission-empty"><span aria-hidden="true">@include('partners.icon', ['name' => 'wallet'])</span><h3>No commission records yet</h3><p>Your commissions will appear here once the project team records a buyer booking.</p><a class="commission-bookings-link" href="{{ route('partners.bookings.index') }}">View your bookings &rarr;</a></div>
        @endforelse
    </section>
    {{ $bookings->links() }}
    <aside class="commission-help"><span aria-hidden="true">@include('partners.icon', ['name' => 'check'])</span><p>Amounts and payment status are updated by the Foothills team according to your Channel Partner agreement. <a href="{{ route('partners.agreement') }}">View agreement &rarr;</a></p></aside>
</div>
@endsection
