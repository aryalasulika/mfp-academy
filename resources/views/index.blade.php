@extends('layouts.app')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <img class="img-fluid" src="{{ asset('template/img/mfp/slide1.jpg') }}" alt="MFP Academy">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-fluid" src="{{ asset('template/img/mfp/slide2.jpg') }}" alt="MFP Academy">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-fluid" src="{{ asset('template/img/mfp/slide33.jpeg') }}" alt="MFP Academy">
            </button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('template/img/mfp/slide1.jpg') }}" alt="MFP Academy">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">Selamat Datang di</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">MFP ACADEMY</h1>
                        <p class="lead text-white mt-3">Akademi Sepak Bola Profesional untuk Generasi Muda Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('template/img/mfp/slide2.jpg') }}" alt="MFP Academy">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">Latihan Modern</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">Fasilitas & Pelatih Berpengalaman</h1>
                    </div>
                </div>
            </div>            
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('template/img/mfp/slide33.jpeg') }}" alt="MFP Academy Training">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">Bergabunglah Sekarang</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">Wujudkan Mimpi Menjadi Pemain Sepak Bola</h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- Tentang Kami Start -->
<div id="tentang" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="img-border position-relative">
                    <img class="img-fluid rounded shadow" src="{{ asset('template/img/mfp/Logonew.webp') }}" alt="Tentang MFP Academy">
                    {{-- <div class="position-absolute top-0 end-0 translate-middle bg-primary text-white rounded-3 py-2 px-3 shadow">
                        <span class="fw-bold">Sejak 2018</span>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">                <div class="h-100 tentang-content">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                    <h1 class="display-6 mb-4">Akademi Sepak Bola <span class="mfp-accent">MFP ACADEMY</span></h1>
                      <div class="tentang-text">
                        <p class="mb-3">
                            <strong class="text-primary">Future Football Educare</strong> adalah program pembinaan sepak bola usia dini dan
                            remaja yang berfokus pada pengembangan pemain secara holistik —
                            mencakup aspek teknis, taktis, kognitif, dan karakter.
                        </p>
                        
                        <p class="mb-3">
                            Kami percaya bahwa sepak bola bukan hanya tentang teknik bermain, tetapi
                            tentang bagaimana pemain berpikir, memahami permainan, dan berkembang
                            sebagai individu. Oleh karena itu, pendekatan kami tidak hanya berpusat pada
                            latihan fisik, tetapi juga pada pendidikan sepak bola modern, berbasis metode
                            saintifik dan pembelajaran individual.
                        </p>
                        
                        <p class="mb-4">
                            <strong class="text-primary">Future Football Educare</strong> hadir sebagai wadah bagi pemain muda Indonesia
                            untuk tumbuh dalam lingkungan yang berorientasi proses, berstandar tinggi,
                            dan dipandu oleh pelatih profesional bersertifikat.
                        </p>
                          <div class="row g-4 mt-2">
                            <div class="col-sm-6">
                                <div class="feature-box d-flex align-items-center h-100">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0" style="width: 50px; height: 50px;">
                                        <i class="fa fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="mb-0">Pelatih Profesional</h5>
                                        <small>Bersertifikat</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box d-flex align-items-center h-100">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0" style="width: 50px; height: 50px;">
                                        <i class="fa fa-shield-alt fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="mb-0">Standar Tinggi</h5>
                                        <small>Metode Saintifik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <a class="btn btn-danger rounded-pill py-3 px-5 mt-2" href="https://docs.google.com/forms/d/e/1FAIpQLSd50jVgQCODUBiOMdPob1fID9mZhCiEnTtjW8n87D66p92uhQ/viewform" target="_blank">Daftar Sekarang</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tentang Kami End -->

<!-- Visi dan Misi Start -->
<div id="visi-misi" class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Visi dan Misi</h6>
            <h1 class="display-6 mb-4">Tujuan & Komitmen Kami</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="h-100 bg-white p-4 p-lg-5 rounded shadow">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-eye text-white fs-4"></i>
                    </div>
                    <h4 class="mb-3">Visi</h4>
                    <p class="mb-4">Menjadi pusat pengembangan sepak bola usia dini yang inovatif dan progresif, serta melahirkan generasi pemain yang cerdas, berkarakter, dan kompetitif di tingkat nasional maupun internasional.Menjadi pusat pengembangan sepak bola usia dini yang inovatif dan progresif, serta melahirkan generasi pemain yang cerdas, berkarakter, dan kompetitif di tingkat nasional maupun internasional.
</p>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Keunggulan dalam pelatihan sepak bola modern</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Pembangunan karakter dan prestasi</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Berkontribusi pada sepak bola nasional</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-4 p-lg-5 rounded shadow">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-bullseye text-white fs-4"></i>
                    </div>                    <h4 class="mb-3">Misi</h4>
                    <p class="mb-4">Mengembangkan talenta sepak bola Indonesia melalui pendekatan holistik berbasis metodologi modern yang mengintegrasikan aspek teknis, taktis, kognitif dan karakter.</p>
                    <div class="border-top mt-4 pt-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Menyediakan program pelatihan sepak bola yang berbasis metodologi modern (seperti Ekkono Method) untuk meningkatkan kualitas pemahaman permainan.</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Membentuk pemain dengan kemampuan teknis, taktis, serta kecerdasan bermain yang seimbang.</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Mengembangkan aspek karakter, kepemimpinan, dan disiplin melalui program personality development.</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Menyediakan sistem analisis performa individu & tim sebagai alat ukur perkembangan pemain secara objektif.</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Membangun jembatan antara pemain muda dan jalur pembinaan elite, termasuk seleksi Piala Soeratin, akademi profesional, dan program nasional.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Visi dan Misi End -->

<!-- Kutipan Pimpinan Start -->
<div id="kutipan" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Kutipan</h6>
            <h1 class="display-6 mb-4">Pesan dari Pimpinan MFP Academy</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-1.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="CEO">
                    <h5 class="mb-1">Bowo Widyatmono, S.Pd.Or</h5>
                    <span class="text-primary">CEO</span>
                    <p class="mt-3 fst-italic">“Kami percaya setiap anak memiliki potensi besar. Di MFP Academy, kami berkomitmen membimbing mereka menjadi pemain sepak bola yang berkarakter dan berprestasi.”</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-2.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="Direktur Teknik">
                    <h5 class="mb-1">Geofany Akbar, M.Or</h5>
                    <span class="text-primary">Director Of Academy</span>
                    <p class="mt-3 fst-italic">“Metode latihan kami selalu mengikuti perkembangan sepak bola modern, agar setiap siswa siap bersaing di level nasional maupun internasional.”</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-3.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd; background: #0d6efd;" alt="Manager">
                    <h5 class="mb-1">Dhono Anggoro, S.Pd</h5>
                    <span class="text-primary">Director Of Sport Science</span>
                    <p class="mt-3 fst-italic">“Kami ingin menciptakan lingkungan yang positif, aman, dan menyenangkan agar anak-anak dapat berkembang secara maksimal.”</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kutipan Pimpinan End -->

<!-- Jadwal Latihan Start -->
<div id="jadwal-home" class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Jadwal</h6>
            <h1 class="display-6 mb-4">Jadwal Latihan Reguler</h1>
            <p>Bergabunglah dengan sesi latihan reguler MFP Academy untuk mengembangkan potensi sepak bola Anda.</p>
        </div>        <div class="row justify-content-center">
            <div class="col-lg-10"><div class="jadwal-card-container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Senin</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Selasa</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Rabu</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Kamis</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Jumat</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="jadwal-card">
                                <div class="jadwal-card-day">Sabtu</div>
                                <div class="jadwal-card-time">16:00 - 18:00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('jadwal.latihan') }}" class="btn rounded-pill px-4 py-2 wow fadeInUp" data-wow-delay="0.3s" style="background-color: #61677A; color: #fff; border: none;">Lihat Jadwal Lengkap</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jadwal Latihan End -->

<!-- Program Start -->
<div id="program" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Program</h6>
            <h1 class="display-6 mb-4">Program Unggulan MFP Academy</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-block rounded text-center h-100 p-4 bg-white border">
                    <img class="img-fluid rounded mb-4" src="{{ asset('template/img/service-1.jpg') }}" alt="">
                    <h4 class="mb-0">Kelas Usia Dini (U-8, U-10)</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-block rounded text-center h-100 p-4 bg-white border">
                    <img class="img-fluid rounded mb-4" src="{{ asset('template/img/service-2.jpg') }}" alt="">
                    <h4 class="mb-0">Kelas Remaja (U-12, U-14)</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-block rounded text-center h-100 p-4 bg-white border">
                    <img class="img-fluid rounded mb-4" src="{{ asset('template/img/service-3.jpg') }}" alt="">
                    <h4 class="mb-0">Kelas Prestasi (U-16, U-18)</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Program End -->

<!-- Galeri Start -->
<div id="galeri" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Galeri</h6>
            <h1 class="display-6 mb-4">Kegiatan & Prestasi</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item border rounded h-100 p-4">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="{{ asset('template/img/project-1.jpg') }}" alt="Galeri 1">
                </div>
                <h6>Latihan Rutin</h6>
            </div>
            <div class="project-item border rounded h-100 p-4">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="{{ asset('template/img/project-2.jpg') }}" alt="Galeri 2">
                </div>
                <h6>Turnamen</h6>
            </div>
            <div class="project-item border rounded h-100 p-4">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="{{ asset('template/img/project-3.jpg') }}" alt="Galeri 3">
                </div>
                <h6>Prestasi Siswa</h6>
            </div>
        </div>
    </div>
</div>
<!-- Galeri End -->

<!-- Tim Pelatih Start -->
<div id="tim" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Tim Pelatih</h6>
            <h1 class="display-6 mb-4">Pelatih Profesional & Berpengalaman</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center p-4">
                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="{{ asset('template/img/team-1.jpg') }}" alt="Pelatih 1">
                    <div class="team-text">
                        <div class="team-title">
                            <h5>Coach Andi</h5>
                            <span>Pelatih Kepala</span>
                        </div>
                        <div class="team-social">
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item text-center p-4">
                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="{{ asset('template/img/team-2.jpg') }}" alt="Pelatih 2">
                    <div class="team-text">
                        <div class="team-title">
                            <h5>Coach Budi</h5>
                            <span>Pelatih Fisik</span>
                        </div>
                        <div class="team-social">
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item text-center p-4">
                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="{{ asset('template/img/team-3.jpg') }}" alt="Pelatih 3">
                    <div class="team-text">
                        <div class="team-title">
                            <h5>Coach Cici</h5>
                            <span>Pelatih Teknik</span>
                        </div>
                        <div class="team-social">
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tim Pelatih End -->

<!-- Testimoni Start -->
<div id="testimoni" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimoni</h6>
            <h1 class="display-6 mb-4">Apa Kata Orang Tua & Siswa</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('template/img/testimonial-1.jpg') }}" alt="Testimoni 1">
                    <div class="ms-4">
                        <h5 class="mb-1">Orang Tua Siswa</h5>
                        <span>"Anak saya berkembang pesat di MFP Academy!"</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('template/img/testimonial-2.jpg') }}" alt="Testimoni 2">
                    <div class="ms-4">
                        <h5 class="mb-1">Siswa</h5>
                        <span>"Latihan di sini seru dan pelatihnya ramah!"</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimoni End -->

<style>
.jadwal-card-container {
    padding: 1rem;
}
.jadwal-card {
    background: #fff;
    border-radius: 1.25rem;
    box-shadow: 0 8px 30px rgba(13, 110, 253, 0.08);
    padding: 2.5rem 1.5rem;
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(13, 110, 253, 0.05);
}
.jadwal-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(13, 110, 253, 0.15);
    border-color: rgba(13, 110, 253, 0.2);
}
.jadwal-card:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: #61677A;
}
.jadwal-card-day {
    color: #61677A;
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
}
.jadwal-card-time {
    background: #f8f9fa;
    color: #212529;
    padding: 0.75rem 1.25rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    display: inline-block;
    border: 1px dashed #61677A;
}

/* Feature boxes in Tentang Kami section */
.feature-box {
    height: 100%;
    padding: 0.5rem 0;
    position: relative;
}

.tentang-text .row {
    display: flex;
    flex-wrap: wrap;
}

.tentang-text .row > [class*="col-"] {
    display: flex;
    align-items: stretch;
}

@media (max-width: 575.98px) {
    .tentang-text .row > [class*="col-"]:not(:first-child) {
        margin-top: 1rem;
    }
}

/* Visi Misi Section Styles */
#visi-misi .rounded {
    border-radius: 15px !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(97, 103, 122, 0.08);
}

#visi-misi .rounded:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(97, 103, 122, 0.15) !important;
}

#visi-misi .bg-primary {
    background-color: var(--primary) !important;
}

#visi-misi h4 {
    position: relative;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

#visi-misi h4:after {
    content: "";
    position: absolute;
    width: 50px;
    height: 3px;
    background: var(--primary);
    bottom: 0;
    left: 0;
}

#visi-misi .btn-sm-square {
    width: 26px;
    height: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

#visi-misi p {
    color: #555;
    line-height: 1.7;
}

#visi-misi .d-flex span {
    font-size: 0.95rem;
    line-height: 1.4;
}

/* Adjust mission box height */
#visi-misi .col-lg-6:nth-child(2) .h-100 {
    height: auto !important;
}

/* Add more space to the vision section */
#visi-misi .col-lg-6:first-child .border-top {
    padding-bottom: 26px;
}

@media (max-width: 991.98px) {
    #visi-misi .col-lg-6:first-child {
        margin-bottom: 30px;
    }
    
    /* Make mission item text wrap better on small screens */
    #visi-misi .d-flex span {
        font-size: 0.9rem;
    }
}

/* Custom carousel navigation styles */
.testimonial-carousel .owl-nav .owl-prev:hover,
.testimonial-carousel .owl-nav .owl-next:hover,
.project-carousel .owl-dot:hover,
.project-carousel .owl-dot.active {
    color: #FFFFFF !important;
    border-color: #61677A !important;
    background: #61677A !important;
}

/* Force override any other carousel styles */
.owl-carousel .owl-nav button:hover,
.owl-carousel button.owl-dot:hover,
.owl-carousel button.owl-dot.active {
    background: #61677A !important;
    border-color: #61677A !important;
}
</style>
@endsection
