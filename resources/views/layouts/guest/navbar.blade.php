<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5">

    {{-- LOGO --}}
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
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- MENU --}}
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0 align-items-center">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">
                    Service
                </a>
            </li>

            {{-- ADMIN --}}
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            Data Master
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark rounded-0">
                            <li><a class="dropdown-item" href="{{ route('keluargakk.index') }}">Keluarga KK</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.index') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.index') }}">User</a></li>
                            <li><a class="dropdown-item" href="{{ route('anggota_keluarga.index') }}">Anggota Keluarga</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('peristiwa_kelahiran.index') }}">Peristiwa
                                    Kelahiran</a></li>
                        </ul>
                    </li>
                @endif
            @endauth

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                    Contact
                </a>
            </li>

        </ul>

        {{-- GUEST --}}
        @guest
            <div class="d-none d-lg-flex ms-lg-3 gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 px-4">
                    Login
                </a>
                <a href="{{ route('signup') }}" class="btn btn-danger rounded-0 px-4">
                    Sign Up
                </a>
            </div>
        @endguest

        {{-- AUTH --}}
        @auth
            <div class="dropdown ms-lg-3">

                <button class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center fw-bold"
                    style="width:42px;height:42px;font-size:13px;" data-bs-toggle="dropdown">
                    {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-0 shadow">

                    <li class="px-4 py-3 border-bottom border-secondary">
                        <div class="fw-bold text-light">{{ Auth::user()->name }}</div>
                        <small class="text-danger">{{ strtoupper(Auth::user()->role) }}</small>
                    </li>

                    <li>
                        <a class="dropdown-item text-light"
                            href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="border-top border-secondary">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit">
                                Log Out
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        @endauth

    </div>
</nav>
<!-- Navbar End -->
