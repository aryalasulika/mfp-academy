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
        <span class="fw-bold text-primary fs-4 ms-2">Jadwal Latihan</span>
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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Jadwal Latihan</h2>
        <a href="{{ route('admin.jadwal_latihan.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i>Tambah Jadwal
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bx bx-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Filter/Search Form -->
    <div class="filter-section">
        <h5 class="mb-3">
            <i class="bx bx-search me-2"></i>Filter & Pencarian
        </h5>
        <form method="GET" action="{{ route('admin.jadwal_latihan.index') }}" class="row g-3 align-items-end justify-content-end">
            <div class="col-md-3">
                <label for="start_date" class="form-label fw-semibold">
                    <i class="bx bx-calendar me-1"></i>Dari
                </label>
                <input type="date" 
                       name="start_date" 
                       id="start_date" 
                       class="form-control" 
                       value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <label for="end_date" class="form-label fw-semibold">
                    <i class="bx bx-calendar me-1"></i>Sampai
                </label>
                <input type="date" 
                       name="end_date" 
                       id="end_date" 
                       class="form-control" 
                       value="{{ request('end_date') }}">
            </div>
            <div class="col-md-2">
                <label for="kelompok_usia" class="form-label fw-semibold">
                    <i class="bx bx-group me-1"></i>Kelompok
                </label>
                <select name="kelompok_usia" id="kelompok_usia" class="form-select">
                    <option value="">Semua</option>
                    <option value="U-10" {{ request('kelompok_usia') == 'U-10' ? 'selected' : '' }}>U-10</option>
                    <option value="U-12" {{ request('kelompok_usia') == 'U-12' ? 'selected' : '' }}>U-12</option>
                    <option value="U-13" {{ request('kelompok_usia') == 'U-13' ? 'selected' : '' }}>U-13</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="hari" class="form-label fw-semibold">
                    <i class="bx bx-calendar me-1"></i>Hari
                </label>
                <select name="hari" id="hari" class="form-select">
                    <option value="">Semua</option>
                    <option value="Senin" {{ request('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ request('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ request('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ request('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ request('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ request('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ request('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label text-transparent ">Action</label>
                <div class="d-flex gap-1">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bx bx-search"></i>
                    </button>
                    <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-outline-secondary flex-grow-1">
                        <i class="bx bx-refresh"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!-- Data Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                <i class="bx bx-calendar me-2"></i>Daftar Jadwal Latihan
            </h5>
            <div class="text-muted small">
                Total: {{ $jadwal->total() ?? $jadwal->count() }} jadwal
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th class="sortable text-center">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'tanggal', 'direction' => request('sort') == 'tanggal' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Tanggal
                                    @if(request('sort') == 'tanggal')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'hari', 'direction' => request('sort') == 'hari' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Hari
                                    @if(request('sort') == 'hari')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'jam_in', 'direction' => request('sort') == 'jam_in' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Jam Masuk
                                    @if(request('sort') == 'jam_in')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'jam_out', 'direction' => request('sort') == 'jam_out' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Jam Keluar
                                    @if(request('sort') == 'jam_out')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'kelompok_usia', 'direction' => request('sort') == 'kelompok_usia' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Kelompok Usia
                                    @if(request('sort') == 'kelompok_usia')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'jenis_latihan', 'direction' => request('sort') == 'jenis_latihan' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Jenis Latihan
                                    @if(request('sort') == 'jenis_latihan')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="sortable">
                                <a href="{{ route('admin.jadwal_latihan.index', array_merge(request()->query(), ['sort' => 'lokasi', 'direction' => request('sort') == 'lokasi' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-decoration-none text-dark d-flex align-items-center">
                                    Lokasi
                                    @if(request('sort') == 'lokasi')
                                        <i class="bx bx-{{ request('direction') == 'asc' ? 'up' : 'down' }}-arrow-alt ms-1"></i>
                                    @else
                                        <i class="bx bx-sort ms-1 text-muted"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwal as $item)
                        <tr>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</span>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('D, d M Y') }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary rounded-pill">{{ $item->hari }}</span>
                            </td>
                            <td class="text-center">
                                @php
                                    $jamIn = $item->jam_in;
                                    $displayJamIn = (!$jamIn || $jamIn == '00:00:00' || $jamIn == '00:00') ? '-' : \Carbon\Carbon::parse($jamIn)->format('H:i');
                                @endphp
                                <span class="badge bg-{{ $displayJamIn == '-' ? 'light text-muted' : 'success' }}">
                                    <i class="bx bx-time-five me-1"></i>{{ $displayJamIn }}
                                </span>
                            </td>
                            <td class="text-center">
                                @php
                                    $jamOut = $item->jam_out;
                                    $displayJamOut = (!$jamOut || $jamOut == '00:00:00' || $jamOut == '00:00') ? '-' : \Carbon\Carbon::parse($jamOut)->format('H:i');
                                @endphp
                                <span class="badge bg-{{ $displayJamOut == '-' ? 'light text-muted' : 'warning' }}">
                                    <i class="bx bx-time-five me-1"></i>{{ $displayJamOut }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-primary rounded-pill">{{ $item->kelompok_usia }}</span>
                            </td>
                            <td>
                                <span class="text-truncate d-inline-block" style="max-width: 150px;" title="{{ $item->jenis_latihan }}">
                                    {{ $item->jenis_latihan ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-truncate d-inline-block" style="max-width: 120px;" title="{{ $item->lokasi }}">
                                    <i class="bx bx-map-pin me-1 text-muted"></i>{{ $item->lokasi }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.jadwal_latihan.edit', $item->id) }}" 
                                       class="btn btn-sm btn-outline-warning" 
                                       title="Edit Jadwal">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    
                                    @if($item->hasilLatihan)
                                        <a href="{{ route('admin.hasil_latihan.show', $item->hasilLatihan->id) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="Lihat Laporan">
                                            <i class="bx bx-file-find"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.hasil_latihan.create', $item->id) }}" 
                                           class="btn btn-sm btn-outline-success" 
                                           title="Isi Laporan">
                                            <i class="bx bx-plus-circle"></i>
                                        </a>
                                    @endif
                                    
                                    <form action="{{ route('admin.jadwal_latihan.destroy', $item->id) }}" 
                                          method="POST" 
                                          style="display:inline-block;"
                                          onsubmit="return confirm('Yakin hapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger" 
                                                title="Hapus Jadwal">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bx bx-calendar-x display-4 text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada jadwal latihan</h5>
                                    <p class="text-muted mb-3">Mulai dengan menambahkan jadwal latihan pertama</p>
                                    <a href="{{ route('admin.jadwal_latihan.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i>Tambah Jadwal
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($jadwal, 'links') && $jadwal->hasPages())
        <div class="card-footer">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small class="text-muted">
                        Menampilkan {{ $jadwal->firstItem() ?? 0 }} sampai {{ $jadwal->lastItem() ?? 0 }} 
                        dari {{ $jadwal->total() }} jadwal
                    </small>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        {{ $jadwal->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
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

    <!-- Additional CSS for enhanced table -->
    <style>
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
        }
        
        .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }
        
        .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }
        
        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
        
        /* Sort indicators */
        .sortable a {
            text-decoration: none !important;
            color: inherit;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        /* Enhanced empty state */
        .empty-state {
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Filter section styling */
        .filter-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #dee2e6;
        }
        
        /* Card enhancements */
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
    </style>
@endsection
