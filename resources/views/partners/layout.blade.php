<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#203f32">
    <title>@yield('title') | Foothills of Mahabaleshwar</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partners.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
    <script src="{{ asset('js/partners.js') }}" defer></script>
</head>
<body class="partner-page">
@php($project = config('project'))
<a class="skip-link" href="#main">Skip to content</a>
@include('partials.site-header')
<main id="main" class="partner-main">
    <div class="wrap">
        <nav class="partner-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span>Channel partners</span></nav>
        <div class="partner-grid">
            <aside class="partner-story" aria-label="Partner with Foothills">
                <div class="partner-visual">
                    <img src="{{ asset('images/project/landscape.webp') }}" alt="Green hills and valley at Foothills of Mahabaleshwar, Poladpur" width="1518" height="780" fetchpriority="high">
                    <div class="partner-visual-content">
                        <p class="eyebrow light"><span class="line"></span> GROW WITH FOOTHILLS</p>
                        <h2>Good connections.<br><em>Great possibilities.</em></h2>
                        <p>Bring your network closer to a life surrounded by nature. Become a channel partner at Foothills of Mahabaleshwar.</p>
                        <span class="partner-location"><span aria-hidden="true">&#9678;</span> Poladpur, Raigad &middot; Maharashtra</span>
                    </div>
                </div>
                <div class="partner-project-facts"><div><strong>{{ $project['plot_count'] }}</strong><span>Exclusive plots</span></div><div><strong>{{ number_format($project['minimum_area']) }} <small>sq. ft.</small></strong><span>Plot sizes starting from</span></div></div>
                <div class="partner-next"><p class="eyebrow">A SIMPLE BEGINNING</p><h3>Your next chapter starts here.</h3><ol><li><span>01</span><div><strong>Introduce yourself</strong><p>Tell us about you and your real estate experience.</p></div></li><li><span>02</span><div><strong>Connect with our team</strong><p>Discuss the project and partnership opportunities.</p></div></li></ol><a class="text-link" href="{{ route('brochure') }}">Explore the project profile <span aria-hidden="true">&#8599;</span></a></div>
                <div class="partner-help"><span class="partner-help-icon" aria-hidden="true">&#8599;</span><div><strong>Let&rsquo;s talk partnership.</strong><p>Have a question? <a href="tel:+91{{ $project['phones'][0] }}">+91 {{ $project['phones'][0] }}</a></p></div></div>
            </aside>
            <section class="partner-card" aria-labelledby="partner-title">
    <header class="card-heading"><p class="eyebrow"><span class="line"></span> THE FOOTHILLS PARTNER NETWORK</p><h1 id="partner-title">@yield('title')</h1><p>@yield('subtitle', 'Join our network of real estate sales partners. Let’s build lasting connections, together.')</p></header>
    @if(session('success'))<p class="success" role="status">{{ session('success') }}</p>@endif
    @if($errors->any())
        <div class="errors" role="alert" tabindex="-1"><strong>Please check your details.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif
    @yield('content')
            </section>
        </div>
    </div>
</main>
@include('partials.site-footer')
</body>
</html>
