@extends('partners.portal-layout')
@section('title', 'Channel Partner Terms & Conditions')
@section('content')
<article class="wrap terms-page">
    <a class="text-link" href="{{ route('partners.register') }}">&larr; Partner registration</a>
    <header><p class="eyebrow">FOOTHILLS PARTNER PROGRAMME</p><h1>Terms &amp; Conditions</h1><p>Read the full terms before accepting them on the registration form.</p></header>
    @include('partners.terms-content')
    <a class="button" href="{{ route('partners.register') }}">Continue to registration &rarr;</a>
</article>
@endsection
