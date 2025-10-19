@extends('layouts.app')

@section('title', 'Tentang Kami - Future Football Educare')
@section('meta_description', 'Pelajari lebih lanjut tentang Future Football Educare, visi, misi, dan komitmen kami dalam mengembangkan talenta sepak bola Indonesia.')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('template/img/mfp/slide1.jpg') }}') center center no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Tentang Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Tentang Kami Start -->
<div id="tentang" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="img-border position-relative">
                    <img class="img-fluid rounded shadow" src="{{ asset('template/img/mfp/Logonew.webp') }}" alt="Tentang MFP Academy">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">                
                <div class="h-100 tentang-content">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                    <h1 class="display-6 mb-4">Akademi Sepak Bola <span class="mfp-accent">Future Football Educare</span></h1>
                    
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
                    <p class="mb-4">Menjadi pusat pengembangan sepak bola usia dini yang inovatif dan progresif, serta melahirkan generasi pemain yang cerdas, berkarakter, dan kompetitif di tingkat nasional maupun internasional.</p>
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
                    </div>
                    <h4 class="mb-3">Misi</h4>
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
{{-- <div id="kutipan" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Kutipan</h6>
            <h1 class="display-6 mb-4">Pesan dari Pimpinan Future Football Educare</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-1.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="CEO">
                    <h5 class="mb-1">Bowo Widyatmono, S.Pd.Or</h5>
                    <span class="text-primary">CEO</span>
                    <p class="mt-3 fst-italic">"Kami percaya setiap anak memiliki potensi besar. Di Future Football Educare, kami berkomitmen membimbing mereka menjadi pemain sepak bola yang berkarakter dan berprestasi."</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-2.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;" alt="Direktur Teknik">
                    <h5 class="mb-1">Geofany Akbar, M.Or</h5>
                    <span class="text-primary">Director Of Academy</span>
                    <p class="mt-3 fst-italic">"Metode latihan kami selalu mengikuti perkembangan sepak bola modern, agar setiap siswa siap bersaing di level nasional maupun internasional."</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded p-4 h-100 text-center shadow-sm">
                    <img src="{{ asset('template/img/team-3.jpg') }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd; background: #0d6efd;" alt="Manager">
                    <h5 class="mb-1">Dhono Anggoro, S.Pd</h5>
                    <span class="text-primary">Director Of Sport Science</span>
                    <p class="mt-3 fst-italic">"Kami ingin menciptakan lingkungan yang positif, aman, dan menyenangkan agar anak-anak dapat berkembang secara maksimal."</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Kutipan Pimpinan End -->

<style>
/* Breadcrumb styling */
.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.7);
}

.breadcrumb-item a {
    text-decoration: none;
    transition: color 0.3s;
}

.breadcrumb-item a:hover {
    color: #E55050 !important;
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
</style>
@endsection
