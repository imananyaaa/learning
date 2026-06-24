<x-frontend>
    <section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-ov"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div data-aos="fade-up">
            <div class="stag" style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.25);">
                <i class="bi bi-info-circle-fill"></i> Tentang Kami
            </div>
            <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Learning Center<br>
                <em style="color:var(--primary-lighter);font-style:normal;">Sir Michael Uren</em>
            </h1>
            <p style="color:rgba(255,255,255,.75);font-size:1rem;max-width:520px;line-height:1.8;margin:0;">
                Pusat pembelajaran konservasi pertama dan terlengkap di Kalimantan, diresmikan 10 Juli 2019. Fasilitas yang terdapat didalamnya antara lain akomodasi untuk ruang rapat yang luas, yang dapat digunakan untuk lokakarya dan prsentasi, kafe, dan banyak ruang terbuka untuk pelatihan maupun seminar.
            </p>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section style="background:var(--bg-white);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-eye-fill"></i> Visi & Misi</div>
                <h2 class="stitle">Landasan <em>Kami</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
                    <h4 style="font-weight:700;color:var(--text-dark);margin-bottom:14px;">Visi</h4>
                    <p style="color:var(--text-medium);line-height:1.85;font-size:.95rem;margin:0;">
                        Komunitas lokal, sektor swasta, lembaga penelitian akademik, serta organisasi pemerintah
                        dan non-pemerintah berkumpul di Learning Center untuk
                        <strong style="color:var(--text-dark);">membangun masa depan yang lebih baik bagi manusia dan alam.</strong>
                    </p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi bi-bullseye"></i></div>
                    <h4 style="font-weight:700;color:var(--text-dark);margin-bottom:14px;">Misi</h4>
                    <p style="color:var(--text-medium);line-height:1.85;font-size:.95rem;margin:0;">
                        Membangun kesadaran, pengetahuan, dan kapasitas melalui penelitian dan pendidikan untuk
                        <strong style="color:var(--text-dark);">melindungi lingkungan dan memungkinkan pertumbuhan berkelanjutan
                        Kabupaten Ketapang.</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SEJARAH --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-lg);">
                    <img src="{{ url('public/images/lc.jpg') }}"
                         style="width:100%;height:420px;object-fit:cover;display:block;"
                         alt="Learning Center IAR Indonesia"
                         onerror="this.style.display='none'">
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="stag"><i class="bi bi-clock-history"></i> Sejarah</div>
                <h2 class="stitle">Perjalanan <em>Kami</em></h2>
                <div class="divider"></div>
                <div class="d-flex flex-column gap-3 mt-4">

                    <div class="d-flex gap-3">

                        <div style="padding-bottom:16px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- NILAI --}}
<section style="background:var(--bg-white);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-star-fill"></i> Nilai Kami</div>
                <h2 class="stitle">Yang Kami <em>Junjung</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-recycle',    'Keberlanjutan', 'Mendorong praktik berkelanjutan demi pelestarian alam Kalimantan.'],
                ['bi-people-fill','Kolaborasi',    'Mempertemukan berbagai pihak untuk dampak konservasi yang lebih besar.'],
                ['bi-lightbulb-fill','Inovasi',   'Mengembangkan metode pembelajaran inovatif untuk konservasi.'],
                ['bi-heart-fill', 'Kepedulian',   'Berkomitmen pada kesejahteraan manusia dan ekosistem lokal.'],
            ] as $i => $v)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="vm-card text-center">
                    <div class="vm-icon mx-auto"><i class="bi {{ $v[0] }}"></i></div>
                    <h5 style="font-weight:700;color:var(--text-dark);margin-bottom:8px;">{{ $v[1] }}</h5>
                    <p style="font-size:.85rem;color:var(--text-medium);line-height:1.7;margin:0;">{{ $v[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TIM --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-people-fill"></i> Tim Kami</div>
                <h2 class="stitle">Orang-orang di <em>Balik Layar</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
    </div>
</section>
</x-frontend>
