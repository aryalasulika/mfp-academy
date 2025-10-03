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
                        <span class="fw-bold text-primary fs-4 ms-2">Tambah Merchandise</span>
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
                            <div class="card-header">
                                <h4 class="card-title mb-0">Form Tambah Merchandise</h4>
                            </div>
                        </div>

                        <!-- Main Form Card -->
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.merchandise.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                       id="name" name="name" value="{{ old('name') }}" 
                                                       placeholder="Masukkan nama produk">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                                          id="description" name="description" rows="4" 
                                                          placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                                   id="price" name="price" value="{{ old('price') }}" 
                                                                   placeholder="0" min="0">
                                                            @error('price')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                                        <select class="form-select @error('category') is-invalid @enderror" 
                                                                id="category" name="category">
                                                            <option value="">Pilih Kategori</option>
                                                            @foreach($categories as $key => $value)
                                                                <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                                           name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_active">
                                                        Aktifkan produk
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                       id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal: 2MB</small>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Preview Gambar</label>
                                                <div class="border rounded p-2 text-center" style="min-height: 200px;">
                                                    <img id="image-preview" src="#" alt="Preview" 
                                                         style="max-width: 100%; max-height: 200px; display: none;" 
                                                         class="rounded">
                                                    <div id="no-image" class="d-flex align-items-center justify-content-center h-100">
                                                        <div class="text-muted">
                                                            <i class="bx bx-image font-size-24 mb-2 d-block"></i>
                                                            Belum ada gambar
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('admin.merchandise.index') }}" class="btn btn-secondary">
                                                    <i class="bx bx-arrow-back"></i> Kembali
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-save"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('image-preview');
    const noImage = document.getElementById('no-image');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            noImage.style.display = 'none';
        }
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
        noImage.style.display = 'flex';
    }
}
</script>
@endsection
