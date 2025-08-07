<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FOM Agriculture</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: #ffffff;
    }

    header {
      background-color: white;
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 10;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    header h1 {
      color: #2d6a4f;
      font-size: 1.5rem;
    }

    nav a {
      margin-left: 2rem;
      color: #264653;
      text-decoration: none;
      font-weight: 500;
    }

    .hero {
      background: linear-gradient(to bottom, #6b9f76, #3f7454);
      padding: 5rem 2rem;
      text-align: center;
      color: #ffffff;
      position: relative;
      overflow: hidden;
    }

    .hero::before, .hero::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.05);
    }

    .hero::before {
      width: 100px;
      height: 100px;
      top: 50px;
      left: 20%;
    }

    .hero::after {
      width: 50px;
      height: 50px;
      bottom: 50px;
      right: 25%;
    }

    .hero h2 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .hero p {
      font-size: 1.125rem;
      margin-bottom: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.6;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-primary {
      background-color: #a84314;
      color: white;
    }

    .btn-primary:hover {
      background-color: #933b0f;
    }

    .btn-outline {
      background-color: transparent;
      border: 2px solid white;
      color: white;
    }

    .btn-outline:hover {
      background-color: white;
      color: #3f7454;
    }

    @media (max-width: 768px) {
      .hero h2 {
        font-size: 2rem;
      }

      nav a {
        margin-left: 1rem;
      }
    }

    .about-section {
      background-color: #fff;
      padding: 4rem 2rem;
      text-align: center;
      color: #1c2c3e;
    }

    .about-section h2 {
      font-size: 2rem;
      font-weight: 700;
      color: #2d6a4f;
      margin-bottom: 1rem;
    }

    .about-text {
      max-width: 800px;
      margin: 0 auto 3rem;
      font-size: 1.1rem;
      line-height: 1.8;
      color: #444;
    }

    .stats {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 3rem;
    }

    .stat-box {
      text-align: center;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: #a84314;
      margin-bottom: 0.25rem;
    }

    .stat-label {
      font-size: 1rem;
      color: #555;
    }

    .features-section {
      background-color: #fefce8;
      padding: 4rem 2rem;
      text-align: center;
    }

    .section-title {
      font-size: 2rem;
      font-weight: 700;
      color: #2d6a4f;
      margin-bottom: 2.5rem;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .feature-card {
      background-color: #ffffff;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 10px 20px rgba(0,0,0,0.06);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      height: 48px;
      width: 48px;
      margin-bottom: 1rem;
      filter: invert(32%) sepia(6%) saturate(733%) hue-rotate(78deg) brightness(95%) contrast(87%);
    }

    .feature-card h3 {
      font-size: 1.2rem;
      font-weight: 700;
      color: #2d6a4f;
      margin-bottom: 0.5rem;
    }

    .feature-card p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.6;
    }
    .gallery-section {
  background-color: #fff;
  padding: 4rem 2rem;
  text-align: center;
}

.section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #2d6a4f;
  margin-bottom: 3rem;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.gallery-card {
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.3s ease;
}

.gallery-card:hover {
  transform: translateY(-6px);
}

.gallery-icon {
  height: 48px;
  width: 48px;
  margin: 3rem auto 2rem;
  filter: invert(100%) brightness(200%);
}

.gallery-text {
  background-color: #fff;
  padding: 1.25rem 1rem;
  text-align: center;
}

.gallery-text h3 {
  color: #2d6a4f;
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.gallery-text p {
  font-size: 0.95rem;
  color: #666;
  line-height: 1.5;
}
.location-section {
  background-color: #fefce8;
  padding: 4rem 2rem;
}

.location-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  gap: 3rem;
  align-items: center;
  justify-content: space-between;
}

.location-text {
  flex: 1 1 500px;
}

.location-text h2 {
  font-size: 2rem;
  font-weight: 700;
  color: #2d6a4f;
  margin-bottom: 1.5rem;
}

.location-text h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: #2d6a4f;
  margin-bottom: 1rem;
}

.location-list {
  list-style: none;
  padding-left: 0;
}

.location-list li {
  margin-bottom: 0.75rem;
  font-size: 1rem;
  color: #333;
  position: relative;
  padding-left: 1.5rem;
}

.location-list li::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0.4rem;
  width: 10px;
  height: 10px;
  background-color: #a84314;
  border-radius: 50%;
}

.location-map-card {
  flex: 1 1 400px;
  display: flex;
  justify-content: center;
}

.map-box {
  background: linear-gradient(to bottom right, #7bbf8e, #3f7454);
  border-radius: 1rem;
  padding: 3rem 2rem;
  text-align: center;
  color: white;
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 450px;
}

.map-icon {
  width: 48px;
  height: 48px;
  margin-bottom: 1rem;
  filter: invert(100%) brightness(200%);
}

.map-box h3 {
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.map-box p {
  font-size: 0.95rem;
  opacity: 0.85;
}
.invest-section {
  background-color: #ffffff;
  padding: 4rem 2rem;
  text-align: center;
}

.invest-section .section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #2d6a4f;
  margin-bottom: 3rem;
}

.invest-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 2.5rem;
  max-width: 1200px;
  margin: 0 auto;
}

.invest-card {
  padding: 0 1rem;
}

.icon-circle {
  background-color: #2d6a4f;
  height: 64px;
  width: 64px;
  border-radius: 50%;
  margin: 0 auto 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.invest-icon {
  width: 28px;
  height: 28px;
  filter: invert(100%) brightness(200%);
}

.invest-card h3 {
  font-size: 1.1rem;
  font-weight: 700;
  color: #2d6a4f;
  margin-bottom: 0.5rem;
}

.invest-card p {
  font-size: 0.95rem;
  color: #666;
  line-height: 1.5;
}
.visit-section {
  background-color: #3f7454;
  padding: 4rem 2rem;
  color: #ffffff;
}

.visit-container {
  display: flex;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  gap: 3rem;
  align-items: flex-start;
  justify-content: space-between;
}

.visit-info {
  flex: 1 1 400px;
}

.visit-info h2 {
  font-size: 1.75rem;
  font-weight: 700;
  margin-bottom: 1.5rem;
}

.contact-item {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
  font-size: 1rem;
}

.contact-icon {
  width: 20px;
  height: 20px;
  margin-right: 0.75rem;
  filter: invert(100%) brightness(200%);
}

.contact-description {
  margin-top: 1.5rem;
  color: #e2e8f0;
  font-size: 0.95rem;
  line-height: 1.6;
}

.visit-form {
  flex: 1 1 450px;
  background-color: #ffffff;
  border-radius: 1rem;
  padding: 2rem;
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.visit-form form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.visit-form label {
  font-weight: 600;
  color: #1c2c3e;
  margin-bottom: 0.25rem;
}

.visit-form input,
.visit-form textarea {
  padding: 0.75rem 1rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  font-size: 1rem;
  width: 100%;
}

.visit-form textarea {
  resize: vertical;
}

.visit-form button {
  margin-top: 1rem;
  padding: 0.75rem;
  
  background: #a84314
}
.footer {
  background-color: #a84314;
  color: #fff;
  padding: 3rem 2rem 2rem;
  font-family: 'Inter', sans-serif;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
  gap: 2rem;
}

.footer-column {
  flex: 1 1 280px;
}

.footer-column h3 {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.footer-column h4 {
  font-size: 1.2rem;
  font-weight: 600;
  margin-bottom: 1rem;
}

.footer-column p {
  font-size: 0.95rem;
  color: #f1f1f1;
  line-height: 1.6;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 0.5rem;
}

.footer-links a {
  color: #ffffff;
  text-decoration: none;
  font-size: 0.95rem;
  transition: color 0.3s ease;
}

.footer-links a:hover {
  color: #ffd7b5;
}

.footer-divider {
  margin: 2rem auto 1rem;
  border: none;
  border-top: 1px solid rgba(255, 255, 255, 0.3);
  max-width: 1200px;
}

.footer-bottom {
  text-align: center;
  font-size: 0.9rem;
  color: #f1f1f1;
}

  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <h1>FOM Agriculture</h1>
    <nav>
      <a href="#">About</a>
      <a href="#">Features</a>
      <a href="#">Gallery</a>
      <a href="#">Location</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h2>FOM Agriculture Plots<br>for Sale</h2>
    <p>Own your piece of paradise. Legal agricultural plots in serene natural surroundings, perfect for farming or your weekend retreat.</p>
    <div class="buttons">
      <button class="btn btn-primary">Book a Visit</button>
      <button class="btn btn-outline">Get Brochure</button>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section">
    <div class="container">
      <h2>About FOM Agriculture Plots</h2>
      <p class="about-text">
        Nestled in the heart of pristine countryside, FOM Agriculture Plots offer you the perfect opportunity
        to own premium agricultural land. Located just 45 minutes from the city center, our plots range
        from 1 to 5 acres, each with clear legal titles and all necessary approvals. Experience the tranquility
        of rural living while maintaining easy access to urban amenities.
      </p>
      <div class="stats">
        <div class="stat-box">
          <div class="stat-value">50+</div>
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

  <!-- Plot Features Section -->
  <section class="features-section">
    <div class="container">
      <h2 class="section-title">Plot Features</h2>
      <div class="features-grid">
        <div class="feature-card">
          <img src="https://unpkg.com/lucide-static/icons/badge-check.svg" alt="100% Legal" class="feature-icon">
          <h3>100% Legal</h3>
          <p>Clear titles with all government approvals and documentation</p>
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
<!-- Plot Gallery Section -->
<section class="gallery-section">
  <div class="container">
    <h2 class="section-title">Plot Gallery</h2>
    <div class="gallery-grid">

      <!-- Card 1 -->
      <div class="gallery-card" style="background: linear-gradient(to bottom right, #7bbf8e, #3f7454);">
        <img src="https://unpkg.com/lucide-static/icons/image.svg" alt="Open Fields" class="gallery-icon" />
        <div class="gallery-text">
          <h3>Open Agricultural Fields</h3>
          <p>Vast open spaces perfect for farming</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="gallery-card" style="background: linear-gradient(to bottom right, #944c1f, #3f7454);">
        <img src="https://unpkg.com/lucide-static/icons/users.svg" alt="Trees and Greenery" class="gallery-icon" />
        <div class="gallery-text">
          <h3>Mature Trees & Greenery</h3>
          <p>Natural shade and beautiful landscapes</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="gallery-card" style="background: linear-gradient(to bottom right, #60a5fa, #86efac);">
        <img src="https://unpkg.com/lucide-static/icons/sun.svg" alt="Blue Skies" class="gallery-icon" />
        <div class="gallery-text">
          <h3>Clear Blue Skies</h3>
          <p>Unobstructed views and fresh air</p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="gallery-card" style="background: linear-gradient(to bottom right, #3f7454, #944c1f);">
        <img src="https://unpkg.com/lucide-static/icons/truck.svg" alt="Road Access" class="gallery-icon" />
        <div class="gallery-text">
          <h3>Road Access</h3>
          <p>Well-maintained roads to every plot</p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="gallery-card" style="background: linear-gradient(to bottom right, #6fb37c, #944c1f);">
        <img src="https://unpkg.com/lucide-static/icons/landmark.svg" alt="Panoramic Views" class="gallery-icon" />
        <div class="gallery-text">
          <h3>Panoramic Landscape Views</h3>
          <p>Breathtaking views of rolling hills and farmland</p>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Prime Location Section -->
<section class="location-section">
  <div class="location-container">
    <!-- Left Content -->
    <div class="location-text">
      <h2>Prime Location</h2>
      <h3>Strategic Location Benefits</h3>
      <ul class="location-list">
        <li>45 minutes from city center</li>
        <li>15 minutes from highway access</li>
        <li>Near organic farming community</li>
        <li>Close to natural water sources</li>
        <li>Surrounded by protected forest area</li>
      </ul>
    </div>

    <!-- Right Image/Card -->
    <div class="location-map-card">
      <div class="map-box">
        <img src="https://unpkg.com/lucide-static/icons/map-pin.svg" alt="Map Pin" class="map-icon" />
        <h3>FOM Agriculture Plots</h3>
        <p>Interactive map available on site visit</p>
      </div>
    </div>
  </div>
</section>
<!-- Why Invest Section -->
<section class="invest-section">
  <div class="container">
    <h2 class="section-title">Why Invest in FOM Plots?</h2>
    <div class="invest-grid">

      <div class="invest-card">
        <div class="icon-circle">
          <img src="https://unpkg.com/lucide-static/icons/trending-up.svg" alt="Growth" class="invest-icon" />
        </div>
        <h3>Long-term Growth</h3>
        <p>Agricultural land appreciates consistently over time with strong ROI potential</p>
      </div>

      <div class="invest-card">
        <div class="icon-circle">
          <img src="https://unpkg.com/lucide-static/icons/heart.svg" alt="Eco Living" class="invest-icon" />
        </div>
        <h3>Eco-Living</h3>
        <p>Embrace sustainable living in harmony with nature and fresh air</p>
      </div>

      <div class="invest-card">
        <div class="icon-circle">
          <img src="https://unpkg.com/lucide-static/icons/landmark.svg" alt="Weekend Getaway" class="invest-icon" />
        </div>
        <h3>Weekend Getaway</h3>
        <p>Perfect escape from city life with your own private retreat</p>
      </div>

      <div class="invest-card">
        <div class="icon-circle">
          <img src="https://unpkg.com/lucide-static/icons/banknote.svg" alt="Security" class="invest-icon" />
        </div>
        <h3>Investment Security</h3>
        <p>Tangible asset with legal documentation and clear ownership</p>
      </div>

    </div>
  </div>
</section>
<!-- Schedule Visit Section -->
<section class="visit-section">
  <div class="visit-container">
    
    <!-- Left Contact Info -->
    <div class="visit-info">
      <h2>Get in Touch</h2>
      <div class="contact-item">
        <img src="https://unpkg.com/lucide-static/icons/phone.svg" alt="Phone" class="contact-icon">
        <span>+91 98765 43210</span>
      </div>
      <div class="contact-item">
        <img src="https://unpkg.com/lucide-static/icons/mail.svg" alt="Email" class="contact-icon">
        <span>info@fomagriculture.com</span>
      </div>
      <div class="contact-item">
        <img src="https://unpkg.com/lucide-static/icons/map-pin.svg" alt="Location" class="contact-icon">
        <span>FOM Agriculture Plots, Rural District</span>
      </div>
      <p class="contact-description">
        Our team is ready to show you around our beautiful plots. Schedule a visit to experience the tranquility and potential of FOM Agriculture firsthand.
      </p>
    </div>

    <!-- Right Form -->
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
<!-- Footer Section -->
<footer class="footer">
  <div class="footer-container">
    <!-- Column 1 -->
    <div class="footer-column">
      <h3>FOM Agriculture</h3>
      <p>Your gateway to sustainable living and agricultural investment opportunities.</p>
    </div>

    <!-- Column 2 -->
    <div class="footer-column">
      <h4>Quick Links</h4>
      <ul class="footer-links">
        <li><a href="#">About Plots</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Location</a></li>
      </ul>
    </div>

    <!-- Column 3 -->
    <div class="footer-column">
      <h4>Office Hours</h4>
      <p>Monday – Saturday: 9:00 AM – 6:00 PM</p>
      <p>Sunday: 10:00 AM – 4:00 PM</p>
      <p>Site visits available daily by appointment</p>
    </div>
  </div>

  <hr class="footer-divider">

  <div class="footer-bottom">
    © 2024 FOM Agriculture. All rights reserved. | Designed for sustainable living.
  </div>
</footer>

</body>
</html>
