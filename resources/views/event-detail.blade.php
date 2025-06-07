@extends('layouts.app')

@section('content')
<div id="event-detail" class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-white text-center rounded-top-4 border-0 py-4" style="background-color: #61677A;">
                        <div class="fw-bold fs-3 mb-1">{{ $event->judul }}</div>
                        <div class="fs-6 mb-1">
                            <i class="bx bx-calendar"></i> {{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('l, d M Y') }}
                        </div>
                        @if($event->lokasi)
                        <div class="fs-6"><i class="bx bx-map"></i> {{ $event->lokasi }}</div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h5 class="mb-3 text-primary">Deskripsi Acara</h5>
                        <div class="fs-5">{!! nl2br(e($event->deskripsi)) !!}</div>
                    </div>
                    <div class="card-footer bg-white border-0 text-end py-3">
                        <span class="badge rounded-pill bg-danger bg-gradient px-3 py-2 shadow-sm">MFP Academy</span>
                        <a href="{{ route('event.index') }}" class="btn btn-outline-primary ms-3">&larr; Kembali ke Daftar Acara</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
