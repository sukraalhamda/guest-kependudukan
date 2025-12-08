@extends('layouts.guest.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('asset/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">KEPENDUDUKAN</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">BERSAMA KITA MEMBANGUN NEGERI
                            </h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">POLITEKNIK CALTEX RIAU</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('asset/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">KEPENDUDUKAN</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">NEGERI BERSAMA MEMBANGUN KITA
                            </h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">POLITEKNIK CALTEX RIAU</h4>
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


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="{{ asset('asset/img/penduduk.png') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">About us</p>
                    <h1 class="text-uppercase mb-4">KEPENDUDUKAN</h1>
                    <p>Sistem Kependudukan adalah sistem yang digunakan untuk mencatat, mengelola, dan memvalidasi data
                        dasar penduduk dalam suatu wilayah. Data utama yang dikelola meliputi Kartu Keluarga (KK), anggota
                        keluarga, serta peristiwa vital seperti kelahiran, kematian, dan perpindahan penduduk.

                        Tujuan sistem ini adalah menyediakan data yang akurat, terintegrasi, dan mudah diakses untuk
                        mendukung pelayanan publik serta administrasi kependudukan.</p>
                    <p class="mb-4">Dengan sistem ini, diharapkan proses administrasi kependudukan menjadi lebih efisien,
                        transparan, dan responsif terhadap kebutuhan masyarakat serta pemerintah daerah.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
