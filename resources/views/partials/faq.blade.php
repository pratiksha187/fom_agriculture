<section class="faq-section" id="faq" aria-labelledby="faq-title">
    <div class="wrap faq-inner">
        <h2 id="faq-title">Frequently Asked Questions (FAQs)</h2>
        <div class="faq-list">
            <details class="faq-item" name="project-faq">
                <summary>1. What is the plot size at Foothills of Mahabaleshwar?</summary>
                <div class="faq-answer"><p>Plot sizes start from {{ number_format($project['minimum_area']) }} sq. ft., with {{ $project['plot_count'] }} exclusive land plots in the project. <a href="#layout">View the layout plan</a> or contact our team for individual plot sizes and availability.</p></div>
            </details>
            <details class="faq-item" name="project-faq">
                <summary>2. What amenities are proposed in the project?</summary>
                <div class="faq-answer"><p>Proposed amenities include a clubhouse, gymnasium, spa and wellness centre, restaurant, meditation and yoga area, swimming pool, children's play area, banquet hall, indoor and outdoor games, and a box cricket arena. Amenities are subject to approvals and final project specifications.</p></div>
            </details>
            <details class="faq-item" name="project-faq">
                <summary>3. Can I visit the site before booking?</summary>
                <div class="faq-answer"><p>Yes. Site visits are available by appointment. <a href="#contact">Book a site visit</a> or call <a href="tel:+91{{ $project['phones'][0] }}">+91 {{ $project['phones'][0] }}</a> to arrange a convenient time and get directions to the project.</p></div>
            </details>
            <details class="faq-item" name="project-faq">
                <summary>4. How can I download the brochure?</summary>
                <div class="faq-answer"><p>You can <a href="{{ route('brochure') }}">download the project brochure here</a> to explore the project details, layout and proposed amenities.</p></div>
            </details>
        </div>
    </div>
</section>
