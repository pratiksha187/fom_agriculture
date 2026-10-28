@extends('admin.layout')
@section('title', 'Account')
@section('content')
<header class="page-heading"><div><p class="eyebrow">YOUR WORKSPACE</p><h1>Account</h1><p class="muted">{{ auth()->user()->email }}</p></div></header>
<section class="panel account-panel"><h2>Change your password</h2><p class="muted">Choose a password with at least 12 characters.</p><form class="stack" action="{{ route('admin.password.update') }}" method="post">@csrf @method('PUT')
    <div><label for="current_password">Current password</label><input id="current_password" name="current_password" type="password" autocomplete="current-password" required></div>
    <div><label for="password">New password</label><input id="password" name="password" type="password" autocomplete="new-password" required minlength="12" maxlength="128"></div>
    <div><label for="password_confirmation">Confirm new password</label><input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required minlength="12" maxlength="128"></div>
    <button class="button" type="submit">Update password ↗</button>
</form></section>
@endsection
