<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />


    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Menu -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="{{ route('admin.dashboard') }}" class="app-brand-link">                <span class="app-brand-logo demo">                    <img src="{{ asset('template/img/mfp/Logonew.jpeg') }}" alt="Logo"
                        style="height:70px;max-width:120px;object-fit:contain;" class="mx-auto">
                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">MFP</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>
            {{-- <li class="menu-item {{ request()->routeIs('admin.user.index', 'admin.user.create', 'admin.user.edit') ? 'active' : '' }}">
              <a href="{{ route('admin.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">User</div>
              </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.news.index', 'admin.news.create', 'admin.news.edit') ? 'active' : '' }}">
              <a href="{{ route('admin.news.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="User interface">News</div>
              </a>
            </li> --}}
            <li class="menu-item {{ request()->routeIs('admin.jadwal_latihan.*') ? 'active' : '' }}">
                <a href="{{ route('admin.jadwal_latihan.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Jadwal Latihan">Jadwal Latihan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.contact_messages.*') ? 'active' : '' }}">
                <a href="{{ route('admin.contact_messages.index') }}" class="menu-link d-flex align-items-center">
                    <i class="menu-icon tf-icons bx bx-envelope"></i>
                    <div data-i18n="Pesan Masuk">Pesan Masuk</div>
                    @php
                        $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                    @endphp
                    @if ($unreadCount > 0)
                        <span class="badge bg-danger ms-2">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <a href="{{ route('admin.events.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                    <div data-i18n="Acara">Acara</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <a href="{{ route('admin.galeri.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-image"></i>
                    <div data-i18n="Galeri">Galeri</div>
                </a>
            </li>
        </ul>
    </aside>
    <!-- / Menu -->
    <!-- Layout wrapper -->
    <div class="dashboard-flex-wrapper" style="min-height:100vh;display:flex;flex-direction:column;">
        <div style="flex:1 0 auto;">
            @yield('content')
        </div>
        <footer class="content-footer footer bg-footer-theme mt-auto"
            style="width:100%;padding-left:0;padding-right:0;">
            <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0 text-center w-100" style="font-size:1rem;letter-spacing:0.5px;">
                    © <span id="year"></span> MFP Academy. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
    <script>
        // Set year dynamically
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
