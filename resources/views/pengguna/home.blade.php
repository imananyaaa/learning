<x-pengguna>
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="hero-content">
                        <span class="hero-welcome-badge">Selamat Datang di</span>
                        <h1 class="hero-title">
                            Learning Center<br>
                            <span class="highlight">Sir Michael Uren</span>
                        </h1>
                        <p class="hero-description">
                            Menyediakan fasilitas yang inovatif, memberikan informasi, pelatihan, edukasi, dan
                            pengembangan kapasitas unutuk konservasi.
                        </p>
                        <div class="hero-buttons">
                            <a href="{{ url('/tentang-kami') }}" class="btn-primary-custom">
                                Kenali Kami
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                            <a href="{{ url('/fasilitas') }}" class="btn-outline-custom">
                                <i class="bi bi-building me-2"></i>
                                Lihat Fasilitas
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <div class="hero-image">
                            <img src="{{ url('public/images/lc.jpg') }}" alt="IAR Indonesia Learning Center"
                                style="width:100%;height:100%;object-fit:cover;display:block;">
                        </div>
                        <div class="hero-building-label">
                            <h4>LEARNING CENTER</h4>
                            <p>SIR MICHAEL UREN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     FACILITIES SECTION
══════════════════════════════════════════════════════════════ --}}
    <section class="facilities-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-badge">
                    <i class="bi bi-check-circle-fill"></i> Mengapa Memilih Kami
                </span>
                <h2 class="section-title">Fasilitas & Layanan <span>Unggulan</span></h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="facility-grid" data-aos="fade-up" data-aos-delay="100">
                <div class="facility-item">
                    <div class="facility-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="facility-name">Ruang Rapat</h5>
                    <p class="facility-desc">Ruang rapat modern dengan fasilitas lengkap untuk kebutuhan meeting.</p>
                </div>

                <div class="facility-item">
                    <div class="facility-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="facility-name">Aula Serbaguna</h5>
                    <p class="facility-desc">Aula luas untuk seminar, pelatihan, dan berbagai acara besar.</p>
                </div>

                <div class="facility-item">
                    <div class="facility-icon">
                        <i class="bi bi-house-door-fill"></i>
                    </div>
                    <h5 class="facility-name">Penginapan</h5>
                    <p class="facility-desc">Kamar nyaman dengan fasilitas lengkap untuk peserta kegiatan.</p>
                </div>

                <div class="facility-item">
                    <div class="facility-icon">
                        <i class="bi bi-tree-fill"></i>
                    </div>
                    <h5 class="facility-name">Area Outdoor</h5>
                    <p class="facility-desc">Area terbuka untuk kegiatan outbound dan aktivitas luar ruangan.</p>
                </div>

                <div class="facility-item">
                    <div class="facility-icon">
                        <i class="bi bi-cup-hot-fill"></i>
                    </div>
                    <h5 class="facility-name">Cafe</h5>
                    <p class="facility-desc">Menyediakan berbagai menu makanan dan minuman berkualitas.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     EVENTS SECTION
══════════════════════════════════════════════════════════════ --}}
    <section class="events-section">
        <div class="container">
            <div class="row justify-content-between align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="section-badge">
                        <i class="bi bi-calendar-event-fill"></i> Event
                    </span>
                    <h2 class="section-title">Event & <span>Kegiatan</span></h2>
                </div>
                <div class="col-auto mt-3 mt-lg-0" data-aos="fade-left">
                    <a href="{{ url('event') }}" class="btn-outline-custom">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>



            <div class="row g-4">
                @foreach ($list_event as $event)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay>
                        <div class="event-card">
                            <div class="event-image">
                                <img src="{{ url("public/$event->foto") }}" alt="{{ $event['title'] }}"
                                    onerror="this.onerror=null; this.style.display='none'; this.parentElement.innerHTML='<div class=\'event-image-placeholder\'><i class=\'bi bi-calendar-event\'></i></div>';">
                            </div>
                            <div class="event-body">
                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i> {{ $event->tanggal }}
                                </span>
                                <h5 class="event-judul">{{ $event->judul}}</h5>
                                <p class="event-kuota">{{ $event->kuota }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    </x-penggunna>
