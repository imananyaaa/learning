<x-pengguna>

    {{-- =========================================================
        HERO HALAMAN EVENT
    ========================================================== --}}
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-ov"></div>

        <div class="container" style="position:relative;z-index:2;">
            <div data-aos="fade-up">

                <div class="hero-badge">
                    <i class="bi bi-calendar-event-fill"></i>
                    EVENT
                </div>

                <h1 class="stitle"
                    style="font-size:clamp(2rem,4vw,3rem);
                           font-weight:800;
                           color:#fff;
                           line-height:1.2;
                           margin-bottom:16px;">

                    Acara &
                    <em style="color:var(--primary-lighter);font-style:normal;">
                        Kegiatan
                    </em>
                </h1>

                <p style="color:rgba(255,255,255,.85);
                          max-width:600px;
                          line-height:1.8;
                          font-size:1.1rem;">

                    Berbagai kegiatan internal dan eksternal yang
                    diselenggarakan di Learning Center.
                </p>

            </div>
        </div>
    </section>


    {{-- =========================================================
        DAFTAR EVENT
    ========================================================== --}}
    <section style="background:var(--cr-100);">

        <div class="container">

            {{-- =====================================================
                TAB FILTER
            ====================================================== --}}
            <div class="d-flex gap-3 flex-wrap mb-5 justify-content-center"
                data-aos="fade-up">

                <button type="button"
                    class="event-tab-btn active"
                    onclick="filterEvents('semua', this)">

                    Semua Acara
                </button>

                <button type="button"
                    class="event-tab-btn"
                    onclick="filterEvents('internal', this)">

                    Acara Internal
                </button>

                <button type="button"
                    class="event-tab-btn"
                    onclick="filterEvents('eksternal', this)">

                    Acara Eksternal
                </button>

            </div>


            {{-- =====================================================
                GRID EVENT
            ====================================================== --}}
            <div class="row g-4" id="eventGrid">

                @forelse ($list_event as $event)

                    <div class="col-lg-4 col-md-6 event-item"
                        data-type="{{ strtolower($event->jenis) }}"
                        data-aos="fade-up">

                        <div class="ev-card h-100">

                            {{-- =================================================
                                GAMBAR EVENT
                            ================================================== --}}
                            <div class="ev-card-img"
                                title="Klik untuk melihat detail"
                                style="cursor:pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#detailEvent{{ $event->id }}">

                                @if ($event->foto)

                                    <img src="{{ url('public/' . $event->foto) }}"
                                        alt="{{ $event->judul }}"
                                        onerror="this.onerror=null;this.src='{{ url('public/images/foto lc.jpg') }}'">

                                @else

                                    <img src="{{ url('public/images/foto lc.jpg') }}"
                                        alt="{{ $event->judul }}">

                                @endif


                                {{-- OVERLAY GAMBAR --}}
                                <div class="event-img-overlay">

                                    <span>
                                        <i class="bi bi-zoom-in"></i>
                                        Lihat Detail
                                    </span>

                                </div>

                            </div>


                            {{-- =================================================
                                BODY CARD
                            ================================================== --}}
                            <div class="ev-body d-flex flex-column">

                                {{-- BADGE --}}
                                <div class="d-flex gap-2 flex-wrap mb-3">

                                    <span class="ev-badge badge-{{ strtolower($event->jenis) }}">
                                        {{ ucfirst($event->jenis) }}
                                    </span>

                                    <span class="ev-badge badge-open">
                                        {{ ucfirst($event->status) }}
                                    </span>

                                </div>


                                {{-- JUDUL --}}
                                <div style="font-weight:700;
                                            font-size:.96rem;
                                            color:var(--tx-900);
                                            margin-bottom:6px;">

                                    {{ $event->judul }}
                                </div>


                                {{-- DESKRIPSI SINGKAT --}}
                                <p style="font-size:.83rem;
                                          color:var(--tx-400);
                                          line-height:1.65;
                                          margin-bottom:10px;">

                                    {{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}
                                </p>


                                {{-- META EVENT --}}
                                <div class="ev-meta mb-3">

                                    <span>
                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="bi bi-clock"></i>

                                        {{ $event->waktu }}
                                    </span>

                                    <span>
                                        <i class="bi bi-geo-alt"></i>

                                        {{ $event->lokasi }}
                                    </span>

                                    <span>
                                        <i class="bi bi-people"></i>

                                        {{ $event->kuota ?? 'Tidak Terbatas' }}
                                    </span>

                                </div>


                                {{-- =================================================
                                    TOMBOL LIHAT DETAIL
                                ================================================== --}}
                                <div class="mt-auto pt-3">

                                    <button type="button"
                                        class="btn-primary-custom
                                               w-100
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               gap-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailEvent{{ $event->id }}">

                                        <i class="bi bi-eye"></i>
                                        Lihat Detail
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        MODAL DETAIL EVENT
                    ====================================================== --}}
                    <div class="modal fade"
                        id="detailEvent{{ $event->id }}"
                        tabindex="-1"
                        aria-labelledby="detailEventLabel{{ $event->id }}"
                        aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content"
                                style="border-radius:20px;
                                       border:none;
                                       overflow:hidden;">


                                {{-- =============================================
                                    HEADER MODAL
                                ============================================== --}}
                                <div class="modal-header"
                                    style="border-bottom:1px solid #e8eef7;
                                           padding:20px 28px;">

                                    <h5 class="modal-title"
                                        id="detailEventLabel{{ $event->id }}"
                                        style="font-weight:700;
                                               color:var(--text-dark);">

                                        <i class="bi bi-calendar-event me-2"></i>

                                        Detail Event
                                    </h5>


                                    <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>

                                </div>


                                {{-- =============================================
                                    BODY MODAL
                                ============================================== --}}
                                <div class="modal-body"
                                    style="padding:28px;">


                                    {{-- FOTO + INFORMASI --}}
                                    <div class="row g-4 align-items-start">


                                        {{-- =====================================
                                            FOTO EVENT
                                        ====================================== --}}
                                        <div class="col-lg-5">

                                            @if ($event->foto)

                                                <img src="{{ url('public/' . $event->foto) }}"
                                                    alt="{{ $event->judul }}"
                                                    class="img-fluid w-100"
                                                    style="height:300px;
                                                           object-fit:cover;
                                                           border-radius:16px;"
                                                    onerror="this.onerror=null;this.src='{{ url('public/images/foto lc.jpg') }}'">

                                            @else

                                                <img src="{{ url('public/images/foto lc.jpg') }}"
                                                    alt="{{ $event->judul }}"
                                                    class="img-fluid w-100"
                                                    style="height:300px;
                                                           object-fit:cover;
                                                           border-radius:16px;">

                                            @endif

                                        </div>


                                        {{-- =====================================
                                            INFORMASI EVENT
                                        ====================================== --}}
                                        <div class="col-lg-7">

                                            <div style="background:#f8fbff;
                                                        border-radius:16px;
                                                        padding:22px;">


                                                {{-- BADGE --}}
                                                <div class="d-flex gap-2 flex-wrap mb-3">

                                                    <span class="ev-badge badge-{{ strtolower($event->jenis) }}">
                                                        {{ ucfirst($event->jenis) }}
                                                    </span>

                                                    <span class="ev-badge badge-open">
                                                        {{ ucfirst($event->status) }}
                                                    </span>

                                                </div>


                                                {{-- JUDUL --}}
                                                <div class="mb-3">

                                                    <small style="color:var(--text-light);">
                                                        Nama Event
                                                    </small>

                                                    <div style="font-weight:700;
                                                                color:var(--text-dark);
                                                                margin-top:4px;">

                                                        {{ $event->judul }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- TANGGAL --}}
                                                <div class="mb-3">

                                                    <small style="color:var(--text-light);">
                                                        <i class="bi bi-calendar3 me-1"></i>
                                                        Tanggal
                                                    </small>

                                                    <div style="font-weight:600;
                                                                color:var(--text-dark);
                                                                margin-top:4px;">

                                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- WAKTU --}}
                                                <div class="mb-3">

                                                    <small style="color:var(--text-light);">
                                                        <i class="bi bi-clock me-1"></i>
                                                        Waktu
                                                    </small>

                                                    <div style="font-weight:600;
                                                                color:var(--text-dark);
                                                                margin-top:4px;">

                                                        {{ $event->waktu }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- LOKASI --}}
                                                <div class="mb-3">

                                                    <small style="color:var(--text-light);">
                                                        <i class="bi bi-geo-alt me-1"></i>
                                                        Lokasi
                                                    </small>

                                                    <div style="font-weight:600;
                                                                color:var(--text-dark);
                                                                margin-top:4px;">

                                                        {{ $event->lokasi }}
                                                    </div>

                                                </div>

                                                <hr>


                                                {{-- KUOTA --}}
                                                <div>

                                                    <small style="color:var(--text-light);">
                                                        <i class="bi bi-people me-1"></i>
                                                        Kuota Peserta
                                                    </small>

                                                    <div style="font-weight:600;
                                                                color:var(--text-dark);
                                                                margin-top:4px;">

                                                        {{ $event->kuota ?? 'Tidak Terbatas' }}
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- =============================================
                                        DESKRIPSI EVENT
                                    ============================================== --}}
                                    <div class="mt-4"
                                        style="background:#f8fbff;
                                               border-radius:16px;
                                               padding:22px;">

                                        <h6 style="font-weight:700;
                                                   color:var(--text-dark);
                                                   margin-bottom:10px;">

                                            <i class="bi bi-card-text me-2"></i>
                                            Deskripsi Event
                                        </h6>

                                        <p style="color:var(--text-medium);
                                                  line-height:1.8;
                                                  margin:0;">

                                            {{ $event->deskripsi ?? 'Deskripsi event belum tersedia.' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- =============================================
                                    FOOTER MODAL
                                ============================================== --}}
                                <div class="modal-footer"
                                    style="border-top:1px solid #e8eef7;
                                           padding:18px 28px;">

                                    <button type="button"
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

                    {{-- =====================================================
                        JIKA DATA EVENT KOSONG
                    ====================================================== --}}
                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-calendar-x"
                                style="font-size:3rem;
                                       color:var(--text-light);">
                            </i>

                            <p class="mt-3"
                                style="color:var(--text-light);">

                                Data event belum tersedia.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
        CSS TAMBAHAN KHUSUS EVENT
    ========================================================== --}}
    @push('styles')

        <style>

            /* =============================================
                CARD EVENT AGAR TINGGI SERAGAM
            ============================================== */
            .ev-card {
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .ev-body {
                flex: 1;
            }


            /* =============================================
                GAMBAR EVENT
            ============================================== */
            .ev-card-img {
                position: relative;
                overflow: hidden;
            }

            .ev-card-img img {
                width: 100%;
                height: 220px;
                object-fit: cover;
                transition: transform .4s ease;
            }

            .ev-card-img:hover img {
                transform: scale(1.05);
            }


            /* =============================================
                OVERLAY GAMBAR
            ============================================== */
            .event-img-overlay {
                position: absolute;
                inset: 0;

                display: flex;
                align-items: center;
                justify-content: center;

                background: rgba(20, 80, 160, .55);

                opacity: 0;
                transition: opacity .3s ease;
            }

            .ev-card-img:hover .event-img-overlay {
                opacity: 1;
            }

            .event-img-overlay span {
                color: #fff;
                font-size: .9rem;
                font-weight: 700;

                display: flex;
                align-items: center;
                gap: 7px;
            }


            /* =============================================
                TOMBOL DETAIL
            ============================================== */
            .ev-body .btn-primary-custom {
                border: none;
                cursor: pointer;
                text-decoration: none;
            }


            /* =============================================
                RESPONSIVE
            ============================================== */
            @media (max-width: 768px) {

                .ev-card-img img {
                    height: 200px;
                }

            }

        </style>

    @endpush


    {{-- =========================================================
        SCRIPT FILTER EVENT
    ========================================================== --}}
    @push('scripts')

        <script>

            function filterEvents(type, btn) {

                /* HAPUS ACTIVE DARI SEMUA TAB */
                document
                    .querySelectorAll('.event-tab-btn')
                    .forEach(button => {
                        button.classList.remove('active');
                    });


                /* TAMBAHKAN ACTIVE KE TOMBOL DIPILIH */
                btn.classList.add('active');


                /* FILTER CARD EVENT */
                document
                    .querySelectorAll('.event-item')
                    .forEach(item => {

                        const eventType =
                            item.dataset.type.toLowerCase();


                        if (
                            type === 'semua' ||
                            eventType === type
                        ) {

                            item.style.display = '';

                        } else {

                            item.style.display = 'none';

                        }

                    });

            }

        </script>

    @endpush

</x-pengguna>
