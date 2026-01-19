@extends('layouts.app')

@section('title', 'Berita & Acara - Future Football Educare')
@section('meta_description', 'Informasi terbaru tentang acara, event, dan pengumuman penting dari Future Football Educare. Pantau update pertemuan orang tua dan kegiatan akademi.')
@section('meta_keywords', 'berita mfp academy, acara sepak bola, event akademi, pengumuman, pertemuan orang tua, kegiatan sepak bola')

@section('content')
<div id="event" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Informasi Berita/Acara</h6>
            <h1 class="display-6 mb-4">Acara & Pengumuman Future Football Educare</h1>
            <p>Berikut adalah informasi acara terbaru di Future Football Educare. Pantau halaman ini untuk update pertemuan orang tua, event, dan pengumuman penting lainnya.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    @forelse($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-lg position-relative event-card wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                @if($event->image && file_exists(public_path($event->image)))
                                    <img src="{{ asset($event->image) }}" 
                                         class="card-img-top w-100 h-100" 
                                         alt="Gambar acara {{ $event->judul }} pada {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}" 
                                         style="object-fit: cover;"
                                         loading="lazy">
                                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.3));"></div>
                                @else
                                    <!-- Placeholder Image -->
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-gradient-placeholder">
                                        <div class="text-center text-white">
                                            <i class="fas fa-calendar-alt fa-4x mb-3 opacity-75"></i>
                                            <p class="mb-0 fw-semibold">Event Image</p>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(97,103,122,0.7), rgba(39,40,41,0.8));"></div>
                                @endif
                            </div>
                            <div class="card-header bg-primary text-white text-center rounded-top-3 border-0 py-3" style="{{ $event->image ? 'border-top-left-radius: 0 !important; border-top-right-radius: 0 !important;' : '' }}">
                                <div class="mb-2">
                                    <span class="badge {{ $event->kategori == 'berita' ? 'bg-info' : 'bg-danger' }} px-3 py-1">
                                        {{ ucfirst($event->kategori) }}
                                    </span>
                                </div>
                                <div class="fw-bold fs-5 mb-1">
                                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    <span class="d-block fs-6 fw-normal mt-1">({{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l') }})</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title text-primary fw-bold mb-2">{{ $event->judul }}</h5>
                                @if($event->lokasi)
                                <div class="mb-3 text-secondary small" role="contentinfo" aria-label="Lokasi acara">
                                    <i class="bx bx-map me-1" aria-hidden="true"></i> 
                                    <span class="fw-semibold">{{ $event->lokasi }}</span>
                                </div>
                                @endif
                                <p class="card-text flex-grow-1">
                                    @php
                                        $limit = 120;
                                        $desc = strip_tags($event->deskripsi);
                                        $isLong = strlen($desc) > $limit;
                                    @endphp
                                    <span class="event-desc-short">{{ $isLong ? Str::limit($desc, $limit) : $desc }}</span>
                                    @if($isLong)
                                        <a href="{{ route('event.show', $event->slug) }}" class="see-more-link text-primary small ms-1">Lihat selengkapnya</a>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 text-end py-3">
                                <a href="{{ route('event.show', $event->slug) }}" 
                                   class="btn btn-danger rounded-pill px-3 py-2 shadow-sm"
                                   aria-label="Baca selengkapnya tentang {{ $event->judul }}"
                                   title="Lihat detail acara {{ $event->judul }}">
                                    Lihat Berita/Acara
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center shadow-sm p-5" role="alert">
                            <i class="fas fa-info-circle fa-3x mb-3 text-info"></i>
                            <h5 class="alert-heading">Belum Ada Acara</h5>
                            <p class="mb-0">Saat ini belum ada acara atau pengumuman. Silakan kembali lagi nanti untuk update terbaru.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(method_exists($events, 'links') && $events->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div class="text-muted small">
                                Menampilkan <strong>{{ $events->firstItem() ?? 0 }}</strong> - <strong>{{ $events->lastItem() ?? 0 }}</strong> 
                                dari <strong>{{ $events->total() }}</strong> acara
                            </div>
                            <nav aria-label="Navigasi halaman acara">
                                {{ $events->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="events-loading" class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Memuat acara...</span>
        </div>
        <p class="mt-3 text-primary fw-semibold">Memuat acara...</p>
    </div>
</div>
<style>
.event-card {
    transition: transform 0.2s, box-shadow 0.2s;
    border-radius: 1.25rem;
    overflow: hidden;
}
.event-card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 0.5rem 2rem rgba(0,0,0,0.12);
}
.event-card .card-header {
    border-top-left-radius: 1.25rem !important;
    border-top-right-radius: 1.25rem !important;
    background: #61677A !important;
}
.event-card .card-footer {
    background: none;
}
.event-card .card-img-top {
    transition: transform 0.3s ease;
}
.event-card:hover .card-img-top {
    transform: scale(1.05);
}
/* Fix for cards with images */
.event-card .card-header.no-rounded-top {
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
}

/* Placeholder Image Gradient */
.bg-gradient-placeholder {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.95);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loading-spinner {
    text-align: center;
}

/* Pagination Styling */
.pagination {
    margin-bottom: 0;
}

.pagination .page-link {
    color: #61677A;
    border-color: #dee2e6;
    padding: 0.5rem 0.75rem;
}

.pagination .page-link:hover {
    background-color: #61677A;
    border-color: #61677A;
    color: #fff;
}

.pagination .page-item.active .page-link {
    background-color: #61677A;
    border-color: #61677A;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
}

/* Skeleton Loading Animation for Cards */
@keyframes shimmer {
    0% {
        background-position: -468px 0;
    }
    100% {
        background-position: 468px 0;
    }
}

.skeleton-card {
    animation: shimmer 1.5s infinite;
    background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
    background-size: 800px 104px;
    height: 400px;
    border-radius: 1.25rem;
}

/* Responsive Pagination */
@media (max-width: 576px) {
    .pagination {
        font-size: 0.875rem;
    }
    
    .pagination .page-link {
        padding: 0.375rem 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show loading overlay when pagination links are clicked
    const paginationLinks = document.querySelectorAll('.pagination a');
    const loadingOverlay = document.getElementById('events-loading');
    
    if (paginationLinks && loadingOverlay) {
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Only show loading if it's not disabled
                if (!this.parentElement.classList.contains('disabled')) {
                    loadingOverlay.style.display = 'flex';
                }
            });
        });
    }
    
    // Hide loading after page loads
    window.addEventListener('pageshow', function() {
        if (loadingOverlay) {
            loadingOverlay.style.display = 'none';
        }
    });
    
    // Lazy load images optimization
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }
});
</script>
@endsection
