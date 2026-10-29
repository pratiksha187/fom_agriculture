@extends('partners.layout')
@section('title', 'Partner Login')
@section('subtitle', 'Welcome back to your partner dashboard')
@section('content')
<form method="post" action="{{ route('partners.authenticate') }}">
    @csrf
    <div class="field"><label for="email">Email Address *</label><input id="email" type="email" name="email" autocomplete="username" value="{{ old('email') }}" placeholder="you@example.com" required></div>
    <div class="field"><label for="password">Password *</label><div class="password-field"><input id="password" type="password" name="password" autocomplete="current-password" required>@include('partners.password-toggle', ['target' => 'password'])</div></div>
    <button class="submit-button" type="submit">Login to Partner Dashboard</button>
    <p class="card-footer">New partner? <a href="{{ route('partners.register') }}">Register here</a></p>
</form>
@endsection
