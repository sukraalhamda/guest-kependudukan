<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm sticky-top py-lg-0 px-lg-5">

    {{-- LOGO --}}
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
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- MENU --}}
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0 align-items-center">

            <li class="nav-item">
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active text-danger fw-bold' : '' }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active text-danger fw-bold' : '' }}">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('service') }}"
                   class="nav-link {{ request()->routeIs('service') ? 'active text-danger fw-bold' : '' }}">
                    Service
                </a>
            </li>

            {{-- ADMIN ONLY --}}
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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
                <a href="{{ route('contact') }}"
                   class="nav-link {{ request()->routeIs('contact') ? 'active text-danger fw-bold' : '' }}">
                    Contact
                </a>
            </li>
        </ul>

        {{-- GUEST BUTTONS --}}
        @guest
            <div class="d-none d-lg-flex ms-lg-3 gap-2 align-items-center">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-1 px-4" style="height:42px;">
                    Login
                </a>
                <a href="{{ route('signup') }}" class="btn btn-danger rounded-1 px-4" style="height:42px;">
                    Sign Up
                </a>
            </div>
        @endguest

        {{-- AUTH USER DROPDOWN --}}
        @auth
            <div class="dropdown ms-lg-4">

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
                        <small class="text-danger">{{ strtoupper(Auth::user()->role) }}</small>
                    </li>

                    <li>
                        <a class="dropdown-item text-light py-2"
                           href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="border-top border-secondary">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger py-2">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

    </div>
</nav>
<!-- Navbar End -->
