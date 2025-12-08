<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm sticky-top py-lg-0 px-lg-5">

    {{-- LOGO --}}
<<<<<<< HEAD
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center ms-4 ms-lg-0 gap-3">

        {{-- ICON --}}
        <img src="{{ asset('asset/img/desakependudukan.png') }}" alt="Desa Kependudukan" style="height:60px;">

        {{-- TEXT --}}
        <span class="fw-bold text-danger text-uppercase fs-2">
            Kependudukan
        </span>

    </a>

    {{-- TOGGLER --}}
    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
=======
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0 d-flex align-items-center">

        {{-- Logo Image --}}
        <img src="{{ asset('asset/img/LogoPanjang.png') }}"
             alt="Logo"
             class="me-3"
             style="height:85px; width:auto;">

        {{-- Text --}}
        <h1 class="mb-0 text-danger text-uppercase fw-bold" style="letter-spacing:2px;">
            KEPENDUDUKAN
        </h1>
    </a>

    {{-- Toggle Button --}}
    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- MENU --}}
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0 align-items-center">

            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
=======
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active text-danger fw-bold' : '' }}">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                    Home
                </a>
            </li>

            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
=======
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active text-danger fw-bold' : '' }}">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                    About
                </a>
            </li>

            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">
=======
                <a href="{{ route('service') }}"
                   class="nav-link {{ request()->routeIs('service') ? 'active text-danger fw-bold' : '' }}">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                    Service
                </a>
            </li>

<<<<<<< HEAD
            {{-- ADMIN --}}
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
=======
            {{-- ADMIN ONLY --}}
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                            Data Master
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark shadow">
                            <li><a class="dropdown-item" href="{{ route('keluargakk.index') }}">Keluarga KK</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.index') }}">User</a></li>
                            <li><a class="dropdown-item" href="{{ route('anggota_keluarga.index') }}">Anggota Keluarga</a></li>
                            <li><a class="dropdown-item" href="{{ route('peristiwa_kelahiran.index') }}">Peristiwa Kelahiran</a></li>
                        </ul>
                    </li>
                @endif
            @endauth

            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
=======
                <a href="{{ route('contact') }}"
                   class="nav-link {{ request()->routeIs('contact') ? 'active text-danger fw-bold' : '' }}">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                    Contact
                </a>
            </li>

        </ul>

        {{-- GUEST BUTTONS --}}
        @guest
<<<<<<< HEAD
            <div class="d-none d-lg-flex ms-lg-3 gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 px-4">
                    Login
                </a>
                <a href="{{ route('signup') }}" class="btn btn-danger rounded-0 px-4">
=======
            <div class="d-none d-lg-flex ms-lg-3 gap-2 align-items-center">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-1 px-4" style="height:42px;">
                    Login
                </a>
                <a href="{{ route('signup') }}" class="btn btn-danger rounded-1 px-4" style="height:42px;">
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                    Sign Up
                </a>
            </div>
        @endguest

        {{-- AUTH USER DROPDOWN --}}
        @auth
            <div class="dropdown ms-lg-4">

<<<<<<< HEAD
                <button class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center fw-bold"
                    style="width:42px;height:42px;font-size:13px;" data-bs-toggle="dropdown">
                    {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-0 shadow">

                    <li class="px-4 py-3 border-bottom border-secondary">
                        <div class="fw-bold text-light">{{ Auth::user()->name }}</div>
=======
                {{-- Circle Icon --}}
                <button class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center fw-bold shadow"
                    style="width:45px;height:45px;font-size:13px;"
                    data-bs-toggle="dropdown">

                    {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                </button>

                {{-- Dropdown --}}
                <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-1 shadow-lg" style="min-width:230px;">

                    <li class="px-4 py-3 border-bottom border-secondary text-light">
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                        <small class="text-danger">{{ strtoupper(Auth::user()->role) }}</small>
                    </li>

                    <li>
                        <a class="dropdown-item text-light py-2"
                           href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="border-top border-secondary">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
<<<<<<< HEAD
                            <button class="dropdown-item text-danger" type="submit">
                                Log Out
                            </button>
=======
                            <button type="submit" class="dropdown-item text-danger py-2">Log Out</button>
>>>>>>> b5345530eeefc3897466bb045fc9ac9073d51799
                        </form>
                    </li>

                </ul>
            </div>
        @endauth

    </div>
</nav>
<!-- Navbar End -->
