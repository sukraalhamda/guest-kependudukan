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

            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Profil</p>
                <h1 class="text-uppercase">Penanggung Jawab Layanan</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">

                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('asset/img/sukra.jpg') }}" alt="Petugas Pelayanan">

                            <!-- SOCIAL MEDIA (TETAP ADA) -->
                            <div class="team-social">
                                <a class="btn btn-square" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-square" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="btn btn-square" href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>

                        <div class="bg-secondary text-center p-4">
                            <h5 class="text-uppercase mb-1">Nama Pejabat</h5>
                            <span class="text-primary">
                                Penanggung Jawab Administrasi Kependudukan
                            </span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Team Item -->
    </div>
    </div>
    </div>
    <!-- Team End -->
@endsection
