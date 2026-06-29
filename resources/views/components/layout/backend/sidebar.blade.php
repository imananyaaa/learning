<aside
    class="sidebar-bg fixed inset-y-0 left-0 z-50 w-64 flex flex-col transform transition-transform duration-300 md:translate-x-0"
    :class="sidebar ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
    <div class="flex items-center justify-between h-[68px] px-5 border-b border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                <img src="{{ url('public/images/logo-lc.png') }}" class="w-7 h-7 object-contain rounded"
                    onerror="this.style.display='none';document.getElementById('sb-icon').style.display='block'">
                <i id="sb-icon" class="fa-solid fa-graduation-cap text-white text-base" style="display:none"></i>
            </div>
            <div>
                <p class="text-white font-bold text-sm">Learning Center</p>
                <p class="text-blue-200/60 text-[11px]">Sir Michael Uren</p>
            </div>
        </div>
        <button @click="sidebar=false" class="md:hidden text-white/60 hover:text-white">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>

    <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-0.5">
        <p class="nav-section">Menu Utama</p>
        <a href="{{ url('backend/dashboard') }}"
            class="nav-link {{ request()->routeIs('backend/dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gauge-high"></i></span> Dashboard
        </a>

        <p class="nav-section">Pengelolaan</p>

        <div x-data="{ openFasilitas: false }">

            {{-- Menu Utama --}}
            <button @click="openFasilitas = !openFasilitas" class="nav-link w-full flex items-center justify-between">

                <div class="flex items-center gap-3">
                    <span class="nav-icon">
                        <i class="fa-solid fa-building"></i>
                    </span>

                    <span>Fasilitas</span>
                </div>

                <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300"
                    :class="{ 'rotate-180': openFasilitas }">
                </i>

            </button>

            {{-- Dropdown --}}
            <div x-show="openFasilitas" x-transition class="ml-12 mt-1">

                <a href="{{ url('backend/fasilitas') }}" class="block py-2 text-sm text-white/70 hover:text-white">
                    Data Fasilitas
                </a>

            </div>

        </div>

        <a href="{{ url('backend/event') }}"
            class="nav-link {{ request()->routeIs('backend/event*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-calendar-days"></i></span> Event
        </a>
        <a href="{{ url('backend/ulasan') }}"
            class="nav-link {{ request()->routeIs('backend/ulasan*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-star"></i></span> Ulasan

        </a>
        <a href="{{ url('backend/kontak') }}"
            class="nav-link {{ request()->routeIs('backend/kontak*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-envelope"></i></span> Kontak

        </a>

        <a href="{{ url('backend/pengguna') }}"
            class="nav-link {{ request()->routeIs('backend/pengguna*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span> pengguna

        </a>
    </nav>

    <div class="p-4 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3 px-2 mb-3">
            <div
                class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">

            </div>
            <div class="min-w-0">
                <p class="text-white text-sm font-semibold truncate">{{ Auth::guard('admin')->user()->nama }}</p>

            </div>
        </div>

        <a href="{{ url('logout') }}" onclick="return confirm('Apakah Anda Yakin Ingin Meninggalkan Halaman Ini')"
            class="nav-link w-full text-left hover:!bg-red-500/20 hover:!text-red-300">
            <span class="nav-icon !bg-transparent"><i class="fa-solid fa-right-from-bracket"></i></span> Keluar
        </a>

    </div>
</aside>
