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
                    <span class="fw-bold text-primary fs-4 ms-2">Detail User</span>
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
                <!-- Content -->
                <div class="container-xxl py-4">
                    <!-- Header Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary me-3">
                                <i class="bx bx-arrow-back me-1"></i>
                                <span class="d-none d-sm-inline">Kembali</span>
                            </a>
                            {{-- <h2 class="mb-0">Detail User</h2> --}}
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i>
                                <span class="d-none d-sm-inline">Edit User</span>
                                <span class="d-sm-none">Edit</span>
                            </a>
                        </div>
                    </div>

                    <!-- User Detail Card -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <!-- Profile Photo Card -->
                            <div class="card h-100">
                                <div class="card-header mb-3">
                                    <h5 class="card-title mb-0">
                                        <i class="bx bx-image me-2"></i>Foto Profil
                                    </h5>
                                </div>
                                <div class="card-body text-center">
                                    @if($user->foto_profil)
                                        <img src="{{ asset('storage/' . $user->foto_profil) }}" 
                                             alt="Foto Profil {{ $user->name }}" 
                                             class="img-fluid rounded-circle border border-primary shadow"
                                             style="width: 200px; height: 200px; object-fit: cover;">
                                    @else
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="avatar avatar-xl mb-3" style="width: 200px; height: 200px;">
                                                <div class="avatar-initial rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="font-size: 4rem; width: 100%; height: 100%;">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <p class="text-muted">Tidak ada foto profil</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 mb-4">
                            <!-- Basic Information Card -->
                            <div class="card h-100">
                                <div class="card-header mb-3">
                                    <h5 class="card-title mb-0">
                                        <i class="bx bx-user me-2"></i>Informasi Dasar
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
                                            <p class="fs-5 fw-bold text-dark">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Email</label>
                                            <p class="fs-6">
                                                <i class="bx bx-envelope me-2 text-primary"></i>
                                                <a href="mailto:{{ $user->email }}" class="text-decoration-none">{{ $user->email }}</a>
                                            </p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Role</label>
                                            <p>
                                                <span class="badge {{ $user->role == 'coach' ? 'bg-success' : 'bg-info' }} rounded-pill fs-6 px-3 py-2">
                                                    <i class="bx {{ $user->role == 'coach' ? 'bx-chalkboard' : 'bx-user' }} me-1"></i>
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Nomor HP</label>
                                            <p class="fs-6">
                                                @if($user->nomor_hp)
                                                    <i class="bx bx-phone me-2 text-success"></i>
                                                    <a href="tel:{{ $user->nomor_hp }}" class="text-decoration-none">{{ $user->nomor_hp }}</a>
                                                @else
                                                    <span class="text-muted">
                                                        <i class="bx bx-phone-off me-2"></i>Tidak ada nomor HP
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-semibold text-muted">Alamat</label>
                                            <p class="fs-6">
                                                @if($user->alamat)
                                                    <i class="bx bx-map me-2 text-primary"></i>{{ $user->alamat }}
                                                @else
                                                    <span class="text-muted">
                                                        <i class="bx bx-map-pin me-2"></i>Alamat belum diisi
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Role Specific Information -->
                    @if($user->role == 'peserta' || $user->role == 'coach')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header mb-3">
                                    <h5 class="card-title mb-0">
                                        <i class="bx {{ $user->role == 'coach' ? 'bx-chalkboard' : 'bx-football' }} me-2"></i>
                                        Informasi {{ $user->role == 'coach' ? 'Pelatih' : 'Peserta' }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if($user->role == 'peserta')
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold text-muted">Kelompok Usia</label>
                                                <p>
                                                    @if($user->kelompok_usia)
                                                        <span class="badge bg-info rounded-pill fs-6 px-3 py-2">
                                                            <i class="bx bx-group me-1"></i>{{ $user->kelompok_usia }}
                                                        </span>
                                                    @else
                                                        <span class="text-muted">Belum ditentukan</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold text-muted">Posisi</label>
                                                <p>
                                                    @if($user->posisi)
                                                        <span class="badge bg-success rounded-pill fs-6 px-3 py-2">
                                                            <i class="bx bx-target-lock me-1"></i>{{ $user->posisi }}
                                                        </span>
                                                    @else
                                                        <span class="text-muted">Belum ditentukan</span>
                                                    @endif
                                                </p>
                                            </div>
                                        @elseif($user->role == 'coach')
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold text-muted">Kelompok Usia Asuhan</label>
                                                <p>
                                                    @if($user->kelompok_usia_asuhan)
                                                        <span class="badge bg-warning rounded-pill fs-6 px-3 py-2">
                                                            <i class="bx bx-chalkboard me-1"></i>{{ $user->kelompok_usia_asuhan }}
                                                        </span>
                                                    @else
                                                        <span class="text-muted">Belum ditentukan</span>
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Additional Information -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header mb-3">
                                    <h5 class="card-title mb-0">
                                        <i class="bx bx-time me-2"></i>Informasi Sistem
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Tanggal Bergabung</label>
                                            <p class="fs-6">
                                                <i class="bx bx-calendar me-2 text-primary"></i>
                                                {{ $user->created_at->format('d F Y, H:i') }} WIB
                                            </p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold text-muted">Terakhir Diupdate</label>
                                            <p class="fs-6">
                                                <i class="bx bx-edit me-2 text-warning"></i>
                                                {{ $user->updated_at->format('d F Y, H:i') }} WIB
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- / Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
    }
    
    .card-header {
        background-color: #696CFF;
        color: white;
        border-bottom: none;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    
    .card-header h5 {
        color: white;
        font-weight: 600;
    }
    
    .avatar-xl {
        width: 200px;
        height: 200px;
    }
    
    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
        font-weight: 500;
    }
    
    .form-label {
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: row;
            align-items: center;
            gap: 0.5rem;
        }
        
        .d-flex.justify-content-between .d-flex.align-items-center {
            flex: 1;
        }
        
        .d-flex.gap-2 {
            flex-shrink: 0;
        }
        
        .d-flex.gap-2 .btn {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
        
        .avatar-xl {
            width: 150px;
            height: 150px;
        }
        
        .avatar-initial {
            font-size: 3rem !important;
        }
        
        /* Improve button spacing on mobile */
        .btn {
            white-space: nowrap;
        }
        
        .me-3 {
            margin-right: 0.5rem !important;
        }
    }
    
    /* Extra small devices (phones, less than 576px) */
    @media (max-width: 575.98px) {
        .d-flex.justify-content-between {
            flex-wrap: wrap;
            gap: 0.75rem;
        }
        
        .d-flex.align-items-center {
            flex: 1 1 auto;
            min-width: 0;
        }
        
        .d-flex.gap-2 {
            flex: 1 1 100%;
            justify-content: stretch;
        }
        
        .d-flex.gap-2 .btn {
            flex: 1;
            text-align: center;
            padding: 0.75rem 1rem;
        }
        
        .btn .d-none.d-sm-inline {
            display: inline !important;
        }
        
        .btn .d-sm-none {
            display: none !important;
        }
        
        .avatar-xl {
            width: 120px;
            height: 120px;
        }
        
        .avatar-initial {
            font-size: 2.5rem !important;
        }
        
        .card-body {
            padding: 1rem;
        }
        
        .fs-5 {
            font-size: 1.1rem !important;
        }
        
        .fs-6 {
            font-size: 0.9rem !important;
        }
    }
    
    /* Link styling */
    a[href^="mailto:"], a[href^="tel:"] {
        color: inherit;
        transition: color 0.2s ease;
    }
    
    a[href^="mailto:"]:hover, a[href^="tel:"]:hover {
        color: #696CFF;
    }
</style>
@endsection