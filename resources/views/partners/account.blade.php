@extends('partners.crm-layout')
@section('title', 'Partner account')
@section('content')
@if(request()->routeIs('partners.profile'))
<section class="portal-panel" id="profile"><div class="portal-panel-heading"><div><p class="eyebrow">YOUR ACCOUNT</p><h2>Personal &amp; professional details</h2></div><span>Profile</span></div>
<dl class="profile-details">
    <dt>Full name</dt><dd>{{ $partner->user->name }}</dd>
    <dt>Partner type</dt><dd>{{ \App\Models\ChannelPartner::TYPES[$partner->partner_type] }}</dd>
    @if($partner->agency_name)<dt>Agency / Company</dt><dd>{{ $partner->agency_name }}</dd>@endif
    <dt>Mobile</dt><dd>{{ $partner->mobile }}</dd>
    <dt>Email</dt><dd>{{ $partner->user->email }}</dd>
    <dt>City / Location</dt><dd>{{ $partner->city }}</dd>
    <dt>Experience</dt><dd>{{ \App\Models\ChannelPartner::EXPERIENCE[$partner->experience] }}</dd>
    <dt>RERA number</dt><dd>{{ $partner->rera_number ?: 'Not provided' }}</dd>
</dl>
        <p class="portal-note">For corrections to your registration details, <a href="mailto:{{ $project['sales_email'] }}">contact the partner team</a>.</p></section>
@endif
@if(request()->routeIs('partners.resources'))
<section class="portal-panel" id="resources"><div class="portal-panel-heading"><div><p class="eyebrow">GET TO KNOW THE PROJECT</p><h2>Your project resources</h2></div></div><div class="portal-resources"><a href="{{ route('brochure') }}"><span>01 / PROJECT PROFILE</span><strong>The Foothills brochure &darr;</strong><p>Project information, plot details and location.</p></a><a href="{{ route('home') }}#gallery"><span>02 / EXPLORE FOOTHILLS</span><strong>A closer look at the project &#8599;</strong><p>See the photographs, layout and surroundings.</p></a></div></section>
@endif
@if(request()->routeIs('partners.security'))
<section class="portal-panel partner-card" id="security"><div class="portal-panel-heading"><div><p class="eyebrow">KEEP YOUR ACCOUNT YOURS</p><h2>Password &amp; security</h2></div></div><p class="portal-note">Log in using {{ $partner->user->email }} and your personal password. Your password is never displayed.</p><form method="post" action="{{ route('partners.password.update') }}">@csrf @method('put')
            <div class="field"><label for="current_password">Current password *</label><div class="password-field"><input id="current_password" name="current_password" type="password" autocomplete="current-password" required>@include('partners.password-toggle', ['target' => 'current_password'])</div></div>
            <div class="field-row"><div class="field"><label for="password">New password *</label><div class="password-field"><input id="password" name="password" type="password" minlength="8" maxlength="128" autocomplete="new-password" aria-describedby="new-password-help" required>@include('partners.password-toggle', ['target' => 'password'])</div><small id="new-password-help">At least 8 characters, including a letter and a number.</small></div><div class="field"><label for="password_confirmation">Confirm new password *</label><div class="password-field"><input id="password_confirmation" name="password_confirmation" type="password" minlength="8" maxlength="128" autocomplete="new-password" required>@include('partners.password-toggle', ['target' => 'password_confirmation'])</div></div></div>
            <button class="button" type="submit">Update password <span>&#8599;</span></button>
        </form></section>
@endif
@if(request()->routeIs('partners.agreement'))
<section class="portal-panel" id="agreement"><div class="portal-panel-heading"><div><p class="eyebrow">YOUR REGISTRATION RECORD</p><h2>Terms &amp; Conditions</h2></div></div><p class="portal-note">Accepted on {{ $partner->terms_accepted_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST.</p>@if($partner->terms_version)<p class="terms-version">Accepted document reference: <code>{{ $partner->terms_version }}</code></p>@else<p class="portal-note">Registered before document version tracking was introduced. The current terms may differ from the terms accepted at registration.</p>@endif<a class="text-link" href="{{ route('partners.terms') }}" target="_blank" rel="noopener">Read the current terms &amp; conditions &#8599;</a></section>
@endif
@endsection
