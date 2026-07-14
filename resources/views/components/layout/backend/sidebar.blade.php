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

        <a href="{{ url('backend/tentang_kami') }}"
            class="nav-link {{ request()->routeIs('backend/tentang_kami*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-address-card"></i></span> Tentang Kami
        </a>

        <div x-data="{ open: {{ request()->routeIs('backend/fasilitas/utama*', 'backend/fasilitas/pendukung*') ? 'true' : 'false' }} }">

            <button @click="open = !open"
                class="nav-link w-full flex items-center justify-between {{ request()->routeIs('backend/fasilitas*') ? 'active' : '' }}">
                <div class="flex items-center">
                    <span class="nav-icon">
                        <i class="fa-solid fa-building"></i>
                    </span>
                    <span style="margin-left: 10px"> Data Fasilitas</span>
                </div>
                <i class="fa-solid fa-chevron-down text-[10px] opacity-70 transition-transform duration-300"
                    :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="pl-12 pr-4 py-2 space-y-1" style="display: none;">

                <a href="{{ url('backend/fasilitas-utama') }}"
                    class="block py-2 text-sm rounded-md transition-colors {{ request()->routeIs('backend/fasilitas/utama*') ? 'text-white bg-white/10 font-medium' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                    <div class="flex items-center">
                        <span class="nav-icon">
                            <i class="fa-solid fa-door-open"></i>
                        </span>
                        <span style="margin-left: 10px"> Fasilitas Utama</span>
                    </div>
                </a>

                <a href="{{ url('backend/fasilitas-pendukung') }}"
                    class="block py-2 text-sm rounded-md transition-colors {{ request()->routeIs('backend/fasilitas/pendukung*') ? 'text-white bg-white/10 font-medium' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                    <div class="flex items-center">
                        <span class="nav-icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </span>
                        <span style="margin-left: 10px"> Fasilitas Pendukung</span>
                    </div>
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
            <span class="nav-icon"><i class="fa-solid fa-solid fa-address-book"></i></span> Kontak

        </a>

        <a href="{{ url('backend/pesan') }}"
            class="nav-link {{ request()->routeIs('backend/pesan*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-envelope"></i></span> Pesan

        </a>

        <a href="{{ url('backend/pengguna') }}"
            class="nav-link {{ request()->routeIs('backend/pengguna*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span> Pengguna

        </a>

        <div x-data="{ open: {{ request()->routeIs('backend/booking*', 'backend/booking-selesai*', 'backend/booking-ditolak*') ? 'true' : 'false' }} }">

            <button @click="open = !open"
                class="nav-link w-full flex items-center justify-between {{ request()->routeIs('backend/booking*') ? 'active' : '' }}">
                <div class="flex items-center">
                    <span class="nav-icon">
                        <i class="fa-solid fa-list"></i>
                    </span>
                    <span style="margin-left: 10px"> Data Booking</span>

                    <span class="ml-2 bg-red-500 text-white text-xs rounded-full px-2 py-1">
                        {{ $booking_masuk }}
                    </span>

                </div>
                <i class="fa-solid fa-chevron-down text-[10px] opacity-70 transition-transform duration-300"
                    :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="pl-12 pr-4 py-2 space-y-1" style="display: none;">

                <a href="{{ url('backend/booking') }}"
                    class="block py-2 text-sm rounded-md transition-colors {{ request()->routeIs('backend/booking*') ? 'text-white bg-white/10 font-medium' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                    <div class="flex items-center">
                        <span class="nav-icon">
                            <i class="fa-solid fa-list"></i>
                        </span>
                        <span style="margin-left: 10px"> Booking Masuk</span>
                    </div>
                </a>

                <a href="{{ url('backend/booking-selesai') }}"
                    class="block py-2 text-sm rounded-md transition-colors {{ request()->routeIs('backend/booking-selesai*') ? 'text-white bg-white/10 font-medium' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                    <div class="flex items-center">
                        <span class="nav-icon">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span style="margin-left: 10px"> Booking Selesai</span>
                    </div>
                </a>

                <a href="{{ url('backend/booking-ditolak') }}"
                    class="block py-2 text-sm rounded-md transition-colors {{ request()->routeIs('backend/booking-ditolak*') ? 'text-white bg-white/10 font-medium' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                    <div class="flex items-center">
                        <span class="nav-icon">
                            <i class="fa-solid fa-times"></i>
                        </span>
                        <span style="margin-left: 10px"> Booking Ditolak</span>
                    </div>
                </a>

            </div>
        </div>
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

        <a href="#" onclick="openLogoutModal()"
            class="nav-link w-full text-left hover:!bg-red-500/20 hover:!text-red-300">
            <span class="nav-icon !bg-transparent">
                <i class="fa-solid fa-right-from-bracket"></i>
            </span>
            Keluar
        </a>

        <!-- Logout Modal -->
        <div id="logoutModal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">

            <div id="logoutContent"
                class="w-full max-w-md rounded-2xl bg-white shadow-2xl transform scale-90 opacity-0 transition-all duration-300">

                <div class="p-8">

                    <!-- Icon -->
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-100">
                        <i class="fa-solid fa-right-from-bracket text-4xl text-red-500"></i>
                    </div>

                    <!-- Title -->
                    <h2 class="mt-5 text-center text-2xl font-bold text-gray-800">
                        Keluar?
                    </h2>

                    <!-- Text -->
                    <p class="mt-2 text-center text-gray-500">
                        Apakah Anda yakin ingin keluar dari sistem?
                    </p>

                    <!-- Button -->
                    <div class="mt-8 flex gap-3">

                        <button onclick="closeLogoutModal()"
                            class="flex-1 rounded-xl border border-gray-300 py-3 font-semibold text-gray-700 transition hover:bg-gray-100">
                            Batal
                        </button>

                        <a href="{{ url('logout') }}"
                            class="flex-1 rounded-xl bg-red-500 py-3 text-center font-semibold text-white transition hover:bg-red-600">
                            Ya, Keluar
                        </a>

                    </div>

                </div>

            </div>
        </div>


    </div>
</aside>
