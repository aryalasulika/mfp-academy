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
                    <span class="fw-bold text-primary fs-4 ms-2">Isi Laporan Hasil Latihan</span>
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
                        <h2>Isi Laporan Hasil Latihan</h2>
                        <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i>Kembali
                        </a>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Info Jadwal -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bx bx-calendar me-2"></i>Detail Jadwal Latihan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="fw-semibold">Tanggal:</td>
                                            <td>{{ \Carbon\Carbon::parse($jadwalLatihan->tanggal)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Hari:</td>
                                            <td>{{ $jadwalLatihan->hari }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Waktu:</td>
                                            <td>
                                                {{ $jadwalLatihan->jam_in ? \Carbon\Carbon::parse($jadwalLatihan->jam_in)->format('H:i') : '-' }} - 
                                                {{ $jadwalLatihan->jam_out ? \Carbon\Carbon::parse($jadwalLatihan->jam_out)->format('H:i') : '-' }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="fw-semibold">Kelompok Usia:</td>
                                            <td>{{ $jadwalLatihan->kelompok_usia }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Jenis Latihan:</td>
                                            <td>{{ $jadwalLatihan->jenis_latihan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Lokasi:</td>
                                            <td>{{ $jadwalLatihan->lokasi }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Laporan -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bx bx-file-plus me-2"></i>Form Laporan Hasil Latihan
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hasil_latihan.store', $jadwalLatihan->id) }}" method="POST">
                                @csrf
                                
                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold">
                                        <i class="bx bx-file-doc me-1"></i>Deskripsi Hasil Latihan <span class="text-danger">*</span>
                                    </label>
                                    <textarea 
                                        name="deskripsi" 
                                        id="deskripsi" 
                                        class="form-control @error('deskripsi') is-invalid @enderror" 
                                        rows="6" 
                                        placeholder="Tulis deskripsi detail mengenai hasil latihan, pencapaian pemain, dan poin-poin penting lainnya..."
                                        required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="catatan_pelatih" class="form-label fw-semibold">
                                        <i class="bx bx-note me-1"></i>Catatan Pelatih
                                    </label>
                                    <textarea 
                                        name="catatan_pelatih" 
                                        id="catatan_pelatih" 
                                        class="form-control @error('catatan_pelatih') is-invalid @enderror" 
                                        rows="4" 
                                        placeholder="Catatan tambahan dari pelatih (opsional)...">{{ old('catatan_pelatih') }}</textarea>
                                    @error('catatan_pelatih')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save me-1"></i>Simpan Laporan
                                    </button>
                                    <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-outline-secondary">
                                        <i class="bx bx-x me-1"></i>Batal
                                    </a>
                                </div>
                            </form>
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
    
    .table td {
        padding: 0.5rem 0.75rem;
    }
    
    .fw-semibold {
        font-weight: 600;
    }
</style>
@endsection