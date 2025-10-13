@extends('layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tim {{ $kelompok_usia }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Tim {{ $kelompok_usia }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Tim Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Tim Kami</h6>
            <h1 class="mb-4">Tim {{ $kelompok_usia }} MFP Academy</h1>
        </div>

        <!-- Pelatih Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="mb-4 text-center">
                    <i class="fa fa-user-tie text-primary me-2"></i>Pelatih
                </h3>
                @if($pelatih)
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item text-center rounded overflow-hidden">
                                <div class="rounded-circle overflow-hidden m-4">
                                    @if($pelatih->foto_profil)
                                        <img class="img-fluid" src="{{ asset('storage/' . $pelatih->foto_profil) }}" 
                                             alt="{{ $pelatih->name }}" style="width: 200px; height: 200px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary d-flex align-items-center justify-content-center" 
                                             style="width: 200px; height: 200px;">
                                            <i class="fa fa-user fa-4x text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <h5 class="mb-0">{{ $pelatih->name }}</h5>
                                <small class="text-primary">Pelatih Tim {{ $kelompok_usia }}</small>
                                @if($pelatih->alamat)
                                    <p class="mt-2"><i class="fa fa-map-marker-alt text-primary me-1"></i>{{ $pelatih->alamat }}</p>
                                @endif
                                @if($pelatih->nomor_hp)
                                    <p><i class="fa fa-phone text-primary me-1"></i>{{ $pelatih->nomor_hp }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fa fa-user-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Pelatih untuk Tim {{ $kelompok_usia }} belum ditentukan</h5>
                        <p class="text-muted">Silakan hubungi admin untuk informasi lebih lanjut.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pemain Section -->
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4 text-center">
                    <i class="fa fa-users text-primary me-2"></i>Pemain
                </h3>
                @forelse($pemain as $index => $player)
                    <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                        <div class="team-item text-center rounded overflow-hidden h-100">
                            <div class="rounded-circle overflow-hidden m-3 mx-auto" style="width: 120px; height: 120px;">
                                @if($player->foto_profil)
                                    <img class="img-fluid" src="{{ asset('storage/' . $player->foto_profil) }}" 
                                         alt="{{ $player->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary d-flex align-items-center justify-content-center h-100">
                                        <i class="fa fa-user fa-2x text-white"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-3">
                                <h6 class="mb-1">{{ $player->name }}</h6>
                                @if($player->posisi)
                                    <small class="text-primary fw-bold">{{ $player->posisi }}</small>
                                @else
                                    <small class="text-muted">Posisi belum ditentukan</small>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fa fa-user-plus fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada pemain di Tim {{ $kelompok_usia }}</h5>
                        <p class="text-muted">Pemain akan ditampilkan di sini setelah pendaftaran.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Tim End -->

<style>
.team-item {
    background: #fff;
    box-shadow: 0 0 45px rgba(0, 0, 0, 0.08);
    transition: all 0.3s;
}

.team-item:hover {
    box-shadow: 0 0 45px rgba(0, 0, 0, 0.15);
    transform: translateY(-5px);
}

.page-header {
    background: linear-gradient(rgba(6, 3, 21, 0.5), rgba(6, 3, 21, 0.5)), 
                url('{{ asset("template/img/mfp/slide1.jpg") }}') center center no-repeat;
    background-size: cover;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #fff;
}
</style>
@endsection