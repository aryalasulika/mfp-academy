@extends('layouts.app')

@section('content')
<div id="jadwal" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Jadwal Latihan</h6>
            <h1 class="display-6 mb-4">Jadwal Latihan MFP Academy</h1>
            <p>Berikut adalah jadwal latihan terbaru di MFP Academy. Jadwal dapat berubah sewaktu-waktu sesuai kebijakan pelatih.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table align-middle text-center shadow jadwal-table-2 wow fadeInUp" data-wow-delay="0.1s">
                        <thead>
                            <tr>
                                <th class="bg-gradient-primary text-white rounded-start">Tanggal</th>
                                <th class="bg-gradient-primary text-white">Hari</th>
                                <th class="bg-gradient-primary text-white">Jam</th>
                                <th class="bg-gradient-primary text-white">Kelompok Usia</th>
                                <th class="bg-gradient-primary text-white rounded-end">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwal as $item)
                            <tr class="jadwal-row">
                                <td class="fw-bold text-primary fs-5">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td><span class="badge bg-info text-dark fs-6 px-3 py-2 shadow-sm">{{ $item->hari }}</span></td>
                                <td><span class="badge bg-light text-primary border border-primary fs-6 px-3 py-2 shadow-sm">{{ $item->jam }}</span></td>
                                <td><span class="badge bg-secondary text-white fs-6 px-3 py-2 shadow-sm">{{ $item->kelompok_usia }}</span></td>
                                <td><i class="bx bx-map text-danger"></i> <span class="fw-semibold">{{ $item->lokasi }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Belum ada jadwal latihan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <style>
                .jadwal-table-2 {
                    border-radius: 1.5rem;
                    overflow: hidden;
                    background: #fff;
                    box-shadow: 0 4px 24px 0 rgba(13,110,253,0.08);
                }
                .jadwal-table-2 th {
                    background: #0d6efd !important;
                    color: #fff !important;
                    font-size: 1.1rem;
                    letter-spacing: 0.5px;
                    border: none;
                    padding-top: 1rem;
                    padding-bottom: 1rem;
                }
                .jadwal-table-2 th.rounded-start { border-top-left-radius: 1.5rem; }
                .jadwal-table-2 th.rounded-end { border-top-right-radius: 1.5rem; }
                .jadwal-table-2 td {
                    vertical-align: middle;
                    border: none;
                    font-size: 1.08rem;
                    background: #fff;
                    padding-top: 1rem;
                    padding-bottom: 1rem;
                }
                .jadwal-row {
                    transition: box-shadow 0.2s, background 0.2s;
                }
                .jadwal-row:hover {
                    background: #f0f6ff;
                    box-shadow: 0 2px 16px 0 rgba(13,110,253,0.08);
                }
                .jadwal-table-2 tbody tr:last-child td {
                    border-bottom-left-radius: 1.5rem;
                    border-bottom-right-radius: 1.5rem;
                }
                </style>
            </div>
        </div>
    </div>
</div>
@endsection
