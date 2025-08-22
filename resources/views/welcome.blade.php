<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FOOTHILLS OF MАHАBALESHWAR</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 + Font Awesome (needed by the new header) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
      *{margin:0;padding:0;box-sizing:border-box}
      body{font-family:'Inter',sans-serif;color:#ffffff}

      /* ====== NEW HEADER (Top bar + Glass header) ====== */
      :root{
        --topbar-h:40px;
        --primary:#10b981; --primary-2:#059669;
        --text-dark:#1f2937;
      }
      .top-bar{
        position:fixed; inset:0 0 auto 0; height:var(--topbar-h);
        background:linear-gradient(135deg,var(--primary),var(--primary-2));
        color:#fff; z-index:1060; display:flex; align-items:center;
        font-size:.925rem;
      }
      .top-bar .pulse-dot{width:8px;height:8px;border-radius:50%;background:#22c55e;margin-right:.5rem;animation:pulse 2s infinite}
      @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.6;transform:scale(1.15)}}

      .main-header{position:fixed; left:0; right:0; top:var(--topbar-h); z-index:1050; padding:0 20px; transition:top .35s ease}
      .header-content{
        max-width:1200px;
         margin:-10px auto !important;
        /* margin:0 auto; */
        background:rgba(255,255,255,.1);
        backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,.2);
        border-radius:24px; padding:16px 24px; transition:all .35s ease;
        box-shadow:0 25px 40px -25px rgba(0,0,0,.35);
      }
      .logo{display:flex;align-items:center;gap:12px;text-decoration:none}
      .logo-icon{width:40px;height:40px;border-radius:16px;background:linear-gradient(135deg,var(--primary),var(--primary-2));color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;box-shadow:0 10px 20px -8px rgba(0,0,0,.25)}
      .logo-text{color:#fff;line-height:1}
      .logo-title{font-weight:900;font-size:1.1rem}
      .logo-sub{font-size:.75rem;letter-spacing:.1em;opacity:.8}

      .main-header .nav-link{
        color:#fff!important;font-weight:600;padding:.5rem .85rem!important;border-radius:14px;transition:all .2s ease;text-decoration:none
      }
      .main-header .nav-link:hover{background:rgba(255,255,255,.2);transform:translateY(-1px)}
      .btn-primary-custom{
        background:linear-gradient(135deg,var(--primary),var(--primary-2));border:none;color:#fff;font-weight:700;padding:.65rem 1.15rem;border-radius:16px;display:inline-flex;align-items:center;gap:.5rem;box-shadow:0 12px 22px -10px rgba(0,0,0,.25);text-decoration:none
      }
      .btn-primary-custom:hover{filter:brightness(1.05);color:#fff}

      .main-header.scrolled{top:calc(var(--topbar-h) + 10px)}
      .main-header.scrolled .header-content{background:rgba(255,255,255,.95);border-color:rgba(0,0,0,.06)}
      .main-header.scrolled .logo-text,
      .main-header.scrolled .nav-link{color:var(--text-dark)!important}
      .main-header.scrolled .nav-link:hover{background:rgba(2,6,23,.06)}

      .offcanvas .nav-link{color:#111827!important;padding:.75rem 0!important}

      /* ====== YOUR EXISTING STYLES (unchanged) ====== */
      /* Removed the old generic header/nav CSS */
      .hero{position:relative;height:100vh;display:flex;align-items:center;justify-content:center;text-align:center;color:white;overflow:hidden;padding:2rem}
      .hero-bg-video{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;z-index:-1}
      .hero-content{position:relative;z-index:1;max-width:800px}
      .buttons{margin-top:2rem}
      .btn{padding:.75rem 1.5rem;margin:0 .5rem;border-radius:999px;font-weight:600;font-size:1rem}
      .btn-primary{background-color:#b93e06;color:#fff;border:none}
      .btn-outline{background-color:transparent;color:#fff;border:2px solid #fff}
      .hero::before,.hero::after{content:'';position:absolute;border-radius:50%;background:rgba(255,255,255,.05)}
      .hero::before{width:100px;height:100px;top:50px;left:20%}
      .hero::after{width:50px;height:50px;bottom:50px;right:25%}
      .hero h2{font-size:3rem;font-weight:700;margin-bottom:1rem}
      .hero p{font-size:1.125rem;margin-bottom:2rem;max-width:600px;margin-left:auto;margin-right:auto;line-height:1.6}
      .buttons{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap}
      .btn{padding:.75rem 1.5rem;border-radius:30px;font-size:1rem;font-weight:600;border:none;cursor:pointer;transition:.3s ease}
      .btn-primary{background-color:#a84314;color:#fff}.btn-primary:hover{background-color:#933b0f}
      .btn-outline{background-color:transparent;border:2px solid #fff;color:#fff}.btn-outline:hover{background-color:#fff;color:#3f7454}
      @media (max-width:768px){.hero h2{font-size:2rem}}
      .about-section{background-color:#fff;padding:4rem 2rem;text-align:center;color:#1c2c3e}
      .about-section h2{font-size:2rem;font-weight:700;color:#2d6a4f;margin-bottom:1rem}
      .about-text{max-width:800px;margin:0 auto 3rem;font-size:1.1rem;line-height:1.8;color:#444}
      .stats{display:flex;flex-wrap:wrap;justify-content:center;gap:3rem}
      .stat-box{text-align:center}
      .stat-value{font-size:2rem;font-weight:700;color:#a84314;margin-bottom:.25rem}
      .stat-label{font-size:1rem;color:#555}
      .features-section{background-color:#fefce8;padding:4rem 2rem;text-align:center}
      .section-title{font-size:2rem;font-weight:700;color:#2d6a4f;margin-bottom:2.5rem}
      .features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:2rem;max-width:1200px;margin:0 auto}
      .feature-card{background-color:#fff;border-radius:1rem;padding:2rem;box-shadow:0 10px 20px rgba(0,0,0,.06);transition:transform .3s ease}
      .feature-card:hover{transform:translateY(-5px)}
      .feature-icon{height:48px;width:48px;margin-bottom:1rem;filter:invert(32%) sepia(6%) saturate(733%) hue-rotate(78deg) brightness(95%) contrast(87%)}
      .feature-card h3{font-size:1.2rem;font-weight:700;color:#2d6a4f;margin-bottom:.5rem}
      .feature-card p{font-size:.95rem;color:#555;line-height:1.6}
      .gallery-section{padding:4rem 2rem;text-align:center}
      .gallery-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:2rem}
      .gallery-card{border-radius:1rem;overflow:hidden;box-shadow:0 6px 16px rgba(0,0,0,.08);background:#fff;transition:transform .3s ease}
      .gallery-card:hover{transform:translateY(-5px)}
      .gallery-card img{width:100%;height:200px;object-fit:cover;display:block}
      .gallery-text{background:#fff;padding:1rem;text-align:left;color:#1c2c3e}
      .gallery-text h3{margin:0 0 .5rem;font-weight:600;font-size:1rem}
      .gallery-text p{font-size:.9rem;line-height:1.4;margin:0;color:#555}
      .location-section{padding:4rem 2rem;background-color:#fefce8}
      .location-container{display:flex;flex-wrap:wrap;justify-content:space-between;gap:2rem;align-items:flex-start}
      .location-text{flex:1;min-width:280px}
      .location-text h4{color:#1c2c3e;font-weight:600;margin-bottom:1rem}
      .location-benefits{list-style:none;padding:0;margin:0}
      .location-benefits li{margin-bottom:.75rem;position:relative;padding-left:1.5rem;color:#3f3f3f}
      .location-benefits li::before{content:"●";color:#b93e06;position:absolute;left:0;font-size:1rem}
      .location-map-card{flex:1;min-width:320px;background:linear-gradient(to bottom right,#7bbf8e,#3f7454);border-radius:20px;padding:2rem;color:#fff;box-shadow:0 6px 16px rgba(0,0,0,.1)}
      .map-box{text-align:center}
      .map-icon{width:36px;height:36px;margin-bottom:.5rem}
      .map-box h3{font-size:1.2rem;font-weight:bold;margin-bottom:.2rem}
      .map-box p{margin-bottom:1rem;font-size:.95rem;opacity:.9}
      .map-embed iframe{width:100%;height:250px;border-radius:12px}
      .invest-section{background-color:#fff;padding:4rem 2rem;text-align:center}
      .invest-section .section-title{font-size:2rem;font-weight:700;color:#2d6a4f;margin-bottom:3rem}
      .invest-grid{display:flex;gap:-.5rem;flex-wrap:nowrap;overflow-x:auto}
      .invest-card{padding:-4px 1rem}
      .icon-circle{background-color:#2d6a4f;height:64px;width:64px;border-radius:50%;margin:0 auto 1rem;display:flex;align-items:center;justify-content:center}
      .invest-icon{width:28px;height:28px;filter:invert(100%) brightness(200%)}
      .invest-card h3{font-size:1.1rem;font-weight:700;color:#2d6a4f;margin-bottom:.5rem}
      .invest-card p{font-size:.95rem;color:#666;line-height:1.5}
      .visit-section{background-color:#3f7454;padding:4rem 2rem;color:#fff}
      .visit-container{display:flex;flex-wrap:wrap;max-width:1200px;margin:0 auto;gap:3rem;align-items:flex-start;justify-content:space-between}
      .visit-info{flex:1 1 400px}
      .visit-info h2{font-size:1.75rem;font-weight:700;margin-bottom:1.5rem}
      .contact-item{display:flex;align-items:center;margin-bottom:1rem;font-size:1rem}
      .contact-icon{width:20px;height:20px;margin-right:.75rem;filter:invert(100%) brightness(200%)}
      .contact-description{margin-top:1.5rem;color:#e2e8f0;font-size:.95rem;line-height:1.6}
      .visit-form{flex:1 1 450px;background-color:#fff;border-radius:1rem;padding:2rem;box-shadow:0 10px 20px rgba(0,0,0,.1)}
      .visit-form form{display:flex;flex-direction:column;gap:1rem}
      .visit-form label{font-weight:600;color:#1c2c3e;margin-bottom:.25rem}
      .visit-form input,.visit-form textarea{padding:.75rem 1rem;border:1px solid #ccc;border-radius:.5rem;font-size:1rem;width:100%}
      .visit-form textarea{resize:vertical}
      .visit-form button{margin-top:1rem;padding:.75rem;background:#a84314}
      .footer{background-color:#a84314;color:#fff;padding:3rem 2rem 2rem;font-family:'Inter',sans-serif}
      .footer-container{display:flex;flex-wrap:wrap;justify-content:space-between;max-width:1200px;margin:0 auto;gap:2rem}
      .footer-column{flex:1 1 280px}
      .footer-column h3{font-size:1.5rem;font-weight:700;margin-bottom:1rem}
      .footer-column h4{font-size:1.2rem;font-weight:600;margin-bottom:1rem}
      .footer-column p{font-size:.95rem;color:#f1f1f1;line-height:1.6}
      .footer-links{list-style:none;padding:0;margin:0}
      .footer-links li{margin-bottom:.5rem}
      .footer-links a{color:#fff;text-decoration:none;font-size:.95rem;transition:color .3s ease}
      .footer-links a:hover{color:#ffd7b5}
      .footer-divider{margin:2rem auto 1rem;border:none;border-top:1px solid rgba(255,255,255,.3);max-width:1200px}
      .footer-bottom{text-align:center;font-size:.9rem;color:#f1f1f1}
      .hero{position:relative;height:100vh;overflow:hidden;display:flex;align-items:center;justify-content:center;color:white;text-align:center;padding:2rem}
      .hero-bg-video{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;z-index:-1;filter:brightness(.5)}
      .hero-content{position:relative;z-index:2;max-width:900px}
    </style>
  </head>
  <body>

    <!-- ===== NEW HEADER START ===== -->
    <!-- Top Info Bar -->
    <div class="top-bar">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4 text-white">
          <span><i class="fa-solid fa-location-dot me-2"></i>Poladpur, Maharashtra</span>
          <span><i class="fa-solid fa-phone me-2"></i>+91 9326216153</span>
        </div>
        <div class="d-none d-md-flex align-items-center text-white">
          <span class="pulse-dot"></span> Limited Time: Only 15 Premium Plots Available
        </div>
      </div>
    </div>

    <!-- Glass Header -->
    <header class="main-header" id="siteHeader">
      <div class="header-content">
        <div class="d-flex justify-content-between align-items-center">
          <a href="#" class="logo">
            <div class="logo-icon">F</div>
            <div class="logo-text">
              <div class="logo-title">FOOTHILLS</div>
              <div class="logo-sub">MAHABALESHWAR</div>
            </div>
          </a>

          <nav class="d-none d-lg-flex align-items-center">
            <a class="nav-link" href="#about">Story</a>
            <a class="nav-link" href="#Features">Features</a>
            <a class="nav-link" href="#gallery">Gallery</a>
            <a class="nav-link" href="#location">Location</a>
            <a class="nav-link" href="#Contact">Contact</a>
            <a class="btn-primary-custom ms-2" href="#Contact">
              <i class="fa-regular fa-calendar"></i> Book Visit
            </a>
          </nav>

          <!-- Mobile menu button -->
          <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-label="Open menu">
            <i class="fa-solid fa-bars text-white"></i>
          </button>
        </div>
      </div>
    </header>

    <!-- Mobile Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <nav class="d-flex flex-column">
          <a class="nav-link" href="#about" data-bs-dismiss="offcanvas">Story</a>
          <a class="nav-link" href="#Features" data-bs-dismiss="offcanvas">Features</a>
          <a class="nav-link" href="#gallery" data-bs-dismiss="offcanvas">Gallery</a>
          <a class="nav-link" href="#location" data-bs-dismiss="offcanvas">Location</a>
          <a class="nav-link" href="#Contact" data-bs-dismiss="offcanvas">Contact</a>
          <a class="btn-primary-custom mt-3" href="#Contact" data-bs-dismiss="offcanvas">
            <i class="fa-regular fa-calendar"></i> Book Visit
          </a>
        </nav>
      </div>
    </div>
    <!-- ===== NEW HEADER END ===== -->

    <!-- HERO -->
    <section class="hero">
      <video autoplay muted loop playsinline class="hero-bg-video">
        <source src="{{ asset('storage/vedio/vedio.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="hero-content">
        <h2>Discover Your Dream Agricultural Plot at Foothills of<br>Mahabaleshwar!</h2>
        <p>
          Welcome to Foothills of Mahabaleshwar, an exclusive residential and agricultural plotting project nestled in the
          serene landscapes of Poladpur. We are offering a unique opportunity to own a demarcated various plots starting
          from half acre, with mountain and valley view which is perfect for your dream retreat.
        </p>
        <div class="buttons">
          <button class="btn btn-outline">Book a Visit</button>
          <a href="{{ asset('pdf/Brochure.pdf') }}" download class="btn btn-outline">Get Brochure</a>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="about-section">
      <div class="container">
        <h2>About FOOTHILLS OF MАHАBALESHWAR Plots</h2>
        <p class="about-text">
          Nestled in the heart of pristine countryside, FOOTHILLS OF MАHАBALESHWAR Plots offer you the perfect opportunity
          to own premium agricultural land. Located just 45 minutes from the city center, our plots range
          from 1 to 5 acres, each with clear legal titles and all necessary approvals. Experience the tranquility
          of rural living while maintaining easy access to urban amenities.
        </p>
        <div class="stats">
          <div class="stat-box">
            <div class="stat-value">15</div>
            <div class="stat-label">Premium Plots Available</div>
          </div>
          <div class="stat-box">
            <div class="stat-value">1–5</div>
            <div class="stat-label">Acres Per Plot</div>
          </div>
          <div class="stat-box">
            <div class="stat-value">45 min</div>
            <div class="stat-label">From City Center</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section id="Features" class="features-section">
      <div class="container">
        <h2 class="section-title">Plot Features</h2>
        <div class="features-grid">
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/badge-check.svg" alt="100% Legal" class="feature-icon">
            <h3>Agricultural Plot</h3>
            <p>Clear titles with all approvals and documentation</p>
          </div>
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/plug.svg" alt="Electricity & Water" class="feature-icon">
            <h3>Electricity & Water</h3>
            <p>Ready access to electricity and water supply connections</p>
          </div>
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/truck.svg" alt="Motorable Road" class="feature-icon">
            <h3>Motorable Road</h3>
            <p>Direct access via well-maintained motorable roads</p>
          </div>
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/landmark.svg" alt="Fertile Soil" class="feature-icon">
            <h3>Fertile Soil</h3>
            <p>Rich, fertile soil perfect for all types of agriculture</p>
          </div>
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/home.svg" alt="Farming & Homes" class="feature-icon">
            <h3>Farming & Homes</h3>
            <p>Ideal for agriculture and weekend home construction</p>
          </div>
          <div class="feature-card">
            <img src="https://unpkg.com/lucide-static/icons/leaf.svg" alt="Peaceful Environment" class="feature-icon">
            <h3>Peaceful Environment</h3>
            <p>Serene surroundings away from city noise and pollution</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="gallery-section">
      <div class="container">
        <h2 class="section-title">Plot Gallery</h2>
        <div class="gallery-grid">
          <div class="gallery-card">
            <img src="{{ asset('storage/img/1.jpeg') }}" alt="Open Fields" />
            <div class="gallery-text"><h3>Open Agricultural Fields</h3><p>Vast open spaces perfect for farming</p></div>
          </div>
          <div class="gallery-card">
            <img src="{{ asset('storage/img/2.jpeg') }}" alt="Trees and Greenery" />
            <div class="gallery-text"><h3>Mature Trees & Greenery</h3><p>Natural shade and beautiful landscapes</p></div>
          </div>
          <div class="gallery-card">
            <img src="{{ asset('storage/img/3.jpeg') }}" alt="Blue Skies" />
            <div class="gallery-text"><h3>Clear Blue Skies</h3><p>Unobstructed views and fresh air</p></div>
          </div>
          <div class="gallery-card">
            <img src="{{ asset('storage/img/4.jpeg') }}" alt="Road Access" />
            <div class="gallery-text"><h3>Waterfall views</h3><p>Well-maintained roads to every plot</p></div>
          </div>
          <div class="gallery-card">
            <img src="{{ asset('storage/img/5.jpeg') }}" alt="Panoramic Views" />
            <div class="gallery-text"><h3>Panoramic Landscape Views</h3><p>Breathtaking views of rolling hills and farmland</p></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Location -->
    <section id="location" class="location-section">
      <div class="location-container">
        <div class="location-text">
          <h2 class="section-title">Prime Location</h2>
          <h4>Strategic Location Benefits</h4>
          <ul class="location-benefits">
            <li>45 minutes from city center</li>
            <li>15 minutes from highway access</li>
            <li>Near organic farming community</li>
            <li>Close to natural water sources</li>
            <li>Surrounded by protected forest area</li>
          </ul>
        </div>
        <div class="location-map-card">
          <div class="map-box">
            <img src="https://unpkg.com/lucide-static/icons/map-pin.svg" alt="Map Pin" class="map-icon" />
            <h3>FOOTHILLS OF MAHABALESHWAR Plots</h3>
            <p>Interactive map available on site visit</p>
            <div class="map-embed">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.447210322116!2d73.58314267477318!3d18.6414592824901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc282fc9a9e3c6b%3A0x3bdb91f9777b8efc!2sFoothills%20Mahabaleshwar!5e0!3m2!1sen!2sin!4v1693466553171!5m2!1sen!2sin"
                width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Invest -->
    <section class="invest-section">
      <div class="container">
        <h2 class="section-title">Why Invest in Foothills of Mahabaleshwar?</h2>
        <div class="invest-grid">
          <div class="invest-card">
            <div class="icon-circle"><img src="https://unpkg.com/lucide-static/icons/trending-up.svg" alt="Growth" class="invest-icon" /></div>
            <h3>Prime Plots Available:</h3>
            <p>Only 15 exclusive plots of 20 gunthas each, providing ample space for your agricultural needs or a peaceful getaway.</p>
          </div>
          <div class="invest-card">
            <div class="icon-circle"><img src="https://unpkg.com/lucide-static/icons/heart.svg" alt="Eco Living" class="invest-icon" /></div>
            <h3>Natural Beauty</h3>
            <p>Each plot features stunning views of lush green hills and a year-round active waterfall, creating a serene and picturesque environment.</p>
          </div>
          <div class="invest-card">
            <div class="icon-circle"><img src="https://unpkg.com/lucide-static/icons/landmark.svg" alt="Weekend Getaway" class="invest-icon" /></div>
            <h3>Perfect Demarcation</h3>
            <p>Every plot is clearly marked with standard demarcation poles and the owner's name, ensuring clear boundaries and ownership.</p>
          </div>
          <div class="invest-card">
            <div class="icon-circle"><img src="https://unpkg.com/lucide-static/icons/banknote.svg" alt="Security" class="invest-icon" /></div>
            <h3>Custom Housing Options</h3>
            <p>We offer the option to build and construct beautiful houses as per your convenience and specifications, creating your perfect home.</p>
          </div>
          <div class="invest-card">
            <div class="icon-circle"><img src="https://unpkg.com/lucide-static/icons/banknote.svg" alt="Security" class="invest-icon" /></div>
            <h3>Affordable Pricing:</h3>
            <p>At just Rs. 49 per sqft, owning your dream plot has never been more affordable!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="Contact" class="visit-section">
      <div class="visit-container">
        <div class="visit-info">
          <h2>Get in Touch</h2>
          <div class="contact-item"><img src="https://unpkg.com/lucide-static/icons/phone.svg" alt="Phone" class="contact-icon"><span>+91 9326216153/+91 8446115797</span></div>
          <div class="contact-item"><img src="https://unpkg.com/lucide-static/icons/mail.svg" alt="Email" class="contact-icon"><span>patilinfrarealtors@gmail.com</span></div>
          <div class="contact-item"><img src="https://unpkg.com/lucide-static/icons/map-pin.svg" alt="Location" class="contact-icon"><span>FOOTHILLS OF MАHАBALESHWAR Plots, Rural District</span></div>
          <p class="contact-description">Embark on Your Serene Journey Today Get in touch with our Sales Team.</p>
          <p class="contact-description">Book a site visit to experience the charm of Foothills of Mahabaleshwar</p>
        </div>
        <div class="visit-form">
          <form>
            <label>Full Name *</label>
            <input type="text" placeholder="Enter your full name" required>
            <label>Phone Number *</label>
            <input type="tel" placeholder="Enter your phone number" required>
            <label>Email Address *</label>
            <input type="email" placeholder="Enter your email address" required>
            <label>Message</label>
            <textarea rows="4" placeholder="Tell us about your requirements..."></textarea>
            <button type="submit">Schedule Site Visit</button>
          </form>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-column">
          <h3>FOOTHILLS OF MАHАBALESHWAR</h3>
          <p>Your gateway to sustainable living and agricultural investment opportunities.</p>
        </div>
        <div class="footer-column">
          <h4>Quick Links</h4>
          <ul class="footer-links">
            <li><a href="#about">About</a></li>
            <li><a href="#Features">Features</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#location">Location</a></li>
            <li><a href="#Contact">Contact</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>Office Hours</h4>
          <p>Monday – Saturday: 9:00 AM – 6:00 PM</p>
          <p>Sunday: 10:00 AM – 4:00 PM</p>
          <p>Site visits available daily by appointment</p>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="footer-bottom">© 2024 FOOTHILLS OF MАHАBALESHWAR. All rights reserved. | Designed for sustainable living.</div>
    </footer>

    <!-- Bootstrap JS + Header behavior -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Toggle solid header on scroll
      const headerEl = document.getElementById('siteHeader');
      const onScroll = () => headerEl.classList.toggle('scrolled', window.scrollY > 100);
      window.addEventListener('scroll', onScroll, { passive:true });
      onScroll();
    </script>
  </body>
</html>
