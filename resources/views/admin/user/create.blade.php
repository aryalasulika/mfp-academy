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
        <h2>Tambah User</h2>
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" name="nomor_hp" id="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" value="{{ old('nomor_hp') }}">
                @error('nomor_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required onchange="toggleRoleFields()">
                    <option value="">Pilih Role</option>
                    <option value="peserta" {{ old('role') == 'peserta' ? 'selected' : '' }}>Peserta</option>
                    <option value="coach" {{ old('role') == 'coach' ? 'selected' : '' }}>Coach</option>
                </select>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            <!-- Fields untuk Peserta -->
            <div id="peserta-fields" style="display: none;">
                <div class="mb-3">
                    <label for="kelompok_usia" class="form-label">Kelompok Usia</label>
                    <select name="kelompok_usia" id="kelompok_usia" class="form-control @error('kelompok_usia') is-invalid @enderror">
                        <option value="">Pilih Kelompok Usia</option>
                        <option value="U-10" {{ old('kelompok_usia') == 'U-10' ? 'selected' : '' }}>U-10</option>
                        <option value="U-12" {{ old('kelompok_usia') == 'U-12' ? 'selected' : '' }}>U-12</option>
                        <option value="U-13" {{ old('kelompok_usia') == 'U-13' ? 'selected' : '' }}>U-13</option>
                    </select>
                    @error('kelompok_usia')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <select name="posisi" id="posisi" class="form-control @error('posisi') is-invalid @enderror">
                        <option value="">Pilih Posisi</option>
                        <option value="Kiper" {{ old('posisi') == 'Kiper' ? 'selected' : '' }}>Kiper</option>
                        <option value="Bek" {{ old('posisi') == 'Bek' ? 'selected' : '' }}>Bek</option>
                        <option value="Gelandang" {{ old('posisi') == 'Gelandang' ? 'selected' : '' }}>Gelandang</option>
                        <option value="Penyerang" {{ old('posisi') == 'Penyerang' ? 'selected' : '' }}>Penyerang</option>
                    </select>
                    @error('posisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            
            <!-- Fields untuk Coach -->
            <div id="coach-fields" style="display: none;">
                <div class="mb-3">
                    <label for="kelompok_usia_asuhan" class="form-label">Kelompok Usia Asuhan</label>
                    <select name="kelompok_usia_asuhan" id="kelompok_usia_asuhan" class="form-control @error('kelompok_usia_asuhan') is-invalid @enderror">
                        <option value="">Pilih Kelompok Usia Asuhan</option>
                        <option value="U-10" {{ old('kelompok_usia_asuhan') == 'U-10' ? 'selected' : '' }}>U-10</option>
                        <option value="U-12" {{ old('kelompok_usia_asuhan') == 'U-12' ? 'selected' : '' }}>U-12</option>
                        <option value="U-13" {{ old('kelompok_usia_asuhan') == 'U-13' ? 'selected' : '' }}>U-13</option>
                    </select>
                    @error('kelompok_usia_asuhan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            
            <!-- Upload Foto Profil (untuk semua role) -->
            <div class="mb-3">
                <label for="foto_profil" class="form-label">Foto Profil</label>
                <input type="file" name="foto_profil" id="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror" accept="image/*">
                <small class="text-muted">File harus berupa gambar (JPG, JPEG, PNG, GIF). Maksimal 2MB.</small>
                @error('foto_profil')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
        
        <script>
        function toggleRoleFields() {
            const role = document.getElementById('role').value;
            const pesertaFields = document.getElementById('peserta-fields');
            const coachFields = document.getElementById('coach-fields');
            
            if (role === 'peserta') {
                pesertaFields.style.display = 'block';
                coachFields.style.display = 'none';
            } else if (role === 'coach') {
                pesertaFields.style.display = 'none';
                coachFields.style.display = 'block';
            } else {
                pesertaFields.style.display = 'none';
                coachFields.style.display = 'none';
            }
        }
        
        // Load fields on page load if role is already selected
        document.addEventListener('DOMContentLoaded', function() {
            toggleRoleFields();
        });
        </script>
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
