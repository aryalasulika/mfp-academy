@extends('layouts.admin')
@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
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
                    <span class="fw-bold text-primary fs-4 ms-2">Pesan Masuk</span>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center gap-2" href="#"
                                data-bs-toggle="dropdown">
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
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                        <h4 class="fw-bold mb-0">Daftar Pesan Masuk</h4>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2 mb-md-0">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="avatar bg-label-primary rounded-circle p-2">
                                        <i class="bx bx-envelope fs-3 text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold fs-5">{{ $messages->total() }}</div>
                                        <div class="text-muted small">Total Pesan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="avatar bg-label-danger rounded-circle p-2">
                                        <i class="bx bx-envelope-open fs-3 text-danger"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold fs-5">
                                            {{ $messages->where('is_read', false)->count() }}
                                        </div>
                                        <div class="text-muted small">Belum Dibaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="avatar bg-label-success rounded-circle p-2">
                                        <i class="bx bx-check fs-3 text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold fs-5">
                                            {{ $messages->where('is_read', true)->count() }}
                                        </div>
                                        <div class="text-muted small">Sudah Dibaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter & Search Card -->
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-header d-flex align-items-center" style="background-color: #f6f6fb;">
                            <h5 class="card-title mb-0 text-primary"><i class="bx bx-filter-alt me-2"></i>Filter & Pencarian Pesan</h5>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="" class="row g-2 align-items-center">
                                <div class="col-md-5">
                                    <input type="text" name="q" class="form-control" placeholder="Cari nama, email, subjek..." value="{{ request('q') }}">
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="form-select">
                                        <option value="">Semua Status</option>
                                        <option value="unread" {{ request('status')==='unread' ? 'selected' : '' }}>Belum Dibaca</option>
                                        <option value="read" {{ request('status')==='read' ? 'selected' : '' }}>Sudah Dibaca</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary w-100"><i class="bx bx-search"></i> Filter</button>
                                    @if(request('q') || request('status'))
                                        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bx bx-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Statistics Cards (DUPLICATE, REMOVED) -->

                    <!-- Data Table Card -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #696CFF; color: white;">
                            <h5 class="card-title mb-0" style="color: white;">
                                <i class="bx bx-envelope me-2"></i>Pesan dari Pengunjung
                            </h5>
                            <div class="text-white small">
                                Total: {{ $messages->total() }} pesan
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>SUBJEK</th>
                                        <th>TANGGAL</th>
                                        <th>STATUS</th>
                                        <th class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse($messages as $msg)
                                        <tr class="{{ !$msg->is_read ? 'table-info' : '' }}">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm me-2">
                                                        <div class="avatar-initial rounded-circle bg-label-primary">
                                                            <i class="bx bx-user"></i>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold">{{ $msg->nama }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ $msg->email }}</span>
                                            </td>
                                            <td>
                                                <span title="{{ $msg->subjek }}">{{ Str::limit($msg->subjek, 30) }}</span>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $msg->created_at->format('d M Y, H:i') }}</small>
                                            </td>
                                            <td>
                                                @if ($msg->is_read)
                                                    <span class="badge bg-label-success">
                                                        <i class="bx bx-check me-1"></i>Sudah Dibaca
                                                    </span>
                                                @else
                                                    <span class="badge bg-label-danger">
                                                        <i class="bx bx-envelope me-1"></i>Belum Dibaca
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.contact_messages.show', $msg->id) }}"
                                                        class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                                        <i class="bx bx-show"></i>
                                                    </a>
                                                    @if(!$msg->is_read)
                                                    <form action="{{ route('admin.contact_messages.markAsRead', $msg->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Tandai Sudah Dibaca">
                                                            <i class="bx bx-check-double"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                    <form action="{{ route('admin.contact_messages.destroy', $msg->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            title="Hapus">
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
                                                    <i class="bx bx-envelope display-4 text-muted mb-3"></i>
                                                    <h5 class="text-muted">Belum Ada Pesan Masuk</h5>
                                                    <p class="text-muted mb-3">Pesan dari pengunjung akan muncul di sini.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if ($messages->hasPages())
                            <div class="card-footer bg-white">
                                <small class="text-muted d-block mb-2">
                                    Menampilkan {{ $messages->firstItem() ?? 0 }} - {{ $messages->lastItem() ?? 0 }} dari {{ $messages->total() }} pesan
                                </small>
                                {!! $messages->links('pagination::bootstrap-4') !!}
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
@endsection
