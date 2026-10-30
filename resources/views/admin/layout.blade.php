<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · Foothills</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-workspace.css') }}">
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<body>
<a class="admin-skip-link" href="#admin-content">Skip to content</a>
@if(auth()->user()?->is_admin)
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="admin-brand" href="{{ route('admin.enquiries.index') }}"><img src="{{ asset('images/foothills-logo.svg') }}" width="144" height="108" alt="Foothills of Mahabaleshwar"><span>ADMIN WORKSPACE</span></a>
            <button class="admin-menu-toggle" type="button" data-admin-menu aria-controls="admin-navigation" aria-expanded="true">Menu <span aria-hidden="true">&#9776;</span></button>
            <nav id="admin-navigation" aria-label="Admin navigation">
                <p class="nav-label">MANAGE</p>
                <a class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}" @if(request()->routeIs('admin.enquiries.*')) aria-current="page" @endif href="{{ route('admin.enquiries.index') }}">@include('partners.icon', ['name' => 'dashboard']) Enquiry inbox</a>
                <a class="{{ request()->routeIs('admin.partners.*') ? 'active' : '' }}" @if(request()->routeIs('admin.partners.*')) aria-current="page" @endif href="{{ route('admin.partners.index') }}">@include('partners.icon', ['name' => 'people']) Channel partners</a>
                <p class="nav-label nav-label-secondary">WORKSPACE</p>
                <a class="{{ request()->routeIs('admin.account') ? 'active' : '' }}" @if(request()->routeIs('admin.account')) aria-current="page" @endif href="{{ route('admin.account') }}">@include('partners.icon', ['name' => 'check']) My account</a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">@include('partners.icon', ['name' => 'home']) View website <span class="nav-external" aria-hidden="true">&nearr;</span></a>
            </nav>
            <div class="sidebar-bottom"><span>Signed in as</span><strong>{{ auth()->user()->name }}</strong><form action="{{ route('admin.logout') }}" method="post">@csrf<button type="submit">Sign out ↗</button></form></div>
        </aside>
        <main class="admin-main" id="admin-content">
            <header class="workspace-bar"><span class="admin-breadcrumb">Workspace <span aria-hidden="true">/</span> <strong>{{ request()->routeIs('admin.partners.*') ? 'Channel partners' : (request()->routeIs('admin.account') ? 'My account' : 'Enquiries') }}</strong></span><span class="workspace-time">@include('partners.icon', ['name' => 'calendar']) All times in IST</span></header>
            <div class="workspace-content">
            @include('admin.notices')
            @yield('content')
            </div>
        </main>
    </div>
@else
    <main class="login-shell" id="admin-content">@include('admin.notices') @yield('content')</main>
@endif
</body>
</html>
