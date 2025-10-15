@extends('layouts.admin')

@section('content')
<div class="layout-wrapper layout-content-navbar"><!-- pastikan tidak ada parent .dropdown di sekitar filter-section -->
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
                    <span class="fw-bold text-primary fs-4 ms-2">Berita & Acara</span>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center gap-2"
                                href="#" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar"
                                        class="w-px-40 h-auto rounded-circle border border-primary shadow" />
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
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Admin Avatar"
                                                class="w-px-48 h-auto rounded-circle border border-primary shadow" />
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
            <div class="content-wrapper" style="overflow:visible;">
                <!-- Content -->
                <div class="container-xxl py-4" style="overflow:visible;">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Berita & Acara</h2>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus me-1"></i>Tambah Berita/Acara
                        </a>
                    </div>
                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bx bx-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Filter Section -->
                    <div class="filter-section">
                        <h5 class="mb-3">
                            <i class="bx bx-filter-alt me-2"></i>Filter & Pencarian
                        </h5>
                        <!-- Uji coba select tahun di luar form -->
                        {{-- <form method="GET" action="{{ route('admin.events.index') }}" class="mb-3 d-flex align-items-end gap-2">
                            <div style="min-width:200px;">
                                <label for="year-test" class="form-label fw-semibold">Dropdown Tahun Test (di luar form)</label>
                                <select name="year" id="year-test" class="form-select">
                                    <option value="">Semua Tahun</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 5;
                                    @endphp
                                    @for ($y = $currentYear; $y >= $startYear; $y--)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-search me-1"></i>Filter Tahun
                            </button>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
                                <i class="bx bx-refresh me-1"></i>Reset
                            </a>
                        </form> --}}
                        <form method="GET" action="{{ route('admin.events.index') }}" class="row g-3">
                            <div class="col-md-4" style="overflow:visible;">
                                <label for="search" class="form-label fw-semibold">
                                    <i class="bx bx-search me-1"></i>Pencarian
                                </label>
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Cari berdasarkan judul atau lokasi..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3" style="overflow:visible;">
                                <label for="month" class="form-label fw-semibold">
                                    <i class="bx bx-calendar me-1"></i>Bulan
                                </label>
                                <select name="month" id="month" class="form-select">
                                    <option value="">Semua Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                             <div class="col-md-3" style="overflow:visible;">
                                <label for="year-test" class="form-label fw-semibold"><i class="bx bx-calendar-check me-1"></i>Tahun</label>
                                <select name="year" id="year-test" class="form-select">
                                    <option value="">Semua Tahun</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 5;
                                    @endphp
                                    @for ($y = $currentYear; $y >= $startYear; $y--)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            {{-- <div class="col-md-3" style="overflow:visible;">
                                <label for="year" class="form-label fw-semibold">
                                    <i class="bx bx-calendar-check me-1"></i>Tahun
                                </label>
                                <select name="year" id="year" class="form-control" style="min-width:120px;background:#fff;border:1px solid #ced4da;">
                                    <option value="">Semua Tahun</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 5;
                                    @endphp
                                    @for ($y = $currentYear; $y >= $startYear; $y--)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endfor
                                </select>
                            </div> --}}
                            <div class="col-md-2" style="overflow:visible;">
                                <label class="form-label text-transparent">Action</label>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-search me-1"></i>Cari
                                    </button>
                                    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
                                        <i class="bx bx-refresh me-1"></i>Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Data Table -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="bx bx-table me-2"></i>Hasil Pencarian
                            </h5>
                            <div class="text-white small">
                                Total: {{ $events->total() ?? $events->count() }} berita/acara
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-primary">
                            <tr>
                                <th class="text-center">FOTO</th>
                                <th>JUDUL</th>
                                <th>SLUG</th>
                                <th>DESKRIPSI</th>
                                <th>LOKASI</th>
                                <th>TANGGAL</th>
                                <th class="text-center">AKSI</th>
                                {{-- <th class="text-center" style="width: 80px;">FOTO</th>
                                <th>JUDUL</th> --}}
                                {{-- <th style="width: 180px;">SLUG</th>
                                <th style="width: 250px;">DESKRIPSI</th>
                                <th style="width: 150px;">LOKASI</th>
                                <th style="width: 120px;">TANGGAL</th>
                                <th class="text-center" style="width: 150px;">AKSI</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                                <tr>
                                    <td class="text-center">
                                        @if ($event->image)
                                            <img src="{{ asset($event->image) }}" alt="{{ $event->judul }}"
                                                class="img-thumbnail rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded mx-auto"
                                                style="width: 60px; height: 60px;">
                                                <i class="bx bx-image text-muted fs-3"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold" title="{{ $event->judul }}">
                                            {{ Str::limit($event->judul, 40) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-inline-block" style="max-width: 150px;" title="{{ $event->slug }}">
                                            <small class="text-muted">{{ $event->slug }}</small>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-inline-block" style="max-width: 220px;" title="{{ strip_tags($event->deskripsi) }}">
                                            {{ Str::limit(strip_tags($event->deskripsi), 50) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($event->lokasi)
                                            <span class="text-truncate d-inline-block" style="max-width: 120px;" title="{{ $event->lokasi }}">
                                                <i class="bx bx-map-pin me-1 text-muted"></i>{{ $event->lokasi }}
                                            </span>
                                        @else
                                            <span class="badge bg-label-secondary">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">{{ \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y') }}</span>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($event->tanggal)->format('D, d M Y') }}</small>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('event.show', $event->slug) }}" target="_blank"
                                               class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="{{ route('admin.events.edit', $event->id) }}"
                                               class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                                  style="display:inline-block;"
                                                  onsubmit="return confirm('Yakin ingin menghapus berita/acara ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="bx bx-news display-4 text-muted mb-3"></i>
                                            @if (request('search') || request('month') || request('year'))
                                                <h5 class="text-muted">Tidak Ada Berita/Acara Ditemukan</h5>
                                                <p class="text-muted mb-3">Coba ubah kriteria pencarian Anda.</p>
                                                <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
                                                    <i class="bx bx-refresh me-1"></i>Reset Pencarian
                                                </a>
                                            @else
                                                <h5 class="text-muted">Belum Ada Berita/Acara</h5>
                                                <p class="text-muted mb-3">Mulai dengan menambahkan berita/acara baru.</p>
                                                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                                                    <i class="bx bx-plus me-1"></i>Tambah Berita/Acara
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        @if (method_exists($events, 'links') && $events->hasPages())
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <small class="text-muted">
                                            Menampilkan {{ $events->firstItem() ?? 0 }} sampai {{ $events->lastItem() ?? 0 }} 
                                            dari {{ $events->total() }} berita/acara
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-end">
                                            {{ $events->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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

    <!-- Additional CSS for enhanced table -->
    <style>
        /* Override overflow hidden pada parent global agar dropdown tahun bisa muncul */
        .bg-logo-color,
        .container-xxl,
        .content-wrapper,
        .layout-wrapper,
        .layout-container,
        .layout-page {
            overflow: visible !important;
        }
        .table thead th {
            border-bottom: 2px solid #dee2e6;
            padding: 12px 8px;
            font-weight: 600;
            font-size: 0.875rem;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 12px 8px;
            vertical-align: middle;
        }
        
        .badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
        
        .btn-group .btn {
            border-radius: 0;
            padding: 0.375rem 0.5rem;
        }
        
        .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }
        
        .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .btn-group .btn i {
            font-size: 1rem;
        }
        
        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        /* Table responsive enhancements */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
            scroll-behavior: smooth;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .table {
            min-width: 1200px; /* Minimum width untuk mencegah kolom terlalu sempit */
            margin-bottom: 0;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .table thead th,
            .table tbody td {
                padding: 8px 4px;
            }
            
            .badge {
                font-size: 0.7rem;
                padding: 0.25em 0.5em;
            }
            
            .btn-group .btn {
                padding: 0.25rem 0.5rem;
                font-size: 0.875rem;
            }
            
            .text-truncate {
                max-width: 80px !important;
            }
        }

        /* Tablet responsive adjustments */
        @media (max-width: 1024px) {
            .table {
                min-width: 1000px;
            }
        }
        
        /* Filter section styling */
        .filter-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #dee2e6;
        }

        .filter-section h5 {
            font-weight: 600;
            color: #333;
        }

        @media (max-width: 768px) {
            .filter-section {
                padding: 1rem;
            }

            .d-flex.justify-content-between.align-items-center.mb-4 {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 1rem;
            }

            .d-flex.justify-content-between.align-items-center.mb-4 .btn {
                width: 100%;
            }
        }
        
        /* Card enhancements */
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid #dee2e6;
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background-color: #696CFF;
            color: white;
            border-bottom: none;
        }
        
        .card-header h5 {
            color: white;
        }

        .card-header .text-white {
            color: white !important;
            white-space: nowrap;
        }

        .card-header i {
            color: white;
        }

        .card-header .card-title {
            white-space: nowrap;
        }
        
        /* Pagination styling */
        .pagination {
            margin-bottom: 0;
        }
        
        .page-link {
            color: #007bff;
            padding: 0.5rem 0.75rem;
        }
        
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Transparent label helper */
        .text-transparent {
            opacity: 0;
            user-select: none;
        }

        /* Ensure select dropdowns are clickable */
        .form-select {
            cursor: pointer;
            position: relative;
            z-index: 1;
        }

        .form-select:focus {
            border-color: #696CFF;
            box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25);
        }

        /* Fix for dropdown not showing */
        select.form-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            z-index: 1051 !important; /* pastikan dropdown di atas modal dan navbar */
            position: relative;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Pastikan parent tidak menutup dropdown */
        .filter-section {
            overflow: visible !important;
        }
        }
    </style>
@endsection
