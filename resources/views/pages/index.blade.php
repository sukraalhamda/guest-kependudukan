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
<<<<<<< HEAD


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Layanan</p>
                <h1 class="text-uppercase">Layanan Kependudukan</h1>
            </div>
            <div class="row g-4">

                <!-- KTP -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-id-card fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Penerbitan KTP-el</h3>
                            <p>Pelayanan perekaman dan pencetakan KTP elektronik bagi penduduk.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

                <!-- KK -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Kartu Keluarga</h3>
                            <p>Pembuatan dan pembaruan data Kartu Keluarga.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

                <!-- Akta Kelahiran -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-file-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Akta Kelahiran</h3>
                            <p>Pencatatan kelahiran sebagai dokumen sah anak.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

                <!-- Akta Kematian -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-file-medical fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Akta Kematian</h3>
                            <p>Pencatatan kematian penduduk untuk administrasi negara.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

                <!-- Pindah Datang -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-exchange-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Pindah Datang</h3>
                            <p>Pengurusan surat pindah dan datang antar wilayah.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

                <!-- Perubahan Data -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="fas fa-edit fa-2x text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3">Perubahan Data</h3>
                            <p>Perubahan data nama, alamat, pekerjaan, dan status penduduk.</p>
                            <span class="text-uppercase text-primary">Gratis</span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Informasi Layanan Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">

                <!-- KIRI : DAFTAR LAYANAN -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">
                            Informasi Layanan
                        </p>
                        <h1 class="text-uppercase mb-4">
                            Layanan Administrasi Kependudukan
                        </h1>

                        <div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Penerbitan KTP-el</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Kartu Keluarga</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Akta Kelahiran</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Akta Kematian</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Pindah Datang Penduduk</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <h6 class="text-uppercase mb-0">Perubahan Data Penduduk</h6>
                                <span class="text-uppercase text-primary">Gratis</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KANAN : GAMBAR -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100">
                        <img class="img-fluid h-100" src="{{ asset('asset/img/kependudukan.jpg') }}"
                            alt="Layanan Kependudukan">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Informasi Layanan End -->



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
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">

                            <!-- FOTO -->
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('asset/img/sukra.jpg') }}" alt="Developer">

                                <!-- SOSIAL MEDIA -->
                                <div class="team-social">
                                    <a class="btn btn-square" href="https://www.linkedin.com/" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="btn btn-square" href="https://github.com/" target="_blank">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a class="btn btn-square" href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- INFO -->
                            <div class="bg-secondary text-center p-4">
                                <h5 class="text-uppercase mb-1">
                                    Sukra Alhamda
                                </h5>

                                <span class="text-primary d-block mb-2">
                                    NIM : 2457301139
                                </span>

                                <small class="text-light-50 d-block">
                                    Program Studi Sistem Informasi
                                </small>

                                <small class="text-light-50">
                                    Politeknik Caltex Riau
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
<!-- Team End -->


        <!-- Service Start -->
        <!-- Button Trigger -->
        <div class="text-center my-5">
            <button class="btn btn-primary btn-lg px-4 py-3" data-bs-toggle="modal" data-bs-target="#jamPelayananModal">

                <i class="fa-solid fa-clock me-2"></i>
                Klik untuk Melihat Jam Pelayanan
            </button>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="jamPelayananModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-secondary text-white">

                    <!-- Modal Header -->
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-uppercase">
                            <i class="fa-solid fa-id-card"></i> Jam Pelayanan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body px-5 pb-5">

                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 mb-3">
                            Pelayanan Administrasi Kependudukan
                        </p>

                        <h4 class="text-uppercase mb-4">
                            Jadwal Pelayanan
                        </h4>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="mb-0">Senin</h6>
                            <span>08.00 - 15.00 WIB</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="mb-0">Selasa</h6>
                            <span>08.00 - 15.00 WIB</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="mb-0">Rabu</h6>
                            <span>08.00 - 15.00 WIB</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="mb-0">Kamis</h6>
                            <span>08.00 - 15.00 WIB</span>
                        </div>

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <h6 class="mb-0">Jumat</h6>
                            <span>08.00 - 11.00 WIB</span>
                        </div>

                        <div class="d-flex justify-content-between py-2">
                            <h6 class="mb-0">Sabtu / Minggu</h6>
                            <span class="text-primary fw-bold">Tutup</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap & FontAwesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Service End -->




        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">

                <!-- Judul -->
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">
                        Testimoni Masyarakat
                    </p>
                    <h1 class="text-uppercase">
                        Apa Kata Masyarakat
                    </h1>
                </div>

                <!-- Carousel -->
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

                    <!-- Item 1 -->
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='{{ asset('asset/img/elon musk.jpg') }}' alt=''>">
                        <h4 class="text-uppercase">Elon Musk</h4>
                        <p class="text-primary">Warga Kecamatan Sukamaju</p>
                        <span class="fs-5">
                            Pelayanan administrasi kependudukan sangat cepat dan
                            petugasnya ramah. Proses pembuatan KTP dan KK jadi lebih mudah
                            dan tidak berbelit-belit.
                        </span>
                    </div>

                    <!-- Item 2 -->
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='{{ asset('asset/img/mark.jpg') }}' alt=''>">
                        <h4 class="text-uppercase">Mark Zuckerberg</h4>
                        <p class="text-primary">Warga Kecamatan Melati</p>
                        <span class="fs-5">
                            Informasi pelayanan sangat jelas dan mudah dipahami.
                            Pengurusan akta kelahiran selesai tepat waktu sesuai jadwal.
                        </span>
                    </div>

                    <!-- Item 3 -->
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='{{ asset('asset/img/jokowi.jpg') }}' alt=''>">
                        <h4 class="text-uppercase">Joko Widodo</h4>
                        <p class="text-primary">Warga Kecamatan Harapan</p>
                        <span class="fs-5">
                            Pelayanan online membantu sekali, tidak perlu antre lama.
                            Semoga kualitas pelayanan seperti ini terus dipertahankan.
                            Pokok e mantap rek!
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    @endsection
=======
@endsection
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
