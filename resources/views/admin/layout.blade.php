<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · Foothills</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<body>
@if(auth()->user()?->is_admin)
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="admin-brand" href="{{ route('admin.enquiries.index') }}"><img src="{{ asset('images/foothills-logo.svg') }}" width="144" height="108" alt="Foothills of Mahabaleshwar"><span>ADMIN WORKSPACE</span></a>
            <nav aria-label="Admin navigation">
                <a class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}" href="{{ route('admin.enquiries.index') }}">Enquiry inbox <span>↗</span></a>
                <a class="{{ request()->routeIs('admin.account') ? 'active' : '' }}" href="{{ route('admin.account') }}">Account <span>↗</span></a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">View website <span>↗</span></a>
            </nav>
            <div class="sidebar-bottom"><span>Signed in as</span><strong>{{ auth()->user()->name }}</strong><form action="{{ route('admin.logout') }}" method="post">@csrf<button type="submit">Sign out ↗</button></form></div>
        </aside>
        <main class="admin-main">
            <header class="workspace-bar"><span>FOOTHILLS / ADMIN</span><span>All times in IST</span></header>
            @include('admin.notices')
            @yield('content')
        </main>
    </div>
@else
    <main class="login-shell">@include('admin.notices') @yield('content')</main>
@endif
</body>
</html>
