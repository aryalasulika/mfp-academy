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
       <h2>Edit Jadwal Latihan</h2>
    <form action="{{ route('admin.jadwal_latihan.update', $jadwal->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hari" class="form-label">Hari <span class="text-danger">*</span></label>
            <input type="text" name="hari" id="hari" class="form-control @error('hari') is-invalid @enderror" value="{{ old('hari', $jadwal->hari) }}" required readonly>
            @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="jam_in" class="form-label">Jam Masuk <span class="text-danger">*</span></label>
            <input type="time" name="jam_in" id="jam_in" class="form-control @error('jam_in') is-invalid @enderror" value="{{ old('jam_in', $jadwal->jam_in) }}" required>
            @error('jam_in')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="jam_out" class="form-label">Jam Keluar <span class="text-danger">*</span></label>
            <input type="time" name="jam_out" id="jam_out" class="form-control @error('jam_out') is-invalid @enderror" value="{{ old('jam_out', $jadwal->jam_out) }}" required>
            @error('jam_out')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="kelompok_usia" class="form-label">Kelompok Usia <span class="text-danger">*</span></label>
            <input type="text" name="kelompok_usia" id="kelompok_usia" class="form-control @error('kelompok_usia') is-invalid @enderror" value="{{ old('kelompok_usia', $jadwal->kelompok_usia) }}" required>
            <div class="mt-2">
                <small class="text-muted">Pilihan cepat:</small>
                <div class="btn-group btn-group-sm mt-1" role="group">
                    <button type="button" class="btn btn-outline-primary kelompok-btn" data-value="U-10">U-10</button>
                    <button type="button" class="btn btn-outline-primary kelompok-btn" data-value="U-12">U-12</button>
                    <button type="button" class="btn btn-outline-primary kelompok-btn" data-value="U-13">U-13</button>
                </div>
            </div>
            @error('kelompok_usia')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="jenis_latihan" class="form-label">Jenis Latihan <span class="text-danger">*</span></label>
            <input type="text" name="jenis_latihan" id="jenis_latihan" class="form-control @error('jenis_latihan') is-invalid @enderror" value="{{ old('jenis_latihan', $jadwal->jenis_latihan) }}" required placeholder="Contoh: Teknik Dasar">
            @error('jenis_latihan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
            <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $jadwal->lokasi) }}" required>
            @error('lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $jadwal->tanggal) }}" required min="{{ date('Y-m-d') }}">
            @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jadwal_latihan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('tanggal');
        const hariInput = document.getElementById('hari');
        const kelompokUsiaInput = document.getElementById('kelompok_usia');
        const kelompokButtons = document.querySelectorAll('.kelompok-btn');
        
        // Handle tanggal change
        tanggalInput.addEventListener('change', function() {
            const date = new Date(this.value);
            if (!isNaN(date.getTime())) {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                hariInput.value = days[date.getDay()];
            } else {
                hariInput.value = '';
            }
        });
        
        // Handle kelompok usia quick selection
        kelompokButtons.forEach(button => {
            button.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                kelompokUsiaInput.value = value;
                
                // Remove active class from all buttons
                kelompokButtons.forEach(btn => {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-outline-primary');
                });
                
                // Add active class to clicked button
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-primary');
            });
        });
        
        // Trigger on page load if value exists
        if (tanggalInput.value) {
            const date = new Date(tanggalInput.value);
            if (!isNaN(date.getTime())) {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                hariInput.value = days[date.getDay()];
            }
        }
        
        // Check if kelompok usia value matches any button on page load
        if (kelompokUsiaInput.value) {
            kelompokButtons.forEach(button => {
                if (button.getAttribute('data-value') === kelompokUsiaInput.value) {
                    button.classList.remove('btn-outline-primary');
                    button.classList.add('btn-primary');
                }
            });
        }
    });
    </script>
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

