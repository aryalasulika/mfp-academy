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
        <span class="fw-bold text-primary fs-4 ms-2">Dashboard Admin MFP Academy</span>
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
                            <h2 class="mb-4">Daftar Pesan Masuk</h2>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $msg)
                                <tr @if(!$msg->is_read) style="background-color: #eaf6ff;" @endif>
                                    <td>{{ $msg->nama }}</td>
                                    <td>{{ $msg->email }}</td>
                                    <td>{{ $msg->subjek }}</td>
                                    <td>{{ $msg->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.contact_messages.show', $msg->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <form action="{{ route('admin.contact_messages.destroy', $msg->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pesan ini?')">Hapus</button>
                                        </form>
                                        @if(!$msg->is_read)
                                            <span class="badge bg-danger ms-1">Baru</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Belum ada pesan masuk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $messages->links() }}
                    </div>
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
@endsection
