<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover 25 exclusive hill-view land plots at Poladpur, Raigad. Plots starting from 13,000 sq. ft. at ₹399 per sq. ft. Explore the project profile and arrange a site visit.">
    <meta name="theme-color" content="#233e30">
    <meta property="og:title" content="Foothills of Mahabaleshwar | Hill-view plots in Poladpur">
    <meta property="og:description" content="Own land. Embrace nature. Experience luxury. 25 exclusive plots starting from 13,000 sq. ft.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/project/landscape.webp') }}">
    <title>Foothills of Mahabaleshwar | Premium Hill-view Plots, Poladpur</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="preload" as="image" href="{{ asset('images/project/landscape.webp') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/connectivity.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
@include('partials.site-header')
<main id="main">
    <section class="hero" id="home" aria-labelledby="hero-title">
        <img class="hero-image" src="{{ asset('images/project/landscape.webp') }}" alt="Lush green hills and valley at the Poladpur project site" width="1518" height="780" fetchpriority="high">
        <div class="wrap hero-inner">
            <p class="eyebrow light"><span class="line"></span> PREMIUM HILL-VIEW PLOTS · POLADPUR</p>
            <h1 id="hero-title">Own land.<br>Embrace nature.<br><em>Experience luxury.</em></h1>
            <p class="hero-description">Your own piece of the Western Ghats. Discover spacious land plots, green hills and a quieter way of life at Foothills of Mahabaleshwar.</p>
            <div class="actions"><a class="button" href="#contact">Explore your piece of nature <span>↗</span></a><a class="text-link light-link" href="{{ route('brochure') }}">Download project profile <span>↓</span></a></div>
            <div class="hero-bottom"><span>Your countryside escape, in the Western Ghats.</span><a href="#about">Discover the project ↓</a></div>
        </div>
    </section>
    <div class="facts wrap" aria-label="Project at a glance">
        <div><span class="fact-label">A LIMITED COLLECTION</span><strong>{{ $project['plot_count'] }} <small>plots</small></strong><span>Total plots in the project</span></div>
        <div><span class="fact-label">SPACE TO CALL YOUR OWN</span><strong>{{ number_format($project['minimum_area']) }} <small>sq. ft.</small></strong><span>Plot sizes starting from</span></div>
        <div><span class="fact-label">PROFILE SELLING PRICE</span><strong>₹{{ $project['price_per_sqft'] }} <small>/ sq. ft.</small></strong><span>Contact the team for current terms</span></div>
    </div>
    <section class="section wrap about-grid" id="about" aria-labelledby="about-title">
        <div class="about-image"><img src="{{ asset('images/project/hill-view.webp') }}" alt="Forested hills and valley in Poladpur" width="741" height="573" loading="lazy"><span class="photo-label">POLADPUR, THROUGH OUR LENS</span><span class="image-tag">A little closer to nature.</span></div>
        <div><p class="eyebrow">THE FOOTHILLS STORY</p><h2 id="about-title">More than land.<br>A place to <em>reconnect.</em></h2><p class="lead">Discover your dream land in the heart of nature.</p><p>Nestled amidst the green landscapes of Poladpur, near the hill destinations of Mahabaleshwar and Pratapgad, Foothills of Mahabaleshwar is an exclusive hill-view plotting development.</p><p>Whether you are looking for a weekend escape or a place to slow down, this private community brings together open space, thoughtful planning and peaceful countryside surroundings.</p><div class="small-features"><span>Hill & valley views</span><span>Generous plot sizes</span><span>Natural green surroundings</span></div><a class="text-link" href="#layout">Discover the community layout <span>↗</span></a></div>
    </section>
    <section class="section infrastructure" id="features" aria-labelledby="features-title"><div class="wrap">
        <div class="section-heading"><div><p class="eyebrow">THOUGHTFULLY PLANNED</p><h2 id="features-title">Planned for convenience.<br>Surrounded by <em>nature.</em></h2></div><p>A proposed gated plotted community with planned essential infrastructure and room to enjoy the countryside.</p></div>
        <div class="feature-grid">@foreach($project['infrastructure'] as [$number, $title, $description])<article class="feature-card"><span class="card-number">{{ $number }}</span><h3>{{ $title }}</h3><p>{{ $description }}</p></article>@endforeach</div>
        <p class="project-note"><span aria-hidden="true">ⓘ</span> All infrastructure is proposed and subject to approvals and final project specifications. Farmhouse construction or other development requires applicable permissions.</p>
    </div></section>
    @include('partials.lifestyle-amenities')
    <section class="section gallery-section" id="gallery" aria-labelledby="gallery-title"><div class="wrap">
        <div class="section-heading"><div><p class="eyebrow">A REAL SENSE OF PLACE</p><h2 id="gallery-title">The views are real.<br>The peace is <em>yours to discover.</em></h2></div><p>Actual location photographs from the project profile. Come and experience the surroundings for yourself.</p></div>
        <div class="gallery-grid">
            <figure class="gallery-tall"><a href="{{ asset('images/project/waterfall.webp') }}" target="_blank" rel="noopener" aria-label="Open actual waterfall photograph"><img src="{{ asset('images/project/waterfall.webp') }}" alt="Waterfall flowing through the green landscape at the site" width="741" height="1143" loading="lazy"></a><figcaption><span>01</span> A moment by the waterfall</figcaption></figure>
            <figure><a href="{{ asset('images/project/site-road.webp') }}" target="_blank" rel="noopener" aria-label="Open actual site road photograph"><img src="{{ asset('images/project/site-road.webp') }}" alt="Existing road through the green Poladpur surroundings" width="741" height="546" loading="lazy"></a><figcaption><span>02</span> The road to a slower pace</figcaption></figure>
            <figure><a href="{{ asset('images/project/hill-view.webp') }}" target="_blank" rel="noopener" aria-label="Open actual hill-view photograph"><img src="{{ asset('images/project/hill-view.webp') }}" alt="Green hills beneath a cloudy sky at Poladpur" width="741" height="573" loading="lazy"></a><figcaption><span>03</span> Green as far as you can see</figcaption></figure>
        </div>
    </div></section>
    <section class="section wrap layout-grid" id="layout" aria-labelledby="layout-title">
        <div><p class="eyebrow">THE BIGGER PICTURE</p><h2 id="layout-title">25 exclusive plots.<br>One thoughtfully<br>planned <em>community.</em></h2><p>Explore the arrangement of land parcels, internal access and shared spaces in the layout supplied with the project profile.</p><p class="muted">Layout reproduced from the client profile for reference. Confirm individual plot dimensions, availability and final approved plans with the sales team.</p><div class="actions"><a class="button" href="{{ asset('images/project/layout-plan.webp') }}" target="_blank" rel="noopener">View full layout <span>↗</span></a><a class="text-link" href="{{ route('brochure') }}">Get the profile ↓</a></div></div>
        <figure class="layout-image"><a href="{{ asset('images/project/layout-plan.webp') }}" target="_blank" rel="noopener" aria-label="Open full project layout plan"><img src="{{ asset('images/project/layout-plan.webp') }}" alt="Project layout showing the land parcels, internal roads and shared areas" width="1638" height="1740" loading="lazy"></a><figcaption>Project layout from the client profile · Open to view in detail</figcaption></figure>
    </section>
    @include('partials.location-connectivity')
    @include('partials.faq')
    <section class="section wrap contact-grid" id="contact" aria-labelledby="contact-title">
        <div><p class="eyebrow">YOUR PIECE OF NATURE IS WAITING</p><h2 id="contact-title">See the hills.<br>Feel the difference.<br><em>Plan your visit.</em></h2><p>Take the first step towards your own piece of nature. Connect with our team for plot details, current availability and a site visit.</p><div class="contact-details"><div><span>CALL OUR TEAM</span>@foreach($project['phones'] as $phone)<a href="tel:+91{{ $phone }}">+91 {{ $phone }} ↗</a>@endforeach</div><div><span>PROJECT ENQUIRIES</span><a href="mailto:{{ $project['email'] }}">{{ $project['email'] }} ↗</a></div><div><span>SALES OFFICE</span><a href="mailto:{{ $project['sales_email'] }}">{{ $project['sales_email'] }} ↗</a></div><div><span>VISIT US</span><p>{{ $project['location'] }}</p><small>Site visits by appointment. Contact us to arrange a time.</small></div></div></div>
        <div class="enquiry-card"><span class="form-tag">LET'S START A CONVERSATION</span><h3>Visit us or register your land</h3><p>Choose your enquiry below. Your details are saved for our team when you continue. You can then send the enquiry through WhatsApp.</p>
            @if($errors->any())<div class="form-errors" role="alert" tabindex="-1"><strong>Please check your details.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form action="{{ route('site-visit') }}" method="POST" enctype="multipart/form-data">@csrf
                <div><label for="enquiry_type">I would like to</label><select id="enquiry_type" name="enquiry_type"><option value="site_visit" @selected(old('enquiry_type', 'site_visit') === 'site_visit')>Arrange a site visit</option><option value="land_registration" @selected(old('enquiry_type') === 'land_registration')>Register my land / माझी जमीन नोंदवा</option></select></div>
                <div><label for="full_name">Full name <span aria-hidden="true">*</span></label><input id="full_name" name="full_name" type="text" autocomplete="name" placeholder="Your full name" required maxlength="100" value="{{ old('full_name') }}" @error('full_name') aria-invalid="true" aria-describedby="name-error" @enderror>@error('full_name')<small class="field-error" id="name-error">{{ $message }}</small>@enderror</div>
                <div><label for="phone">Phone number <span aria-hidden="true">*</span></label><input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="Your contact number" required minlength="10" maxlength="24" pattern="\+?(?=(?:[ \(\)\-]*[0-9]){10,15}[ \(\)\-]*$)[0-9 \(\)\-]{10,24}" title="Enter a phone number using digits, spaces, brackets or hyphens, with an optional leading +." value="{{ old('phone') }}" @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror>@error('phone')<small class="field-error" id="phone-error">{{ $message }}</small>@enderror</div>
                <div><label for="email">Email address <span class="optional">(optional)</span></label><input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com" maxlength="254" value="{{ old('email') }}" @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>@error('email')<small class="field-error" id="email-error">{{ $message }}</small>@enderror</div>
                <div><label for="message">What are you looking for? <span class="optional">(optional)</span></label><textarea id="message" name="message" rows="3" maxlength="1500" placeholder="Plot preferences, preferred visit date or questions..." @error('message') aria-invalid="true" aria-describedby="message-error" @enderror>{{ old('message') }}</textarea>@error('message')<small class="field-error" id="message-error">{{ $message }}</small>@enderror</div>
                <div data-enquiry-panel="site_visit"><label for="attachment">Upload a file <span class="optional">(optional)</span></label><input id="attachment" name="attachment" type="file" accept=".pdf,.jpg,.jpeg,.png" aria-describedby="attachment-help @error('attachment') attachment-error @enderror" @error('attachment') aria-invalid="true" @enderror><small class="form-help" id="attachment-help">PDF, JPG or PNG, up to 2 MB. You can leave this blank. Uploaded files are shared as a download link in your WhatsApp enquiry, valid for 7 days.</small>@error('attachment')<small class="field-error" id="attachment-error">{{ $message }} Please select your file again.</small>@enderror</div>
                @include('partials.land-registration-fields')
                <button class="button" type="submit">Continue to WhatsApp <span>↗</span></button><small class="form-help">Your enquiry and any documents are saved for our team before WhatsApp opens. Press Send in WhatsApp to send a copy there. Our team will review your enquiry and contact you.</small>
            </form>
        </div>
    </section>
</main>
<dialog class="photo-dialog" aria-label="Project photograph viewer"><button class="photo-close" type="button" aria-label="Close photograph">Close <span aria-hidden="true">×</span></button><img alt=""><p class="photo-caption"></p></dialog>
@include('partials.site-footer')
<div class="mobile-contact"><a href="tel:+91{{ $project['phones'][0] }}">Call the team ↗</a><a href="#contact">Book a site visit ↗</a></div>
</body>
</html>
