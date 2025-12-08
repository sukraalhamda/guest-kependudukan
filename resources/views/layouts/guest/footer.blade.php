<!-- Footer Start -->
<div class="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <!-- INFO DINAS -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Dinas Kependudukan</h4>

                <p class="small text-light-50 mb-4">
                    Sistem Informasi Kependudukan digunakan untuk pengelolaan data warga, keluarga,
                    serta pelayanan administrasi kependudukan secara digital.
                </p>

                <div class="d-flex align-items-center mb-2">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-map-marker-alt text-primary"></span>
                    </div>
                    <span>Kantor Disdukcapil Kabupaten / Kota</span>
                </div>

                <div class="d-flex align-items-center mb-2">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-phone-alt text-primary"></span>
                    </div>
                    <span>(021) 1234 5678</span>
                </div>

                <div class="d-flex align-items-center">
                    <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa fa-envelope-open text-primary"></span>
                    </div>
                    <span>disdukcapil@daerah.go.id</span>
                </div>
            </div>

            <!-- QUICK LINKS -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Menu</h4>

                <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
                <a class="btn btn-link" href="{{ route('about') }}">Tentang</a>
                <a class="btn btn-link" href="{{ route('service') }}">Layanan</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Kontak</a>

                @auth
                    <a class="btn btn-link"
                        href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- MEDIA SOSIAL -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-uppercase mb-4">Media Sosial</h4>

                <p class="small text-light-50">
                    Ikuti informasi terbaru pelayanan kependudukan melalui media sosial resmi.
                </p>

                <div class="d-flex pt-2 gap-2">
                    <a class="btn btn-lg-square btn-dark text-primary" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-lg-square btn-dark text-primary" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-lg-square btn-dark text-primary" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="btn btn-lg-square btn-dark text-primary" href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- COPYRIGHT -->
    <div class="container">
        <div class="copyright">
            <div class="row">

                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }}
                    <span class="border-bottom">
                        Sistem Informasi Kependudukan
                    </span>
                    . All Rights Reserved.
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <!--/*** Template license MUST remain ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
