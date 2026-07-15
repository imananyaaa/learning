<x-frontend>

    {{-- =========================================================
        HERO HALAMAN FASILITAS
    ========================================================== --}}
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-ov"></div>

        <div class="container" style="position:relative;z-index:2;">
            <div data-aos="fade-up">

                <div class="stag"
                    style="background:rgba(255,255,255,.15);
                           color:#fff;
                           border:1px solid rgba(255,255,255,.25);">
                    <i class="bi bi-building"></i>
                    Fasilitas
                </div>

                <h1
                    style="font-size:clamp(2rem,4vw,3rem);
                           font-weight:800;
                           color:#fff;
                           line-height:1.2;
                           margin-bottom:16px;">

                    Fasilitas
                    <em style="color:var(--primary-lighter);font-style:normal;">
                        Lengkap & Modern
                    </em>
                </h1>

                <p
                    style="color:rgba(255,255,255,.75);
                           max-width:500px;
                           line-height:1.8;
                           margin:0;
                           font-size:1rem;">

                    Berbagai fasilitas terlengkap untuk mendukung kegiatan
                    konservasi, pelatihan, dan edukasi.
                </p>

            </div>
        </div>
    </section>


    {{-- =========================================================
        FASILITAS UTAMA
    ========================================================== --}}
    <section style="background:var(--bg-light);">
        <div class="container">

            {{-- JUDUL SECTION --}}
            <div class="row justify-content-between align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">

                    <div class="stag">
                        <i class="bi bi-star-fill"></i>
                        Fasilitas Utama
                    </div>

                    <h2 class="stitle">
                        Fasilitas <em>Utama</em>
                    </h2>

                    <div class="divider"></div>

                    <p class="sdesc">
                        Fasilitas utama yang tersedia untuk mendukung kegiatan inti.
                    </p>

                </div>
            </div>


            {{-- DAFTAR FASILITAS UTAMA --}}
            <div class="row g-4">

                @forelse ($list_fasilitas as $fasilitas)

                    <div class="col-lg-4 col-md-6" data-aos="fade-up">

                        <div class="fac-card">

                            {{-- GAMBAR --}}
                            <div class="fac-img"
                                title="Klik untuk melihat detail"
                                style="cursor:pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#detailFasilitas{{ $fasilitas->id }}">

                                <img
                                    src="{{ $fasilitas->foto
                                        ? url('public/' . $fasilitas->foto)
                                        : url('public/images/lc.jpg') }}"
                                    alt="{{ $fasilitas->nama }}"
                                    onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">

                                <div class="fac-img-overlay">
                                    <span>
                                        <i class="bi bi-zoom-in"></i>
                                        Lihat Detail
                                    </span>
                                </div>

                            </div>


                            {{-- BODY CARD --}}
                            <div class="fac-body">

                                <span class="fac-tag utama">
                                    Fasilitas Utama
                                </span>

                                <div
                                    style="font-weight:700;
                                           font-size:.97rem;
                                           color:var(--text-dark);
                                           margin-bottom:6px;">

                                    {{ $fasilitas->nama }}
                                </div>

                                <p
                                    style="font-size:.84rem;
                                           color:var(--text-light);
                                           line-height:1.65;
                                           margin:0 0 14px;">

                                    {{ $fasilitas->deskripsi }}
                                </p>


                                {{-- TOMBOL --}}
                                <div class="row g-3">

                                    {{-- BOOKING -> LOGIN --}}
                                    <div class="col-6">

                                        <a href="{{ url('/login') }}"
                                            class="btn-primary-custom
                                                   text-decoration-none
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   gap-2
                                                   w-100">

                                            <i class="bi bi-cart"></i>
                                            Booking
                                        </a>

                                    </div>


                                    {{-- DETAIL --}}
                                    <div class="col-6">

                                        <button
                                            type="button"
                                            class="btn-primary-custom w-100"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detailFasilitas{{ $fasilitas->id }}">

                                            <i class="bi bi-eye"></i>
                                            Lihat Detail
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- =====================================================
                        MODAL DETAIL FASILITAS UTAMA
                    ====================================================== --}}
                    <div
                        class="modal fade"
                        id="detailFasilitas{{ $fasilitas->id }}"
                        tabindex="-1"
                        aria-labelledby="detailFasilitasLabel{{ $fasilitas->id }}"
                        aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div
                                class="modal-content"
                                style="border-radius:20px;
                                       border:none;
                                       overflow:hidden;">


                                {{-- HEADER MODAL --}}
                                <div
                                    class="modal-header"
                                    style="border-bottom:1px solid #e8eef7;
                                           padding:20px 28px;">

                                    <h5
                                        class="modal-title"
                                        id="detailFasilitasLabel{{ $fasilitas->id }}"
                                        style="font-weight:700;
                                               color:var(--text-dark);">

                                        <i class="bi bi-building me-2"></i>
                                        Detail {{ $fasilitas->nama }}
                                    </h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>

                                </div>


                                {{-- BODY MODAL --}}
                                <div class="modal-body" style="padding:28px;">

                                    <div class="row g-4 align-items-start">


                                        {{-- FOTO --}}
                                        <div class="col-lg-5">

                                            <img
                                                src="{{ $fasilitas->foto
                                                    ? url('public/' . $fasilitas->foto)
                                                    : url('public/images/lc.jpg') }}"
                                                alt="{{ $fasilitas->nama }}"
                                                class="img-fluid w-100"
                                                style="height:280px;
                                                       object-fit:cover;
                                                       border-radius:16px;"
                                                onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">

                                        </div>


                                        {{-- INFORMASI --}}
                                        <div class="col-lg-7">

                                            <div
                                                style="background:#f8fbff;
                                                       border-radius:16px;
                                                       padding:22px;">


                                                {{-- NAMA --}}
                                                <div class="mb-3">

                                                    <small
                                                        style="color:var(--text-light);">
                                                        Nama Fasilitas
                                                    </small>

                                                    <div
                                                        style="font-weight:700;
                                                               color:var(--text-dark);
                                                               margin-top:4px;">

                                                        {{ $fasilitas->nama }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- KAPASITAS --}}
                                                <div class="mb-3">

                                                    <small
                                                        style="color:var(--text-light);">
                                                        Kapasitas
                                                    </small>

                                                    <div
                                                        style="font-weight:600;
                                                               color:var(--text-dark);
                                                               margin-top:4px;">

                                                        {{ $fasilitas->kapasitas ?? 'Tidak tersedia' }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- STATUS --}}
                                                <div>

                                                    <small
                                                        style="color:var(--text-light);">
                                                        Status
                                                    </small>

                                                    <div
                                                        style="font-weight:600;
                                                               color:var(--text-dark);
                                                               margin-top:4px;">

                                                        {{ $fasilitas->status ?? 'Tidak tersedia' }}
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    {{-- DESKRIPSI --}}
                                    <div
                                        class="mt-4"
                                        style="background:#f8fbff;
                                               border-radius:16px;
                                               padding:22px;">

                                        <h6
                                            style="font-weight:700;
                                                   color:var(--text-dark);
                                                   margin-bottom:10px;">

                                            <i class="bi bi-card-text me-2"></i>
                                            Deskripsi Fasilitas
                                        </h6>

                                        <p
                                            style="color:var(--text-medium);
                                                   line-height:1.8;
                                                   margin:0;">

                                            {{ $fasilitas->deskripsi ?? 'Deskripsi fasilitas belum tersedia.' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- FOOTER MODAL --}}
                                <div
                                    class="modal-footer"
                                    style="border-top:1px solid #e8eef7;
                                           padding:18px 28px;">

                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                        <i class="bi bi-x-lg"></i>
                                        Tutup
                                    </button>


                                    {{-- BOOKING WAJIB LOGIN --}}
                                    <a
                                        href="{{ url('/login') }}"
                                        class="btn btn-primary">

                                        <i class="bi bi-box-arrow-in-right"></i>
                                        Login untuk Booking
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="text-center py-5">

                            <i
                                class="bi bi-building"
                                style="font-size:3rem;color:var(--text-light);">
                            </i>

                            <p
                                class="mt-3"
                                style="color:var(--text-light);">

                                Data fasilitas utama belum tersedia.
                            </p>

                        </div>
                    </div>

                @endforelse

            </div>
        </div>
    </section>



    {{-- =========================================================
        FASILITAS PENDUKUNG
    ========================================================== --}}
    <section style="background:var(--bg-white);">

        <div class="container">

            {{-- JUDUL SECTION --}}
            <div class="row justify-content-between align-items-end mb-5">

                <div class="col-lg-6" data-aos="fade-right">

                    <div class="stag">
                        <i class="bi bi-tools"></i>
                        Fasilitas Pendukung
                    </div>

                    <h2 class="stitle">
                        Perlengkapan <em>Pendukung</em>
                    </h2>

                    <div class="divider"></div>

                    <p class="sdesc">
                        Peralatan dan perlengkapan yang tersedia untuk mendukung kegiatan.
                    </p>

                </div>
            </div>


            {{-- DAFTAR FASILITAS PENDUKUNG --}}
            <div class="row g-4">

                @forelse ($list_fasilitas_pendukung as $fasilitas)

                    <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up">

                        <div class="fac-card w-100 d-flex flex-column">

                            {{-- GAMBAR --}}
                            <div
                                class="fac-img"
                                title="Klik untuk melihat detail"
                                style="cursor:pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#detailPendukung{{ $fasilitas->id }}">

                                <img
                                    src="{{ $fasilitas->foto
                                        ? url('public/' . $fasilitas->foto)
                                        : url('public/images/lc.jpg') }}"
                                    alt="{{ $fasilitas->nama }}"
                                    onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">

                                <div class="fac-img-overlay">
                                    <span>
                                        <i class="bi bi-zoom-in"></i>
                                        Lihat Detail
                                    </span>
                                </div>

                            </div>


                            {{-- BODY --}}
                            <div class="fac-body d-flex flex-column">

                                <div class="fac-top">
                                    <span class="fac-tag utama">
                                        Fasilitas Pendukung
                                    </span>

                                    <h5 class="mt-3 mb-2">{{ $fasilitas->nama }}</h5>

                                    <p class="mb-0">
                                        {{ Str::words($fasilitas->deskripsi, 20) }}
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <button
                                        type="button"
                                        class="btn-primary-custom"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailPendukung{{ $fasilitas->id }}">
                                        <i class="bi bi-eye"></i>
                                        Lihat Detail
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- =====================================================
                        MODAL DETAIL FASILITAS PENDUKUNG
                    ====================================================== --}}
                    <div
                        class="modal fade"
                        id="detailPendukung{{ $fasilitas->id }}"
                        tabindex="-1"
                        aria-labelledby="detailPendukungLabel{{ $fasilitas->id }}"
                        aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div
                                class="modal-content"
                                style="border-radius:20px;
                                       border:none;
                                       overflow:hidden;">


                                {{-- HEADER --}}
                                <div
                                    class="modal-header"
                                    style="border-bottom:1px solid #e8eef7;
                                           padding:20px 28px;">

                                    <h5
                                        class="modal-title"
                                        id="detailPendukungLabel{{ $fasilitas->id }}"
                                        style="font-weight:700;
                                               color:var(--text-dark);">

                                        <i class="bi bi-tools me-2"></i>
                                        Detail {{ $fasilitas->nama }}
                                    </h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>

                                </div>


                                {{-- BODY --}}
                                <div class="modal-body" style="padding:28px;">

                                    <div class="row g-4 align-items-start">


                                        {{-- FOTO --}}
                                        <div class="col-lg-5">

                                            <img
                                                src="{{ $fasilitas->foto
                                                    ? url('public/' . $fasilitas->foto)
                                                    : url('public/images/lc.jpg') }}"
                                                alt="{{ $fasilitas->nama }}"
                                                class="img-fluid w-100"
                                                style="height:280px;
                                                       object-fit:cover;
                                                       border-radius:16px;"
                                                onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">

                                        </div>


                                        {{-- INFORMASI --}}
                                        <div class="col-lg-7">

                                            <div
                                                style="background:#f8fbff;
                                                       border-radius:16px;
                                                       padding:22px;">


                                                {{-- NAMA --}}
                                                <div class="mb-3">

                                                    <small
                                                        style="color:var(--text-light);">
                                                        Nama Fasilitas
                                                    </small>

                                                    <div
                                                        style="font-weight:700;
                                                               color:var(--text-dark);
                                                               margin-top:4px;">

                                                        {{ $fasilitas->nama }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- STATUS --}}
                                                <div>

                                                    <small
                                                        style="color:var(--text-light);">
                                                        Status
                                                    </small>

                                                    <div
                                                        style="font-weight:600;
                                                               color:var(--text-dark);
                                                               margin-top:4px;">

                                                        {{ $fasilitas->status ?? 'Tidak tersedia' }}
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    {{-- DESKRIPSI --}}
                                    <div
                                        class="mt-4"
                                        style="background:#f8fbff;
                                               border-radius:16px;
                                               padding:22px;">

                                        <h6
                                            style="font-weight:700;
                                                   color:var(--text-dark);
                                                   margin-bottom:10px;">

                                            <i class="bi bi-card-text me-2"></i>
                                            Deskripsi Fasilitas
                                        </h6>

                                        <p
                                            style="color:var(--text-medium);
                                                   line-height:1.8;
                                                   margin:0;">

                                            {{ $fasilitas->deskripsi ?? 'Deskripsi fasilitas belum tersedia.' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- FOOTER --}}
                                <div
                                    class="modal-footer"
                                    style="border-top:1px solid #e8eef7;
                                           padding:18px 28px;">

                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                        <i class="bi bi-x-lg"></i>
                                        Tutup
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="text-center py-5">

                            <i
                                class="bi bi-tools"
                                style="font-size:3rem;color:var(--text-light);">
                            </i>

                            <p
                                class="mt-3"
                                style="color:var(--text-light);">

                                Data fasilitas pendukung belum tersedia.
                            </p>

                        </div>
                    </div>

                @endforelse

            </div>
        </div>
    </section>



    {{-- =========================================================
        PAKET LAYANAN
    ========================================================== --}}
    <section style="background:var(--bg-light);">

        <div class="container">

            {{-- JUDUL --}}
            <div class="row justify-content-center mb-5">

                <div class="col-lg-6 text-center" data-aos="fade-up">

                    <div class="stag">
                        <i class="bi bi-box-seam-fill"></i>
                        Paket Layanan
                    </div>

                    <h2 class="stitle">
                        Pilih <em>Paket</em> yang Sesuai
                    </h2>

                    <div class="divider mx-auto"></div>

                    <p class="sdesc">
                        Tersedia berbagai paket layanan yang dapat disesuaikan
                        dengan kebutuhan kegiatan Anda.
                    </p>

                </div>
            </div>


            {{-- DATA PAKET --}}
            @php
                $pakets = [
                    [
                        'Half Day',
                        'Setengah hari (4 jam)',
                        'Rp 500.000',
                        'per sesi',
                        [
                            'Ruang rapat (maks. 30 org)',
                            'Proyektor & screen',
                            'Sound sistem',
                            'Flipchart & meja kursi',
                            'Air minum',
                        ],
                        '',
                        false,
                    ],

                    [
                        'Full Day',
                        'Satu hari penuh (8 jam)',
                        'Rp 900.000',
                        'per hari',
                        [
                            'Ruang rapat (maks. 50 org)',
                            'Proyektor & screen',
                            'Sound sistem',
                            'Flipchart & meja kursi',
                            '2x Coffee break',
                            'Makan siang',
                        ],
                        'featured',
                        true,
                    ],

                    [
                        'Overnight',
                        'Menginap (2 hari 1 malam)',
                        'Rp 2.000.000',
                        'per paket',
                        [
                            'Kamar penginapan',
                            'Full day program',
                            'Seluruh fasilitas pendukung',
                            '3x makan + coffee break',
                            'Dokumentasi acara',
                        ],
                        '',
                        false,
                    ],
                ];
            @endphp


            {{-- DAFTAR PAKET --}}
            <div class="row g-4 justify-content-center">

                @foreach ($pakets as $i => $pk)

                    <div
                        class="col-lg-4 col-md-6"
                        data-aos="fade-up"
                        data-aos-delay="{{ $i * 90 }}">

                        <div class="paket-card {{ $pk[5] }}">

                            <div
                                class="stag"
                                style="{{ $pk[6]
                                    ? 'background:var(--primary);color:#fff;'
                                    : '' }}">

                                {{ $pk[0] }}
                            </div>

                            <h5
                                style="font-weight:600;
                                       color:var(--text-dark);
                                       margin-bottom:6px;">

                                {{ $pk[1] }}
                            </h5>

                            <div class="paket-price">
                                {{ $pk[2] }}
                            </div>

                            <div
                                style="font-size:.75rem;
                                       color:var(--text-light);
                                       margin-bottom:20px;">

                                {{ $pk[3] }}
                            </div>

                            <ul class="paket-list list-unstyled">

                                @foreach ($pk[4] as $item)

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ $item }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>
                    </div>

                @endforeach

            </div>



            {{-- =====================================================
                MENU KONSUMSI
            ====================================================== --}}
            <div class="row mt-5" data-aos="fade-up">

                <div class="col-12">

                    <div
                        style="background:var(--bg-white);
                               border:1px solid var(--primary-lightest);
                               border-radius:var(--radius-lg);
                               padding:36px;">

                        <div class="row align-items-center g-4">


                            {{-- JUDUL KONSUMSI --}}
                            <div class="col-lg-3">

                                <div class="stag">
                                    <i class="bi bi-cup-hot-fill"></i>
                                    Paket Konsumsi
                                </div>

                                <h3
                                    class="stitle"
                                    style="font-size:1.6rem;">

                                    Pilihan <em>Konsumsi</em>
                                </h3>

                                <div class="divider"></div>

                                <p
                                    class="sdesc"
                                    style="font-size:.88rem;">

                                    Tersedia berbagai pilihan konsumsi yang
                                    dapat ditambahkan pada paket Anda.
                                </p>

                            </div>


                            {{-- DAFTAR KONSUMSI --}}
                            <div class="col-lg-9">

                                <div class="row g-3">

                                    @foreach ([
                                        [
                                            'Coffee Break',
                                            'Snack + minuman hangat/dingin',
                                            'Rp 25.000/orang'
                                        ],
                                        [
                                            'Makan Siang',
                                            'Nasi + lauk + sayur + minuman',
                                            'Rp 45.000/orang'
                                        ],
                                        [
                                            'Makan Malam',
                                            'Nasi + lauk + sayur + minuman',
                                            'Rp 45.000/orang'
                                        ],
                                        [
                                            'Paket Full Catering',
                                            '3x makan + 2x coffee break',
                                            'Rp 130.000/orang'
                                        ]
                                    ] as $m)

                                        <div class="col-md-6">

                                            <div
                                                style="background:var(--bg-light);
                                                       border-radius:var(--radius);
                                                       padding:16px 20px;
                                                       display:flex;
                                                       justify-content:space-between;
                                                       align-items:center;
                                                       border:1px solid var(--primary-lightest);">

                                                <div>

                                                    <div
                                                        style="font-weight:700;
                                                               font-size:.92rem;
                                                               color:var(--text-dark);">

                                                        {{ $m[0] }}
                                                    </div>

                                                    <div
                                                        style="font-size:.78rem;
                                                               color:var(--text-light);">

                                                        {{ $m[1] }}
                                                    </div>

                                                </div>


                                                <div
                                                    style="font-weight:700;
                                                           color:var(--primary);
                                                           font-size:.88rem;
                                                           white-space:nowrap;
                                                           margin-left:12px;">

                                                    {{ $m[2] }}
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</x-frontend>
