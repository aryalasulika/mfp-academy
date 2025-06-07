@extends('layouts.app')

@section('content')
<div id="event" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Informasi Acara</h6>
            <h1 class="display-6 mb-4">Acara & Pengumuman MFP Academy</h1>
            <p>Berikut adalah informasi acara terbaru di MFP Academy. Pantau halaman ini untuk update pertemuan orang tua, event, dan pengumuman penting lainnya.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    @forelse($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-lg position-relative event-card wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-header bg-primary text-white text-center rounded-top-3 border-0 py-3">
                                <div class="fw-bold fs-5 mb-1">
                                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    <span class="d-block fs-6 fw-normal mt-1">({{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l') }})</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title text-primary fw-bold mb-2">{{ $event->judul }}</h5>
                                <div class="mb-3 text-secondary small"><i class="bx bx-map me-1"></i> <span class="fw-semibold">{{ $event->lokasi }}</span></div>
                                <p class="card-text flex-grow-1">
                                    @php
                                        $limit = 120;
                                        $desc = strip_tags($event->deskripsi);
                                        $isLong = strlen($desc) > $limit;
                                    @endphp
                                    <span class="event-desc-short">{{ $isLong ? Str::limit($desc, $limit) : $desc }}</span>
                                    @if($isLong)
                                        <a href="{{ url('/event/' . $event->id) }}" class="see-more-link text-primary small ms-1">Lihat selengkapnya</a>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 text-end py-3">
                                <a href="{{ url('/event/' . $event->id) }}" class="btn btn-danger rounded-pill px-3 py-2 shadow-sm">Lihat Acara</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada acara.</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
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
</style>
@endsection
