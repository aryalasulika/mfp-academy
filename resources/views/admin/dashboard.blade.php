@extends('layouts.admin')
@section('content')
 <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm rounded-3 mt-3 mb-4 px-4 py-2" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">
        <span class="fw-bold text-primary fs-4 ms-2">Dashboard Admin</span>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar" class="w-px-40 h-auto rounded-circle border border-primary shadow" />
                    </div>
                    <div class="d-none d-md-flex flex-column align-items-start ms-2">
                        <span class="fw-bold text-dark">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                        <small class="text-muted">Admin</small>
                    </div>
                    <i class="bx bx-chevron-down ms-2 text-primary"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg rounded-3 animate__animated animate__fadeIn">
                    <li class="px-3 py-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar" class="w-px-48 h-auto rounded-circle border border-primary shadow" />
                            </div>
                            <div>
                                <span class="fw-bold d-block">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                                <small class="text-muted">Admin</small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger py-2">
                                <i class="bx bx-power-off"></i> <span>Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Statistik Cards Modern Fancy -->
    <div class="container-xxl py-4">
        <div class="row g-4 mb-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #4e73df 60%, #1cc88a 100%);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4 position-relative">
                        <div class="mb-3 position-relative">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-lg" style="width:80px;height:80px;background:rgba(255,255,255,0.15);backdrop-filter:blur(2px);">
                                <i class="bx bx-user fs-1 text-white"></i>
                            </span>
                        </div>
                        <h6 class="text-uppercase mb-1 mt-2" style="letter-spacing:2px;color:#e3e6f0;">Total Admin</h6>
                        <h1 class="fw-bold mb-0 text-white display-4" style="text-shadow:0 2px 8px rgba(0,0,0,0.15);">{{ \App\Models\Admin::count() }}</h1>
                    </div>
                    <span class="position-absolute end-0 bottom-0 opacity-25" style="font-size:7rem;pointer-events:none;">
                        <i class="bx bx-user-circle text-white"></i>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1cc88a 60%, #36b9cc 100%);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4 position-relative">
                        <div class="mb-3 position-relative">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-lg" style="width:80px;height:80px;background:rgba(255,255,255,0.15);backdrop-filter:blur(2px);">
                                <i class="bx bx-calendar-event fs-1 text-white"></i>
                            </span>
                        </div>
                        <h6 class="text-uppercase mb-1 mt-2" style="letter-spacing:2px;color:#e3e6f0;">Total Jadwal Latihan</h6>
                        <h1 class="fw-bold mb-0 text-white display-4" style="text-shadow:0 2px 8px rgba(0,0,0,0.15);">{{ $totalJadwalLatihan ?? '-' }}</h1>
                    </div>
                    <span class="position-absolute end-0 bottom-0 opacity-25" style="font-size:7rem;pointer-events:none;">
                        <i class="bx bx-calendar-event text-white"></i>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #36b9cc 60%, #f6c23e 100%);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4 position-relative">
                        <div class="mb-3 position-relative">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-lg" style="width:80px;height:80px;background:rgba(255,255,255,0.15);backdrop-filter:blur(2px);">
                                <i class="bx bx-envelope fs-1 text-white"></i>
                            </span>
                            @php
                                $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span class="badge bg-danger position-absolute top-0 end-0">{{ $unreadCount }} baru</span>
                            @endif
                        </div>
                        <h6 class="text-uppercase mb-1 mt-2" style="letter-spacing:2px;color:#e3e6f0;">Total Pesan Masuk</h6>
                        <h1 class="fw-bold mb-0 text-white display-4" style="text-shadow:0 2px 8px rgba(0,0,0,0.15);">{{ \App\Models\ContactMessage::count() }}</h1>
                    </div>
                    <span class="position-absolute end-0 bottom-0 opacity-25" style="font-size:7rem;pointer-events:none;">
                        <i class="bx bx-envelope text-white"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Statistik Cards Modern Fancy -->
    <div class="content-backdrop fade"></div>
</div>
<!-- / Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
