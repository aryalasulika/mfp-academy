<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') - MFP ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="MFP Academy Dashboard" name="keywords">
    <meta content="Dashboard untuk Peserta dan Coach MFP Academy" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <style>        :root {
            --mfp-blue: #0033a0;
            --mfp-red: #d90429;
            --mfp-white: #ffffff;
            --mfp-dark-gray: #272829; /* New color for section titles */
            --mfp-medium-gray: #61677A; /* New accent color for section borders */
            --primary: #61677A; /* Override template primary color for carousel controls */
        }

        body {
            background-color: #f8f9fa;
        }        .bg-primary,
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
        }        .mfp-accent {
            color: white !important;
        }
          .section-title {
            background: var(--mfp-white);
            color: var(--mfp-dark-gray);
            border-left: 5px solid var(--mfp-medium-gray);
            padding-left: 10px;
        }

        .navbar-brand h1 {
            color: var(--mfp-blue) !important;
        }

        .dashboard-sidebar {
            background-color: var(--mfp-white);
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            height: 100vh;
            position: fixed;
            z-index: 1000;
            padding-top: 20px;
            width: 280px;
            transition: all 0.3s;
        }

        .dashboard-main {
            margin-left: 280px;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .nav-pills .nav-link {
            color: #333;
            padding: 12px 20px;
            border-radius: 0;
            margin-bottom: 5px;
            transition: all 0.2s;
            position: relative;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .nav-pills .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .nav-pills .nav-link:hover {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--mfp-blue);
        }

        .nav-pills .nav-link.active {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--mfp-blue);
            border-left: 4px solid var(--mfp-blue);
        }

        .dashboard-header {
            background-color: var(--mfp-white);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .user-dropdown {
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
        }

        .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .user-dropdown .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 10px;
            min-width: 200px;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .user-dropdown .dropdown-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        .user-dropdown .dropdown-item i {
            margin-right: 10px;
            width: 18px;
        }

        .user-dropdown .dropdown-divider {
            margin: 0.5rem 0;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .version-badge {
            background-color: #e9ecef;
            color: #6c757d;
            font-size: 0.75rem;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 10px;
        }

        #sidebarOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        @media (max-width: 991.98px) {
            .dashboard-sidebar {
                transform: translateX(-100%);
            }

            .dashboard-sidebar.show {
                transform: translateX(0);
            }

            .dashboard-main {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            #sidebarOverlay.show {
                display: block;
            }
        }
    </style>
    @yield('extra-css')
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

    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay"></div>

    <!-- Sidebar Start -->
    <div class="dashboard-sidebar" id="dashboardSidebar">
        <div class="sidebar-header">            <img src="{{ asset('template/img/mfp/Logonew.jpeg') }}" alt="MFP Academy Logo" class="sidebar-logo">
            <h4 class="mb-0">MFP <span style="color:white !important;">ACADEMY</span></h4>
        </div>
        
        <div class="px-3">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/' . Auth::user()->role) ? 'active' : '' }}" href="/dashboard/{{ Auth::user()->role }}">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('jadwal-latihan*') ? 'active' : '' }}" href="{{ route('jadwal.latihan') }}">
                        <i class="fa fa-calendar-alt"></i> Jadwal Latihan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('event*') ? 'active' : '' }}" href="{{ route('event.index') }}">
                        <i class="fa fa-bullhorn"></i> Pengumuman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="alert('Fitur ini akan segera tersedia.')">
                        <i class="fa fa-{{ Auth::user()->role == 'peserta' ? 'trophy' : 'users' }}"></i> 
                        {{ Auth::user()->role == 'peserta' ? 'Kemajuan Saya' : 'Kelola Peserta' }}
                    </a>
                </li>
                <li class="nav-item mt-5">
                    <a class="nav-link" href="/" target="_blank">
                        <i class="fa fa-home"></i> Lihat Website
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar End -->

    <!-- Main Content -->
    <div class="dashboard-main">
        <!-- Header -->
        <div class="dashboard-header sticky-top">
            <div class="d-flex align-items-center">
                <span class="menu-toggle me-3" id="menuToggle">
                    <i class="fa fa-bars"></i>
                </span>
                <h5 class="mb-0">@yield('title')<span class="version-badge">v1.0</span></h5>
            </div>
            <div class="user-dropdown dropdown">
                <div class="d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" alt="User Avatar">
                    <span class="d-none d-md-inline ms-2">{{ Auth::user()->name }}</span>
                    <i class="fa fa-chevron-down ms-2 small"></i>
                </div>
                <ul class="dropdown-menu shadow dropdown-menu-end">
                    <li class="px-3 py-2 text-muted small">
                        <strong>{{ Auth::user()->name }}</strong><br>
                        {{ Auth::user()->email }}
                        <span class="badge bg-primary rounded-pill mt-1">{{ Auth::user()->role == 'peserta' ? 'Peserta' : 'Coach' }}</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" onclick="alert('Fitur profil akan segera tersedia.')"><i class="fa fa-user-circle"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#" onclick="alert('Fitur pengaturan akan segera tersedia.')"><i class="fa fa-cog"></i> Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="py-4">
            @if (session('success'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (session('error'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="bg-white py-4 mt-auto border-top">
            <div class="container">
                <div class="text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} MFP Academy. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
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

    <!-- Template Javascript -->
    <script>
        // Spinner
        var spinner = function () {
            setTimeout(function () {
                if ($('#spinner').length > 0) {
                    $('#spinner').removeClass('show');
                }
            }, 1);
        };
        spinner();
        
        // Initialize WOW.js
        new WOW().init();
        
        // Sidebar Toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('dashboardSidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        });
        
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.getElementById('dashboardSidebar').classList.remove('show');
            document.getElementById('sidebarOverlay').classList.remove('show');
        });
        
        // Initiate the wowjs
        new WOW().init();
    </script>
    @yield('extra-js')
</body>

</html>
