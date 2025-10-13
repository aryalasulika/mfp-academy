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
        <span class="fw-bold text-primary fs-4 ms-2">Akademi</span>
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Akademi</h2>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- Search and Filter Form -->
        <div class="filter-section">
            <h5 class="mb-3">
                <i class="bx bx-search me-2"></i>Filter & Pencarian
            </h5>
            <form method="GET" action="{{ route('admin.user.index') }}" class="row g-3">
                <!-- Hidden inputs for sorting -->
                <input type="hidden" name="sort" value="{{ request('sort', 'created_at') }}">
                <input type="hidden" name="direction" value="{{ request('direction', 'desc') }}">
                <input type="hidden" name="kelompok_usia_filter" value="{{ request('kelompok_usia_filter') }}">
                
                <div class="col-md-4">
                    <label for="search" class="form-label fw-semibold">
                        <i class="bx bx-search me-1"></i>Pencarian
                    </label>
                    <input type="text" 
                           name="search" 
                           id="search" 
                           class="form-control" 
                           placeholder="Cari berdasarkan nama user..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="role_filter" class="form-label fw-semibold">
                        <i class="bx bx-user-check me-1"></i>Role
                    </label>
                    <select name="role_filter" id="role_filter" class="form-select">
                        <option value="">Semua Role</option>
                        <option value="peserta" {{ request('role_filter') == 'peserta' ? 'selected' : '' }}>Peserta</option>
                        <option value="coach" {{ request('role_filter') == 'coach' ? 'selected' : '' }}>Coach</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="kelompok_usia_filter" class="form-label fw-semibold">
                        <i class="bx bx-group me-1"></i>Kelompok Usia
                    </label>
                    <select name="kelompok_usia_filter" id="kelompok_usia_filter" class="form-select">
                        <option value="">Semua Kelompok</option>
                        <option value="U-10" {{ request('kelompok_usia_filter') == 'U-10' ? 'selected' : '' }}>U-10</option>
                        <option value="U-12" {{ request('kelompok_usia_filter') == 'U-12' ? 'selected' : '' }}>U-12</option>
                        <option value="U-13" {{ request('kelompok_usia_filter') == 'U-13' ? 'selected' : '' }}>U-13</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label text-transparent">Action</label>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-search me-1"></i>Cari
                        </button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary">
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
                    <i class="bx bx-group me-2"></i>Daftar User Akademi
                </h5>
                <div class="d-flex align-items-center gap-3">
                    @if(request('sort') && request('sort') != 'created_at')
                        <small class="text-white-50">
                            <i class="bx bx-sort me-1"></i>
                            Diurutkan berdasarkan: 
                            <strong>
                                @switch(request('sort'))
                                    @case('name') Nama @break
                                    @case('email') Email @break
                                    @case('alamat') Alamat @break
                                    @case('nomor_hp') Nomor HP @break
                                    @case('role') Role @break
                                    @default {{ request('sort') }}
                                @endswitch
                            </strong>
                            ({{ request('direction') == 'asc' ? 'A-Z' : 'Z-A' }})
                        </small>
                    @endif
                    <div class="text-white-50 small">
                        Total: {{ $users->count() }} user
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Search Results Info -->
                {{-- @if(request('search') || request('role_filter'))
                    <div class="alert alert-info m-3 mb-0">
                        <i class="bx bx-info-circle me-2"></i>
                        Menampilkan hasil 
                        @if(request('search'))
                            pencarian "<strong>{{ request('search') }}</strong>"
                        @endif
                        @if(request('role_filter'))
                            untuk role "<strong>{{ ucfirst(request('role_filter')) }}</strong>"
                        @endif
                        - Ditemukan <strong>{{ $users->count() }}</strong> user.
                    </div>
                @endif --}}
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: #E1E2FF;">
                            <tr>
                                <th class="text-center sortable" data-sort="name">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => (request('sort') == 'name' && request('direction') == 'asc') ? 'desc' : 'asc']) }}" 
                                       class="text-decoration-none text-dark d-flex align-items-center justify-content-center">
                                        Nama
                                        @if(request('sort') == 'name')
                                            <i class="bx bx-chevron-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1 text-dark"></i>
                                        @else
                                            <i class="bx bx-sort ms-1 opacity-50 text-dark"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center sortable" data-sort="email">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => (request('sort') == 'email' && request('direction') == 'asc') ? 'desc' : 'asc']) }}" 
                                       class="text-decoration-none text-dark d-flex align-items-center justify-content-center">
                                        Email
                                        @if(request('sort') == 'email')
                                            <i class="bx bx-chevron-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1 text-dark"></i>
                                        @else
                                            <i class="bx bx-sort ms-1 opacity-50 text-dark"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center sortable" data-sort="alamat">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'alamat', 'direction' => (request('sort') == 'alamat' && request('direction') == 'asc') ? 'desc' : 'asc']) }}" 
                                       class="text-decoration-none text-dark d-flex align-items-center justify-content-center">
                                        Alamat
                                        @if(request('sort') == 'alamat')
                                            <i class="bx bx-chevron-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1 text-dark"></i>
                                        @else
                                            <i class="bx bx-sort ms-1 opacity-50 text-dark"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center sortable" data-sort="nomor_hp">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'nomor_hp', 'direction' => (request('sort') == 'nomor_hp' && request('direction') == 'asc') ? 'desc' : 'asc']) }}" 
                                       class="text-decoration-none text-dark d-flex align-items-center justify-content-center">
                                        Kelompok Usia
                                        @if(request('sort') == 'nomor_hp')
                                            <i class="bx bx-chevron-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1 text-dark"></i>
                                        @else
                                            <i class="bx bx-sort ms-1 opacity-50 text-dark"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center sortable" data-sort="role">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'role', 'direction' => (request('sort') == 'role' && request('direction') == 'asc') ? 'desc' : 'asc']) }}" 
                                       class="text-decoration-none text-dark d-flex align-items-center justify-content-center">
                                        Role
                                        @if(request('sort') == 'role')
                                            <i class="bx bx-chevron-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1 text-dark"></i>
                                        @else
                                            <i class="bx bx-sort ms-1 opacity-50 text-dark"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2">
                                            <div class="avatar-initial rounded-circle bg-primary text-white">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <span class="fw-semibold">{{ $user->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 180px;" title="{{ $user->email }}">
                                        <i class="bx bx-envelope me-1 text-muted"></i>{{ $user->email }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 150px;" title="{{ $user->alamat ?? 'Tidak ada alamat' }}">
                                        <i class="bx bx-map me-1 text-muted"></i>{{ $user->alamat ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($user->role == 'peserta')
                                        @if($user->kelompok_usia)
                                            <span class="badge bg-info rounded-pill">
                                                <i class="bx bx-group me-1"></i>{{ $user->kelompok_usia }}
                                            </span>
                                        @else
                                            <span class="badge bg-light text-muted rounded-pill">
                                                <i class="bx bx-minus me-1"></i>-
                                            </span>
                                        @endif
                                    @elseif($user->role == 'coach')
                                        @if($user->kelompok_usia_asuhan)
                                            <span class="badge bg-warning rounded-pill">
                                                <i class="bx bx-chalkboard me-1"></i>{{ $user->kelompok_usia_asuhan }}
                                            </span>
                                        @else
                                            <span class="badge bg-light text-muted rounded-pill">
                                                <i class="bx bx-minus me-1"></i>-
                                            </span>
                                        @endif
                                    @else
                                        <span class="badge bg-light text-muted rounded-pill">
                                            <i class="bx bx-minus me-1"></i>-
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $user->role == 'coach' ? 'bg-success' : 'bg-info' }} rounded-pill">
                                        <i class="bx {{ $user->role == 'coach' ? 'bx-user-check' : 'bx-user' }} me-1"></i>
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.user.show', $user->id) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="Lihat Detail User">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="{{ route('admin.user.edit', $user->id) }}" 
                                           class="btn btn-sm btn-outline-warning" 
                                           title="Edit User">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" 
                                              method="POST" 
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Yakin hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Hapus User">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="bx bx-user-x display-4 text-muted mb-3"></i>
                                        @if(request('search') || request('role_filter'))
                                            <h5 class="text-muted">Tidak ada user ditemukan</h5>
                                            <p class="text-muted mb-3">Coba ubah kriteria pencarian Anda</p>
                                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary">
                                                <i class="bx bx-refresh me-1"></i>Reset Pencarian
                                            </a>
                                        @else
                                            <h5 class="text-muted">Belum ada user</h5>
                                            <p class="text-muted mb-3">Mulai dengan menambahkan user pertama</p>
                                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                                                <i class="bx bx-plus me-1"></i>Tambah User
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
        </div>
    </div>
    <!-- / Content -->
    
    <style>
        .table thead th {
            border-bottom: 2px solid #dee2e6;
            padding: 12px 8px;
            font-weight: 600;
            font-size: 0.875rem;
            white-space: nowrap;
            background-color: #E1E2FF !important;
            color: #000000 !important;
            vertical-align: middle;
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
        
        /* Avatar styling */
        .avatar {
            width: 2rem;
            height: 2rem;
        }
        
        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 600;
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
            
            .avatar {
                width: 1.5rem;
                height: 1.5rem;
            }
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
        
        /* Alert styling */
        .alert-info {
            background-color: #e3f2fd;
            border-color: #bbdefb;
            color: #0d47a1;
            border-radius: 0;
        }
        
        /* Sortable header styling */
        .sortable {
            cursor: pointer;
            user-select: none;
            background-color: #E1E2FF !important;
        }
        
        .sortable a {
            color: #000000 !important;
            text-decoration: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
            padding: 8px 12px !important;
        }
        
        .sortable a:hover {
            color: #000000 !important;
        }
        
        .sortable i.bx-sort {
            opacity: 0.6;
            color: #000000 !important;
        }
    </style>
    
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
