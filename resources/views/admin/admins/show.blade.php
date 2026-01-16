@extends('layouts.admin')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm rounded-3 mt-3 mb-4 px-4 py-2"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">
                    <span class="fw-bold text-primary fs-4 ms-2">Detail Admin</span>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center gap-2"
                                href="#" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar"
                                        class="w-px-40 h-auto rounded-circle border border-primary shadow" />
                                </div>
                                <div class="d-none d-md-flex flex-column align-items-start ms-2">
                                    <span
                                        class="fw-bold text-dark">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                                <i class="bx bx-chevron-down ms-2 text-primary"></i>
                            </a>
                            <ul
                                class="dropdown-menu dropdown-menu-end shadow-lg rounded-3 animate__animated animate__fadeIn">
                                <li class="px-3 py-2 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar"
                                                class="w-px-48 h-auto rounded-circle border border-primary shadow" />
                                        </div>
                                        <div>
                                            <span
                                                class="fw-bold d-block">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center gap-2 text-danger py-2">
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
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
                        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Admin /</span> Detail Profil</h4>
                    </div>

                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class=" d-flex align-items-center flex-column">
                                            <div class="avatar avatar-xl mb-3">
                                                <img class="img-fluid rounded-circle shadow" src="{{ asset('assets/img/avatars/1.png') }}" alt="User avatar" style="width: 120px; height: 120px; object-fit: cover;" />
                                            </div>
                                            <div class="user-info text-center">
                                                <h4 class="mb-2">{{ $admin->name }}</h4>
                                                <span class="badge bg-label-secondary mt-1">Administrator</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around flex-wrap my-4 py-3 border-top border-bottom">
                                        <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check'></i></span>
                                            <div>
                                                <h5 class="mb-0">Aktif</h5>
                                                <span>Status Akun</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-3 gap-3">
                                            <span class="badge bg-label-warning p-2 rounded"><i class='bx bx-star'></i></span>
                                            <div>
                                                <h5 class="mb-0">Admin</h5>
                                                <span>Role</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <div class="card mb-4">
                                <h5 class="card-header border-bottom">Informasi Dasar</h5>
                                <div class="card-body pt-4">
                                    <form onsubmit="return false">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label text-muted">Nama Lengkap</label>
                                                <div class="form-control-plaintext fw-semibold fs-5">{{ $admin->name }}</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label text-muted">Email</label>
                                                <div class="form-control-plaintext fw-semibold fs-5">{{ $admin->email }}</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label text-muted">Bergabung Sejak</label>
                                                <div class="form-control-plaintext fw-semibold">{{ $admin->created_at->format('d F Y, H:i') }}</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label text-muted">Terakhir Diperbarui</label>
                                                <div class="form-control-plaintext fw-semibold">{{ $admin->updated_at->format('d F Y, H:i') }}</div>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-3 border-top d-flex gap-2">
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning me-2">
                                                <i class="bx bx-edit-alt me-1"></i> Edit Profil
                                            </a>
                                            <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-secondary">
                                                <i class="bx bx-arrow-back me-1"></i> Kembali
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/ User Content -->
                    </div>
                </div>
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
