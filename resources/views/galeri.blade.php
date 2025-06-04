@extends('layouts.app')

@section('content')
    <div id="galeri" class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Galeri</h6>
                <h1 class="display-6 mb-4">Galeri Kegiatan MFP Academy</h1>
                <p>Lihat dokumentasi foto & video kegiatan, latihan, dan event MFP Academy.</p>
            </div>
            <div class="row g-4">
                @forelse($galeri as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div
                            class="card galeri-card border-0 h-100 position-relative overflow-hidden gallery-hover bg-glass shadow-lg">
                            @if (Str::startsWith($item->tipe, 'image'))
                                <a href="{{ asset('storage/' . $item->file) }}" data-lightbox="galeri"
                                    data-title="{{ $item->judul }}" class="d-block position-relative">
                                    <img src="{{ asset('storage/' . $item->file) }}"
                                        class="card-img-top img-fluid gallery-img aspect-ratio-1-1"
                                        alt="{{ $item->judul }}">
                                    <div class="gallery-overlay d-flex flex-column justify-content-end p-3">
                                        <div class="fw-bold text-primary text-shadow mb-1 fs-5 text-center">
                                            {{ $item->judul }}</div>
                                    </div>
                                </a>
                            @elseif(Str::startsWith($item->tipe, 'video'))
                                <div class="position-relative">
                                    <video controls class="w-100 rounded-top gallery-img aspect-ratio-1-1">
                                        <source src="{{ asset('storage/' . $item->file) }}" type="{{ $item->tipe }}">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                    <span
                                        class="badge badge-glass bg-danger position-absolute top-0 end-0 m-2 shadow">Video</span>
                                    <div class="gallery-overlay d-flex flex-column justify-content-end p-3">
                                        <div class="fw-bold text-white text-shadow mb-1 fs-5">{{ $item->judul }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fas fa-images fa-3x mb-3"></i>
                        <div>Belum ada media galeri yang ditampilkan.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .galeri-card.bg-glass {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(8px) saturate(120%);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 1.5px 8px rgba(0, 0, 0, 0.04);
            transition: transform 0.25s cubic-bezier(.4, 2, .3, 1), box-shadow 0.25s, background 0.25s;
            overflow: hidden;
            min-height: 370px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .galeri-card.gallery-hover:hover {
            transform: translateY(-10px) scale(1.04) rotateZ(-0.5deg);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.18), 0 2px 12px rgba(0, 0, 0, 0.08);
            background: rgba(255, 255, 255, 0.28);
            z-index: 2;
        }

        .gallery-img.aspect-ratio-1-1 {
            aspect-ratio: 1/1;
            object-fit: cover;
            width: 100%;
            min-height: 220px;
            max-height: 320px;
            display: block;
            background: #f8f9fa;
            border-radius: 1.5rem 1.5rem 0 0;
            transition: filter 0.2s;
        }

        .galeri-card.gallery-hover:hover .gallery-img {
            filter: brightness(0.92) blur(1px) saturate(120%);
        }

        .gallery-overlay {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            min-height: 60px;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.55) 80%, rgba(0, 0, 0, 0.0) 100%);
            opacity: 0;
            transition: opacity 0.25s;
            pointer-events: none;
            border-radius: 0 0 1.5rem 1.5rem;
            backdrop-filter: blur(2.5px);
        }

        .galeri-card.gallery-hover:hover .gallery-overlay,
        .galeri-card .gallery-overlay:focus-within {
            opacity: 1;
            pointer-events: auto;
        }

        .badge-glass {
            background: rgba(255, 255, 255, 0.18) !important;
            backdrop-filter: blur(6px) saturate(120%);
            color: #fff !important;
            font-weight: 600;
            letter-spacing: 0.03em;
            font-size: 0.95em;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
            padding: 0.5em 1em;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.18);
        }

        .text-shadow {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 575.98px) {
            .galeri-card.bg-glass {
                border-radius: 1rem;
                min-height: 220px;
            }

            .gallery-img.aspect-ratio-1-1 {
                min-height: 140px;
                max-height: 180px;
                border-radius: 1rem 1rem 0 0;
            }

            .gallery-overlay {
                border-radius: 0 0 1rem 1rem;
            }
        }
    </style>
@endpush
