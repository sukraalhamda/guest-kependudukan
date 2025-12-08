@extends('layouts.guest.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Service</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
