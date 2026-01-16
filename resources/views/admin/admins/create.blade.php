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
                    <span class="fw-bold text-primary fs-4 ms-2">Tambah Admin</span>
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Tambah Admin</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <h5 class="card-header">Form Tambah Admin</h5>
                                <div class="card-body">
                                    <form action="{{ route('admin.admins.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-secondary">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
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
