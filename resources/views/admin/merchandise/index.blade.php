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
                                <h4 class="card-title mb-0">Daftar Merchandise</h4>
                                <a href="{{ route('admin.merchandise.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus"></i> Tambah Merchandise
                                </a>
                            </div>
                        </div>

                        <!-- Main Content Card -->
                        <div class="card">
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- Filter/Search Form -->
                                <div class="filter-section mb-3">
                                    <h5 class="mb-3">
                                        <i class="bx bx-search me-2"></i>Filter & Pencarian
                                    </h5>
                                    <form method="GET" action="{{ route('admin.merchandise.index') }}" class="row g-3">
                                        <div class="col-md-4">
                                            <label for="search" class="form-label fw-semibold">
                                                <i class="bx bx-search me-1"></i>Pencarian
                                            </label>
                                            <input type="text"
                                                   name="search"
                                                   id="search"
                                                   class="form-control"
                                                   placeholder="Cari berdasarkan nama atau deskripsi..."
                                                   value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category" class="form-label fw-semibold">
                                                <i class="bx bx-category me-1"></i>Kategori
                                            </label>
                                            <select name="category" id="category" class="form-select">
                                                <option value="">Semua Kategori</option>
                                                @foreach(($categories ?? []) as $key => $label)
                                                    <option value="{{ is_string($key) ? $key : $label }}" {{ request('category') == (is_string($key) ? $key : $label) ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="status" class="form-label fw-semibold">
                                                <i class="bx bx-toggle-left me-1"></i>Status
                                            </label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="">Semua Status</option>
                                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Non-aktif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-transparent">Action</label>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-search me-1"></i>Cari
                                                </button>
                                                <a href="{{ route('admin.merchandise.index') }}" class="btn btn-outline-secondary">
                                                    <i class="bx bx-refresh me-1"></i>Reset
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered dt-responsive nowrap w-100 text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th class="text-center">Nama Produk</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($merchandise as $item)
                                            <tr>
                                                <td>{{ $loop->iteration + ($merchandise->currentPage() - 1) * $merchandise->perPage() }}</td>
                                                <td>
                                                    @if($item->image)
                                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" 
                                                             class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                             style="width: 60px; height: 60px;">
                                                            <i class="bx bx-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <h6 class="mb-1">{{ $item->name }}</h6>
                                                        <p class="text-muted mb-0 small">{{ Str::limit($item->description, 50) }}</p>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-info">{{ $item->category }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <strong>Rp {{ number_format($item->price, 0, ',', '.') }}</strong>
                                                </td>
                                                <td class="text-center">
                                                    @if($item->is_active)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Non-aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.merchandise.show', $item->id) }}" 
                                                           class="btn btn-info btn-sm" title="Lihat">
                                                            <i class="bx bx-show"></i>
                                                        </a>
                                                        <a href="{{ route('admin.merchandise.edit', $item->id) }}" 
                                                           class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                                data-id="{{ $item->id }}" 
                                                                data-name="{{ $item->name }}"
                                                                title="Hapus">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <form id="delete-form-{{ $item->id }}" 
                                                          action="{{ route('admin.merchandise.destroy', $item->id) }}" 
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-4">
                                                    <div class="text-muted">
                                                        <i class="bx bx-package font-size-24 mb-2 d-block"></i>
                                                        Belum ada merchandise yang ditambahkan
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if($merchandise->hasPages())
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info">
                                                Menampilkan {{ $merchandise->firstItem() }} sampai {{ $merchandise->lastItem() }} 
                                                dari {{ $merchandise->total() }} entri
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate">
                                                {{ $merchandise->appends(request()->query())->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
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

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
// Event delegation untuk tombol delete
document.addEventListener('DOMContentLoaded', function() {
    // Delegasi event untuk tombol delete
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.delete-btn');
            const id = btn.getAttribute('data-id');
            const name = btn.getAttribute('data-name');
            
            confirmDelete(id, name);
        }
    });
});

function confirmDelete(id, name = '') {
    // Cek apakah SweetAlert2 tersedia
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Data merchandise "${name}" akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form
                const form = document.getElementById('delete-form-' + id);
                if (form) {
                    form.submit();
                } else {
                    console.error('Form dengan ID delete-form-' + id + ' tidak ditemukan');
                }
            }
        });
    } else {
        // Fallback ke confirm dialog standar
        if (confirm(`Apakah Anda yakin ingin menghapus merchandise "${name}"?`)) {
            const form = document.getElementById('delete-form-' + id);
            if (form) {
                form.submit();
            } else {
                console.error('Form dengan ID delete-form-' + id + ' tidak ditemukan');
            }
        }
    }
}

// Debug function untuk testing
function testDelete(id) {
    console.log('Testing delete for ID:', id);
    const form = document.getElementById('delete-form-' + id);
    console.log('Form found:', form);
    if (form) {
        console.log('Form action:', form.action);
        console.log('Form method:', form.method);
    }
}
</script>
    
    <!-- Scoped CSS to align table styling with Jadwal Latihan without changing HTML structure -->
    <style>
        /* Table header/row spacing and typography */
        .table thead th {
            border-bottom: 2px solid #dee2e6;
            padding: 12px 8px;
            font-weight: 600;
            font-size: 0.875rem;
            white-space: nowrap;
            background-color: #E1E2FF;
        }

        .table tbody td {
            padding: 12px 8px;
            vertical-align: middle;
        }

        /* Hover effect similar to jadwal table */
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Badges look & feel */
        .badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }

        /* Button group rounded ends */
        .btn-group .btn { border-radius: 0; }
        .btn-group .btn:first-child { border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem; }
        .btn-group .btn:last-child  { border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem; }

        /* Center align all table headers and cells */
        .table.text-center thead th,
        .table.text-center tbody td {
            text-align: center;
        }

        /* Truncate long text in Nama/Deskripsi and Kategori cells for cleaner look */
        .table tbody td:nth-child(3) h6 {
            max-width: 240px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.25rem;
            text-align: center; /* enforce center even if other CSS overrides */
        }
        .table tbody td:nth-child(3) p.small {
            display: inline-block;
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center; /* enforce center */
        }
        .table tbody td:nth-child(4) span.badge {
            max-width: 160px;
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Card enhancements to match jadwal */
        .card { box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border: 1px solid #dee2e6; }
        .card > .card-header { background-color: #696CFF; color: #fff; border-bottom: none; }
        .card > .card-header h4, .card > .card-header h5 { color: #fff; }

        /* Pagination styling (Bootstrap-like) */
        .pagination { margin-bottom: 0; }
        .page-link { color: #696CFF; padding: 0.5rem 0.75rem; }
        .page-item.active .page-link { background-color: #696CFF; border-color: #696CFF; }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive { font-size: 0.875rem; }
            .table thead th, .table tbody td { padding: 8px 4px; }
            .badge { font-size: 0.7rem; padding: 0.25em 0.5em; }
            .btn-group .btn { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
            .table tbody td:nth-child(3) h6 { max-width: 160px; }
            .table tbody td:nth-child(3) p.small { max-width: 200px; }
        }
    </style>
@endsection
