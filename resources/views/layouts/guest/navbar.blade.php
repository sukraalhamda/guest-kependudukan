<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5">

    {{-- LOGO --}}
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="mb-0 text-danger text-uppercase">KEPENDUDUKAN</h1>
    </a>

    {{-- TOGGLE --}}
    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- MENU --}}
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0 align-items-center">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('service') }}" class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
                    Service
                </a>
            </li>

            {{-- ADMIN MENU ONLY --}}
            @auth
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </li>
        </ul>

        {{-- GUEST --}}
        @guest
            <div class="d-none d-lg-flex ms-lg-3 gap-2 align-items-center">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 px-4" style="height:42px;">
                    Login
                </a>
                <a href="{{ route('signup') }}" class="btn btn-danger rounded-0 px-4" style="height:42px;">
                    Sign Up
                </a>
            </div>
        @endguest

        {{-- AUTH --}}
        @auth
            <div class="dropdown ms-lg-3">

                {{-- ICON BULAT ADM / USR --}}
                <button class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center fw-bold"
                    style="width:42px;height:42px;font-size:13px;" data-bs-toggle="dropdown">

                    {{ Auth::user()->role === 'admin' ? 'ADM' : 'USR' }}
                </button>

                {{-- DROPDOWN --}}
                <ul class="dropdown-menu dropdown-menu-end bg-dark rounded-0 shadow" style="min-width:220px;">

                    {{-- INFO --}}
                    <li class="px-4 py-3 border-bottom border-secondary">
                        <div class="fw-bold text-light">{{ Auth::user()->name }}</div>
                        <small class="text-danger">{{ strtoupper(Auth::user()->role) }}</small>
                    </li>

                    {{-- DASHBOARD --}}
                    <li>
                        <a class="dropdown-item text-light"
                            href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    {{-- LOGOUT --}}
                    <li class="border-top border-secondary">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
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
