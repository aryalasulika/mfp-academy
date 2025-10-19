@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light py-5" style="min-height: 80vh;">
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 text-center">
                <div class="error-content">
                    <!-- Error Icon/Image -->
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 120px; color: #FFC107;"></i>
                    </div>
                    
                    <!-- Error Code -->
                    <h1 class="display-1 fw-bold text-primary mb-3">404</h1>
                    
                    <!-- Error Message -->
                    <h2 class="fw-bold mb-3">Halaman Tidak Ditemukan</h2>
                    <p class="lead text-muted mb-4">
                        Maaf, halaman yang Anda cari tidak dapat ditemukan atau mungkin telah dipindahkan.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </a>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary btn-lg px-4">
                            <i class="fas fa-arrow-left me-2"></i>Halaman Sebelumnya
                        </a>
                    </div>
                    
                    <!-- Search Suggestion -->
                    <div class="mt-5">
                        <p class="text-muted mb-3">Atau coba navigasi ke halaman berikut:</p>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="{{ route('tentang-kami') }}" class="btn btn-sm btn-outline-primary">Tentang Kami</a>
                            <a href="{{ route('event.index') }}" class="btn btn-sm btn-outline-primary">Event</a>
                            <a href="{{ route('merchandise.index') }}" class="btn btn-sm btn-outline-primary">Merchandise</a>
                            <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-outline-primary">Galeri</a>
                            <a href="{{ url('/contact') }}" class="btn btn-sm btn-outline-primary">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Optional Illustration Column -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 400" style="max-width: 100%; height: auto;">
                        <!-- Simple 404 Illustration -->
                        <circle cx="250" cy="200" r="150" fill="#f8f9fa" stroke="#dee2e6" stroke-width="2"/>
                        <text x="250" y="220" font-family="Arial, sans-serif" font-size="80" font-weight="bold" fill="#6c757d" text-anchor="middle">404</text>
                        <path d="M 180 280 Q 250 320 320 280" stroke="#6c757d" stroke-width="3" fill="none" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Help Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-2">
                                    <i class="fas fa-question-circle text-primary me-2"></i>Butuh Bantuan?
                                </h5>
                                <p class="text-muted mb-md-0">
                                    Jika Anda mengalami kesulitan atau memiliki pertanyaan, jangan ragu untuk menghubungi kami.
                                </p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <a href="{{ url('/contact') }}" class="btn btn-primary">
                                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error-content {
        animation: fadeInUp 0.6s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
    }
</style>
@endsection
