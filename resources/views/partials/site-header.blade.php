<div class="topbar"><div class="wrap"><span>Poladpur, Raigad · Maharashtra</span><a href="tel:+91{{ $project['phones'][0] }}">Speak to our team <span>+91 {{ $project['phones'][0] }}</span> ↗</a></div></div>
<header class="site-header">
    <div class="wrap header-inner">
        <a class="brand" href="{{ route('home') }}#home" aria-label="Foothills of Mahabaleshwar home">
            <img class="brand-logo" src="{{ asset('images/foothills-logo.svg') }}" alt="Foothills of Mahabaleshwar" width="144" height="108">
            
        </a>
        <nav class="desktop-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}#about">Overview</a><a href="{{ route('home') }}#features">Features</a><a href="{{ route('home') }}#amenities">Lifestyle</a><a href="{{ route('home') }}#gallery">Gallery</a><a href="{{ route('home') }}#layout">Layout</a><a href="{{ route('home') }}#location">Location</a><a href="{{ route('partners.register') }}" @if(request()->routeIs('partners.*')) aria-current="page" @endif>Channel Partner</a>
        </nav>
        <a class="button button-small header-cta" href="{{ route('home') }}#contact">Book a site visit <span>↗</span></a>
        <details class="mobile-nav">
            <summary aria-label="Toggle navigation">Menu <span>☰</span></summary>
            <nav aria-label="Mobile navigation"><a href="{{ route('home') }}#about">Overview</a><a href="{{ route('home') }}#features">Features</a><a href="{{ route('home') }}#amenities">Lifestyle</a><a href="{{ route('home') }}#gallery">Gallery</a><a href="{{ route('home') }}#layout">Layout plan</a><a href="{{ route('home') }}#location">Location</a><a href="{{ route('partners.register') }}" @if(request()->routeIs('partners.*')) aria-current="page" @endif>Channel Partner</a><a href="{{ route('home') }}#contact">Book a site visit</a></nav>
        </details>
    </div>
</header>
