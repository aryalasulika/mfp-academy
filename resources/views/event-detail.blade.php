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
                <!-- News Header Style -->
                <div class="mb-4">
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <span class="badge bg-danger bg-gradient px-3 py-2 fs-6 rounded-pill">
                            <i class="bx bx-calendar-event me-1"></i> Berita & Acara
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="news-title fw-bold mb-3 text-dark lh-base">{{ $event->judul }}</h1>
                    
                    <!-- Meta Information -->
                    <div class="news-meta d-flex flex-wrap align-items-center gap-3 mb-4 pb-3 border-bottom">
                        <div class="d-flex align-items-center text-muted">
                            <i class="bx bx-calendar me-2"></i>
                            <span>{{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d F Y') }}</span>
                        </div>
                        @if($event->lokasi)
                        <div class="d-flex align-items-center text-muted">
                            <i class="bx bx-map-pin me-2"></i>
                            <span>{{ $event->lokasi }}</span>
                        </div>
                        @endif
                        <div class="d-flex align-items-center text-muted">
                            <i class="bx bx-user me-2"></i>
                            {{-- <span>Future Football Educare</span> --}}
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($event->image)
                <div class="news-image mb-4">
                    <img src="{{ asset($event->image) }}" 
                         class="img-fluid w-100 rounded-3 shadow-sm" 
                         alt="{{ $event->judul }}"
                         style="max-height: 500px; object-fit: cover;">
                    <div class="image-caption mt-2 text-muted small text-center fst-italic">
                        Ilustrasi: {{ $event->judul }}
                    </div>
                </div>
                @endif

                <!-- Article Content -->
                <article class="news-content">
                    <!-- Lead Paragraph -->
                    <div class="lead-paragraph mb-4">
                        <p class="lead text-dark lh-lg">
                            {{ \Illuminate\Support\Str::limit(strip_tags($event->deskripsi), 200) }}
                        </p>
                    </div>

                    <!-- Full Content -->
                    <div class="article-body">
                        <div class="content-text fs-6 lh-lg text-dark">
                            {!! nl2br(e($event->deskripsi)) !!}
                        </div>
                    </div>

                    <!-- Event Details Box -->
                    <div class="event-details-box bg-light rounded-3 p-4 my-4">
                        <h5 class="mb-3 text-primary">
                            <i class="bx bx-info-circle me-2"></i>Detail Acara
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label text-muted small">Tanggal</div>
                                    <div class="detail-value fw-semibold">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                                    </div>
                                </div>
                            </div>
                            @if($event->lokasi)
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label text-muted small">Lokasi</div>
                                    <div class="detail-value fw-semibold">{{ $event->lokasi }}</div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label text-muted small">Penyelenggara</div>
                                    <div class="detail-value fw-semibold">Future Football Educare</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label text-muted small">Kategori</div>
                                    <div class="detail-value fw-semibold">Berita & Acara</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Share Section -->
                    <div class="social-share-section bg-white border rounded-3 p-4 my-4">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <h6 class="mb-2">
                                    <i class="bx bx-share-alt me-2 text-primary"></i>Bagikan Artikel Ini:
                                </h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="https://wa.me/?text=Baca berita ini: {{ $event->judul }} - {{ url()->current() }}" 
                                       target="_blank" class="btn btn-success btn-sm">
                                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                                       target="_blank" class="btn btn-primary btn-sm">
                                        <i class="fab fa-facebook-f me-1"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $event->judul }}" 
                                       target="_blank" class="btn btn-info btn-sm">
                                        <i class="fab fa-twitter me-1"></i> Twitter
                                    </a>
                                    <button onclick="copyToClipboard()" class="btn btn-outline-secondary btn-sm">
                                        <i class="bx bx-copy me-1"></i> Copy Link
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="{{ route('event.index') }}" class="btn btn-outline-primary">
                                    <i class="bx bx-arrow-back me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Related News/Events -->
                @php
                    $relatedEvents = \App\Models\Event::where('id', '!=', $event->id)
                                                      ->where('tanggal', '>=', now())
                                                      ->orderBy('tanggal', 'asc')
                                                      ->limit(3)
                                                      ->get();
                @endphp
                
                @if($relatedEvents->count() > 0)
                <div class="related-news mt-5">
                    <div class="section-header mb-4">
                        <h4 class="mb-2">
                            <i class="bx bx-news me-2 text-primary"></i>Berita Terkait
                        </h4>
                        <div class="section-divider bg-primary" style="height: 3px; width: 60px;"></div>
                    </div>
                    
                    <div class="row g-4">
                        @foreach($relatedEvents as $relatedEvent)
                        <div class="col-lg-4 col-md-6">
                            <article class="news-card h-100">
                                <div class="card border-0 shadow-sm h-100">
                                    @if($relatedEvent->image)
                                    <div class="news-card-image">
                                        <img src="{{ asset($relatedEvent->image) }}" 
                                             class="card-img-top" 
                                             alt="{{ $relatedEvent->judul }}" 
                                             style="height: 180px; object-fit: cover;">
                                        <div class="news-category-badge">
                                            <span class="badge bg-danger">Berita</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="card-body d-flex flex-column">
                                        <div class="news-meta-small mb-2">
                                            <small class="text-muted">
                                                <i class="bx bx-calendar me-1"></i>
                                                {{ \Carbon\Carbon::parse($relatedEvent->tanggal)->format('d M Y') }}
                                            </small>
                                        </div>
                                        
                                        <h6 class="news-card-title mb-2">
                                            <a href="{{ route('event.show', $relatedEvent->slug) }}" 
                                               class="text-decoration-none text-dark stretched-link">
                                                {{ $relatedEvent->judul }}
                                            </a>
                                        </h6>
                                        
                                        <p class="news-card-excerpt text-muted small flex-grow-1">
                                            {{ Str::limit(strip_tags($relatedEvent->deskripsi), 100) }}
                                        </p>
                                        
                                        <div class="news-card-footer mt-auto pt-2">
                                            <small class="text-primary">Baca selengkapnya →</small>
                                        </div>
                                    </div>
                                </div>
                            </article>
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
/* News Layout Styling - Modern News Website Style */
.news-title {
    font-size: 1.75rem;
    line-height: 1.3;
    color: #1a1a1a;
    margin-bottom: 1rem;
}

.news-meta {
    font-size: 0.9rem;
    border-bottom: 1px solid #e9ecef;
}

.news-meta i {
    color: #6c757d;
}

.news-image {
    position: relative;
}

.image-caption {
    font-size: 0.8rem;
    color: #6c757d;
}

.lead-paragraph {
    border-left: 4px solid #dc3545;
    padding-left: 1rem;
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.375rem;
}

.content-text {
    line-height: 1.8;
    color: #333;
}

.content-text p {
    margin-bottom: 1.2rem;
}

.event-details-box {
    border: 1px solid #e9ecef;
}

.detail-item {
    margin-bottom: 0.5rem;
}

.detail-label {
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.detail-value {
    color: #333;
}

.social-share-section {
    border: 1px solid #e9ecef;
}

.news-card {
    transition: transform 0.2s ease;
}

.news-card:hover {
    transform: translateY(-2px);
}

.news-card-image {
    position: relative;
    overflow: hidden;
}

.news-category-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
}

.news-card-title a:hover {
    color: #dc3545 !important;
}

.section-divider {
    border-radius: 2px;
}

/* Responsive Design */
@media (min-width: 576px) {
    .news-title {
        font-size: 2rem;
    }
}

@media (min-width: 768px) {
    .news-title {
        font-size: 2.25rem;
        line-height: 1.2;
    }
    
    .news-meta {
        font-size: 1rem;
    }
}

@media (min-width: 992px) {
    .news-title {
        font-size: 2.5rem;
    }
}

/* Mobile Optimization */
@media (max-width: 575px) {
    .news-title {
        font-size: 1.5rem;
        line-height: 1.4;
    }
    
    .news-meta {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .news-meta > div {
        margin-bottom: 0.5rem;
    }
    
    .container-xxl {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .lead-paragraph {
        padding: 0.75rem;
    }
    
    .event-details-box {
        padding: 1rem !important;
    }
    
    .social-share-section {
        padding: 1rem !important;
    }
    
    .social-share-section .row {
        margin: 0;
    }
    
    .social-share-section .col-md-8,
    .social-share-section .col-md-4 {
        padding: 0.5rem;
    }
    
    .btn {
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
    }
    
    .btn-sm {
        font-size: 0.8rem;
        padding: 0.375rem 0.5rem;
    }
    
    .breadcrumb {
        font-size: 0.85rem;
    }
    
    .content-text {
        font-size: 0.95rem;
        line-height: 1.7;
    }
    
    h5 {
        font-size: 1.1rem;
    }
    
    h6 {
        font-size: 0.95rem;
    }
}

@media (min-width: 576px) and (max-width: 767px) {
    .event-details-box {
        padding: 1.25rem !important;
    }
    
    .social-share-section {
        padding: 1.25rem !important;
    }
}

/* Loading Animation */
.news-card {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}

.news-card:nth-child(1) { animation-delay: 0.1s; }
.news-card:nth-child(2) { animation-delay: 0.2s; }
.news-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Print Styles */
@media print {
    .social-share-section,
    .related-news {
        display: none;
    }
    
    .news-image img {
        max-height: 300px;
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
        btn.innerHTML = '<i class="bx bx-check me-1"></i> Tersalin!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2500);
    }).catch(function() {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="bx bx-check me-1"></i> Tersalin!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2500);
    });
}

// Enhanced page loading effects
document.addEventListener('DOMContentLoaded', function() {
    // Smooth fade in for main content
    const mainContent = document.querySelector('.news-content');
    if (mainContent) {
        mainContent.style.opacity = '0';
        mainContent.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            mainContent.style.transition = 'all 0.6s ease';
            mainContent.style.opacity = '1';
            mainContent.style.transform = 'translateY(0)';
        }, 200);
    }
    
    // Staggered animation for related news cards
    const newsCards = document.querySelectorAll('.news-card');
    newsCards.forEach((card, index) => {
        card.style.animationDelay = `${0.1 + (index * 0.1)}s`;
    });
    
    // Image lazy loading enhancement
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        
        if (img.complete) {
            img.style.opacity = '1';
        }
    });
    
    // Smooth scroll for internal links
    const internalLinks = document.querySelectorAll('a[href^="#"]');
    internalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Reading time estimator (optional feature)
    const content = document.querySelector('.content-text');
    if (content) {
        const wordCount = content.innerText.split(/\s+/).length;
        const readingTime = Math.ceil(wordCount / 200); // Average reading speed
        const metaSection = document.querySelector('.news-meta');
        if (metaSection && readingTime > 1) {
            const readingTimeElement = document.createElement('div');
            readingTimeElement.className = 'd-flex align-items-center text-muted';
            readingTimeElement.innerHTML = `<i class="bx bx-time me-2"></i><span>${readingTime} menit baca</span>`;
            metaSection.appendChild(readingTimeElement);
        }
    }
});

// Enhanced social sharing
function shareToWhatsApp() {
    const title = document.querySelector('.news-title').textContent;
    const url = window.location.href;
    const text = `Baca berita menarik ini: ${title} - ${url}`;
    window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
}

function shareToFacebook() {
    const url = window.location.href;
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
}

function shareToTwitter() {
    const title = document.querySelector('.news-title').textContent;
    const url = window.location.href;
    const text = `${title} - ${url}`;
    window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`, '_blank');
}
</script>
@endsection
