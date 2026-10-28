@php
    $connectivityCards = [
        ['highway', 'Mumbai–Goa Highway (NH-66)', 'Approximately 7–10 minutes from the project, offering access to the Mumbai–Goa Highway corridor.'],
        ['railway', 'Karanjadi Railway Station', 'Approximately 30–35 minutes away, providing rail connectivity along the Konkan Railway route.'],
        ['pratapgad', 'Pratapgad Fort', 'Around 45 minutes away, discover the historic fort surrounded by scenic Sahyadri mountain views.'],
        ['mahabaleshwar', 'Mahabaleshwar Hill Station', 'Approximately 1 hour away, enjoy a popular hill destination known for its breathtaking views and natural beauty.'],
        ['mahad', 'Mahad City', 'Approximately 30 minutes away, offering access to everyday essentials and regional conveniences.'],
        ['poladpur', 'Poladpur City', 'Just 7–10 minutes from the project, offering convenient access to local markets, daily essentials, and nearby services.'],
    ];
@endphp
<section class="section connectivity" id="location" aria-labelledby="location-title">
    <div class="wrap">
        <header class="section-heading">
            <div><p class="eyebrow">CLOSER THAN YOU THINK</p><h2 id="location-title">Away from the rush.<br>Connected to <em>what matters.</em></h2></div>
            <p>Discover Poladpur, Raigad, with access to the Konkan coast, hill destinations and everyday essentials.</p>
        </header>
        <div class="location-address"><div><span>PROJECT LOCATION</span><strong>{{ $project['location'] }}</strong></div><a class="text-link" href="https://www.google.com/maps/search/?api=1&amp;query=Poladpur%2C%20Raigad%2C%20Maharashtra%20402303" target="_blank" rel="noopener">Explore Poladpur on Maps ↗</a></div>
        <div class="connectivity-carousel" role="region" aria-roledescription="carousel" aria-label="Nearby destinations">
            <button class="connectivity-arrow" type="button" data-connectivity-direction="-1" aria-label="Previous destinations" aria-controls="connectivity-cards" hidden>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m15 4-8 8 8 8"/></svg>
            </button>
            <div class="connectivity-cards" id="connectivity-cards" tabindex="0" aria-label="Destination cards. Use the arrow keys or swipe to explore.">
                @foreach($connectivityCards as [$image, $title, $description])
                    <article class="connectivity-card" aria-label="{{ $title }}">
                        <div class="connectivity-photo" aria-hidden="true"><img src="{{ asset('images/project/connectivity/'.$image.'.webp') }}" alt="" width="1583" height="650" loading="lazy" decoding="async"></div>
                        <div class="connectivity-copy"><h3>{{ $title }}</h3><p>{{ $description }}</p></div>
                    </article>
                @endforeach
            </div>
            <button class="connectivity-arrow" type="button" data-connectivity-direction="1" aria-label="Next destinations" aria-controls="connectivity-cards" hidden>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 4 8 8-8 8"/></svg>
            </button>
        </div>
        <p class="connectivity-status" aria-live="polite" aria-atomic="true"></p>
        <p class="project-note">Travel times are approximate and depend on the route and traffic. The map shows the Poladpur area; contact our team for the exact site pin and directions.</p>
    </div>
</section>
