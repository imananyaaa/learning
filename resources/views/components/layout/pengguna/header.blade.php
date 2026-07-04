<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('home') }}">
            <div class="brand-logo">
                <img src="{{ url('public/images/logo-lc.png') }}"
                     alt="Logo LC"
                     class="logo-navbar">
            </div>
            <div class="brand-text">
                <span class="brand-name">LEARNING CENTER</span>
                <span class="brand-sub">SIR MICHAEL UREN</span>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto align-items-lg-center gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/') ? 'active' : '' }}" href="{{url('/pengguna') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/tentang-kami') ? 'active' : '' }}" href="{{url('pengguna/tentang-kami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/fasilitas') ? 'active' : '' }}" href="{{url('pengguna/fasilitas') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/event') ? 'active' : '' }}" href="{{url('pengguna/event') }}">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/ulasan') ? 'active' : '' }}"href="{{url('pengguna/ulasan') }}">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('pengguna/kontak') ? 'active' : '' }}" href="{{url('pengguna/kontak') }}">Kontak</a>
                </li>
            </ul>
            <a href="{{url('logout') }}" class="btn-login-nav">
                <i class="bi bi-person-fill"></i> Logout
            </a>
        </div>
    </div>
</nav>
