<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#203f32">
    <title>@yield('title', 'Partner Portal') | Foothills of Mahabaleshwar</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partners.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partner-crm.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
    <script src="{{ asset('js/partners.js') }}" defer></script>
</head>
<body class="partner-page crm-body">
<a class="skip-link" href="#main">Skip to content</a>
@include('partials.site-header')
<div class="crm-app">
    <header class="crm-brandbar">
        <a class="crm-brand" href="{{ route('partners.dashboard') }}"><span><strong>Channel Partner Portal</strong><small>Your personal Foothills workspace</small></span></a>
        <div class="crm-account-actions"><span class="crm-badge badge-completed">&#10003; Approved</span><details class="crm-account-menu"><summary>My account <span aria-hidden="true">&#8964;</span></summary><nav aria-label="Account navigation"><a href="{{ route('partners.profile') }}">My profile</a><a href="{{ route('partners.security') }}">Password &amp; security</a><a href="{{ route('partners.resources') }}">Project resources</a><a href="{{ route('partners.agreement') }}">Terms acceptance</a><a href="{{ route('home') }}">Main website</a><form method="post" action="{{ route('partners.logout') }}">@csrf<button type="submit">Sign out</button></form></nav></details></div>
    </header>
    <nav class="crm-tabs" aria-label="Partner workspace">
        @foreach(['dashboard' => ['Dashboard', 'dashboard'], 'leads.index' => ['My Leads', 'people'], 'visits.index' => ['Site Visits', 'calendar'], 'bookings.index' => ['Bookings', 'home'], 'commissions.index' => ['Commissions', 'wallet']] as $route => [$label, $icon])
            @php($active = $route === 'leads.index' ? request()->routeIs('partners.leads.*') : request()->routeIs('partners.'.$route))
            <a href="{{ route('partners.'.$route) }}" @if($active) aria-current="page" @endif>@include('partners.icon', ['name' => $icon]){{ $label }}</a>
        @endforeach
    </nav>
    <main id="main">
        <div class="crm-welcome"><div><h1>Welcome back, {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::before($partner->user->name, ' ')) }}!</h1><p>Partner ID: {{ $partner->partner_code }}</p><p>Manage your buyer enquiries and project site visits.</p></div>
        @if(request()->routeIs('partners.leads.create'))<a class="crm-primary" href="{{ route('partners.leads.index') }}">&times; Close</a>@else<a class="crm-primary" href="{{ route('partners.leads.create') }}">&plus; Add Lead</a>@endif</div>
        @if(session('success'))<p class="success" role="status">{{ session('success') }}</p>@endif
        @if($errors->any())<div class="errors" role="alert" tabindex="-1"><strong>Please check your details.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @yield('content')
    </main>
</div>
@include('partials.site-footer')
</body>
</html>
