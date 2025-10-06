@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="container-xxl py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('event.index') }}" class="text-primary">Berita/Acara</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($event->judul, 50) }}</li>
            </ol>
        </nav>
    </div>
</div>

<div id="event-detail" class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    @if($event->image)
                    <div class="position-relative hero-image">
                        <img src="{{ asset($event->image) }}" class="card-img-top w-100" alt="{{ $event->judul }}" 
                             style="height: 400px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 hero-overlay"></div>
                        
                        <!-- Hero Content -->
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 p-md-4 text-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="hero-title fw-bold mb-2 mb-md-3 text-white text-shadow">{{ $event->judul }}</h1>
                                        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-calendar me-2 fs-6 fs-md-5"></i>
                                                <span class="hero-meta-text">{{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d F Y') }}</span>
                                            </div>
                                            @if($event->lokasi)
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-map me-2 fs-6 fs-md-5"></i>
                                                <span class="hero-meta-text">{{ $event->lokasi }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- Fallback Header without Image -->
                    <div class="card-header text-white text-center border-0 py-4 py-md-5" style="background: linear-gradient(135deg, #61677A 0%, #4a5568 100%);">
                        <div class="container-fluid px-3 px-md-4">
                            <h1 class="hero-title fw-bold mb-2 mb-md-3">{{ $event->judul }}</h1>
                            <div class="d-flex justify-content-center flex-wrap gap-2 gap-md-3">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-calendar me-2 fs-6 fs-md-5"></i>
                                    <span class="hero-meta-text">{{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d F Y') }}</span>
                                </div>
                                @if($event->lokasi)
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-map me-2 fs-6 fs-md-5"></i>
                                    <span class="hero-meta-text">{{ $event->lokasi }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Event Meta Information -->
                    <div class="card-body p-0">
                        <div class="bg-light border-bottom p-4">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle p-3 me-3">
                                            <i class="bx bx-calendar-event text-white fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-primary">Tanggal Acara</h6>
                                            <p class="mb-0 fw-semibold">{{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d F Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($event->lokasi)
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle p-3 me-3">
                                            <i class="bx bx-map-pin text-white fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-success">Lokasi</h6>
                                            <p class="mb-0 fw-semibold">{{ $event->lokasi }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Event Description -->
                        <div class="p-4 p-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="mb-4 text-primary border-bottom pb-2">Deskripsi Acara</h3>
                                    <div class="event-description fs-6 lh-lg text-justify">
                                        {!! nl2br(e($event->deskripsi)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Share & Actions -->
                        <div class="bg-light p-4 border-top">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <h6 class="mb-2">Bagikan Acara Ini:</h6>
                                    <div class="d-flex gap-2">
                                        <a href="https://wa.me/?text=Lihat acara ini: {{ $event->judul }} - {{ url()->current() }}" 
                                           target="_blank" class="btn btn-success btn-sm rounded-pill">
                                            <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                        </a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                                           target="_blank" class="btn btn-primary btn-sm rounded-pill">
                                            <i class="fab fa-facebook-f me-1"></i> Facebook
                                        </a>
                                        <button onclick="copyToClipboard()" class="btn btn-outline-secondary btn-sm rounded-pill">
                                            <i class="bx bx-copy me-1"></i> Copy Link
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <span class="badge bg-danger bg-gradient px-3 py-2 fs-6 me-3">MFP Academy</span>
                                    <a href="{{ route('event.index') }}" class="btn btn-outline-primary rounded-pill">
                                        <i class="bx bx-arrow-back me-1"></i> Kembali ke Daftar Acara
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Events -->
                @php
                    $relatedEvents = \App\Models\Event::where('id', '!=', $event->id)
                                                      ->where('tanggal', '>=', now())
                                                      ->orderBy('tanggal', 'asc')
                                                      ->limit(3)
                                                      ->get();
                @endphp
                
                @if($relatedEvents->count() > 0)
                <div class="mt-5">
                    <h4 class="mb-4 text-center">Acara Lainnya</h4>
                    <div class="row g-4">
                        @foreach($relatedEvents as $relatedEvent)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                @if($relatedEvent->image)
                                <img src="{{ asset($relatedEvent->image) }}" class="card-img-top" 
                                     alt="{{ $relatedEvent->judul }}" style="height: 150px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title text-primary">{{ Str::limit($relatedEvent->judul, 50) }}</h6>
                                    <p class="card-text small text-muted mb-2">
                                        <i class="bx bx-calendar me-1"></i>
                                        {{ \Carbon\Carbon::parse($relatedEvent->tanggal)->format('d M Y') }}
                                    </p>
                                    <p class="card-text">{{ Str::limit(strip_tags($relatedEvent->deskripsi), 80) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <a href="{{ route('event.show', $relatedEvent->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.hero-image {
    overflow: hidden;
}

.hero-image img {
    transition: transform 0.3s ease;
}

.hero-image:hover img {
    transform: scale(1.02);
}

.hero-overlay {
    background: linear-gradient(to bottom, 
                                rgba(0,0,0,0.1) 0%, 
                                rgba(0,0,0,0.3) 50%, 
                                rgba(0,0,0,0.7) 100%);
}

.text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.hero-title {
    font-size: 1.5rem;
    line-height: 1.3;
    word-wrap: break-word;
    overflow-wrap: break-word;
    hyphens: auto;
}

.hero-meta-text {
    font-size: 0.85rem;
}

.event-description {
    text-align: justify;
    line-height: 1.8;
}

.event-description p {
    margin-bottom: 1rem;
}

/* Mobile First Approach */
@media (min-width: 576px) {
    .hero-title {
        font-size: 1.75rem;
        line-height: 1.4;
    }
    
    .hero-meta-text {
        font-size: 0.9rem;
    }
}

@media (min-width: 768px) {
    .hero-title {
        font-size: 2.25rem;
        line-height: 1.2;
    }
    
    .hero-meta-text {
        font-size: 1rem;
    }
    
    .hero-image img {
        height: 350px !important;
    }
}

@media (min-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-image img {
        height: 400px !important;
    }
}

@media (max-width: 575px) {
    .hero-image img {
        height: 200px !important;
    }
    
    .p-4 {
        padding: 1rem !important;
    }
    
    .p-md-5 {
        padding: 1.5rem !important;
    }
    
    .container-xxl {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    
    .card {
        margin: 0 0.5rem;
    }
    
    .breadcrumb {
        font-size: 0.85rem;
    }
    
    .btn {
        font-size: 0.85rem;
        padding: 0.375rem 0.75rem;
    }
    
    h3 {
        font-size: 1.25rem;
    }
    
    h4 {
        font-size: 1.1rem;
    }
    
    h6 {
        font-size: 0.95rem;
    }
}

@media (min-width: 576px) and (max-width: 767px) {
    .hero-image img {
        height: 250px !important;
    }
    
    .p-4 {
        padding: 1.25rem !important;
    }
    
    .p-md-5 {
        padding: 1.75rem !important;
    }
}

.btn-social {
    transition: transform 0.2s ease;
}

.btn-social:hover {
    transform: translateY(-2px);
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
}

/* Better text readability on mobile */
@media (max-width: 575px) {
    .event-description {
        font-size: 0.9rem;
        line-height: 1.6;
        text-align: left;
    }
    
    .bg-light .row {
        margin: 0;
    }
    
    .bg-light .col-md-6 {
        padding: 0.5rem;
    }
    
    .d-flex.align-items-center {
        flex-wrap: wrap;
    }
    
    .bg-primary.rounded-circle,
    .bg-success.rounded-circle {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .bg-primary.rounded-circle i,
    .bg-success.rounded-circle i {
        font-size: 1.1rem;
    }
}
</style>

<!-- Custom JavaScript -->
<script>
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        // Show success message
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="bx bx-check me-1"></i> Disalin!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2000);
    });
}

// Smooth scroll for related events
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endsection
