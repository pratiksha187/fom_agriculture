<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTHILLS OF MAHABALESHWAR - Premium Agricultural Plots</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
   
     <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
      :root {
      --primary-green: #059669;
      --primary-green-dark: #047857;
      --secondary-orange: #ea580c;
      --secondary-orange-dark: #c2410c;
      --text-gray: #374151;
      --text-gray-light: #6b7280;
      --bg-gray: #f9fafb;
      --bg-gray-dark: #1f2937;
      --border-color: #e5e7eb;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
      --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
      --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      }
      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      }
      body {
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      color: var(--text-gray);
      scroll-behavior: smooth;
      }
      .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
      }
      /* Header Styles */
      .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      transition: all 0.3s ease;
      padding: 1rem 0;
      }
      .header.scrolled {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-md);
      }
      .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
      }
      .logo {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary-green);
      transition: color 0.3s ease;
      }
      .header:not(.scrolled) .logo {
      color: white;
      }
      .nav {
      display: flex;
      align-items: center;
      gap: 2rem;
      }
      .nav a {
      text-decoration: none;
      color: var(--text-gray);
      font-weight: 500;
      transition: color 0.3s ease;
      position: relative;
      }
      .header:not(.scrolled) .nav a {
      color: white;
      }
      .nav a:hover {
      color: var(--primary-green);
      }
      .nav a:hover::after {
      width: 100%;
      }
      .nav a::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary-green);
      transition: width 0.3s ease;
      }
      .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 2rem;
      font-weight: 500;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.3s ease;
      }
      .btn-primary {
      background: var(--primary-green);
      color: white;
      }
      .btn-primary:hover {
      background: var(--primary-green-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      }
      .btn-outline {
      background: transparent;
      color: white;
      border: 2px solid white;
      }
      .btn-outline:hover {
      background: white;
      color: var(--primary-green);
      }
      .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0.5rem;
      }
      .mobile-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-top: 1px solid var(--border-color);
      padding: 1rem;
      }
      .mobile-menu.active {
      display: block;
      }
      .mobile-menu a {
      display: block;
      padding: 0.75rem 0;
      color: var(--text-gray);
      text-decoration: none;
      font-weight: 500;
      border-bottom: 1px solid var(--border-color);
      }
      .mobile-menu a:last-child {
      border-bottom: none;
      }
    
.hero-video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -2;           /* behind the gradient overlay */
  pointer-events: none;  /* clicks go through */
}
.hero-content {
  position: relative;
  z-index: 1;
}
      /* Hero Section */
     .hero {
  position: relative;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  overflow: hidden;
}
      .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      /* background: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1932&auto=format&fit=crop') center/cover; */
      z-index: -2;
      }
   .hero::after {
  content: '';
  position: absolute;
  inset: 0;
  /* background: linear-gradient(135deg, rgba(5,150,105,0.8), rgba(4,120,87,0.9)); */
  z-index: -1;           /* above video, below content */
}
     .hero-content {
  position: relative;
  z-index: 1;
}
      .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 2rem;
      font-size: 0.875rem;
      margin-bottom: 2rem;
      }
      .hero-badge::before {
      content: '';
      width: 8px;
      height: 8px;
      background: #10b981;
      border-radius: 50%;
      animation: pulse 2s infinite;
      }
      .hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      
      line-height: 1.1;
      margin-bottom: 1.5rem;
      }
      .hero .highlight {
      background: linear-gradient(135deg, #10b981, #fbbf24);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      display: block;
      }
      .hero p {
      font-size: 1.125rem;
      margin-bottom: 2rem;
      opacity: 0.9;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      }
      .hero-stats {
      display: flex;
      justify-content: center;
      gap: 3rem;
      margin-bottom: 3rem;
      flex-wrap: wrap;
      }
      .hero-stat {
      text-align: center;
      }
      .hero-stat-value {
      font-size: 1.5rem;
      font-weight: 700;
      }
      .hero-stat-label {
      font-size: 0.875rem;
      opacity: 0.8;
      }
      .hero-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 3rem;
      }
      .trust-indicators {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
      font-size: 0.875rem;
      opacity: 0.8;
      }
      .trust-indicator {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      }
      .trust-indicator::before {
      content: '';
      width: 8px;
      height: 8px;
      background: #10b981;
      border-radius: 50%;
      }
      /* Section Styles */
      .section {
      padding: 5rem 0;
      }
      .section-header {
      text-align: center;
      margin-bottom: 4rem;
      }
      .section-badge {
      display: inline-block;
      padding: 0.5rem 1rem;
      background: rgba(5, 150, 105, 0.1);
      color: var(--primary-green);
      border-radius: 2rem;
      font-size: 0.875rem;
      font-weight: 500;
      margin-bottom: 1rem;
      }
      .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 700;
      color: var(--text-gray);
      margin-bottom: 1rem;
      }
      .section-description {
      font-size: 1.125rem;
      color: var(--text-gray-light);
      max-width: 800px;
      margin: 0 auto;
      }
      /* Card Styles */
      .card {
      background: white;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
      border: 1px solid var(--border-color);
      }
      .card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-xl);
      }
      .card-icon {
      width: 4rem;
      height: 4rem;
      border-radius: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      background: linear-gradient(135deg, var(--primary-green), #10b981);
      }
      .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 0.75rem;
      text-align: center;
      }
      .card-description {
      color: var(--text-gray-light);
      text-align: center;
      line-height: 1.6;
      }
      /* Grid Layouts */
      .grid {
      display: grid;
      gap: 2rem;
      }
      .grid-2 {
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      }
      .grid-3 {
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      }
      .grid-4 {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }
      /* About Section */
      .about {
      background: linear-gradient(135deg, var(--bg-gray), white);
      }
      .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
      margin-bottom: 4rem;
      }
      .stat-card {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      text-align: center;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
      }
      .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      }
      .stat-value {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-green);
      margin-bottom: 0.5rem;
      }
      .stat-label {
      color: var(--text-gray-light);
      font-weight: 500;
      }
      /* Features Section */
      .features {
      background: linear-gradient(135deg, #fef3c7, #fef9e7);
      }
      .feature-card {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      text-align: center;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      }
      .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(135deg, var(--primary-green), #10b981);
      transform: scaleX(0);
      transition: transform 0.3s ease;
      }
      .feature-card:hover::before {
      transform: scaleX(1);
      }
      .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-xl);
      }
      /* Gallery Section */
      .gallery-card {
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: var(--shadow-md);
      transition: all 0.3s ease;
      background: white;
      }
      .gallery-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-2xl);
      }
      .gallery-image {
      position: relative;
      overflow: hidden;
      }
      .gallery-image img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.3s ease;
      }
      .gallery-card:hover .gallery-image img {
      transform: scale(1.1);
      }
      .gallery-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      opacity: 0;
      transition: opacity 0.3s ease;
      }
      .gallery-card:hover .gallery-overlay {
      opacity: 1;
      }
      .gallery-content {
      padding: 1.5rem;
      }
      .gallery-title {
      font-weight: 600;
      margin-bottom: 0.5rem;
      }
      .gallery-description {
      color: var(--text-gray-light);
      font-size: 0.875rem;
      }
      /* Location Section */
      .location {
      background: linear-gradient(135deg, #f0fdf4, #ecfdf5);
      }
      .location-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: start;
      }
      .location-benefits {
      list-style: none;
      }
      .location-benefits li {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.75rem 0;
      border-bottom: 1px solid rgba(5, 150, 105, 0.1);
      }
      .location-benefits li:last-child {
      border-bottom: none;
      }
      .benefit-icon {
      width: 2.5rem;
      height: 2.5rem;
      background: linear-gradient(135deg, var(--primary-green), #10b981);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      flex-shrink: 0;
      }
      .map-card {
      background: linear-gradient(135deg, var(--primary-green), #10b981);
      color: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: var(--shadow-xl);
      }
      .map-header {
      text-align: center;
      margin-bottom: 2rem;
      }
      .map-embed {
      border-radius: 0.75rem;
      overflow: hidden;
      box-shadow: var(--shadow-lg);
      }
      .map-embed iframe {
      width: 100%;
      height: 300px;
      border: none;
      }
      /* Investment Section */
      .investment {
      background: linear-gradient(135deg, var(--bg-gray-dark), #374151);
      color: white;
      }
      .investment .section-title {
      color: white;
      }
      .investment .section-description {
      color: #d1d5db;
      }
      .investment-card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      padding: 2rem;
      border-radius: 1rem;
      text-align: center;
      transition: all 0.3s ease;
      }
      .investment-card:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-4px);
      }
      .investment-icon {
      width: 4rem;
      height: 4rem;
      background: linear-gradient(135deg, #fbbf24, #f59e0b);
      border-radius: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      }
      .investment-title {
      color: white;
      font-weight: 600;
      margin-bottom: 1rem;
      }
      .investment-description {
      color: #d1d5db;
      line-height: 1.6;
      }
      /* Contact Section */
      .contact {
      background: linear-gradient(135deg, var(--primary-green), #10b981);
      color: white;
      }
      .contact-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: start;
      }
      .contact-info {
      space-y: 2rem;
      }
      .contact-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 0.75rem;
      margin-bottom: 1rem;
      }
      .contact-icon {
      width: 3rem;
      height: 3rem;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      }
      .contact-form {
      background: white;
      color: var(--text-gray);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: var(--shadow-2xl);
      }
      .form-group {
      margin-bottom: 1.5rem;
      }
      .form-label {
      display: block;
      font-weight: 500;
      margin-bottom: 0.5rem;
      }
      .form-input,
      .form-textarea {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid var(--border-color);
      border-radius: 0.5rem;
      font-size: 1rem;
      transition: border-color 0.3s ease;
      }
      .form-input:focus,
      .form-textarea:focus {
      outline: none;
      border-color: var(--primary-green);
      }
      .form-textarea {
      resize: vertical;
      min-height: 120px;
      }
      .form-submit {
      width: 100%;
      background: var(--primary-green);
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      }
      .form-submit:hover {
      background: var(--primary-green-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      }
      /* Footer */
      .footer {
      background: linear-gradient(135deg, var(--secondary-orange), var(--secondary-orange-dark));
      color: white;
      padding: 3rem 0 1rem;
      }
      .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
      }
      .footer-section h3 {
      margin-bottom: 1rem;
      }
      .footer-links {
      list-style: none;
      }
      .footer-links li {
      margin-bottom: 0.5rem;
      }
      .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: color 0.3s ease;
      }
      .footer-links a:hover {
      color: white;
      }
      .footer-bottom {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      color: rgba(255, 255, 255, 0.8);
      }
      /* Animations */
      @keyframes fadeInUp {
      from {
      opacity: 0;
      transform: translateY(30px);
      }
      to {
      opacity: 1;
      transform: translateY(0);
      }
      }
      @keyframes pulse {
      0%, 100% {
      opacity: 1;
      }
      50% {
      opacity: 0.5;
      }
      }
      .fade-in-up {
      animation: fadeInUp 0.8s ease-out;
      }
      /* Scroll indicator */
      .scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 2s infinite;
      }
      .scroll-indicator::before {
      content: '';
      display: block;
      width: 2px;
      height: 30px;
      background: rgba(255, 255, 255, 0.5);
      margin: 0 auto 0.5rem;
      border-radius: 1px;
      }
      .scroll-indicator::after {
      content: '↓';
      color: rgba(255, 255, 255, 0.7);
      font-size: 1.5rem;
      }
      @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
      transform: translateX(-50%) translateY(0);
      }
      40% {
      transform: translateX(-50%) translateY(-10px);
      }
      60% {
      transform: translateX(-50%) translateY(-5px);
      }
      }
      /* Responsive Design */
      @media (max-width: 768px) {
      .nav {
      display: none;
      }
      .mobile-menu-btn {
      display: block;
      color: white;
      }
      .header.scrolled .mobile-menu-btn {
      color: var(--text-gray);
      }
      .hero-stats {
      gap: 2rem;
      }
      .hero-buttons {
      flex-direction: column;
      align-items: center;
      }
      .location-content,
      .contact-content {
      grid-template-columns: 1fr;
      gap: 2rem;
      }
      .section {
      padding: 3rem 0;
      }
      .container {
      padding: 0 1rem;
      }
      }
      @media (max-width: 480px) {
      .hero-stats {
      flex-direction: column;
      gap: 1rem;
      }
      .trust-indicators {
      flex-direction: column;
      gap: 1rem;
      }
      }
      @custom-variant dark (&:is(.dark *));
      :root {
      --font-size: 14px;
      --background: #ffffff;
      --foreground: oklch(0.145 0 0);
      --card: #ffffff;
      --card-foreground: oklch(0.145 0 0);
      --popover: oklch(1 0 0);
      --popover-foreground: oklch(0.145 0 0);
      --primary: #030213;
      --primary-foreground: oklch(1 0 0);
      --secondary: oklch(0.95 0.0058 264.53);
      --secondary-foreground: #030213;
      --muted: #ececf0;
      --muted-foreground: #717182;
      --accent: #e9ebef;
      --accent-foreground: #030213;
      --destructive: #d4183d;
      --destructive-foreground: #ffffff;
      --border: rgba(0, 0, 0, 0.1);
      --input: transparent;
      --input-background: #f3f3f5;
      --switch-background: #cbced4;
      --font-weight-medium: 500;
      --font-weight-normal: 400;
      --ring: oklch(0.708 0 0);
      --chart-1: oklch(0.646 0.222 41.116);
      --chart-2: oklch(0.6 0.118 184.704);
      --chart-3: oklch(0.398 0.07 227.392);
      --chart-4: oklch(0.828 0.189 84.429);
      --chart-5: oklch(0.769 0.188 70.08);
      --radius: 0.625rem;
      --sidebar: oklch(0.985 0 0);
      --sidebar-foreground: oklch(0.145 0 0);
      --sidebar-primary: #030213;
      --sidebar-primary-foreground: oklch(0.985 0 0);
      --sidebar-accent: oklch(0.97 0 0);
      --sidebar-accent-foreground: oklch(0.205 0 0);
      --sidebar-border: oklch(0.922 0 0);
      --sidebar-ring: oklch(0.708 0 0);
      }
      .dark {
      --background: oklch(0.145 0 0);
      --foreground: oklch(0.985 0 0);
      --card: oklch(0.145 0 0);
      --card-foreground: oklch(0.985 0 0);
      --popover: oklch(0.145 0 0);
      --popover-foreground: oklch(0.985 0 0);
      --primary: oklch(0.985 0 0);
      --primary-foreground: oklch(0.205 0 0);
      --secondary: oklch(0.269 0 0);
      --secondary-foreground: oklch(0.985 0 0);
      --muted: oklch(0.269 0 0);
      --muted-foreground: oklch(0.708 0 0);
      --accent: oklch(0.269 0 0);
      --accent-foreground: oklch(0.985 0 0);
      --destructive: oklch(0.396 0.141 25.723);
      --destructive-foreground: oklch(0.637 0.237 25.331);
      --border: oklch(0.269 0 0);
      --input: oklch(0.269 0 0);
      --ring: oklch(0.439 0 0);
      --font-weight-medium: 500;
      --font-weight-normal: 400;
      --chart-1: oklch(0.488 0.243 264.376);
      --chart-2: oklch(0.696 0.17 162.48);
      --chart-3: oklch(0.769 0.188 70.08);
      --chart-4: oklch(0.627 0.265 303.9);
      --chart-5: oklch(0.645 0.246 16.439);
      --sidebar: oklch(0.205 0 0);
      --sidebar-foreground: oklch(0.985 0 0);
      --sidebar-primary: oklch(0.488 0.243 264.376);
      --sidebar-primary-foreground: oklch(0.985 0 0);
      --sidebar-accent: oklch(0.269 0 0);
      --sidebar-accent-foreground: oklch(0.985 0 0);
      --sidebar-border: oklch(0.269 0 0);
      --sidebar-ring: oklch(0.439 0 0);
      }
      @theme inline {
      --color-background: var(--background);
      --color-foreground: var(--foreground);
      --color-card: var(--card);
      --color-card-foreground: var(--card-foreground);
      --color-popover: var(--popover);
      --color-popover-foreground: var(--popover-foreground);
      --color-primary: var(--primary);
      --color-primary-foreground: var(--primary-foreground);
      --color-secondary: var(--secondary);
      --color-secondary-foreground: var(--secondary-foreground);
      --color-muted: var(--muted);
      --color-muted-foreground: var(--muted-foreground);
      --color-accent: var(--accent);
      --color-accent-foreground: var(--accent-foreground);
      --color-destructive: var(--destructive);
      --color-destructive-foreground: var(--destructive-foreground);
      --color-border: var(--border);
      --color-input: var(--input);
      --color-input-background: var(--input-background);
      --color-switch-background: var(--switch-background);
      --color-ring: var(--ring);
      --color-chart-1: var(--chart-1);
      --color-chart-2: var(--chart-2);
      --color-chart-3: var(--chart-3);
      --color-chart-4: var(--chart-4);
      --color-chart-5: var(--chart-5);
      --radius-sm: calc(var(--radius) - 4px);
      --radius-md: calc(var(--radius) - 2px);
      --radius-lg: var(--radius);
      --radius-xl: calc(var(--radius) + 4px);
      --color-sidebar: var(--sidebar);
      --color-sidebar-foreground: var(--sidebar-foreground);
      --color-sidebar-primary: var(--sidebar-primary);
      --color-sidebar-primary-foreground: var(--sidebar-primary-foreground);
      --color-sidebar-accent: var(--sidebar-accent);
      --color-sidebar-accent-foreground: var(--sidebar-accent-foreground);
      --color-sidebar-border: var(--sidebar-border);
      --color-sidebar-ring: var(--sidebar-ring);
      }
      @layer base {
      * {
      @apply border-border outline-ring/50;
      }
      body {
      @apply bg-background text-foreground;
      }
      }
      /**
      * Base typography. This is not applied to elements which have an ancestor with a Tailwind text class.
      */
      @layer base {
      :where(:not(:has([class*=" text-"]), :not(:has([class^="text-"])))) {
      h1 {
      font-size: var(--text-2xl);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      h2 {
      font-size: var(--text-xl);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      h3 {
      font-size: var(--text-lg);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      h4 {
      font-size: var(--text-base);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      p {
      font-size: var(--text-base);
      font-weight: var(--font-weight-normal);
      line-height: 1.5;
      }
      label {
      font-size: var(--text-base);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      button {
      font-size: var(--text-base);
      font-weight: var(--font-weight-medium);
      line-height: 1.5;
      }
      input {
      font-size: var(--text-base);
      font-weight: var(--font-weight-normal);
      line-height: 1.5;
      }
      }
      }
      html {
      font-size: var(--font-size);
      }
    </style>
  </head>
  <body>
    <!-- Header -->
    <header class="header" id="header">
      <div class="header-content">
        <div class="logo">FOOTHILLS OF MAHABALESHWAR</div>
        <nav class="nav">
          <a href="#about">About</a>
          <a href="#features">Features</a>
          <a href="#gallery">Gallery</a>
          <a href="#location">Location</a>
          <a href="#contact">Contact</a>
          <a href="#contact" class="btn btn-primary">Book Visit</a>
        </nav>
        <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
        <span id="menu-icon">☰</span>
        </button>
      </div>
      <div class="mobile-menu" id="mobile-menu">
        <a href="#about" onclick="closeMobileMenu()">About</a>
        <a href="#features" onclick="closeMobileMenu()">Features</a>
        <a href="#gallery" onclick="closeMobileMenu()">Gallery</a>
        <a href="#location" onclick="closeMobileMenu()">Location</a>
        <a href="#contact" onclick="closeMobileMenu()">Contact</a>
        <a href="#contact" class="btn btn-primary" onclick="closeMobileMenu()">Book Visit</a>
      </div>
    </header>
    <!-- Hero Section -->
    <section class="hero" id="hero">
    <video class="hero-video" autoplay muted loop playsinline preload="auto" poster="/fallback.jpg">
    <source src="{{ asset('storage/vedio/vedio.mp4') }}" type="video/mp4">
    </video>

      <div class="hero-content">
        <div class="hero-badge">
          Premium Agricultural Plots Available
        </div>
        <h1>
          Discover Your Dream
          <span class="highlight">Agricultural Paradise</span>
          at Foothills of Mahabaleshwar
        </h1>
        <p>
          Own premium demarcated plots starting from half-acre with breathtaking mountain and valley views. 
          Perfect for your dream retreat in the serene landscapes of Poladpur.
        </p>
        <div class="hero-stats">
          <div class="hero-stat">
            <div class="hero-stat-value">15</div>
            <div class="hero-stat-label">Premium Plots</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-value">₹49/sqft</div>
            <div class="hero-stat-label">Starting Price</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-value">45min</div>
            <div class="hero-stat-label">From City</div>
          </div>
        </div>
        <div class="hero-buttons">
          <a href="#contact" class="btn btn-primary">📅 Book Site Visit</a>
          <a href="#" class="btn btn-outline">📄 Download Brochure</a>
        </div>
        <div class="trust-indicators">
          <div class="trust-indicator">100% Legal Documentation</div>
          <div class="trust-indicator">Clear Property Titles</div>
          <div class="trust-indicator">Ready Infrastructure</div>
        </div>
      </div>
      <div class="scroll-indicator"></div>
    </section>
    <!-- About Section -->
    <section class="section about" id="about">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">About Our Project</span>
          <h2 class="section-title">
            FOOTHILLS OF MAHABALESHWAR
            <span style="color: var(--primary-green);">Agricultural Plots</span>
          </h2>
          <p class="section-description">
            Nestled in the heart of pristine countryside, our exclusive plotting project offers you the perfect 
            opportunity to own premium agricultural land with breathtaking views. Located strategically in 
            Poladpur, each plot comes with clear legal titles, modern amenities, and the promise of a 
            sustainable lifestyle.
          </p>
        </div>
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-value">15</div>
            <div class="stat-label">Premium Plots Available</div>
          </div>
          <div class="stat-card">
            <div class="stat-value">20</div>
            <div class="stat-label">Gunthas Per Plot</div>
          </div>
          <div class="stat-card">
            <div class="stat-value">45</div>
            <div class="stat-label">Minutes From City</div>
          </div>
          <div class="stat-card">
            <div class="stat-value">100%</div>
            <div class="stat-label">Legal Documentation</div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section -->
    <section class="section features" id="features">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Premium Plot Features</h2>
          <p class="section-description">
            Every plot comes with comprehensive amenities and infrastructure to ensure 
            your investment is both secure and profitable.
          </p>
        </div>
        <div class="grid grid-3">
          <div class="feature-card">
            <div class="card-icon">🛡️</div>
            <h3 class="card-title">100% Legal</h3>
            <p class="card-description">Clear titles with all government approvals and comprehensive documentation</p>
          </div>
          <div class="feature-card">
            <div class="card-icon">⚡</div>
            <h3 class="card-title">Electricity & Water</h3>
            <p class="card-description">Ready access to electricity and reliable water supply connections</p>
          </div>
          <div class="feature-card">
            <div class="card-icon">🚛</div>
            <h3 class="card-title">Motorable Access</h3>
            <p class="card-description">Direct access via well-maintained, all-weather motorable roads</p>
          </div>
          <div class="feature-card">
            <div class="card-icon">🌿</div>
            <h3 class="card-title">Fertile Soil</h3>
            <p class="card-description">Rich, fertile soil perfect for all types of agricultural activities</p>
          </div>
          <div class="feature-card">
            <div class="card-icon">🏠</div>
            <h3 class="card-title">Dual Purpose</h3>
            <p class="card-description">Ideal for both agriculture and weekend home construction</p>
          </div>
          <div class="feature-card">
            <div class="card-icon">🌲</div>
            <h3 class="card-title">Natural Environment</h3>
            <p class="card-description">Serene surroundings with pristine nature, away from city pollution</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery Section -->
    <section class="section" id="gallery">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Plot Gallery</h2>
          <p class="section-description">
            Explore the natural beauty and infrastructure of our premium agricultural plots 
            through this curated gallery.
          </p>
        </div>
        <div class="grid grid-3">
          <div class="gallery-card">
            <div class="gallery-image">
              <img src="{{ asset('storage/img/1.jpeg') }}" alt="Open Agricultural Fields">
              <div class="gallery-overlay">
                <span>🔍 View Larger</span>
              </div>
            </div>
            <div class="gallery-content">
              <h3 class="gallery-title">Open Agricultural Fields</h3>
              <p class="gallery-description">Vast open spaces perfect for farming and agriculture</p>
            </div>
          </div>
          <div class="gallery-card">
            <div class="gallery-image">
              <img src="{{ asset('storage/img/2.jpeg') }}" alt="Mature Trees & Greenery">
              <div class="gallery-overlay">
                <span>🔍 View Larger</span>
              </div>
            </div>
            <div class="gallery-content">
              <h3 class="gallery-title">Mature Trees & Greenery</h3>
              <p class="gallery-description">Natural shade trees and beautiful landscapes</p>
            </div>
          </div>
          <div class="gallery-card">
            <div class="gallery-image">
              <img src="{{ asset('storage/img/3.jpeg') }}" alt="Mountain Views">
              <div class="gallery-overlay">
                <span>🔍 View Larger</span>
              </div>
            </div>
            <div class="gallery-content">
              <h3 class="gallery-title">Mountain Views</h3>
              <p class="gallery-description">Breathtaking panoramic mountain vistas</p>
            </div>
          </div>
          <div class="gallery-card">
            <div class="gallery-image">
              <img src="{{ asset('storage/img/4.jpeg') }}" alt="Access Roads">
              <div class="gallery-overlay">
                <span>🔍 View Larger</span>
              </div>
            </div>
            <div class="gallery-content">
              <h3 class="gallery-title">Access Roads</h3>
              <p class="gallery-description">Well-maintained motorable roads to every plot</p>
            </div>
          </div>
          <div class="gallery-card">
            <div class="gallery-image">
              <img src="{{ asset('storage/img/5.jpeg') }}" alt="Valley Views">
              <div class="gallery-overlay">
                <span>🔍 View Larger</span>
              </div>
            </div>
            <div class="gallery-content">
              <h3 class="gallery-title">Valley Views</h3>
              <p class="gallery-description">Stunning valley landscapes and rolling hills</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Location Section -->
    <section class="section location" id="location">
      <div class="container">
        <div class="location-content">
          <div>
            <h2 class="section-title">Prime Strategic Location</h2>
            <div class="card" style="margin-bottom: 2rem;">
              <h3 style="margin-bottom: 1.5rem; color: var(--primary-green);">Location Advantages</h3>
              <ul class="location-benefits">
                <li>
                  <div class="benefit-icon">⏰</div>
                  <span>45 minutes from city center</span>
                </li>
                <li>
                  <div class="benefit-icon">🛣️</div>
                  <span>15 minutes from highway access</span>
                </li>
                <li>
                  <div class="benefit-icon">🌲</div>
                  <span>Near organic farming community</span>
                </li>
                <li>
                  <div class="benefit-icon">💧</div>
                  <span>Close to natural water sources</span>
                </li>
                <li>
                  <div class="benefit-icon">🛡️</div>
                  <span>Surrounded by protected forest area</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="map-card">
            <div class="map-header">
              <div style="background: rgba(255, 255, 255, 0.2); width: 4rem; height: 4rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                📍
              </div>
              <h3>Foothills of Mahabaleshwar</h3>
              <p style="opacity: 0.9;">Interactive location mapping</p>
            </div>
            <div class="map-embed">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.447210322116!2d73.58314267477318!3d18.6414592824901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc282fc9a9e3c6b%3A0x3bdb91f9777b8efc!2sFoothills%20Mahabaleshwar!5e0!3m2!1sen!2sin!4v1693466553171!5m2!1sen!2sin"
                allowfullscreen 
                loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Investment Section -->
    <section class="section investment">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">
            Why Invest in
            <span style="background: linear-gradient(135deg, #10b981, #fbbf24); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; display: block;">
            Foothills of Mahabaleshwar?
            </span>
          </h2>
          <p class="section-description">
            Discover the compelling reasons that make this investment opportunity 
            exceptional for your portfolio and lifestyle.
          </p>
        </div>
        <div class="grid grid-3">
          <div class="investment-card">
            <div class="investment-icon">⭐</div>
            <h3 class="investment-title">Premium Plots Available</h3>
            <p class="investment-description">Only 15 exclusive plots of 20 gunthas each, providing ample space for your agricultural needs or peaceful getaway.</p>
          </div>
          <div class="investment-card">
            <div class="investment-icon">❤️</div>
            <h3 class="investment-title">Natural Beauty</h3>
            <p class="investment-description">Each plot features stunning views of lush green hills and year-round active waterfall, creating serene environment.</p>
          </div>
          <div class="investment-card">
            <div class="investment-icon">🏛️</div>
            <h3 class="investment-title">Perfect Demarcation</h3>
            <p class="investment-description">Every plot is clearly marked with standard demarcation poles and owner's name, ensuring clear boundaries.</p>
          </div>
          <div class="investment-card">
            <div class="investment-icon">🏠</div>
            <h3 class="investment-title">Custom Housing Options</h3>
            <p class="investment-description">We offer beautiful house construction as per your convenience and specifications, creating your perfect home.</p>
          </div>
          <div class="investment-card">
            <div class="investment-icon">💰</div>
            <h3 class="investment-title">Affordable Pricing</h3>
            <p class="investment-description">At just ₹49 per sqft, owning your dream plot has never been more affordable with flexible payment options.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section -->
    <section class="section contact" id="contact">
      <div class="container">
        <div class="contact-content">
          <div class="contact-info">
            <h2 style="margin-bottom: 2rem;">Get in Touch</h2>
            <div class="contact-item">
              <div class="contact-icon">📞</div>
              <div>
                <h3>Phone Numbers</h3>
                <p>+91 9326216153</p>
                <p>+91 8446115797</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">📧</div>
              <div>
                <h3>Email Address</h3>
                <p>patilinfrarealtors@gmail.com</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">📍</div>
              <div>
                <h3>Location</h3>
                <p>Foothills of Mahabaleshwar</p>
                <p>Poladpur, Maharashtra</p>
              </div>
            </div>
            <div style="margin-top: 2rem; padding: 1rem; background: rgba(255, 255, 255, 0.1); border-radius: 0.75rem;">
              <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                <div style="color: rgba(255, 255, 255, 0.8);">🕒</div>
                <div>
                  <h3>Office Hours</h3>
                </div>
              </div>
              <p style="color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem;">Monday – Saturday: 9:00 AM – 6:00 PM</p>
              <p style="color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem;">Sunday: 10:00 AM – 4:00 PM</p>
              <p style="color: rgba(255, 255, 255, 0.8);">Site visits available daily by appointment</p>
            </div>
            <div style="margin-top: 2rem; color: rgba(255, 255, 255, 0.9); line-height: 1.6;">
              <p style="margin-bottom: 1rem;">
                Embark on your serene journey today. Get in touch with our sales team 
                to learn more about this exceptional investment opportunity.
              </p>
              <p style="color: rgba(255, 255, 255, 0.8);">
                Book a site visit to experience the charm of Foothills of Mahabaleshwar firsthand.
              </p>
            </div>
          </div>
          <div class="contact-form">
            <div style="text-center; margin-bottom: 2rem;">
              <div style="width: 4rem; height: 4rem; background: linear-gradient(135deg, var(--primary-green), #10b981); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                📧
              </div>
              <h3 style="margin-bottom: 0.5rem;">Schedule Your Site Visit</h3>
              <p style="color: var(--text-gray-light);">Fill out the form below and we'll get back to you shortly</p>
            </div>
            <form onsubmit="handleFormSubmit(event)">
              <div class="form-group">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-input" placeholder="Enter your full name" required>
              </div>
              <div class="form-group">
                <label class="form-label">Phone Number *</label>
                <input type="tel" class="form-input" placeholder="Enter your phone number" required>
              </div>
              <div class="form-group">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-input" placeholder="Enter your email address" required>
              </div>
              <div class="form-group">
                <label class="form-label">Message</label>
                <textarea class="form-textarea" placeholder="Tell us about your requirements..."></textarea>
              </div>
              <button type="submit" class="form-submit">Schedule Site Visit</button>
            </form>
            <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color);">
              <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; text-align: center;">
                <div>
                  <div style="font-size: 0.875rem; color: var(--text-gray-light);">Response Time</div>
                  <div style="color: var(--primary-green);">&lt; 2 Hours</div>
                </div>
                <div>
                  <div style="font-size: 0.875rem; color: var(--text-gray-light);">Site Visits</div>
                  <div style="color: var(--primary-green);">Daily</div>
                </div>
                <div>
                  <div style="font-size: 0.875rem; color: var(--text-gray-light);">Consultation</div>
                  <div style="color: var(--primary-green);">Free</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-section">
            <h3>FOOTHILLS OF MAHABALESHWAR</h3>
            <p style="color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
              Your gateway to sustainable living and exceptional agricultural 
              investment opportunities in the heart of Maharashtra's beautiful countryside.
            </p>
          </div>
          <div class="footer-section">
            <h4>Quick Links</h4>
            <ul class="footer-links">
              <li><a href="#about">About</a></li>
              <li><a href="#features">Features</a></li>
              <li><a href="#gallery">Gallery</a></li>
              <li><a href="#location">Location</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div>
          <div class="footer-section">
            <h4>Office Hours</h4>
            <div style="color: rgba(255, 255, 255, 0.8);">
              <p>Monday – Saturday: 9:00 AM – 6:00 PM</p>
              <p>Sunday: 10:00 AM – 4:00 PM</p>
              <p style="margin-top: 1rem; color: rgba(255, 255, 255, 0.9);">
                Site visits available daily by appointment
              </p>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          © 2024 FOOTHILLS OF MAHABALESHWAR. All rights reserved. | Designed for sustainable living.
        </div>
      </div>
    </footer>
    <script>
      // Header scroll effect
      window.addEventListener('scroll', function() {
          const header = document.getElementById('header');
          if (window.scrollY > 50) {
              header.classList.add('scrolled');
          } else {
              header.classList.remove('scrolled');
          }
      });
      
      // Mobile menu toggle
      function toggleMobileMenu() {
          const mobileMenu = document.getElementById('mobile-menu');
          const menuIcon = document.getElementById('menu-icon');
          
          if (mobileMenu.classList.contains('active')) {
              mobileMenu.classList.remove('active');
              menuIcon.textContent = '☰';
          } else {
              mobileMenu.classList.add('active');
              menuIcon.textContent = '✕';
          }
      }
      
      function closeMobileMenu() {
          const mobileMenu = document.getElementById('mobile-menu');
          const menuIcon = document.getElementById('menu-icon');
          mobileMenu.classList.remove('active');
          menuIcon.textContent = '☰';
      }
      
      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
              e.preventDefault();
              const target = document.querySelector(this.getAttribute('href'));
              if (target) {
                  const headerHeight = document.querySelector('.header').offsetHeight;
                  const targetPosition = target.offsetTop - headerHeight;
                  
                  window.scrollTo({
                      top: targetPosition,
                      behavior: 'smooth'
                  });
              }
          });
      });
      
      // Form submission handler
      function handleFormSubmit(event) {
          event.preventDefault();
          
          // Get form data
          const formData = new FormData(event.target);
          const name = formData.get('name') || event.target.querySelector('input[type="text"]').value;
          const phone = formData.get('phone') || event.target.querySelector('input[type="tel"]').value;
          const email = formData.get('email') || event.target.querySelector('input[type="email"]').value;
          const message = formData.get('message') || event.target.querySelector('textarea').value;
          
          // Simple validation
          if (!name || !phone || !email) {
              alert('Please fill in all required fields.');
              return;
          }
          
          // Show success message
          alert('Thank you for your inquiry! We will contact you within 2 hours to schedule your site visit.');
          
          // Reset form
          event.target.reset();
      }
      
      // Intersection Observer for animations
      const observerOptions = {
          threshold: 0.1,
          rootMargin: '0px 0px -50px 0px'
      };
      
      const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  entry.target.classList.add('fade-in-up');
              }
          });
      }, observerOptions);
      
      // Observe all sections for animations
      document.querySelectorAll('.section').forEach(section => {
          observer.observe(section);
      });
      
      // Counter animation for stats
      function animateCounters() {
          const counters = document.querySelectorAll('.stat-value, .hero-stat-value');
          
          counters.forEach(counter => {
              const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
              if (target) {
                  let current = 0;
                  const increment = target / 50;
                  const timer = setInterval(() => {
                      current += increment;
                      if (current >= target) {
                          counter.textContent = counter.textContent.replace(/\d+/, target);
                          clearInterval(timer);
                      } else {
                          counter.textContent = counter.textContent.replace(/\d+/, Math.floor(current));
                      }
                  }, 30);
              }
          });
      }
      
      // Trigger counter animation when stats come into view
      const statsSection = document.querySelector('.stats-grid');
      if (statsSection) {
          const statsObserver = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      animateCounters();
                      statsObserver.unobserve(entry.target);
                  }
              });
          }, { threshold: 0.5 });
          
          statsObserver.observe(statsSection);
      }
      
      // Gallery lightbox effect
      document.querySelectorAll('.gallery-card').forEach(card => {
          card.addEventListener('click', function() {
              const img = this.querySelector('img');
              if (img) {
                  // Create lightbox
                  const lightbox = document.createElement('div');
                  lightbox.style.cssText = `
                      position: fixed;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background: rgba(0, 0, 0, 0.9);
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      z-index: 9999;
                      cursor: pointer;
                  `;
                  
                  const lightboxImg = document.createElement('img');
                  lightboxImg.src = img.src;
                  lightboxImg.alt = img.alt;
                  lightboxImg.style.cssText = `
                      max-width: 90%;
                      max-height: 90%;
                      object-fit: contain;
                      border-radius: 10px;
                      box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
                  `;
                  
                  lightbox.appendChild(lightboxImg);
                  document.body.appendChild(lightbox);
                  
                  // Close lightbox on click
                  lightbox.addEventListener('click', () => {
                      document.body.removeChild(lightbox);
                  });
                  
                  // Close on escape key
                  document.addEventListener('keydown', function(e) {
                      if (e.key === 'Escape' && document.body.contains(lightbox)) {
                          document.body.removeChild(lightbox);
                      }
                  });
              }
          });
      });
      
      // Add loading animation
      window.addEventListener('load', function() {
          document.body.style.opacity = '0';
          setTimeout(() => {
              document.body.style.transition = 'opacity 0.5s ease';
              document.body.style.opacity = '1';
          }, 100);
      });
    </script>
  </body>
</html>