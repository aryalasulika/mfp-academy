@extends('dashboard.layouts.main')

@section('title', 'Dashboard Peserta')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-3">Dashboard Peserta</h1>
            <p class="mb-4">Selamat datang di Dashboard Peserta MFP Academy, {{ Auth::user()->name }}!</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="mb-4">
                            <i class="fa fa-calendar-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Jadwal Latihan</h5>
                        <p class="mb-0">Lihat jadwal latihan yang akan datang dan pastikan Anda hadir tepat waktu.</p>
                        <a href="{{ route('jadwal.latihan') }}" class="btn btn-sm btn-primary rounded-pill mt-3">Lihat Jadwal</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="mb-4">
                            <i class="fa fa-trophy fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Kemajuan</h5>
                        <p class="mb-0">Lihat perkembangan kemampuan dan kehadiran Anda dalam setiap sesi latihan.</p>
                        <a href="#" class="btn btn-sm btn-primary rounded-pill mt-3 disabled">Segera Hadir</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative h-100">
                    <div class="service-text rounded p-5">
                        <div class="mb-4">
                            <i class="fa fa-bullhorn fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Pengumuman</h5>
                        <p class="mb-0">Dapatkan informasi terkini tentang acara dan pengumuman penting dari MFP Academy.</p>
                        <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary rounded-pill mt-3">Lihat Pengumuman</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activities Section -->
        <div class="wow fadeInUp mt-5" data-wow-delay="0.1s">
            <div class="bg-light rounded p-4 p-sm-5">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="mb-0"><i class="fa fa-history me-2 text-primary"></i> Aktivitas Terkini</h4>
                </div>
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <h6 class="mb-0">Akun berhasil dibuat</h6>
                        <small class="text-body ms-auto"><i class="fa fa-clock me-1"></i> Baru saja</small>
                    </div>
                </div>
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                            <i class="fa fa-user text-white"></i>
                        </div>
                        <h6 class="mb-0">Login pertama kali</h6>
                        <small class="text-body ms-auto"><i class="fa fa-clock me-1"></i> Hari ini</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
