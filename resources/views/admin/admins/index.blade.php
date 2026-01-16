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
                        <span class="fw-bold text-primary fs-4 ms-2">List Admin</span>
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
                                <h4 class="card-title mb-0">Daftar Admin</h4>
                                <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus"></i> Tambah Admin
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
                                    <form method="GET" action="{{ route('admin.admins.index') }}" class="row g-3">
                                        <div class="col-md-10">
                                            <label for="search" class="form-label fw-semibold">
                                                <i class="bx bx-search me-1"></i>Pencarian
                                            </label>
                                            <input type="text"
                                                   name="search"
                                                   id="search"
                                                   class="form-control"
                                                   placeholder="Cari berdasarkan nama atau email..."
                                                   value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-transparent">Action</label>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-search me-1"></i>Cari
                                                </button>
                                                <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-secondary">
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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Bergabung Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration + ($admins->currentPage() - 1) * $admins->perPage() }}</td>
                                                <td>
                                                    <strong class="text-primary">{{ $admin->name }}</strong>
                                                </td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    <span class="badge bg-label-info">
                                                        {{ $admin->created_at->format('d M Y, H:i') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.admins.show', $admin->id) }}" class="btn btn-info btn-sm" title="Lihat">
                                                            <i class="bx bx-show"></i>
                                                        </a>
                                                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                                data-id="{{ $admin->id }}" 
                                                                data-name="{{ $admin->name }}"
                                                                title="Hapus">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                    <form id="delete-form-{{ $admin->id }}" 
                                                          action="{{ route('admin.admins.destroy', $admin->id) }}" 
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4">
                                                    <div class="text-muted">
                                                        <i class="bx bx-user-x font-size-24 mb-2 d-block"></i>
                                                        Tidak ada data admin ditemukan.
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                @if($admins->hasPages())
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info">
                                                Menampilkan {{ $admins->firstItem() }} sampai {{ $admins->lastItem() }}
                                                dari {{ $admins->total() }} entri
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate">
                                                {{ $admins->appends(request()->query())->links('pagination::bootstrap-4') }}
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
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-btn')) {
                e.preventDefault();
                const btn = e.target.closest('.delete-btn');
                const id = btn.getAttribute('data-id');
                const name = btn.getAttribute('data-name');
                
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Admin "${name}" akan dihapus permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        });
    });
    </script>

    <!-- Scoped CSS to align table styling -->
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

        /* Hover effect */
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Badges look & feel */
        .badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }

        /* Center align all table headers and cells */
        .table.text-center thead th,
        .table.text-center tbody td {
            text-align: center;
        }

        /* Card enhancements */
        .card { box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border: 1px solid #dee2e6; }
        .card > .card-header { background-color: #696CFF; color: #fff; border-bottom: none; }
        .card > .card-header h4, .card > .card-header h5 { color: #fff; }

        /* Pagination styling */
        .pagination { margin-bottom: 0; }
        .page-link { color: #696CFF; padding: 0.5rem 0.75rem; }
        .page-item.active .page-link { background-color: #696CFF; border-color: #696CFF; }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive { font-size: 0.875rem; }
            .table thead th, .table tbody td { padding: 8px 4px; }
            .badge { font-size: 0.7rem; padding: 0.25em 0.5em; }
        }
    </style>
@endsection