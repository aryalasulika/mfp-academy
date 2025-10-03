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
                        <span class="fw-bold text-primary fs-4 ms-2">Merchandise</span>
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
                    <div class="container-xxl py-4">
                        <!-- Header Card -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">{{ $merchandise->name }}</h4>
                                <div class="btn-group">
                                    <a href="{{ route('admin.merchandise.edit', $merchandise->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.merchandise.index') }}" class="btn btn-secondary">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text-center mb-4">
                                            @if($merchandise->image)
                                                <img src="{{ asset($merchandise->image) }}" alt="{{ $merchandise->name }}" 
                                                     class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="height: 300px;">
                                                    <div class="text-muted">
                                                        <i class="bx bx-image font-size-48 mb-2 d-block"></i>
                                                        <p>Tidak ada gambar</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold" style="width: 150px;">Nama Produk:</td>
                                                        <td>{{ $merchandise->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Kategori:</td>
                                                        <td>
                                                            <span class="badge bg-info font-size-12">{{ $merchandise->category }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Harga:</td>
                                                        <td>
                                                            <span class="font-size-18 fw-bold text-primary">
                                                                Rp {{ number_format($merchandise->price, 0, ',', '.') }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Status:</td>
                                                        <td>
                                                            @if($merchandise->is_active)
                                                                <span class="badge bg-success font-size-12">Aktif</span>
                                                            @else
                                                                <span class="badge bg-danger font-size-12">Non-aktif</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Tanggal Dibuat:</td>
                                                        <td>{{ $merchandise->created_at->format('d F Y, H:i') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Terakhir Diupdate:</td>
                                                        <td>{{ $merchandise->updated_at->format('d F Y, H:i') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3">Deskripsi Produk</h5>
                                            <div class="bg-light p-3 rounded">
                                                <p class="mb-0">{{ $merchandise->description }}</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3">Preview untuk Customer</h5>
                                            <div class="border rounded p-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @if($merchandise->image)
                                                            <img src="{{ asset($merchandise->image) }}" alt="{{ $merchandise->name }}" 
                                                                 class="img-fluid rounded" style="height: 150px; object-fit: cover; width: 100%;">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="mb-2">{{ $merchandise->name }}</h6>
                                                        <p class="text-muted mb-2 small">{{ Str::limit($merchandise->description, 80) }}</p>
                                                        <h5 class="text-primary fw-bold mb-0">Rp {{ number_format($merchandise->price, 0, ',', '.') }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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




{{-- Batasss --}}
