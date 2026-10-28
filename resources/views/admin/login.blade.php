@extends('admin.layout')
@section('title', 'Admin sign in')
@section('content')
<section class="login-card">
    <a href="{{ route('home') }}"><img class="login-logo" src="{{ asset('images/foothills-logo.svg') }}" width="144" height="108" alt="Foothills of Mahabaleshwar"></a>
    <p class="eyebrow">YOUR ENQUIRY WORKSPACE</p>
    <h1>Welcome back.</h1><p class="muted">Sign in to manage site visits, land enquiries and documents.</p>
    <form class="stack" action="{{ route('admin.login.store') }}" method="post">@csrf
        <div><label for="email">Admin email</label><input id="email" name="email" type="email" autocomplete="username" required maxlength="254" value="{{ old('email') }}" autofocus></div>
        <div><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required></div>
        <button class="button" type="submit">Sign in <span>↗</span></button>
    </form>
    <a class="quiet-link" href="{{ route('home') }}">← Back to website</a>
</section>
@endsection
