<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="mb-0 text-primary text-uppercase">KEPENDUDUKAN</h1>
    </a>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">

            <a href="{{ route('home') }}"
               class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
               Home
            </a>

            <a href="{{ route('about') }}"
               class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
               About
            </a>

            <a href="{{ route('service') }}"
               class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
               Service
            </a>

            <!-- Master Data Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle
                   {{ request()->routeIs('keluargakk.*') || request()->routeIs('warga.*') || request()->routeIs('user.*') ? 'active' : '' }}"
                   data-bs-toggle="dropdown">
                    PAGES
                </a>

                <div class="dropdown-menu m-0">
                    <a href="{{ route('keluargakk.index') }}"
                       class="dropdown-item {{ request()->routeIs('keluargakk.*') ? 'active' : '' }}">
                       Keluarga KK
                    </a>

                    <a href="{{ route('warga.index') }}"
                       class="dropdown-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                       Data Warga
                    </a>

                    <a href="{{ route('user.index') }}"
                       class="dropdown-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                       User
                    </a>
                </div>
            </div>

            <a href="{{ route('contact') }}"
               class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
               Contact
            </a>
        </div>

        <a href="#" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block">
            Appointment<i class="fa fa-arrow-right ms-3"></i>
        </a>
    </div>
</nav>
<!-- Navbar End -->
