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
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('tentang-kami') ? 'active' : '' }}" href="{{url('tentang-kami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('fasilitas') ? 'active' : '' }}" href="{{url('fasilitas') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('event') ? 'active' : '' }}" href="{{url('event') }}">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('ulasan') ? 'active' : '' }}"href="{{url('ulasan') }}">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('kontak') ? 'active' : '' }}" href="{{url('kontak') }}">Kontak</a>
                </li>
            </ul>
            <a href="{{url('login') }}" class="btn-login-nav">
                <i class="bi bi-person-fill"></i> Login Admin
            </a>
        </div>
    </div>
</nav>
