@extends('partners.crm-layout')
@section('title', 'My Leads')
@section('content')
<section class="crm-section"><div class="crm-section-heading"><div><h2>My Buyer Leads</h2><p>View lead details and track sales progress.</p></div><span class="crm-badge">{{ $leads->total() }} results</span></div>@include('partners.lead-list')</section>
@endsection
