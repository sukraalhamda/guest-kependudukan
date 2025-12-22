<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm sticky-top py-lg-0 px-4">
    <div class="container-fluid px-0">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center py-3">
            <!-- Logo Container -->
            <div class="logo-container" style="height: 75px;">
                <!-- Logo Image Only -->
                <img src="{{ asset('asset/img/LogoPanjang.png') }}" alt="Logo Kependudukan"
                    class="h-100 w-auto object-fit-contain" style="filter: brightness(1.1);">
            </div>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto p-4 p-lg-0 align-items-center gap-3">
                <!-- Navigation Items -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} px-3"
                        href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} px-3"
                        href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-2"></i>About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }} px-3"
                        href="{{ route('service') }}">
                        <i class="fas fa-concierge-bell me-2"></i>Service
                    </a>
                </li>
                <!-- DATA MASTER (ADMIN & USER) -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-database me-2"></i>Data Master
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark rounded-0 shadow-lg border-0">

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('keluargakk.index') }}">
                                    <i class="fas fa-users me-2"></i>Keluarga KK
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('warga.index') }}">
                                    <i class="fas fa-user me-2"></i>Data Warga
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('anggota_keluarga.index') }}">
                                    <i class="fas fa-user-friends me-2"></i>Anggota Keluarga
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider bg-secondary">
                            </li>

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('peristiwa_kelahiran.index') }}">
                                    <i class="fas fa-baby me-2"></i>Kelahiran
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('peristiwa_kematian.index') }}">
                                    <i class="fas fa-user-times me-2"></i>Kematian
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2" href="{{ route('peristiwa_pindah.index') }}">
                                    <i class="fas fa-truck-moving me-2"></i>Pindah
                                </a>
                            </li>

                            {{-- KHUSUS ADMIN --}}
                            @if (Auth::user()->role === 'admin')
                                <li>
                                    <hr class="dropdown-divider bg-secondary">
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('user.index') }}">
                                        <i class="fas fa-user-cog me-2"></i>User
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} px-3"
                        href="{{ route('contact') }}">
                        <i class="fas fa-address-book me-2"></i>Contact
                    </a>
                </li>

                <!-- AUTH SECTION -->
                @auth
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center px-3" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <!-- User Avatar -->
                            <div class="position-relative me-2">
                                <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                    style="width: 38px; height: 38px; font-size: 14px;">
                                    {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                                </div>
                                <!-- Online Indicator -->
                                <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-secondary"
                                    style="width: 10px; height: 10px;"></div>
                            </div>
                            <!-- User Name (hidden on mobile) -->
                            <div class="d-none d-lg-block text-start">
                                <div class="fw-bold text-white" style="font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                                <small class="text-light" style="font-size: 0.75rem;">
                                    {{ strtoupper(Auth::user()->role) }} Account
                                </small>
                            </div>
                        </a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-0 shadow-lg border-0"
                            style="min-width: 220px;">
                            <li class="px-3 py-3 border-bottom border-secondary">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center fw-bold me-3"
                                        style="width: 40px; height: 40px; font-size: 16px;">
                                        {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-white">{{ Auth::user()->name }}</div>
                                        <small class="text-danger">{{ strtoupper(Auth::user()->role) }}</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item text-light py-2"
                                    href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider bg-secondary my-1">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item text-danger py-2" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>

            <!-- GUEST BUTTONS -->
            @guest
                <div class="d-flex ms-lg-4 gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 px-4 py-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </a>
                    <a href="{{ route('signup') }}" class="btn btn-danger rounded-0 px-4 py-2">
                        <i class="fas fa-user-plus me-2"></i>Sign Up
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
<!-- Navbar End -->
