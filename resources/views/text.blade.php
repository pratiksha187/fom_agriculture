<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTHILLS OF MAHABALESHWAR - Premium Agricultural Plots</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
      
        :root {
           --topbar-h: 40px;      /* height of the green bar */
  --header-gap: 10px; 
            --primary-gradient: linear-gradient(135deg, #10b981, #059669);
            --secondary-gradient: linear-gradient(135deg, #f59e0b, #d97706);
            --tertiary-gradient: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --success-gradient: linear-gradient(135deg, #22c55e, #16a34a);
            --danger-gradient: linear-gradient(135deg, #ef4444, #dc2626);
            --dark-gradient: linear-gradient(135deg, #1f2937, #111827);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --neumorphic-light: #ffffff;
            --neumorphic-dark: #e0e7ff;
            --shadow-neumorphic: 20px 20px 60px #d1d9e6, -20px -20px 60px #ffffff;
            --shadow-neumorphic-inset: inset 20px 20px 60px #d1d9e6, inset -20px -20px 60px #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        /* Utility Classes */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .neumorphic {
            background: var(--neumorphic-light);
            box-shadow: var(--shadow-neumorphic);
            border-radius: 20px;
        }

        .neumorphic-inset {
            background: var(--neumorphic-light);
            box-shadow: var(--shadow-neumorphic-inset);
            border-radius: 20px;
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Top Info Bar */
        .top-bar {
            background: var(--primary-gradient);
            color: white;
            padding: 8px 0;
            font-size: 14px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1060;
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }
.main-header{ top: var(--topbar-h); }
        /* Header Styles */
        .main-header {
            position: fixed;
            top: 40px;
            left: 0;
            right: 0;
            z-index: 1050;
            padding: 0 20px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-header.scrolled {
            top: 10px;
        }

        .header-content {
            max-width: 1200px;
            margin: 27px auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 16px 32px;
            transition: all 0.5s ease;
        }

        .main-header.scrolled .header-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 900;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .logo-text {
            color: white;
            transition: color 0.3s ease;
        }

        .main-header.scrolled .logo-text {
            color: #1f2937;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .main-header.scrolled .nav-link {
            color: #374151 !important;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Hero Section - Bento Grid */
        .hero-section {
            min-height: 100vh;
            padding-top: 120px;
            padding-bottom: 80px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 50%, #ecfdf5 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(245, 158, 11, 0.1) 0%, transparent 50%);
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 24px;
            height: 80vh;
            position: relative;
            z-index: 2;
        }

        .bento-main {
            grid-column: span 7;
            grid-row: span 2;
            background: var(--primary-gradient);
            border-radius: 24px;
            position: relative;
            overflow: hidden;
            color: white;
            display: flex;
            align-items: center;
            padding: 48px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .bento-main::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1651947368468-ac261dcce643?q=80&w=1200') center/cover;
            opacity: 0.3;
            mix-blend-mode: overlay;
        }

        .bento-stats {
            grid-column: span 5;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .bento-features {
            grid-column: span 5;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 12px 24px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 24px;
        }

        .hero-highlight {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
        }

        .stat-card {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border-radius: 16px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 900;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 600;
        }

        /* Button Styles */
        .btn-primary-custom {
            background: var(--primary-gradient);
            border: none;
            border-radius: 16px;
            padding: 16px 32px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .btn-outline-custom {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-outline-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }

        /* Section Styles */
        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-badge {
            display: inline-block;
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            padding: 8px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(2.5rem, 4vw, 4rem);
            font-weight: 900;
            margin-bottom: 24px;
            background: var(--dark-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-description {
            font-size: 1.25rem;
            color: #6b7280;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* About Section */
        .about-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ecfdf5 100%);
        }

        .feature-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 16px;
            color: #1f2937;
        }

        .feature-description {
            color: #6b7280;
            line-height: 1.6;
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, #fef3c7 0%, #fef9e7 100%);
        }

        .hexagon-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .hexagon-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .hexagon-card:hover::before {
            transform: scaleX(1);
        }

        .hexagon-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Gallery Section */
        .gallery-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            background: white;
            cursor: pointer;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .gallery-image {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
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
            backdrop-filter: blur(5px);
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* Location Section */
        .location-section {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
        }

        .location-benefit {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            background: white;
            border-radius: 16px;
            margin-bottom: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .location-benefit:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .map-card {
            background: var(--primary-gradient);
            color: white;
            padding: 32px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .map-embed {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .map-embed iframe {
            width: 100%;
            height: 300px;
            border: none;
        }

        /* Investment Section */
        .investment-section {
            background: var(--dark-gradient);
            color: white;
            position: relative;
        }

        .investment-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.5;
        }

        .investment-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
        }

        .investment-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-10px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .investment-icon {
            width: 80px;
            height: 80px;
            background: var(--secondary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .investment-card:hover .investment-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        /* Contact Section */
        .contact-section {
            background: var(--primary-gradient);
            color: white;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 24px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            margin-bottom: 16px;
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(10px);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .contact-form {
            background: white;
            color: #1f2937;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .form-control {
            padding: 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: #f9fafb;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #10b981;
            background: white;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Footer */
        .footer {
            background: var(--secondary-gradient);
            color: white;
            padding: 60px 0 20px;
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.9);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .lightbox-close {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background 0.3s ease;
        }

        .lightbox-close:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        /* Trust Indicators */
        .trust-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 12px 16px;
            margin: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .bento-grid {
                grid-template-columns: 1fr;
                height: auto;
                gap: 16px;
            }

            .bento-main,
            .bento-stats,
            .bento-features {
                grid-column: span 1;
                grid-row: span 1;
            }

            .bento-main {
                padding: 32px;
                height: 400px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section {
                padding: 60px 0;
            }

            .section-header {
                margin-bottom: 40px;
            }

            .trust-indicator {
                margin: 4px;
                font-size: 12px;
            }
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            inset: 0;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Scroll Animations */
        [data-aos] {
            opacity: 0;
            transition-property: opacity, transform;
        }

        [data-aos].aos-animate {
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center me-4">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span>Poladpur, Maharashtra</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone me-2"></i>
                        <span>+91 9326216153</span>
                    </div>
                </div>
                <div class="d-none d-md-block">
                    <div class="pulse-dot d-inline-block me-2"></div>
                    <span>Limited Time: Only 15 Premium Plots Available</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header" id="header">
        <div class="header-content">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <a href="#" class="logo">
                    <div class="logo-icon">F</div>
                    <div class="logo-text">
                        <div style="font-weight: 900; font-size: 1.1rem; line-height: 1;">FOOTHILLS</div>
                        <div style="font-size: 0.75rem; opacity: 0.8; letter-spacing: 0.1em;">MAHABALESHWAR</div>
                    </div>
                </a>
                
                <!-- Navigation -->
                <nav class="d-none d-lg-flex align-items-center">
                    <a href="#about" class="nav-link">Story</a>
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#gallery" class="nav-link">Gallery</a>
                    <a href="#location" class="nav-link">Location</a>
                    <a href="#contact" class="nav-link">Contact</a>
                    <a href="#contact" class="btn-primary-custom ms-3">
                        <i class="far fa-calendar me-2"></i>Book Visit
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <i class="fas fa-bars text-white"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="d-flex flex-column gap-3">
                <a href="#about" class="nav-link text-dark" data-bs-dismiss="offcanvas">Story</a>
                <a href="#features" class="nav-link text-dark" data-bs-dismiss="offcanvas">Features</a>
                <a href="#gallery" class="nav-link text-dark" data-bs-dismiss="offcanvas">Gallery</a>
                <a href="#location" class="nav-link text-dark" data-bs-dismiss="offcanvas">Location</a>
                <a href="#contact" class="nav-link text-dark" data-bs-dismiss="offcanvas">Contact</a>
                <a href="#contact" class="btn-primary-custom mt-3" data-bs-dismiss="offcanvas">
                    <i class="far fa-calendar me-2"></i>Book Visit
                </a>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <!-- Bento Grid Layout -->
            <div class="bento-grid">
                <!-- Main Hero Card -->
                <div class="bento-main" data-aos="fade-up" data-aos-duration="800">
                    <div class="position-relative z-2">
                        <div class="hero-badge">
                            <div class="pulse-dot"></div>
                            Premium Agricultural Investment
                        </div>
                        
                        <h1 class="hero-title">
                            Own Your Piece of
                            <span class="hero-highlight">Paradise</span>
                        </h1>
                        
                        <p class="fs-5 mb-4 opacity-75">
                            Discover premium agricultural plots in the serene foothills of Mahabaleshwar. 
                            Where dreams meet reality and nature embraces opportunity.
                        </p>
                        
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#contact" class="btn-primary-custom">
                                <i class="far fa-calendar me-2"></i>Schedule Visit
                            </a>
                            <a href="#" class="btn-outline-custom">
                                <i class="far fa-file-pdf me-2"></i>Get Brochure
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bento-stats" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3" style="width: 40px; height: 40px; background: var(--primary-gradient); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h5 class="mb-0 fw-bold">Investment Highlights</h5>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-value">15</div>
                                <div class="stat-label">Premium Plots</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-value">₹49</div>
                                <div class="stat-label">Per Sq.Ft</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-value">20</div>
                                <div class="stat-label">Gunthas Each</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-value">100%</div>
                                <div class="stat-label">Legal Docs</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Card -->
                <div class="bento-features" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 fw-bold">Why Choose Us?</h5>
                        <div class="d-flex gap-1">
                            <div class="feature-indicator active"></div>
                            <div class="feature-indicator"></div>
                            <div class="feature-indicator"></div>
                        </div>
                    </div>
                    
                    <div class="feature-showcase">
                        <div class="d-flex align-items-start">
                            <div class="me-3" style="width: 48px; height: 48px; background: #f3f4f6; border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-map-marker-alt text-success"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-2">Prime Location</h6>
                                <p class="text-muted mb-0 small">45 minutes from city center with highway access</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Indicators -->
            <div class="d-flex flex-wrap justify-content-center mt-5" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <div class="trust-indicator">
                    <span>🛡️</span>
                    <span>100% Legal Documentation</span>
                </div>
                <div class="trust-indicator">
                    <span>⚡</span>
                    <span>Ready Infrastructure</span>
                </div>
                <div class="trust-indicator">
                    <span>🌿</span>
                    <span>Sustainable Development</span>
                </div>
                <div class="trust-indicator">
                    <span>📞</span>
                    <span>24/7 Customer Support</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section about-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">Our Story</div>
                <h2 class="section-title">
                    Where Nature Meets
                    <span class="d-block gradient-text">Opportunity</span>
                </h2>
                <p class="section-description">
                    Nestled in the pristine foothills of Mahabaleshwar, our exclusive project represents 
                    the perfect fusion of agricultural potential and natural beauty.
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1736266602950-765dbdcfb9f1?q=80&w=800" 
                             alt="Agricultural landscape" 
                             class="img-fluid rounded-4 shadow-lg">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white"
                             style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); border-radius: 0 0 1.5rem 1.5rem;">
                            <h4 class="fw-bold mb-2">Strategic Location Advantage</h4>
                            <p class="mb-0 small opacity-75">Perfectly positioned between urban convenience and rural tranquility</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="lead">
                            Our agricultural plots offer more than just land—they provide a gateway to sustainable living 
                            and smart investment. Each 20-guntha plot has been carefully selected and prepared to ensure 
                            optimal conditions for both farming and future development.
                        </p>
                        <p>
                            With comprehensive legal documentation, modern infrastructure access, and the backing of 
                            experienced developers, your investment is secured for generations to come.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="feature-card">
                                <div class="feature-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                                    <i class="fas fa-seedling text-white"></i>
                                </div>
                                <h5 class="feature-title">Fertile Soil</h5>
                                <p class="feature-description">Rich, nutrient-dense earth perfect for all agricultural activities</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="feature-card">
                                <div class="feature-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                    <i class="fas fa-mountain text-white"></i>
                                </div>
                                <h5 class="feature-title">Scenic Views</h5>
                                <p class="feature-description">Panoramic mountain vistas and valley landscapes</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="feature-card">
                                <div class="feature-icon" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                                    <i class="fas fa-tint text-white"></i>
                                </div>
                                <h5 class="feature-title">Water Access</h5>
                                <p class="feature-description">Natural water sources and planned irrigation systems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row g-4" data-aos="fade-up">
                <div class="col-6 col-lg-3">
                    <div class="stat-card text-center py-4">
                        <div class="stat-value">15</div>
                        <div class="stat-label">Premium Plots Available</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card text-center py-4">
                        <div class="stat-value">20</div>
                        <div class="stat-label">Gunthas Per Plot</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card text-center py-4">
                        <div class="stat-value">45</div>
                        <div class="stat-label">Minutes From City</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card text-center py-4">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Legal Documentation</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section features-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-leaf me-2"></i>Premium Features
                </div>
                <h2 class="section-title">
                    Everything You Need for
                    <span class="d-block gradient-text">Your Dream Plot</span>
                </h2>
                <p class="section-description">
                    Each plot comes with comprehensive infrastructure and amenities designed to support 
                    both agricultural activities and modern living requirements.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <h5 class="feature-title">Legal Documentation</h5>
                        <p class="feature-description">Complete paperwork with clear titles and government approvals</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="fas fa-bolt text-white"></i>
                        </div>
                        <h5 class="feature-title">Power & Utilities</h5>
                        <p class="feature-description">Three-phase electricity connection and water supply access</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                            <i class="fas fa-car text-white"></i>
                        </div>
                        <h5 class="feature-title">Connectivity</h5>
                        <p class="feature-description">All-weather motorable roads with excellent transport links</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #22c55e, #16a34a);">
                            <i class="fas fa-leaf text-white"></i>
                        </div>
                        <h5 class="feature-title">Fertile Soil</h5>
                        <p class="feature-description">Rich, nutrient-dense earth perfect for all crops and farming</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                            <i class="fas fa-home text-white"></i>
                        </div>
                        <h5 class="feature-title">Construction Ready</h5>
                        <p class="feature-description">Pre-approved for residential construction and farm houses</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="hexagon-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                            <i class="fas fa-tree text-white"></i>
                        </div>
                        <h5 class="feature-title">Natural Setting</h5>
                        <p class="feature-description">Pristine environment with mature trees and clean air</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title gradient-text">Plot Gallery</h2>
                <p class="section-description">
                    Explore the natural beauty and infrastructure of our premium agricultural plots through this curated gallery.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-card" onclick="openLightbox('https://images.unsplash.com/photo-1630585334807-a49f7365367f?q=80&w=1200')">
                        <div class="gallery-image">
                            <img src="https://images.unsplash.com/photo-1630585334807-a49f7365367f?q=80&w=600" alt="Open Agricultural Fields">
                            <div class="gallery-overlay">
                                <span><i class="fas fa-search-plus me-2"></i>View Larger</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold">Open Agricultural Fields</h6>
                            <p class="text-muted small mb-0">Vast open spaces perfect for farming and agriculture</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-card" onclick="openLightbox('https://images.unsplash.com/photo-1674916251976-b64824a5f3de?q=80&w=1200')">
                        <div class="gallery-image">
                            <img src="https://images.unsplash.com/photo-1674916251976-b64824a5f3de?q=80&w=600" alt="Mature Trees & Greenery">
                            <div class="gallery-overlay">
                                <span><i class="fas fa-search-plus me-2"></i>View Larger</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold">Mature Trees & Greenery</h6>
                            <p class="text-muted small mb-0">Natural shade trees and beautiful landscapes</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-card" onclick="openLightbox('https://images.unsplash.com/photo-1720386052134-81961c684000?q=80&w=1200')">
                        <div class="gallery-image">
                            <img src="https://images.unsplash.com/photo-1720386052134-81961c684000?q=80&w=600" alt="Mountain Views">
                            <div class="gallery-overlay">
                                <span><i class="fas fa-search-plus me-2"></i>View Larger</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold">Mountain Views</h6>
                            <p class="text-muted small mb-0">Breathtaking panoramic mountain vistas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="gallery-card" onclick="openLightbox('https://images.unsplash.com/photo-1650188733825-e37a0fbb8436?q=80&w=1200')">
                        <div class="gallery-image">
                            <img src="https://images.unsplash.com/photo-1650188733825-e37a0fbb8436?q=80&w=600" alt="Waterfall Views">
                            <div class="gallery-overlay">
                                <span><i class="fas fa-search-plus me-2"></i>View Larger</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold">Waterfall Views</h6>
                            <p class="text-muted small mb-0">Year-round active waterfalls nearby</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="gallery-card" onclick="openLightbox('https://images.unsplash.com/photo-1602482844953-d410e8a62322?q=80&w=1200')">
                        <div class="gallery-image">
                            <img src="https://images.unsplash.com/photo-1602482844953-d410e8a62322?q=80&w=600" alt="Valley Views">
                            <div class="gallery-overlay">
                                <span><i class="fas fa-search-plus me-2"></i>View Larger</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold">Valley Views</h6>
                            <p class="text-muted small mb-0">Stunning valley landscapes and rolling hills</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="section location-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="section-title">Prime Strategic Location</h2>
                    
                    <div class="location-benefit">
                        <div class="benefit-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <span>45 minutes from city center</span>
                    </div>
                    
                    <div class="location-benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-road"></i>
                        </div>
                        <span>15 minutes from highway access</span>
                    </div>
                    
                    <div class="location-benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <span>Near organic farming community</span>
                    </div>
                    
                    <div class="location-benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <span>Close to natural water sources</span>
                    </div>
                    
                    <div class="location-benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span>Surrounded by protected forest area</span>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="map-card">
                        <div class="text-center mb-4">
                            <div style="width: 60px; height: 60px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                                <i class="fas fa-map-marker-alt" style="font-size: 1.5rem;"></i>
                            </div>
                            <h4>Foothills of Mahabaleshwar</h4>
                            <p class="mb-0 opacity-75">Interactive location mapping</p>
                        </div>
                        <div class="map-embed">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.447210322116!2d73.58314267477318!3d18.6414592824901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc282fc9a9e3c6b%3A0x3bdb91f9777b8efc!2sFoothills%20Mahabaleshwar!5e0!3m2!1sen!2sin!4v1693466553171!5m2!1sen!2sin"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Section -->
    <section class="section investment-section">
        <div class="container position-relative">
            <div class="section-header text-white" data-aos="fade-up">
                <h2 class="section-title text-white">
                    Why Invest in
                    <span class="d-block" style="background: linear-gradient(135deg, #10b981, #fbbf24); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                        Foothills of Mahabaleshwar?
                    </span>
                </h2>
                <p class="section-description text-light">
                    Discover the compelling reasons that make this investment opportunity exceptional for your portfolio and lifestyle.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="investment-card">
                        <div class="investment-icon">
                            <span style="font-size: 2rem;">⭐</span>
                        </div>
                        <h5 class="text-white mb-3">Premium Plots Available</h5>
                        <p class="text-light opacity-75">Only 15 exclusive plots of 20 gunthas each, providing ample space for your agricultural needs or peaceful getaway.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="investment-card">
                        <div class="investment-icon">
                            <span style="font-size: 2rem;">❤️</span>
                        </div>
                        <h5 class="text-white mb-3">Natural Beauty</h5>
                        <p class="text-light opacity-75">Each plot features stunning views of lush green hills and year-round active waterfall, creating serene environment.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="investment-card">
                        <div class="investment-icon">
                            <span style="font-size: 2rem;">🏛️</span>
                        </div>
                        <h5 class="text-white mb-3">Perfect Demarcation</h5>
                        <p class="text-light opacity-75">Every plot is clearly marked with standard demarcation poles and owner's name, ensuring clear boundaries.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="investment-card">
                        <div class="investment-icon">
                            <span style="font-size: 2rem;">🏠</span>
                        </div>
                        <h5 class="text-white mb-3">Custom Housing Options</h5>
                        <p class="text-light opacity-75">We offer beautiful house construction as per your convenience and specifications, creating your perfect home.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="investment-card">
                        <div class="investment-icon">
                            <span style="font-size: 2rem;">💰</span>
                        </div>
                        <h5 class="text-white mb-3">Affordable Pricing</h5>
                        <p class="text-light opacity-75">At just ₹49 per sqft, owning your dream plot has never been more affordable with flexible payment options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="text-white mb-4">Get in Touch</h2>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Phone Numbers</h5>
                            <p class="mb-0 opacity-75">+91 9326216153</p>
                            <p class="mb-0 opacity-75">+91 8446115797</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Email Address</h5>
                            <p class="mb-0 opacity-75">patilinfrarealtors@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Location</h5>
                            <p class="mb-0 opacity-75">Foothills of Mahabaleshwar</p>
                            <p class="mb-0 opacity-75">Poladpur, Maharashtra</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-1">Office Hours</h5>
                            <p class="mb-0 opacity-75">Monday – Saturday: 9:00 AM – 6:00 PM</p>
                            <p class="mb-0 opacity-75">Sunday: 10:00 AM – 4:00 PM</p>
                            <p class="mt-2 opacity-75">Site visits available daily by appointment</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="contact-form">
                        <div class="text-center mb-4">
                            <div style="width: 60px; height: 60px; background: var(--primary-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: white;">
                                <i class="fas fa-paper-plane" style="font-size: 1.5rem;"></i>
                            </div>
                            <h4>Schedule Your Site Visit</h4>
                            <p class="text-muted">Fill out the form below and we'll get back to you shortly</p>
                        </div>
                        
                        <form id="contactForm">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Full Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address *</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="Tell us about your requirements..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn-primary-custom w-100">
                                <i class="far fa-calendar me-2"></i>Schedule Site Visit
                            </button>
                        </form>
                        
                        <div class="row g-3 mt-4 pt-4 border-top text-center">
                            <div class="col-4">
                                <div class="small text-muted">Response Time</div>
                                <div class="fw-bold text-success">&lt; 2 Hours</div>
                            </div>
                            <div class="col-4">
                                <div class="small text-muted">Site Visits</div>
                                <div class="fw-bold text-success">Daily</div>
                            </div>
                            <div class="col-4">
                                <div class="small text-muted">Consultation</div>
                                <div class="fw-bold text-success">Free</div>
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
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">FOOTHILLS OF MAHABALESHWAR</h5>
                    <p class="opacity-75">
                        Your gateway to sustainable living and exceptional agricultural investment opportunities 
                        in the heart of Maharashtra's beautiful countryside.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="#about" class="text-decoration-none opacity-75 text-white">About</a>
                        <a href="#features" class="text-decoration-none opacity-75 text-white">Features</a>
                        <a href="#gallery" class="text-decoration-none opacity-75 text-white">Gallery</a>
                        <a href="#location" class="text-decoration-none opacity-75 text-white">Location</a>
                        <a href="#contact" class="text-decoration-none opacity-75 text-white">Contact</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Office Hours</h5>
                    <div class="opacity-75">
                        <p class="mb-1">Monday – Saturday: 9:00 AM – 6:00 PM</p>
                        <p class="mb-3">Sunday: 10:00 AM – 4:00 PM</p>
                        <p class="text-white">Site visits available daily by appointment</p>
                    </div>
                </div>
            </div>
            <hr class="my-4 opacity-25">
            <div class="text-center opacity-75">
                © 2024 FOOTHILLS OF MAHABALESHWAR. All rights reserved. | Designed for sustainable living.
            </div>
        </div>
    </footer>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <div class="lightbox-content">
            <img id="lightbox-img" src="" alt="">
            <button class="lightbox-close" onclick="closeLightbox()">×</button>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
        <div id="toast" class="toast" role="alert">
            <div class="toast-header">
                <strong class="me-auto">FOOTHILLS OF MAHABALESHWAR</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body" id="toast-message"></div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });

        // Loading Screen
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
            }, 1000);
        });

        // Header Scroll Effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = 120;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Form Submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const name = formData.get('name');
            const phone = formData.get('phone');
            const email = formData.get('email');
            
            if (!name || !phone || !email) {
                showToast('Please fill in all required fields.', 'error');
                return;
            }
            
            showToast('Thank you for your inquiry! We will contact you within 2 hours to schedule your site visit.', 'success');
            this.reset();
        });

        // Toast Notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            toastMessage.textContent = message;
            toast.className = `toast ${type === 'success' ? 'bg-success text-white' : 'bg-danger text-white'}`;
            
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        }

        // Lightbox Functions
        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            lightboxImg.src = imageSrc;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Keyboard Navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        // Feature Showcase Rotation
        let currentFeature = 0;
        const features = [
            {
                icon: 'fas fa-map-marker-alt text-success',
                title: 'Prime Location',
                desc: '45 minutes from city center with highway access'
            },
            {
                icon: 'fas fa-star text-warning',
                title: 'Premium Quality',
                desc: 'Fertile soil with natural water sources nearby'
            },
            {
                icon: 'fas fa-users text-primary',
                title: 'Expert Support',
                desc: 'Complete assistance from purchase to development'
            }
        ];

        function rotateFeatures() {
            const showcase = document.querySelector('.feature-showcase');
            const indicators = document.querySelectorAll('.feature-indicator');
            
            if (showcase) {
                currentFeature = (currentFeature + 1) % features.length;
                const feature = features[currentFeature];
                
                showcase.innerHTML = `
                    <div class="d-flex align-items-start">
                        <div class="me-3" style="width: 48px; height: 48px; background: #f3f4f6; border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="${feature.icon}"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-2">${feature.title}</h6>
                            <p class="text-muted mb-0 small">${feature.desc}</p>
                        </div>
                    </div>
                `;
                
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentFeature);
                });
            }
        }

        // Add CSS for feature indicators
        const style = document.createElement('style');
        style.textContent = `
            .feature-indicator {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #d1d5db;
                transition: all 0.3s ease;
            }
            .feature-indicator.active {
                background: #10b981;
                width: 24px;
            }
        `;
        document.head.appendChild(style);

        // Start feature rotation
        setInterval(rotateFeatures, 3000);

        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-value');
            
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                if (target && !counter.hasAttribute('data-animated')) {
                    counter.setAttribute('data-animated', 'true');
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

        // Intersection Observer for counter animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                }
            });
        }, { threshold: 0.5 });

        // Observe stats section
        document.addEventListener('DOMContentLoaded', () => {
            const statsSection = document.querySelector('.about-section .row.g-4:last-child');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }
        });

        // Parallax Effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.hero-section');
            
            parallaxElements.forEach(element => {
                const speed = 0.5;
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Enhanced interaction effects
        document.addEventListener('DOMContentLoaded', () => {
            // Add hover effects to cards
            const cards = document.querySelectorAll('.feature-card, .hexagon-card, .gallery-card, .investment-card');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>