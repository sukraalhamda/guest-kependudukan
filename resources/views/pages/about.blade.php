@extends('layouts.guest.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">About</h1>
            <nav aria-label="breadcrumb" class="animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Image -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="{{ asset('asset/img/penduduk.png') }}"
                            alt="Penduduk">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">TENTANG</p>
                    <h1 class="text-uppercase mb-4">KEPENDUDUKAN</h1>
                    <p>Sistem Kependudukan adalah platform layanan yang dirancang untuk mencatat, mengelola, dan memvalidasi
                        data dasar penduduk dalam suatu wilayah secara terstruktur dan terintegrasi. Data utama yang
                        dikelola meliputi Kartu Keluarga (KK), data individu dan anggota keluarga, serta peristiwa
                        kependudukan seperti kelahiran, kematian, dan perpindahan penduduk.
                        Tujuan sistem ini adalah menyediakan data yang akurat, terintegrasi, dan mudah diakses untuk
                        mendukung pelayanan publik serta administrasi kependudukan.</p>

                    <p class="mb-4">Sistem ini bertujuan untuk menyediakan data kependudukan yang akurat, aman, dan mudah
                        diakses guna mendukung pelayanan publik dan proses administrasi kependudukan di tingkat pemerintah
                        daerah.</p>
                    <p>Dengan adanya Sistem Kependudukan, diharapkan pengelolaan data penduduk dapat berjalan lebih efisien,
                        transparan, dan responsif, sehingga mampu meningkatkan kualitas layanan kepada masyarakat serta
                        membantu pengambilan keputusan berbasis data.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                    Profil Pengembang
                </p>
                <h1 class="text-uppercase">
                    Identitas Developer Sistem
                </h1>
            </div>

            <!-- CARD DEVELOPER -->
            <div class="row justify-content-center g-4">

                <!-- DEVELOPER 1 (KIRI) -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">

                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('asset/img/sukra.jpg') }}" alt="Developer 1">

                            <div class="team-social">
                                <a class="btn btn-square" href="https://www.linkedin.com/in/sukra-alhamda13/"
                                    target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="btn btn-square" href="https://github.com/sukraalhamda" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a class="btn btn-square" href="https://www.instagram.com/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-secondary text-center p-4">
                            <h5 class="text-uppercase mb-1">Sukra Alhamda</h5>
                            <span class="text-primary d-block mb-2">NIM : 2457301139</span>
                            <small class="text-light-50 d-block">Program Studi Sistem Informasi</small>
                            <small class="text-light-50">Politeknik Caltex Riau</small>
                        </div>

                    </div>
                </div>

                <!-- DEVELOPER 2 (KANAN) -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">

                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('asset/img/developer2.jpg') }}" alt="Developer 2">

                            <div class="team-social">
                                <a class="btn btn-square" href="#" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="btn btn-square" href="#" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a class="btn btn-square" href="#" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-secondary text-center p-4">
                            <h5 class="text-uppercase mb-1">Nama Developer 2</h5>
                            <span class="text-primary d-block mb-2">NIM : 24573011XX</span>
                            <small class="text-light-50 d-block">Program Studi Sistem Informasi</small>
                            <small class="text-light-50">Politeknik Caltex Riau</small>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
