@extends('layouts.admin')
@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm rounded-3 mt-3 mb-4 px-4 py-2" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">
                    <span class="fw-bold text-primary fs-4 ms-2">Detail Laporan Hasil Latihan</span>
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

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl py-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Detail Laporan Hasil Latihan</h2>
                        <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i>Kembali
                        </a>
                    </div>

                    <!-- Info Jadwal -->
                    <div class="card mb-4">
                        <div class="card-header mb-3">
                            <h5 class="card-title mb-0">
                                <i class="bx bx-calendar me-2"></i>Detail Jadwal Latihan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Tanggal:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ \Carbon\Carbon::parse($hasilLatihan->jadwalLatihan->tanggal)->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Hari:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ $hasilLatihan->jadwalLatihan->hari }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Waktu:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ $hasilLatihan->jadwalLatihan->jam_in ? \Carbon\Carbon::parse($hasilLatihan->jadwalLatihan->jam_in)->format('H:i') : '-' }} - 
                                            {{ $hasilLatihan->jadwalLatihan->jam_out ? \Carbon\Carbon::parse($hasilLatihan->jadwalLatihan->jam_out)->format('H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Kelompok Usia:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ $hasilLatihan->jadwalLatihan->kelompok_usia }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Jenis Latihan:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ $hasilLatihan->jadwalLatihan->jenis_latihan }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span class="fw-semibold">Lokasi:</span>
                                        </div>
                                        <div class="col-7">
                                            {{ $hasilLatihan->jadwalLatihan->lokasi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Laporan Hasil -->
                    <div class="card mb-4">
                        <div class="card-header mb-3">
                            <h5 class="card-title mb-0">
                                <i class="bx bx-file-doc me-2"></i>Laporan Hasil Latihan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h6 class="fw-semibold mb-2">
                                    <i class="bx bx-file-doc me-1"></i>Deskripsi Hasil Latihan:
                                </h6>
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-0">{!! nl2br(e($hasilLatihan->deskripsi)) !!}</p>
                                </div>
                            </div>

                            @if($hasilLatihan->catatan_pelatih)
                                <div class="mb-4">
                                    <h6 class="fw-semibold mb-2">
                                        <i class="bx bx-note me-1"></i>Catatan Pelatih:
                                    </h6>
                                    <div class="p-3 bg-primary bg-opacity-10 rounded border-start border-4 border-primary">
                                        <p class="mb-0">{!! nl2br(e($hasilLatihan->catatan_pelatih)) !!}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-4">
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <small class="text-muted fw-semibold">
                                            <i class="bx bx-time me-1"></i>Dibuat:
                                        </small>
                                    </div>
                                    <div class="col-7">
                                        <small class="text-muted">
                                            {{ $hasilLatihan->created_at->format('d-m-Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <small class="text-muted fw-semibold">
                                            <i class="bx bx-edit me-1"></i>Diupdate:
                                        </small>
                                    </div>
                                    <div class="col-7">
                                        <small class="text-muted">
                                            {{ $hasilLatihan->updated_at->format('d-m-Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-primary">
                                    <i class="bx bx-arrow-back me-1"></i>Kembali ke Daftar Jadwal
                                </a>
                                <button onclick="window.print()" class="btn btn-outline-secondary">
                                    <i class="bx bx-printer me-1"></i>Cetak Laporan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border: 1px solid #dee2e6;
    }
    
    .card-header {
        background-color: #696CFF;
        color: white;
        border-bottom: none;
    }
    
    .card-header h5 {
        color: white;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .table td {
        padding: 0.5rem 0.75rem;
    }
    
    .fw-semibold {
        font-weight: 600;
    }
    
    /* Print styles */
    @media print {
        .btn, .navbar, .layout-menu-toggle {
            display: none !important;
        }
        
        .card {
            border: 1px solid #000 !important;
            box-shadow: none !important;
        }
        
        .card-header {
            background-color: #000 !important;
            color: white !important;
        }
    }
</style>
@endsection