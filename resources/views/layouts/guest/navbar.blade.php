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

            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                About
            </a>

            <a href="{{ route('service') }}"
                class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
                Service
            </a>

            <!-- Master Data Dropdown -->
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle
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

        <!-- Auth Buttons -->
        @guest
            <div class="d-none d-lg-block ms-lg-3">
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 py-2 px-lg-4 me-2">
                    Login
                </a>
                <a href="{{ route('regis') }}" class="btn btn-primary rounded-0 py-2 px-lg-4">
                    Sign Up
                </a>
            </div>
        @else
            <div class="dropdown ms-lg-3">
                <button class="btn btn-primary rounded-0 py-2 px-lg-4 dropdown-toggle fas fa-user" type="button" id="userDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0"
                    aria-labelledby="userDropdown">
                    {{-- <li><a class="dropdown-item text-light" href="#">Profile</a></li> --}}
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-light">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>
<!-- Navbar End -->
