<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda — Learning Center IAR Indonesia</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1565C0;
            --primary-dark: #0D47A1;
            --primary-light: #42A5F5;
            --primary-lighter: #90CAF9;
            --primary-lightest: #E3F2FD;
            --accent: #2196F3;
            --bg-light: #F8FBFF;
            --bg-white: #FFFFFF;
            --text-dark: #1A237E;
            --text-medium: #546E7A;
            --text-light: #90A4AE;
            --shadow-sm: 0 2px 8px rgba(21, 101, 192, 0.08);
            --shadow-md: 0 4px 20px rgba(21, 101, 192, 0.12);
            --shadow-lg: 0 8px 40px rgba(21, 101, 192, 0.15);
            --radius: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s ease;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-medium);
            background: var(--bg-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        /* ══════════════════════════════════════════════════════════════
           NAVBAR
        ══════════════════════════════════════════════════════════════ */
        .navbar {
            background: var(--bg-white) !important;
            padding: 0.8rem 0;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            z-index: 1050;
        }

        .navbar-scrolled {
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            width: 60px;
            height: 60px;
            background: transparent;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-navbar {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .brand-text .brand-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            display: block;
            line-height: 1.2;
        }

        .brand-text .brand-sub {
            font-size: 0.72rem;
            color: var(--text-light);
            display: block;
        }

        .navbar-nav .nav-link {
            color: var(--text-medium) !important;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            background: var(--primary-lightest) !important;
        }

        .btn-login-nav {
            background: var(--primary);
            color: #fff !important;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            border: none;
            white-space: nowrap;
        }

        .btn-login-nav:hover {
            background: var(--primary-dark);
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .navbar-toggler {
            border: 1px solid var(--primary-lighter);
            padding: 0.4rem 0.6rem;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231565C0' stroke-width='2' stroke-linecap='round' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Navbar collapse mobile fix */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--bg-white);
                border-radius: var(--radius);
                padding: 16px;
                box-shadow: var(--shadow-md);
                margin-top: 8px;
            }
            .navbar-nav {
                gap: 4px;
            }
            .btn-login-nav {
                display: inline-flex;
                width: fit-content;
                margin-top: 8px;
            }
        }

        /* ══════════════════════════════════════════════════════════════
           SECTION BASE
        ══════════════════════════════════════════════════════════════ */
        section {
            padding: 80px 0;
        }

        @media (max-width: 768px) {
            section {
                padding: 50px 0;
            }
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 16px;
            border-radius: 25px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
            margin-bottom: 16px;
        }

        .section-title span {
            color: var(--primary);
        }

        .section-desc {
            color: var(--text-medium);
            font-size: 1rem;
            line-height: 1.8;
            max-width: 600px;
        }

        .section-divider {
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
            margin-bottom: 24px;
        }

        /* ══════════════════════════════════════════════════════════════
           BUTTONS
        ══════════════════════════════════════════════════════════════ */
        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 30px;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline-custom {
            background: transparent;
            color: var(--primary);
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 30px;
            border: 2px solid var(--primary);
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ══════════════════════════════════════════════════════════════
           FEATURE CARDS
        ══════════════════════════════════════════════════════════════ */
        .feature-card {
            background: var(--bg-white);
            border: 1px solid var(--primary-lightest);
            border-radius: var(--radius-lg);
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-lighter);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--primary-lightest);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: var(--transition);
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .feature-card:hover .feature-icon {
            background: var(--primary);
        }

        .feature-card:hover .feature-icon i {
            color: #fff;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .feature-desc {
            font-size: 0.9rem;
            color: var(--text-light);
            line-height: 1.7;
        }

        /* ══════════════════════════════════════════════════════════════
           FOOTER
        ══════════════════════════════════════════════════════════════ */
        .site-footer {background: var(--text-dark);padding-top: 60px;}
        .footer-brand .brand-logo {background: rgba(255, 255, 255, 0.1);border: 2px solid rgba(255, 255, 255, 0.2);}
        .footer-brand{display:flex;align-items:center;gap:15px;}
        .footer-logos{
            display:flex;
            align-items:center;
            gap:18px;
            flex-shrink:0;
        }

        .footer-logo-img{
            width:65px;
            height:65px;
            object-fit:contain;
        }

        .footer-brand .brand-logo{
            background:transparent;
            border:none;
        }

        .footer-brand-text h5{margin:0;color:#fff;font-size:1.8rem;font-weight:700;}
        .footer-brand-text span{color:rgba(255,255,255,.7);font-size:.95rem;}
        .footer-title {font-size: 0.8rem;font-weight: 700;text-transform: uppercase;letter-spacing: 1.5px;color: rgba(255, 255, 255, 0.4);margin-bottom: 20px;}
        .footer-link {color: rgba(255, 255, 255, 0.6) !important;text-decoration: none;font-size: 0.9rem;transition: var(--transition);display: inline-block;padding: 4px 0;}
        .footer-link:hover {color: var(--primary-lighter) !important;padding-left: 5px;}
        .footer-contact-item {display: flex;gap: 12px;margin-bottom: 16px;font-size: 0.9rem;color: rgba(255, 255, 255, 0.6);}
        .footer-contact-item i {color: var(--primary-lighter);font-size: 1rem;margin-top: 2px;flex-shrink: 0;}
        .footer-social {display: flex;gap: 8px;flex-wrap: wrap;}
        .footer-social a {width: 40px;height: 40px;background: rgba(255, 255, 255, 0.08);border-radius: 10px;display: inline-flex;align-items: center;justify-content: center;color: rgba(255, 255, 255, 0.6);text-decoration: none;font-size: 1rem;transition: var(--transition);}
        .footer-social a:hover {background: var(--primary);color: #fff;transform: translateY(-3px);}
        .footer-bottom {border-top: 1px solid rgba(255, 255, 255, 0.08);padding: 20px 0;margin-top: 40px;}
        .footer-bottom-text {font-size: 0.8rem;color: rgba(255, 255, 255, 0.35);}

        /* ══════════════════════════════════════════════════════════════
           BACK TO TOP
        ══════════════════════════════════════════════════════════════ */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 999;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            cursor: pointer;
        }

        #backToTop:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }
    </style>

    {{-- Style khusus halaman home yang sebelumnya berada di home.blade.php --}}
    <style>
        /* ══════════════════════════════════════════════════════════════
           HERO SECTION
        ══════════════════════════════════════════════════════════════ */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 50%, #90CAF9 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 140px 0 80px;
        }

        .hero-welcome-badge {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            font-size: 1.4rem;
            font-weight: 700;
            padding: 8px 20px;
            border-radius: 25px;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-title .highlight {
            color: var(--primary);
        }

        .hero-description {
            font-size: 1.05rem;
            color: var(--text-medium);
            line-height: 1.8;
            max-width: 500px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-image-wrapper {
            position: relative;
            padding: 0 20px 0 0;
        }

        .hero-image {
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            width: 100%;
            height: 420px;
            background: var(--primary-lightest);
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
        }

        @media (max-width: 575.98px) {
            .hero-image {
                height: 260px;
            }
        }

        .hero-building-label {
            position: absolute;
            bottom: -10px;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            padding: 16px 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            text-align: center;
        }

        .hero-building-label h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .hero-building-label p {
            font-size: 0.78rem;
            color: var(--primary);
            margin: 0;
            font-weight: 600;
        }

        @media (max-width: 991.98px) {
            .hero-content {
                padding: 120px 0 40px;
            }
            .hero-image-wrapper {
                padding: 0;
                margin-top: 32px;
            }
            .hero-building-label {
                right: 16px;
            }
        }

        /* ══════════════════════════════════════════════════════════════
           FACILITIES SECTION
        ══════════════════════════════════════════════════════════════ */
        .facilities-section {
            background: var(--bg-white);
        }

        .facility-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        @media (max-width: 991.98px) {
            .facility-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575.98px) {
            .facility-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .facility-item {
            background: var(--bg-white);
            border: 1px solid var(--primary-lightest);
            border-radius: var(--radius);
            padding: 24px 20px;
            text-align: center;
            transition: var(--transition);
        }

        .facility-item:hover {
            border-color: var(--primary-lighter);
            box-shadow: var(--shadow-sm);
            transform: translateY(-4px);
        }

        .facility-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-lightest);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .facility-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .facility-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .facility-desc {
            font-size: 0.82rem;
            color: var(--text-light);
            line-height: 1.6;
            margin: 0;
        }

        /* ══════════════════════════════════════════════════════════════
           EVENTS SECTION
        ══════════════════════════════════════════════════════════════ */
        .events-section {
            background: var(--bg-light);
        }

        .event-card {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-8px);
        }

        .event-image {
            height: 200px;
            overflow: hidden;
            background: var(--primary-lightest);
            position: relative;
        }

        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            display: block;
        }

        .event-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-lightest), var(--primary-lighter));
        }

        .event-image-placeholder i {
            font-size: 3rem;
            color: var(--primary);
            opacity: 0.5;
        }

        .event-card:hover .event-image img {
            transform: scale(1.08);
        }

        .event-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .event-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
            width: fit-content;
        }

        .event-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .event-excerpt {
            font-size: 0.88rem;
            color: var(--text-light);
            line-height: 1.7;
            margin: 0;
            flex: 1;
        }

        /* ══════════════════════════════════════════════════════════════
           CTA SECTION
        ══════════════════════════════════════════════════════════════ */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            padding: 80px 0;
        }

        .cta-title {
            font-size: clamp(1.6rem, 3.5vw, 2.2rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 16px;
        }

        .cta-desc {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 32px;
        }

        .btn-cta-white {
            background: #fff;
            color: var(--primary) !important;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 30px;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cta-white:hover {
            background: var(--primary-lightest);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-cta-outline {
            background: transparent;
            color: #fff !important;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cta-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
        }
    /* ══════════════════════════════════════════════════════════════
       PAGE HERO
    ══════════════════════════════════════════════════════════════ */
    .page-hero {
        position: relative;
        padding: 160px 0 80px;
        overflow: hidden;
    }
    .page-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset("public/images/lc.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    .page-hero-ov {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(13,71,161,.92), rgba(21,101,192,.80));
    }
    .hero-badge{
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:8px 18px;
        background:rgba(255,255,255,.15);
        border:1px solid rgba(255,255,255,.25);
        border-radius:999px;color:#fff;
        font-size:.75rem;
        font-weight:700;
        text-transform:uppercase;
        backdrop-filter:blur(8px);
        margin-bottom:20px;
    }

    .hero-badge i{
        color:#fff;
        font-size:.75rem
    }

    /* Section badges & titles */
    .stag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary-lightest);
        color: var(--primary);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 8px 16px;
        border-radius: 25px;
        margin-bottom: 16px;
    }
    .stitle {
        font-size: clamp(1.8rem, 4vw, 2.4rem);
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.3;
        margin-bottom: 12px;
    }
    .stitle em {
        color: var(--primary);
        font-style: normal;
    }
    .sdesc {
        color: var(--text-medium);
        font-size: 0.97rem;
        line-height: 1.75;
        margin-bottom: 0;
    }
    .divider {
        width: 50px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
        margin-bottom: 8px;
    }

    /* ══════════════════════════════════════════════════════════════
       FACILITY CARDS
    ══════════════════════════════════════════════════════════════ */
    .fac-card {
        background: var(--bg-white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--primary-lightest);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        height: 100%;
    }
    .fac-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-lighter);
    }
    .fac-img {
        height: 210px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        background: var(--primary-lightest);
    }
    .fac-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .55s ease;
        display: block;
    }
    .fac-card:hover .fac-img img {
        transform: scale(1.06);
    }
    .fac-img-overlay {
        position: absolute;
        inset: 0;
        background: rgba(13,71,161,0);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }
    .fac-img:hover .fac-img-overlay {
        background: rgba(13,71,161,.5);
    }
    .fac-img-overlay span {
        color: #fff;
        font-size: .85rem;
        font-weight: 600;
        opacity: 0;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .fac-img:hover .fac-img-overlay span {
        opacity: 1;
    }
    .fac-body {
        padding: 20px;
    }
    .fac-tag {
        display: inline-block;
        font-size: .68rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 3px 11px;
        border-radius: 50px;
        margin-bottom: 9px;
    }
    .fac-tag.utama {
        background: var(--primary-lightest);
        color: var(--primary);
    }
    .fac-tag.pendukung {
        background: #e8f5e9;
        color: #2e7d32;
    }
       /* Btn utama */
    .btn-primary-custom {
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px;
        border: none;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.88rem;
        cursor: pointer;
        width: auto;
        justify-content: center;
    }
    .btn-primary-custom:hover {
        background: var(--primary-dark);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* ══════════════════════════════════════════════════════════════
       PENDUKUNG CARDS
    ══════════════════════════════════════════════════════════════ */
    .pendukung-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
        transition: var(--transition);
        height: 100%;
    }
    .pendukung-card:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--primary-lighter);
        transform: translateY(-3px);
    }
    .pendukung-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-lightest);
        color: var(--primary);
        border-radius: var(--radius);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        transition: var(--transition);
    }
    .pendukung-card:hover .pendukung-icon {
        background: var(--primary);
        color: #fff;
    }

    /* ══════════════════════════════════════════════════════════════
       PAKET CARDS
    ══════════════════════════════════════════════════════════════ */
    .paket-card {
        background: var(--bg-white);
        border: 2px solid var(--primary-lightest);
        border-radius: var(--radius-lg);
        padding: 32px 28px;
        height: 100%;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }
    .paket-card:hover {
        border-color: var(--primary-lighter);
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }
    .paket-card.featured {
        border-color: var(--primary);
        background: linear-gradient(135deg, var(--primary-lightest), #fff);
    }
    .paket-card.featured::before {
        content: 'Terpopuler';
        position: absolute;
        top: 20px;
        right: -30px;
        background: var(--primary);
        color: #fff;
        font-size: .68rem;
        font-weight: 700;
        padding: 5px 40px;
        transform: rotate(45deg);
        letter-spacing: .5px;
    }
    .paket-price {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-dark);
        line-height: 1.2;
        margin-bottom: 4px;
    }
    .paket-list li {
        font-size: .87rem;
        color: var(--text-medium);
        padding: 7px 0;
        border-bottom: 1px solid var(--primary-lightest);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .paket-list li:last-child {
        border: none;
    }
    .paket-list li i {
        color: var(--primary);
        flex-shrink: 0;
    }

    /* ══════════════════════════════════════════════════════════════
       REVIEW SECTION
    ══════════════════════════════════════════════════════════════ */
    .rating-summary {
        background: var(--primary-dark);
        color: #fff;
        border-radius: var(--radius-lg);
        padding: 32px 28px;
        text-align: center;
        height: 100%;
    }
    .rating-big {
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        line-height: 1;
    }
    .rating-bar {
        height: 8px;
        background: rgba(255,255,255,.15);
        border-radius: 4px;
        overflow: hidden;
    }
    .rating-bar-fill {
        height: 100%;
        background: #FDD835;
        border-radius: 4px;
    }
    .review-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 20px 24px;
        transition: var(--transition);
    }
    .review-card:hover {
        box-shadow: var(--shadow-sm);
        border-color: var(--primary-lighter);
    }
    .reviewer-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .stars-sm {
        color: #FDD835;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    /* ══════════════════════════════════════════════════════════════
       REVIEW FORM
    ══════════════════════════════════════════════════════════════ */
    .review-input-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius-lg);
        padding: 36px;
    }
    .star-rate {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 6px;
        margin: 10px 0;
    }
    .star-rate label {
        font-size: 1.8rem;
        color: var(--primary-lightest);
        cursor: pointer;
        transition: color .15s;
        line-height: 1;
    }
    .star-rate input {
        display: none;
    }
    .star-rate input:checked ~ label,
    .star-rate label:hover,
    .star-rate label:hover ~ label {
        color: #FDD835;
    }

    /* ══════════════════════════════════════════════════════════════
       MODAL
    ══════════════════════════════════════════════════════════════ */
    .modal-facility-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: var(--radius);
        margin-bottom: 20px;
        display: block;
        background: var(--primary-lightest);
    }
    .modal-facility-body {
        padding: 0 4px;
    }

     /* ══════════════════════════════════════════════════════════════
       CSS EVENT
    ══════════════════════════════════════════════════════════════ */
    .event-tab-btn{
    background:transparent;
    border:2px solid var(--br-100);
    color:var(--tx-600);
    font-weight:600;
    padding:10px 24px;
    border-radius:50px;
    transition:var(--ease);
    cursor:pointer;
    font-size:.88rem;
    }

    .event-tab-btn.active{
        background:var(--br-700);
        border-color:var(--br-700);
        color:#fff;
    }

    .ev-card{
        background:var(--cr-50);
        border:1px solid var(--br-100);
        border-radius:var(--r);
        overflow:hidden;
        transition:var(--ease);
        height:100%;
    }

    .ev-card:hover{
        transform:translateY(-4px);
        box-shadow:var(--sh-md);
        border-color:var(--br-300);
    }

    .ev-card-img{
        height:200px;
        overflow:hidden;
    }

    .ev-card-img img{
        width:100%;
        height:100%;
        object-fit:cover;
        transition:transform .55s;
    }

    .ev-card:hover .ev-card-img img{
        transform:scale(1.06);
    }

    .ev-body{
        padding:22px;
    }

    .ev-badge{
        display:inline-flex;
        align-items:center;
        gap:8px;
        background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);
        color:#ffffff;
        font-size:.85rem;
        font-weight:700;
        text-transform:uppercase;
        letter-spacing:1px;
        padding:10px 20px;b
        order-radius:999px;
        backdrop-filter:blur(8px);
        margin-bottom:20px;
    }

    .event-badge i{
        color:#ffffff;
    }

    .badge-internal{
        background:#e8f0d8;
        color:#4a6a1a;
    }

    .badge-external{
        background:#e8d8f0;
        color:#5a1a7a;
    }

    .badge-open{
        background:#f0ead0;
        color:#7a5a1a;
    }

    .badge-selesai{
        background:#f0d8d8;
        color:#7a1a1a;
    }

    .ev-meta{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        font-size:.76rem;
        color:var(--tx-400);
        margin-top:8px;
    }

    .ev-meta span{
        display:flex;
        align-items:center;
        gap:4px;
    }

    /* ══════════════════════════════════════════════════════════════
       CSS KONTAK
    ══════════════════════════════════════════════════════════════ */
    .contact-card{
    background:#fff;
    border:1px solid #E3F2FD;
    border-radius:var(--r);
    padding:28px;
    text-align:center;
    transition:var(--ease);
}

.contact-card:hover{
    border-color:var(--br-300);
    box-shadow:var(--sh-md);
    transform:translateY(-3px);
}

.contact-icon{
    width:56px;
    height:56px;
    background:#E3F2FD;
    color:#1976D2;
    border-radius:var(--r-sm);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.4rem;
    margin:0 auto 14px;
    transition:var(--ease);
}

.contact-card:hover .contact-icon{
    background:#1976D2;
    color:#fff;
}

.form-input:focus{
    outline:none;
    border-color:#1976D2;
    box-shadow:0 0 0 4px rgba(25,118,210,.15);
}
.contact-form-box{
    background:#fff;
    padding:40px;
    border-radius:28px;
    border:1.8px solid #D5E7FF;
    box-shadow:0 10px 25px rgba(0, 70, 160, 0.08);
    transition:all .3s ease;
}

.contact-form-box:hover{
    border-color:#90CAF9;
    box-shadow:0 15px 35px rgba(0, 70, 160, 0.15);
    transform:translateY(-3px);
}

.form-input{
    width:100%;
    min-height:55px;
    padding:15px 18px;
    border:1.5px solid #D7E3F0;
    border-radius:14px;
    background:#fff;
    font-size:.95rem;
    color:#445566;
    transition:all .3s ease;
}

textarea.form-input{
    min-height:160px;
    resize:none;
}

.btn-kirim{
    width:100%;
    height:55px;
    border:none;
    background:linear-gradient(135deg,#1565C0,#1E88E5);
    color:#fff;
    border-radius:16px;
    font-size:1rem;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:all .3s ease;
}

.btn-kirim:hover{
    color:#fff;
    transform:translateY(-3px);
    box-shadow:0 12px 25px rgba(21,101,192,.35);
}
    </style>
</head>
<body>

{{-- NAVBAR --}}
<x-layout.frontend.header/>

<main>
{{-- ══════════════════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════════════════ --}}
{{ $slot }}
</main>

{{-- FOOTER --}}
<x-layout.frontend.footer/>

<button id="backToTop" title="Kembali ke atas"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 60, easing: 'ease-out-quart' });

    const nav = document.getElementById('mainNavbar');
    const btt = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
        nav.classList.toggle('navbar-scrolled', window.scrollY > 50);
        btt.style.display = window.scrollY > 400 ? 'flex' : 'none';
    });

    btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    // Counter animation
    const counterObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (!e.isIntersecting) return;
            const el = e.target;
            const target = +el.dataset.target;
            const duration = 1800;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = Math.floor(current).toLocaleString('id-ID');
                if (current >= target) clearInterval(timer);
            }, 16);
            counterObs.unobserve(el);
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-counter]').forEach(el => counterObs.observe(el));
</script>

</body>
</html>
