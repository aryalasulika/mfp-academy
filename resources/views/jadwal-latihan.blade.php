@extends('layouts.app')

@section('content')
<div id="jadwal" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Jadwal Latihan</h6>
            <h1 class="display-6 mb-4">Jadwal Latihan Future Football Educare</h1>
            <p>Berikut adalah jadwal latihan terbaru di Future Football Educare. Jadwal dapat berubah sewaktu-waktu sesuai kebijakan pelatih.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Filter & Pencarian -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <form method="GET" action="{{ route('jadwal.latihan') }}" class="row g-3">
                            <div class="col-md-6">
                                <label for="search" class="form-label fw-semibold">Pencarian</label>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari jenis latihan atau lokasi..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kelompok_usia" class="form-label fw-semibold">Kelompok Usia</label>
                                <select name="kelompok_usia" id="kelompok_usia" class="form-select">
                                    <option value="">Semua</option>
                                    <option value="U-10" {{ request('kelompok_usia')=='U-10' ? 'selected' : '' }}>U-10</option>
                                    <option value="U-12" {{ request('kelompok_usia')=='U-12' ? 'selected' : '' }}>U-12</option>
                                    <option value="U-13" {{ request('kelompok_usia')=='U-13' ? 'selected' : '' }}>U-13</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="hari" class="form-label fw-semibold">Hari</label>
                                <select name="hari" id="hari" class="form-select">
                                    <option value="">Semua</option>
                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $h)
                                        <option value="{{ $h }}" {{ request('hari')==$h ? 'selected' : '' }}>{{ $h }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 d-flex gap-2">
                                <button type="submit" class="btn btn-primary"><i class="bx bx-search me-1"></i> Cari</button>
                                <a href="{{ route('jadwal.latihan') }}" class="btn btn-outline-secondary"><i class="bx bx-refresh me-1"></i> Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle text-center shadow jadwal-table-2 wow fadeInUp" data-wow-delay="0.1s">
                        <thead>
                            <tr>
                                <th class="bg-gradient-primary text-white rounded-start">Tanggal</th>
                                <th class="bg-gradient-primary text-white">Hari</th>
                                <th class="bg-gradient-primary text-white">Jam</th>
                                <th class="bg-gradient-primary text-white">Kelompok Usia</th>
                                <th class="bg-gradient-primary text-white">Jenis Latihan</th>
                                <th class="bg-gradient-primary text-white rounded-end">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwal as $item)
                            <tr class="jadwal-row">
                                <td class="fw-bold text-primary fs-5">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td><span class="fw-bold text-primary fs-5">{{ $item->hari }}</span></td>
                                <td><span class="fw-bold text-primary fs-5">{{ $item->jam }}</span></td>
                                <td>
                                    <span class="badge-kelompok fw-bold fs-5 {{
                                        $item->kelompok_usia == 'U-10' ? 'bg-u10' :
                                        ($item->kelompok_usia == 'U-12' ? 'bg-u12' :
                                        ($item->kelompok_usia == 'U-13' ? 'bg-u13' : ''))
                                    }}">
                                        {{ $item->kelompok_usia }}
                                    </span>
                                </td>
                                <td><span class="fw-bold text-primary fs-5">{{ $item->jenis_latihan ?? '-' }}</span></td>
                                <td><span class="fw-bold text-primary fs-5">{{ $item->lokasi }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Belum ada jadwal latihan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if(method_exists($jadwal, 'links') && $jadwal->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $jadwal->firstItem() ?? 0 }} - {{ $jadwal->lastItem() ?? 0 }} dari {{ $jadwal->total() }} jadwal</small>
                    <div>
                        {{ $jadwal->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                @endif
                <style>
                .jadwal-table-2 {
                    border-radius: 1.5rem;
                    overflow: hidden;
                    background: #fff;
                    box-shadow: 0 4px 24px 0 rgba(13,110,253,0.08);
                }
                .jadwal-table-2 th {
                    background: #61677A !important;
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
                
                /* Badge Kelompok Usia dengan warna berbeda */
                .badge-kelompok {
                    display: inline-block;
                    padding: 0.5rem 1.25rem;
                    border-radius: 0.75rem;
                    font-weight: 700;
                    letter-spacing: 0.5px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
                    transition: transform 0.2s, box-shadow 0.2s;
                }
                
                .badge-kelompok:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
                }
                
                /* U-10: Biru Muda */
                .bg-u10 {
                    background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);
                    color: #0D47A1;
                    border: 2px solid #64B5F6;
                }
                
                /* U-12: Hijau */
                .bg-u12 {
                    background: linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 100%);
                    color: #1B5E20;
                    border: 2px solid #66BB6A;
                }
                
                /* U-13: Orange/Oranye */
                .bg-u13 {
                    background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%);
                    color: #E65100;
                    border: 2px solid #FFB74D;
                }
                </style>
            </div>
        </div>
    </div>
</div>
@endsection
