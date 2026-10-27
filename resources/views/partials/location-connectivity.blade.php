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
<section class="connectivity" id="connectivity" aria-labelledby="connectivity-title">
    <div class="connectivity-inner">
        <header class="connectivity-heading">
            <h2 id="connectivity-title">Location &amp; Connectivity</h2>
            <p>Connected to Destinations. Surrounded by Nature.</p>
        </header>
        <div class="connectivity-carousel" role="region" aria-roledescription="carousel" aria-label="Nearby destinations">
            <button class="connectivity-arrow" type="button" data-connectivity-direction="-1" aria-label="Previous destinations" aria-controls="connectivity-cards" hidden>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m15 4-8 8 8 8"/></svg>
            </button>
            <div class="connectivity-cards" id="connectivity-cards" tabindex="0" aria-label="Destination cards. Use the arrow keys or swipe to explore.">
                @foreach($connectivityCards as [$image, $title, $description])
                    <article class="connectivity-card" aria-label="{{ $title }}">
                        <img src="{{ asset('images/project/connectivity/'.$image.'.webp') }}" alt="{{ $title }}. {{ $description }}" width="1583" height="650" loading="lazy" decoding="async">
                    </article>
                @endforeach
            </div>
            <button class="connectivity-arrow" type="button" data-connectivity-direction="1" aria-label="Next destinations" aria-controls="connectivity-cards" hidden>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 4 8 8-8 8"/></svg>
            </button>
        </div>
        <p class="connectivity-status" aria-live="polite" aria-atomic="true"></p>
    </div>
</section>
