# Client profile update

Reference: the nine-page client profile supplied on 26 October 2026.

## Content mapping

| Profile pages | Website changes |
| --- | --- |
| 1–2 | 25 total land plots, sizes starting at 13,000 sq. ft., profile price ₹399/sq. ft., hill-view positioning and project story. |
| 3 | Nature, privacy, generous land parcels and countryside lifestyle. |
| 4 | Poladpur, Mahabaleshwar, Pratapgad, Mahad and NH-66; no invented distances or travel times. |
| 5 | Actual waterfall, road, hills and landscape photographs extracted into local WebP assets. |
| 6 | Full layout image with a link to open at a larger size. |
| 7 | Six infrastructure features with proposed status and the profile's permissions qualification. |
| 8 | All ten clubhouse amenities; concept image labelled as proposed. |
| 9 | Project contact email, both phone numbers, location and visit enquiry. |

The PDF gives `patilinfrarealtors@gmail.com` on pages 5–6 and `foothillsofmahabaleshwar@gmail.com` on page 9. Both are included with separate sales and project labels. The total collection is not presented as a live availability count. The selling price is labelled as the profile price; current terms require contact with the team.

The supplied PDF is unchanged at `public/pdf/Brochure.pdf`. `/download-brochure` serves this file using a filesystem path and a descriptive download name. The existing direct brochure URL also receives the updated profile.

## Enquiries

The form validates name, phone, optional email and optional message server-side, then opens a prefilled WhatsApp enquiry to +91 9326216153. The visitor must press Send in WhatsApp; the website does not confirm a booking or send email. CSRF protection and a six-request-per-minute throttle apply. SMTP configuration is not needed for this flow.

## Maintenance and deployment

- Project facts, contacts, infrastructure and amenities are in `config/project.php`.
- Page: `resources/views/welcome.blade.php`; styling and interaction: `public/css/site.css`, `public/js/site.js`.
- Images and styles are local. No CDN or frontend build is required for this page.
- Deploy the changed PHP/view files plus `public/css`, `public/js`, `public/images` and the new PDF.
- Run `php artisan optimize:clear` on the deployment, then rebuild caches using your normal deployment process.
- Use `php artisan test` for route, content, download and enquiry validation checks.
- The map opens a search for Poladpur, not a guessed site pin. Replace it with the verified site location when available.
- No environment secrets were changed.

## Verification

- Seven Laravel tests passed with 28 assertions.
- Headless Chrome checks passed at 1440px, 390px and 320px: no horizontal overflow, broken images, missing section targets or browser errors.
- Mobile navigation closes after selection; browser phone validation rejects invalid input and accepts formatted numbers.
- The downloadable PDF matches the supplied file byte for byte.

## Design refinement

The profile-inspired design now includes an ivory and forest-green palette, an editorial hero with a plot summary card on desktop, a framed site photograph, refined infrastructure cards, a photographic countryside section, and an accessible gallery dialog. Gallery images still open directly when JavaScript is unavailable. The added styling is in `public/css/refined.css`, loaded after the base stylesheet.

Verification for this refinement: seven Laravel tests passed (28 assertions), JavaScript syntax passed, and Chrome checks at 1440, 1024, 768, 390 and 320 pixels found no horizontal overflow, broken images or browser errors. Gallery opening and Escape-to-close passed. Desktop and mobile previews are saved alongside this document.


## Typography readability update

Increased main descriptions to 18px on desktop and 17px on mobile, navigation and form labels to 16px, supporting notes to 14-15px, and section labels to 12-13px. Mobile facts, amenities and narrow-screen feature cards now stack to accommodate the larger copy. Chrome checks at 1920, 1440, 1024, 768, 390 and 320px found no page or component overflow. Updated full-page previews: readable-type-1440.png and readable-type-390.png.
