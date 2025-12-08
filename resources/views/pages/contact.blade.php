@extends('layouts.guest.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">

                <!-- Form Kontak -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5">
<<<<<<< HEAD

                        <p class="d-inline-block bg-dark text-primary py-1 px-4">
                            Kontak Kami
                        </p>

                        <h1 class="text-uppercase mb-4">
                            Ada Pertanyaan? Silakan Hubungi Kami
                        </h1>

                        <p class="mb-4 text-muted">
                            Silakan sampaikan pertanyaan, saran, atau pengaduan
                            terkait pelayanan administrasi kependudukan melalui
                            formulir di bawah ini. Pesan Anda akan diproses
                            sesuai jam kerja.
                        </p>

=======
                        <p class="d-inline-block bg-dark text-primary py-1 px-4">Hubungi Kami</p>
                        <h1 class="text-uppercase mb-4">Kamu Ada Pertanyaan ? Hubungi Kami</h1>
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                        <form>
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="name"
                                            placeholder="Nama Lengkap">
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email"
                                            placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="subject"
                                            placeholder="Perihal">
                                        <label for="subject">Perihal</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Tulis pesan Anda" id="message" style="height: 120px"></textarea>
                                        <label for="message">Pesan</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        Kirim Pesan
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Peta Lokasi Kantor -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100" style="min-height: 400px;">
                        <iframe class="google-map w-100 h-100"
                            src="https://www.google.com/maps?q=kantor%20dinas%20kependudukan&output=embed" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            style="border:0; filter: grayscale(100%) invert(92%) contrast(83%);">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
