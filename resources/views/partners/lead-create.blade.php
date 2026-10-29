@extends('partners.crm-layout')
@section('title', 'Add buyer lead')
@section('content')
<section class="portal-panel partner-card" id="submit-lead">
    <div class="portal-panel-heading"><div><p class="eyebrow">GROW YOUR BUYER NETWORK</p><h2>Submit New Buyer Lead</h2></div><span>{{ $partner->partner_code }}</span></div>
    <form method="post" action="{{ route('partners.leads.store') }}">@csrf
        <div class="field-row"><div class="field"><label for="buyer_name">Buyer name *</label><input id="buyer_name" name="buyer_name" maxlength="100" value="{{ old('buyer_name') }}" placeholder="Full name" required></div><div class="field"><label for="buyer_phone">Mobile number *</label><input id="buyer_phone" name="phone" type="tel" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" value="{{ old('phone') }}" placeholder="10-digit number" required></div></div>
        <div class="field-row"><div class="field"><label for="buyer_email">Email address</label><input id="buyer_email" name="email" type="email" maxlength="254" value="{{ old('email') }}" placeholder="buyer@example.com"></div><div class="field"><label for="buyer_city">City / Location</label><input id="buyer_city" name="city" maxlength="100" value="{{ old('city') }}" placeholder="e.g. Mumbai"></div></div>
        <div class="field"><label for="preferred_visit_date">Preferred visit date</label><input id="preferred_visit_date" name="preferred_visit_date" type="date" value="{{ old('preferred_visit_date') }}" min="{{ now()->timezone('Asia/Kolkata')->toDateString() }}"><small>A preferred date is a request; our team will confirm your visit separately.</small></div><div class="field"><label for="requirements">Buyer requirements</label><textarea id="requirements" name="requirements" maxlength="3000" rows="3" placeholder="Plot preferences, budget or enquiry details">{{ old('requirements') }}</textarea></div>
        <label class="consent"><input type="checkbox" name="buyer_consent" value="1" required @checked(old('buyer_consent'))><span>I have the buyer&rsquo;s permission to share these details with the Foothills team for this enquiry.</span></label>
        <button class="button" type="submit">Submit buyer lead <span>&#8599;</span></button>
        <p class="portal-note">Our team reviews lead acceptance and duplicate records. Submission does not guarantee lead ownership or commission.</p>
    </form>
</section>
@endsection
