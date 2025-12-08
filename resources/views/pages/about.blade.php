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

                <!-- Text -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">About Us</p>
                    <h1 class="text-uppercase mb-4">KEPENDUDUKAN</h1>

                    <p>
                        Sistem Kependudukan adalah sistem yang digunakan untuk mencatat, mengelola, dan
                        memvalidasi data dasar penduduk dalam suatu wilayah. Data yang dikelola meliputi Kartu
                        Keluarga (KK), anggota keluarga, serta peristiwa vital seperti kelahiran, kematian,
                        dan perpindahan penduduk.
                    </p>

                    <p class="mb-4">
                        Tujuan sistem ini adalah menyediakan data yang akurat, terintegrasi, dan mudah diakses
                        untuk mendukung pelayanan publik serta administrasi kependudukan. Dengan sistem ini,
                        proses administrasi dapat menjadi lebih efisien, transparan, dan responsif terhadap
                        kebutuhan masyarakat maupun pemerintah daerah.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="row g-4 justify-content-center">
        <div class="col-lg-3 col-md-6">
            <div class="team-item">
                <div class="team-img position-relative overflow-hidden">
                    <img class="img-fluid" src="{{ asset('asset/img/team-1.jpg') }}" alt="">
                    <div class="team-social">
                        <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="text-center p-3">
                    <h5 class="text-uppercase mb-1">Nama Lengkap</h5>
                    <small>Jabatan / Role</small>
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
