<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MFP ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Akademi Sepak Bola, MFP Academy, Sepak Bola Anak, Pelatihan Bola" name="keywords">
    <meta content="MFP Academy adalah akademi sepak bola profesional untuk pengembangan bakat muda." name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome 6.x for WhatsApp Icon -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKB4Imkb9hFQ9W4l5l9O+6X1p1p6V0Q5K5jT3ECszO2vCuxR2Yk4LLp7qMMEZe2zZ+s3kZwZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">    <style>        :root {
            --mfp-blue: #0033a0;
            --mfp-red: #d90429;
            --mfp-white: #ffffff;
            --mfp-logo-bg: #3e4243; /* New darker gray color to match the logo */
            --mfp-dark-gray: #272829; /* New color for section titles */
            --mfp-medium-gray: #61677A; /* New accent color for section borders */
            --primary: #61677A; /* Override template primary color for carousel controls */
        }

        body {
            background-color: var(--mfp-white);
        }        .bg-logo-color {
            background: linear-gradient(to right, var(--mfp-logo-bg) 0%, #303738 100%) !important;
            color: var(--mfp-white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }
          .bg-logo-color::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h20v20H0z" fill="%23ffffff" fill-opacity="0.03"/%3E%3C/svg%3E');
            pointer-events: none;
        }          .logo-container {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
        }
        
        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
          /* Enhanced responsive layout for logo and brand */        @media (max-width: 1199px) and (min-width: 992px) {
            .top-bar {
                padding: 15px 0;
            }
            
            .logo-text-main {
                font-size: 2.2rem !important;
                letter-spacing: 2px !important;
            }
            
            .logo-image {
                max-height: 85px;
            }
            
            /* Center the logo and text on 1024px screens */
            .col-lg-12.col-md-12 {
                width: 100%;
                text-align: center;
            }
            
            .navbar-brand {
                justify-content: center !important;
                margin: 0 auto;
            }
            
            /* Add some additional space to make the header more prominent */
            .bg-logo-color {
                padding-top: 20px !important;
                padding-bottom: 20px !important;
            }
        }
        
        @media (max-width: 576px) {
            .top-bar {
                padding: 5px 0;
            }
            
            .navbar-brand {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }
            
            .logo-container, .logo-text {
                display: flex;
                align-items: center;
            }
        }.logo-image {
            filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.2));
            transition: all 0.3s ease;
            max-height: 80px;
            width: auto;
            object-fit: contain;
            margin-right: 5px;
        }
        
        @media (min-width: 992px) {
            .logo-image:hover {
                transform: scale(1.05);
                filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.3));
            }
        }
          @media (max-width: 480px) {
            .logo-image {
                max-height: 45px;
                margin-right: 2px;
            }
        }
        
        /* Additional media queries for smaller screens */
        @media (max-width: 375px) {
            .logo-image {
                max-height: 40px;
                margin-right: 1px;
            }
            
            .logo-text span {
                font-size: 1.6rem !important;
                letter-spacing: 1px !important;
            }
        }
        
        @media (max-width: 320px) {
            .logo-image {
                max-height: 35px;
                margin-right: 0;
            }
            
            .logo-text span {
                font-size: 1.4rem !important;
                letter-spacing: 0.5px !important;
            }
            
            .logo-text {
                margin-left: 0 !important;
            }
        }.bg-primary,
        .navbar,
        .btn-primary,
        .carousel-indicators .active {
            background-color: var(--mfp-blue) !important;
            color: var(--mfp-white) !important;
        }
          .section-title.bg-white.text-primary {
            background-color: var(--mfp-white) !important;
            color: var(--mfp-dark-gray) !important;
            border-left: 5px solid var(--mfp-medium-gray);
        }

        .text-primary {
            color: var(--mfp-medium-gray) !important;
        }

        .btn-danger,
        .bg-danger {
            background-color: var(--mfp-red) !important;
            color: var(--mfp-white) !important;
        }

        .mfp-accent {
            color: white !important;
        }

        .navbar-brand h1 {
            color: var(--mfp-blue) !important;
        }

        .footer,
        .footer a {
            background-color: var(--mfp-blue) !important;
            color: var(--mfp-white) !important;
        }        .section-title {
            background: var(--mfp-white);
            color: var(--mfp-dark-gray);
            border-left: 5px solid var(--mfp-medium-gray);
            padding-left: 10px;
        }        .navbar-nav .nav-link.active,
        .navbar-nav .dropdown-item.active {
            color: #E55050 !important;
            font-weight: bold;
            background: none !important;
            border-radius: 0.5rem;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .dropdown-item:hover {
            color: #E55050 !important;
            background: none !important;
        }

        .navbar-custom-gradient {
            background: linear-gradient(90deg, #272829 0%, #272829 40%, #61677A 100%) !important;
            color: #fff !important;
            border-radius: 0 !important;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.08);
        }

        .navbar-custom-gradient .nav-link,
        .navbar-custom-gradient .navbar-brand,
        .navbar-custom-gradient .navbar-toggler {
            color: #fff !important;
        }

        .footer .btn-link {
            background: none !important;
            color: #fff !important;
            border-radius: 0.5rem;
            box-shadow: none !important;
            padding-left: 1.2em;
            text-align: left;
            font-weight: 500;
            transition: color 0.2s;
        }

        .footer .btn-link:hover,
        .footer .btn-link:focus {
            color: #ffd700 !important;
            text-decoration: underline;
            background: none !important;
        }

        .footer a[href^="https://wa.me/"] {
            background: none !important;
            color: #fff !important;
            padding: 0;
            border-radius: 0;
            box-shadow: none !important;
            text-decoration: underline dotted 1.5px rgba(255, 255, 255, 0.25);
            transition: color 0.2s;
        }

        .footer a[href^="https://wa.me/"]:hover,
        .footer a[href^="https://wa.me/"]:focus {
            color: #ffd700 !important;
            background: none !important;
            text-decoration: underline solid 2px #ffd700;
        }

        /* Floating WhatsApp Button */        /* Modern Floating Action Button */
        .fab-wrapper {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .fab-toggle {
            position: absolute;
            appearance: none;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .fab-btn {
            width: 64px;
            height: 64px;
            background: linear-gradient(145deg, #0d6efd, #0b5ed7);
            border-radius: 50%;
            box-shadow: 0 6px 24px rgba(13, 110, 253, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            z-index: 2;
        }
        
        .fab-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 32px rgba(13, 110, 253, 0.3);
        }        /* Hide the X icon by default */
        .fab-btn .fa-times {
            position: absolute;
            opacity: 0;
            transform: rotate(-90deg) scale(0.5);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 2;
        }
        
        /* Show the comments icon by default */
        .fab-btn .fa-comments {
            opacity: 1;
            transform: rotate(0) scale(1);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 1;
        }
        
        /* When toggled, show X and hide comments icon */
        .fab-toggle:checked + .fab-btn .fa-times {
            opacity: 1;
            transform: rotate(0) scale(1);
        }
        
        .fab-toggle:checked + .fab-btn .fa-comments {
            opacity: 0;
            transform: rotate(90deg) scale(0.5);
        }
        
        /* Pulse animation for toggle feedback */
        @keyframes fab-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .fab-btn-pulse {
            animation: fab-pulse 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
          /* Add subtle background color transition when active */
        .fab-btn {
            transition: 
                transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55),
                background 0.3s ease,
                box-shadow 0.3s ease;
            overflow: hidden; /* Ensure icons don't overflow during animation */
        }
          .fab-toggle:checked + .fab-btn {
            background: linear-gradient(145deg, #0b5ed7, #0953be);
            box-shadow: 0 8px 32px rgba(13, 110, 253, 0.35);
        }
        
        /* Improve icon visibility */
        .fab-btn i {
            color: white;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            font-size: 26px;
        }/* Options container */
        .fab-options {
            position: absolute;
            bottom: 80px;
            /* Perfectly centered above the main button */
            width: 50px; /* Match the width of the options for perfect centering */
            display: flex;
            flex-direction: column;
            /* Center align all items in the vertical stack */
            align-items: center;
            gap: 16px;
            opacity: 0;
            pointer-events: none;
            transform-origin: bottom center;
            transform: translateY(10px) scale(0.85);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            margin: 0 auto; /* Center horizontally within the wrapper */
            left: 0;
            right: 0;
        }
          /* Show options when toggled */
        .fab-toggle:checked ~ .fab-options {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }          /* Ensure icons are centered properly in the button */
        .fab-btn i {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease, transform 0.4s ease;
        }
          /* Individual option buttons */
        .fab-option {
            display: flex;
            align-items: center;
            /* Center labels to the right of icons */
            justify-content: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            transition: transform 0.2s;
            /* Ensure uniform width for proper centering */
            width: 50px;
            /* Right position the label */
            position: relative;
        }
        
        .fab-option i {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s, box-shadow 0.2s;
        }
          /* Option labels */
        .fab-label {
            background: rgba(0, 0, 0, 0.75);
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            opacity: 0;
            pointer-events: none;
            /* Position absolutely to not affect centering of buttons */
            position: absolute;
            right: 62px; /* Position to the left of the button */
            transform: translateX(10px);
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        
        .fab-option:hover .fab-label {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* WhatsApp option */
        .fab-option-whatsapp i {
            background: linear-gradient(145deg, #25d366, #20b755);
        }
        
        .fab-option-whatsapp:hover i {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.3);
        }
        
        /* Email option */
        .fab-option-email i {
            background: linear-gradient(145deg, #ff9800, #e68900);
        }
        
        .fab-option-email:hover i {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(255, 152, 0, 0.3);
        }
        
        /* Contact option */
        .fab-option-contact i {
            background: linear-gradient(145deg, #6f42c1, #5e38a4);
        }
        
        .fab-option-contact:hover i {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(111, 66, 193, 0.3);
        }
        
        /* Schedule option */
        .fab-option-schedule i {
            background: linear-gradient(145deg, #dc3545, #bb2d3b);
        }
        
        .fab-option-schedule:hover i {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
        }
          /* Animation for options appearing */
        .fab-option {
            transform: scale(0.5) translateY(20px);
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
        }
        
        .fab-toggle:checked ~ .fab-options .fab-option {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
          /* Sequential bloom effect with consistent spacing */
        .fab-toggle:checked ~ .fab-options .fab-option:nth-child(1) {
            transition-delay: 0.05s;
        }
        
        .fab-toggle:checked ~ .fab-options .fab-option:nth-child(2) {
            transition-delay: 0.1s;
        }
        
        .fab-toggle:checked ~ .fab-options .fab-option:nth-child(3) {
            transition-delay: 0.15s;
        }
        
        .fab-toggle:checked ~ .fab-options .fab-option:nth-child(4) {
            transition-delay: 0.2s;
        }
          /* Precise positioning for perfect centering */
        .fab-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
          .fab-btn {
            margin: 0 auto;
            position: relative;
        }
          /* Mobile Login Button Style - For hamburger menu */
        .btn-mobile-menu-login {
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            font-weight: 600;
            color: var(--mfp-blue) !important;
        }
        
        .btn-mobile-menu-login:hover, .btn-mobile-menu-login:focus {
            background: linear-gradient(145deg, #e9ecef, #dee2e6);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
          .btn-mobile-menu-login i {
            color: var(--mfp-red);
            transform: scale(1.2);
        }
        
        /* Animasi untuk btn-mobile-menu-login */
        @keyframes pulse-button {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        
        .navbar-collapse.show .btn-mobile-menu-login {
            animation: pulse-button 1.5s infinite ease-in-out;
            margin-top: 0.5rem;
        }
          /* Mobile navigation styling */        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            transition: all 0.2s;
            outline: none !important;
            box-shadow: none !important;
            margin: 0;
        }
        
        .navbar-toggler:hover {
            transform: scale(1.1);
        }        /* Specific styling for iPad/tablet screens (1024px) */
        @media (min-width: 1200px) {
            /* XL screens show the top bar information */
            .col-xl-4 {
                width: 33.33333%;
            }
            .col-xl-8 {
                width: 66.66667%;
            }
        }
        
        @media (min-width: 992px) and (max-width: 1199px) {
            .navbar {
                padding-left: 20px !important;
                padding-right: 20px !important;
                margin-top: 0;
                display: flex;
                justify-content: center;
            }
            
            .navbar-nav {
                margin: 0 auto;
                display: flex;
                justify-content: center;
                width: 100%;
            }
            
            .navbar-nav .nav-link {
                padding-left: 15px !important;
                padding-right: 15px !important;
                font-size: 1rem;
                font-weight: 500;
            }
            
            .navbar .btn {
                padding-left: 15px !important;
                padding-right: 15px !important;
                font-size: 0.9rem;
            }
            
            /* Reduce spacing between items for better fit */
            .navbar-collapse {
                justify-content: center;
            }
            
            /* Better positioned login button */
            .navbar .d-lg-flex {
                position: absolute;
                right: 20px;
            }
        }
        
        /* Perbaikan layout navbar mobile */
        @media (max-width: 991px) {
            .navbar .navbar-brand {
                margin: 0;
                padding: 0;
                font-weight: 500;
            }
            
            /* Pastikan tombol hamburger dan MENU sejajar */
            .navbar > .d-flex {
                min-height: 46px;
                padding: 8px 0;
            }
            
            .navbar-toggler {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 4px 8px;
            }
            
            .navbar-toggler-icon {
                width: 1.4em;
                height: 1.4em;
            }
        }
        
        /* Enhanced mobile layout for smaller screens */
        @media (max-width: 375px) {
            .navbar > .d-flex {
                min-height: 42px;
                padding: 6px 0;
            }
            
            .navbar > .d-flex .navbar-brand {
                font-size: 1rem;
            }
            
            .navbar-toggler {
                padding: 2px 6px;
            }
            
            .navbar-toggler-icon {
                width: 1.2em;
                height: 1.2em;
            }
              /* Improve spacing in collapsed menu items */
            .navbar-nav .nav-link {
                padding: 10px 15px;
                font-size: 0.95rem;
            }
            
            /* Ensure dropdown menu displays properly on small screens */
            .navbar-nav .dropdown-menu {
                padding: 0.5rem;
                margin: 0.125rem auto;
                max-width: 95%;
            }
        }
        
        @media (max-width: 320px) {
            .navbar > .d-flex {
                min-height: 38px;
                padding: 5px 0;
            }
            
            .navbar > .d-flex .navbar-brand {
                font-size: 0.9rem;
                letter-spacing: 0.3px;
            }
            
            .navbar-toggler {
                padding: 2px 5px;
            }
            
            .navbar-toggler-icon {
                width: 1.1em;
                height: 1.1em;
            }
        }
        
        /* Gaya untuk teks MENU pada navbar mobile */
          .navbar > .d-flex .navbar-brand {
              color: white;
              font-weight: 600;
              letter-spacing: 0.5px;
              font-size: 1.1rem;
          }
    </style>
    <!-- End Floating Daftar Button -->
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <i class="fa fa-futbol fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    {{-- <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Tentang</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Program</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="/contact">Kontak</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Ikuti kami:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-square text-primary border-end rounded-0" target="_blank" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" target="_blank" href="https://www.youtube.com/channel/UCTFOYGV-nEZHfbIYAAGU-fw"><i class="fab fa-youtube"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" target="_blank" href="https://www.instagram.com/maguwoharjofootball_park/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Topbar End -->
    <!-- Brand & Contact Start -->
    <div class="container-fluid py-4 px-xl-5 px-lg-4 px-md-3 px-3 px-sm-2 wow fadeIn bg-logo-color" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar"><div class="col-xl-4 col-lg-12 col-md-12 text-center text-xl-start">
                <a href="/" class="navbar-brand m-0 p-0 d-flex align-items-center justify-content-center justify-content-xl-start">
                    <div class="logo-container position-relative">
                        <img src="{{ asset('template/img/mfp/Logonew.png') }}" alt="MFP Academy Logo" class="logo-image"
                            style="height:80px; vertical-align:middle;">
                    </div>                    <div class="logo-text ms-2">
                        <span class="logo-text-main" style="font-weight:900; font-size:2rem; letter-spacing:2px; color:white; text-shadow: 0 1px 3px rgba(0,0,0,0.3); white-space:nowrap;">MFP
                            <span style="color:white !important; text-shadow: 0 1px 3px rgba(0,0,0,0.4);">ACADEMY</span>
                        </span>
                    </div>
                </a>
            </div>            <div class="col-xl-8 col-lg-7 col-md-7 d-none d-xl-block">
                <div class="row g-0 g-xl-4">
                     <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle bg-white">
                                <i class="far fa-clock text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2 text-white">Jam Latihan</p>
                                <h6 class="mb-0 text-white">Senin - Jumat, 08:00 - 18:00</h6>
                            </div>
                        </div>
                    </div>                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle bg-white">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2 text-white">Hubungi Kami</p>
                                <h6 class="mb-0"><a href="https://wa.me/6289518788383" target="_blank"
                                        style="color:white;text-decoration:none;">+62 895 1878 8383</a></h6>
                            </div>
                        </div>
                    </div>                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle bg-white">
                                <i class="far fa-envelope text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2 text-white">Email</p>
                                <h6 class="mb-0 text-white">mfpsoccerschool@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->      <!-- Navbar Start -->   
     <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-xl-5 px-lg-4 wow fadeIn navbar-custom-gradient"
        data-wow-delay="0.1s"><!-- Container untuk logo dan tombol toggle pada mobile -->
        <div class="d-flex align-items-center justify-content-between w-100 d-lg-none px-3 px-sm-2">
            <!-- Logo untuk mobile dengan gaya yang lebih baik -->
            <a href="/" class="navbar-brand d-flex align-items-center">
                <span>MENU</span>
            </a>
            
            <!-- Tombol toggle menu sejajar dengan MENU -->
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="/" class="nav-item nav-link{{ request()->is('/') ? ' active' : '' }}">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link dropdown-toggle d-flex align-items-center gap-2{{ request()->is('jadwal-latihan') || request()->is('event') ? ' active' : '' }}"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <div class="dropdown-menu bg-white rounded-3 shadow border-0 mt-2 px-2 py-2 animate__animated animate__fadeIn"
                        style="min-width:220px;">
                        <a href="{{ route('jadwal.latihan') }}"
                            class="dropdown-item d-flex align-items-center gap-2 py-2 rounded{{ request()->is('jadwal-latihan') ? ' active' : '' }}">
                            <i class="fa fa-calendar-alt text-primary"></i> <span>Jadwal Latihan</span>
                        </a>
                        <a href="{{ route('event.index') }}"
                            class="dropdown-item d-flex align-items-center gap-2 py-2 rounded{{ request()->is('event') ? ' active' : '' }}">
                            <i class="fa fa-bullhorn text-danger"></i> <span>Acara</span>
                        </a>
                    </div>
                </div>
                <a href="#program"
                    class="nav-item nav-link{{ request()->is('program') ? ' active' : '' }}">Program</a>
                <a href="{{ route('galeri.index') }}"
                    class="nav-item nav-link{{ request()->is('galeri') ? ' active' : '' }}">Galeri</a>                <a href="/contact"
                    class="nav-item nav-link{{ request()->is('contact') ? ' active' : '' }}">Kontak</a>                <!-- Tombol Login Mobile - Dalam menu hamburger -->
                {{-- <div class="nav-item d-block d-lg-none mt-4 pt-3 border-top border-light border-opacity-25">
                    <div class="text-light text-center mb-3 small">
                        <span>Sudah punya akun? Login di sini</span>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill py-3 px-4 w-100 btn-mobile-menu-login">
                        <span class="d-flex align-items-center justify-content-center">
                            <i class="fa fa-user me-2"></i>
                            <span>Masuk / Login</span>
                        </span>
                    </a>
                </div> --}}
            </div>
            
            <!-- Tombol Login untuk Desktop -->
            <div class="d-lg-flex align-items-center gap-2 d-none">
                {{-- <a href="https://docs.google.com/forms/d/e/1FAIpQLSd50jVgQCODUBiOMdPob1fID9mZhCiEnTtjW8n87D66p92uhQ/viewform"
                    target="_blank" class="btn btn-sm btn-primary rounded-pill py-2 px-4">Daftar
                    Sekarang</a> --}}
                {{-- <a href="{{ route('login') }}" class="btn btn-sm btn-light rounded-pill py-2 px-4">
                    <i class="fa fa-user me-1"></i>Login
                </a> --}}
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn navbar-custom-gradient"
        data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Alamat</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Maguwoharjo, Depok, Sleman, DI
                        Yogyakarta</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="https://wa.me/6289518788383"
                            target="_blank" style="color:inherit;text-decoration:none;">+62 895 1878 8383</a></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>mfpsoccerschool@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" target="_blank"
                            href="https://www.youtube.com/channel/UCTFOYGV-nEZHfbIYAAGU-fw"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" target="_blank"
                            href="https://www.instagram.com/maguwoharjofootball_park/"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Tautan Cepat</h5>
                    <a class="btn btn-link" href="/">Beranda</a>
                    <a class="btn btn-link" href="{{ route('jadwal.latihan') }}">Jadwal Latihan</a>
                    <a class="btn btn-link" href="{{ route('event.index') }}">Acara</a>
                    <a class="btn btn-link" href="#program">Program</a>
                    <a class="btn btn-link" href="{{ route('galeri.index') }}">Galeri</a>
                    <a class="btn btn-link" href="/contact">Kontak</a>
                    <a class="btn btn-link"
                        href="https://docs.google.com/forms/d/e/1FAIpQLSd50jVgQCODUBiOMdPob1fID9mZhCiEnTtjW8n87D66p92uhQ/viewform"
                        target="_blank">Daftar</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Partner & Sponsor</h5>
                    <div class="row g-2">
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2"
                                src="{{ asset('template/img/mfp/pssi.jpg') }}" alt="Partner 1"
                                style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2" src="{{ asset('template/img/mfp/ti.png') }}"
                                alt="Partner 2" style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>                       
                         <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2"
                                src="{{ asset('template/img/mfp/Logonew.jpeg') }}" alt="Partner 3"
                                style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>
                         <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2"
                                src="{{ asset('template/img/mfp/ilkom.jpg') }}" alt="Partner 3"
                                style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>
                         <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2"
                                src="{{ asset('template/img/mfp/fisio.jpeg') }}" alt="Partner 3"
                                style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>
                         <div class="col-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded bg-white p-2"
                                src="{{ asset('template/img/mfp/psikolog.png') }}" alt="Partner 3"
                                style="max-height:60px; max-width:100px; object-fit:contain;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; {{ date('Y') }} MFP Academy, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By Teknologi Informasi Unisa
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> --}}    <!-- Floating Action Button Modern -->
    <div class="fab-wrapper">        <input type="checkbox" id="fab-toggle" class="fab-toggle">
        <label for="fab-toggle" class="fab-btn">
            <i class="fas fa-comments"></i>
            <i class="fas fa-times"></i>
        </label>
        <div class="fab-options">
            <a href="https://wa.me/6289518788383" target="_blank" class="fab-option fab-option-whatsapp" title="Chat WhatsApp">
                <i class="fab fa-whatsapp"></i>
                <span class="fab-label">WhatsApp</span>
            </a>
            <a href="mailto:mfpsoccerschool@gmail.com" class="fab-option fab-option-email" title="Email Kami">
                <i class="far fa-envelope"></i>
                <span class="fab-label">Email</span>
            </a>
            <a href="/contact" class="fab-option fab-option-contact" title="Hubungi Kami">
                <i class="fas fa-phone"></i>
                <span class="fab-label">Kontak</span>
            </a>
            <a href="{{ route('jadwal.latihan') }}" class="fab-option fab-option-schedule" title="Jadwal Latihan">
                <i class="fas fa-calendar-alt"></i>
                <span class="fab-label">Jadwal</span>
            </a>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/lib/lightbox/js/lightbox.min.js') }}"></script>
    
    <!-- Custom styles to override carousel navigation colors -->
    <style>
        /* Override carousel navigation colors site-wide */
        .testimonial-carousel .owl-nav .owl-prev:hover,
        .testimonial-carousel .owl-nav .owl-next:hover,
        .project-carousel .owl-dot:hover,
        .project-carousel .owl-dot.active,
        .owl-carousel .owl-nav button:hover,
        .owl-carousel button.owl-dot:hover,
        .owl-carousel button.owl-dot.active {
            color: #FFFFFF !important;
            border-color: #61677A !important;
            background: #61677A !important;
        }
    </style>
    
    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>
      <!-- Floating Action Button Script -->
    <script>        document.addEventListener('DOMContentLoaded', function() {            // Deklarasi elemen-elemen FAB yang akan digunakan di beberapa fungsi
            const fabWrapper = document.querySelector('.fab-wrapper');
            const fabToggle = document.querySelector('#fab-toggle');
            const fabBtn = document.querySelector('.fab-btn');
            const fabOptions = document.querySelector('.fab-options');
            
            // Auto close FAB when clicking outside
            document.addEventListener('click', function(event) {
                // If click is outside the fab wrapper and fab is open, close it
                if (!fabWrapper.contains(event.target) && fabToggle.checked) {
                    fabToggle.checked = false;
                }
            });
            
            // Disable scroll when FAB is open on mobile
            fabToggle.addEventListener('change', function() {
                if (window.innerWidth < 768) {
                    if (this.checked) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                }            });            // Add subtle entrance animation to FAB on page load
            setTimeout(() => {
                fabBtn.style.opacity = '0';
                fabBtn.style.transform = 'scale(0.8) translateY(20px)';
                fabBtn.style.transition = 'all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
                
                setTimeout(() => {
                    fabBtn.style.opacity = '1';
                    fabBtn.style.transform = 'scale(1) translateY(0)';
                }, 300);
            }, 800);            // Add pulse effect when toggling the FAB
            fabToggle.addEventListener('change', function() {
                // Add a quick pulse animation when toggling
                if (this.checked) {
                    fabBtn.classList.add('fab-btn-pulse');
                    setTimeout(() => {
                        fabBtn.classList.remove('fab-btn-pulse');
                    }, 400);
                }
            });              // Adjust fab-options positioning to ensure perfect alignment            
            const adjustFabOptionsPosition = () => {
                if (fabBtn && fabOptions) {
                    // Reset any previously set positioning to ensure clean calculations
                    fabOptions.style.removeProperty('left');
                    fabOptions.style.removeProperty('right');
                    fabOptions.style.removeProperty('transform');
                    
                    // Get the button's width and position
                    const btnRect = fabBtn.getBoundingClientRect();
                    const fabWrapperRect = fabWrapper.getBoundingClientRect();
                    
                    // Position the options container to be centered above the button
                    // Since the button is already centered in the wrapper, we can center the options in the wrapper too
                    fabOptions.style.right = '0';
                    fabOptions.style.left = '0';
                    fabOptions.style.margin = '0 auto'; // This centers the options horizontally
                }
            };
            
            // Call once on load and then on window resize
            adjustFabOptionsPosition();
            window.addEventListener('resize', adjustFabOptionsPosition);
        });
    </script>
</body>

</html>
