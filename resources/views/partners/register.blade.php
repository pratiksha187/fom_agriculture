@extends('partners.layout')
@section('title', 'Channel Partner Registration')
@section('content')
<form action="{{ route('partners.store') }}" method="post" data-partner-registration>
    @csrf
    <div class="form-section-heading"><span>01</span><h2>Your professional details</h2><small>* Required fields</small></div>
    <fieldset class="partner-types"><legend>Partner Type <span aria-hidden="true">*</span></legend>
        @foreach(\App\Models\ChannelPartner::TYPES as $value => $label)
            <label><input type="radio" name="partner_type" value="{{ $value }}" @checked(old('partner_type', 'individual') === $value) required><span>{{ $label }}<small>{{ $value === 'individual' ? 'Register as an independent professional' : 'Register your real estate business' }}</small></span></label>
        @endforeach
    </fieldset>
    <div class="field"><label for="name">Full Name *</label><input id="name" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="100" placeholder="Enter your full name" required></div>
    <div class="field" data-agency-field><label for="agency_name">Agency / Company Name *</label><input id="agency_name" name="agency_name" value="{{ old('agency_name') }}" autocomplete="organization" maxlength="150" placeholder="Enter your agency name"><noscript><small>Required when you select Real Estate Agency.</small></noscript></div>
    <div class="field-row">
        <div class="field"><label for="mobile">Mobile Number *</label><input id="mobile" name="mobile" type="tel" inputmode="numeric" pattern="[0-9]{10}" minlength="10" maxlength="10" value="{{ old('mobile') }}" autocomplete="tel-national" placeholder="10-digit number" required></div>
        <div class="field"><label for="email">Email Address *</label><input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="254" placeholder="you@example.com" required></div>
    </div>
    <div class="field-row">
        <div class="field"><label for="city">City / Location *</label><input id="city" name="city" value="{{ old('city') }}" autocomplete="address-level2" maxlength="100" placeholder="e.g. Mumbai" required></div>
        <div class="field"><label for="experience">Experience *</label><select id="experience" name="experience" required><option value="">Select experience</option>@foreach(\App\Models\ChannelPartner::EXPERIENCE as $value => $label)<option value="{{ $value }}" @selected(old('experience') === $value)>{{ $label }}</option>@endforeach</select></div>
    </div>
    <div class="field"><label for="rera_number">RERA Registration Number (if applicable)</label><input id="rera_number" name="rera_number" value="{{ old('rera_number') }}" maxlength="100" placeholder="Enter registration number"></div>
    <fieldset class="credentials"><legend><span class="section-number">02</span> Create Login Credentials</legend>
        <div class="field"><label for="password">Create Password *</label><div class="password-field"><input id="password" name="password" type="password" autocomplete="new-password" minlength="8" maxlength="128" pattern="(?=.*[A-Za-z])(?=.*[0-9]).{8,}" title="Use at least 8 characters, including a letter and a number." placeholder="Create a strong password" aria-describedby="password-help" required>@include('partners.password-toggle', ['target' => 'password'])</div><small id="password-help">Minimum 8 characters, including a letter and a number</small></div>
        <div class="field"><label for="password_confirmation">Confirm Password *</label><div class="password-field"><input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" maxlength="128" placeholder="Re-enter your password" required>@include('partners.password-toggle', ['target' => 'password_confirmation'])</div></div>
    </fieldset>
    <input type="hidden" name="terms_version" value="{{ $termsDocument['version'] }}">
    <label class="consent"><input name="terms" type="checkbox" value="1" @checked(old('terms') && old('terms_version') === $termsDocument['version']) required><span>I agree to the <a href="{{ route('partners.terms') }}" target="_blank" rel="noopener" data-open-terms>Channel Partner Terms &amp; Conditions</a> and consent to the processing of my registration details.</span></label>
    <p class="terms-status" data-terms-status role="status">Read the terms and select Accept &amp; Continue before creating your account.</p>
    <p class="errors" data-registration-feedback role="alert" hidden></p>
    <button class="submit-button" type="submit">Create Partner Account <span aria-hidden="true">&#8599;</span></button>
    <p class="registration-note">Your details are saved securely for our team to review.</p>
    <p class="card-footer">Already registered? <a href="{{ route('partners.login') }}">Login to Partner Dashboard</a></p>
</form>
<dialog class="terms-dialog" aria-labelledby="terms-dialog-title">
    <header><div><p class="eyebrow">FOOTHILLS PARTNER PROGRAMME</p><h2 id="terms-dialog-title">Terms &amp; Conditions</h2></div><button type="button" class="terms-close" data-close-terms aria-label="Close terms and conditions">&times;</button></header>
    <div class="terms-scroll" tabindex="0" role="region" aria-label="Full channel partner terms and conditions">@include('partners.terms-content')</div>
    <footer><p>Accept these terms to continue your registration.</p><div><button type="button" class="terms-cancel" data-close-terms>Cancel</button><button type="button" class="button" data-accept-terms>Accept &amp; Continue <span aria-hidden="true">&#8599;</span></button></div></footer>
</dialog>
@endsection
