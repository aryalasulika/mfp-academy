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
                <img class="w-100" src="{{ asset('template/img/mfp/slide33.jpeg') }}" alt="MFP Academy">
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
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="img-border">
                    <img class="img-fluid rounded" src="{{ asset('template/img/about.jpg') }}" alt="Tentang MFP Academy">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                    <h1 class="display-6 mb-4">Akademi Sepak Bola <span class="mfp-accent">MFP ACADEMY</span></h1>
                    <p>MFP Academy adalah akademi sepak bola yang berfokus pada pengembangan bakat muda dengan metode pelatihan modern, fasilitas lengkap, dan pelatih profesional. Kami berkomitmen mencetak pemain sepak bola berkarakter, disiplin, dan berprestasi.</p>
                    <a class="btn btn-danger rounded-pill py-3 px-5 mt-3" href="https://docs.google.com/forms/d/e/1FAIpQLSd50jVgQCODUBiOMdPob1fID9mZhCiEnTtjW8n87D66p92uhQ/viewform" target="_blank">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tentang Kami End -->

<!-- Kutipan Pimpinan Start -->
<div id="kutipan" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Kutipan</h6>
            <h1 class="display-6 mb-4">Struktur Pengurus Academy</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-1.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="CEO">
                    <h5 class="mb-1">Bapak Fajar Pratama</h5>
                    <span class="text-primary">CEO</span>
                    <p class="mt-3 fst-italic">“Kami percaya setiap anak memiliki potensi besar. Di MFP Academy, kami berkomitmen membimbing mereka menjadi pemain sepak bola yang berkarakter dan berprestasi.”</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-2.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="Direktur Teknik">
                    <h5 class="mb-1">Coach Andi</h5>
                    <span class="text-primary">Direktur Teknik</span>
                    <p class="mt-3 fst-italic">“Metode latihan kami selalu mengikuti perkembangan sepak bola modern, agar setiap siswa siap bersaing di level nasional maupun internasional.”</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-3.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd; background: #0d6efd;" alt="Manager">
                    <h5 class="mb-1">Ibu Cici</h5>
                    <span class="text-primary">Manager</span>
                    <p class="mt-3 fst-italic">“Kami ingin menciptakan lingkungan yang positif, aman, dan menyenangkan agar anak-anak dapat berkembang secara maksimal.”</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kutipan Pimpinan End -->

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
                    <h4 class="mb-0">Akademi U-8, U-10</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-block rounded text-center h-100 p-4 bg-white border">
                    <img class="img-fluid rounded mb-4" src="{{ asset('template/img/service-2.jpg') }}" alt="">
                    <h4 class="mb-0">Akademi U-12, U-14</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-block rounded text-center h-100 p-4 bg-white border">
                    <img class="img-fluid rounded mb-4" src="{{ asset('template/img/service-3.jpg') }}" alt="">
                    <h4 class="mb-0">Akademi Prestasi U-16, U-18</h4>
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
            <h1 class="display-6 mb-4">Pelatih dan Support Tim Profesional</h1>
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
                            <span>Pelatih Kiper</span>
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
@endsection
