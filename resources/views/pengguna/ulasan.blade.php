<x-pengguna>
    <section class="page-hero">

        <div class="page-hero-bg"></div>

        <div class="page-hero-ov"></div>

        <div class="container" style="position:relative; z-index:2;">

            <div data-aos="fade-up">

                <div class="stag"
                    style="background:rgba(255,255,255,.15);
            color:#fff;
            border:1px solid rgba(255,255,255,.25);">

                    <i class="bi bi-star-fill"></i>
                    Ulasan

                </div>

                <h1
                    style="
                font-size:clamp(2rem,4vw,3rem);
                font-weight:800;
                color:#fff;
                line-height:1.2;
                margin-bottom:16px;
            ">

                    Apa Kata
                    <em
                        style="
                    color:var(--primary-lighter);
                    font-style:normal;
                ">
                        Pengguna
                    </em>

                </h1>


                <p
                    style="
                color:rgba(255,255,255,.75);
                max-width:500px;
                line-height:1.8;
                margin:0;
                font-size:1rem;
            ">

                    Berbagai pengalaman dan cerita pengguna selama menggunakan fasilitas Learning Center.

                </p>

            </div>

        </div>

    </section>

    {{-- ULASAN & RATING --}}
    <section style="background:var(--bg-white);" id="ulasan">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>

                </div>
            @endif

            <div class="row justify-content-between align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="stag"><i class="bi bi-star-fill"></i> Ulasan</div>
                    <h2 class="stitle">Apa Kata <em>Pengguna</em>?</h2>
                    <div class="divider"></div>
                    <p class="sdesc">Ulasan nyata dari para peserta dan pengguna fasilitas Learning Center.</p>
                </div>
            </div>

            <div class="row g-4">

                {{-- Review Cards --}}
                <div class="col-lg-12">
                    <div class="d-flex flex-column gap-3">
                        @foreach ($list_ulasan as $ulasan)
                         @if (Auth::guard('pengguna')->user()->nik == $ulasan->nik)
                            <div class="review-card">
                                <div class="d-flex align-items-start gap-3">

                                    {{-- Avatar huruf awal nama --}}
                                    <div class="reviewer-avatar">
                                        <img src="{{ url("public/$ulasan->pengguna->foto") }}" alt="">
                                    </div>

                                    <div class="flex-grow-1">

                                        <div
                                            class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">

                                            <div>
                                                <div style="font-weight:700;font-size:.92rem;color:var(--text-dark);">
                                                   {{ $ulasan->pengguna->nama }}
                                                </div>

                                                <div style="font-size:.76rem;color:var(--text-light);">
                                                    {{ $ulasan->instansi ?? 'Pengguna Learning Center' }}
                                                </div>
                                            </div>

                                            <div class="stars-sm">
                                                {{ str_repeat('★', $ulasan->rating) }}
                                                {{ str_repeat('☆', 5 - $ulasan->rating) }}
                                            </div>

                                        </div>

                                        <p style="font-size:.87rem;color:var(--text-medium);line-height:1.7;margin:0;">
                                            {{ $ulasan->komentar }}
                                        </p>

                                    </div>

                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Form Ulasan --}}
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-lg-12 mx-auto">



                    <div class="review-input-card">

                        <h4 class="fw-bold mb-2">
                            Tulis Ulasan Anda
                        </h4>

                        <p class="text-muted mb-4">
                            Bagikan pengalaman Anda menggunakan fasilitas Learning Center.
                        </p>

                        <form action="{{ url('pengguna/ulasan') }}" method="POST">

                            @csrf

                            <div class="row g-3">

                               <input type="text" name="nik" value="{{ $pengguna->nik }}" hidden>

                                <div class="col-12">

                                    <label class="form-label">
                                        Rating
                                    </label>

                                    <div class="star-rate">

                                        @for ($s = 5; $s >= 1; $s--)
                                            <input type="radio" id="star{{ $s }}" name="rating"
                                                value="{{ $s }}" {{ $s == 5 ? 'checked' : '' }}>

                                            <label for="star{{ $s }}">★</label>
                                        @endfor

                                    </div>

                                </div>

                                <div class="col-12">

                                    <label class="form-label">
                                        Ulasan
                                    </label>

                                    <textarea name="komentar" class="form-control" rows="4" required placeholder="Tulis pengalaman Anda..."></textarea>

                                </div>

                                <div class="col-12">

                                    <button class="btn-primary-custom">

                                        <i class="bi bi-send-fill"></i>

                                        Kirim Ulasan

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>



                </div>
            </div>
        </div>
    </section>
</x-pengguna>
