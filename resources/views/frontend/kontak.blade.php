<x-frontend>
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-ov"></div>
        <div class="container" style="position:relative;z-index:2;">
            <div data-aos="fade-up">
                <div class="hero-badge">
                    <i class="bi bi-envelope-fill"></i>Kontak
                </div>
                <h1
                    style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                    Hubungi <em style="color:#90CAF9;font-style:normal;">Kami</em>
                </h1>
            </div>
        </div>
    </section>

    <section style="background:var(--cr-100);">
        <div class="container">
            <div class="row g-4 mb-5">
                @foreach ($list_kontak as $kontak)
                    <div class="row g-4 mb-5">

                        <div class="col-md-6 col-lg-3">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <h6>Alamat</h6>
                                <P>Jl. Ketapang–Tanjungpura </P>
                                <a href="{{ $kontak->link_maps }}" class="btn-br" target="_blank">
                                    Rute
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <h6>Telepon</h6>
                                <p>{{ $kontak->telepon }}</p>
                                <a href="tel:{{ $kontak->telepon }}" class="btn-br">
                                    Hubungi
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-whatsapp"></i>
                                </div>
                                <h6>WhatsApp</h6>
                                <p>{{ $kontak->whatsapp }}</p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak->whatsapp) }}"
                                    target="_blank" class="btn-br">
                                    Hubungi
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-instagram"></i>
                                </div>
                                <h6>Instagram</h6>
                                <p>{{ '@' . $kontak->instagram }}</p>

                                <a href="https://www.instagram.com/{{ ltrim($kontak->instagram, '@') }}"
                                target="_blank"
                                class="btn-br">
                                    Kunjungi
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="row g-5 align-items-start">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="stag"><i class="bi bi-send-fill"></i>Kirim Pesan</div>
                    <h2 class="stitle">Ada <em>Pertanyaan?</em></h2>
                    <div class="divider"></div>

                    <div class="contact-form-box">

                        <form action="{{ url('kontak.store') }}" method="POST">
                            @csrf
                            @if (session('success'))
                                <div
                                    style="
                    background:#d1fae5;
                    color:#065f46;
                    padding:15px;
                    border-radius:10px;
                    margin-bottom:15px;
                    font-weight:600;
                    ">
                                    ✅ {{ session('success') }}
                                </div>
                            @endif
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <label
                                        style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" class="form-input" placeholder="Nama Anda"
                                        required>
                                </div>
                                <div>
                                    <label
                                        style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Email</label>
                                    <input type="email" name="email" class="form-input"
                                        placeholder="email@contoh.com" required>
                                </div>
                                <div>
                                    <label
                                        style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nomor
                                        Telepon</label>
                                    <input type="text" name="telepon" class="form-input" placeholder="+62 ...">
                                </div>
                                <div>
                                    <label
                                        style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">
                                        Tujuan
                                    </label>

                                    <select name="tujuan" class="form-input" required>
                                        <option value="">-- Pilih Tujuan --</option>

                                        <option value="Informasi Program">
                                            Informasi Program
                                        </option>

                                        <option value="Pendaftaran Peserta">
                                            Pendaftaran Peserta
                                        </option>

                                        <option value="Kerja Sama">
                                            Kerja Sama
                                        </option>

                                        <option value="Saran dan Masukan">
                                            Saran dan Masukan
                                        </option>

                                        <option value="Pengaduan">
                                            Pengaduan
                                        </option>

                                        <option value="Lainnya">
                                            Lainnya
                                        </option>

                                    </select>
                                </div>
                                <div>
                                    <label
                                        style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Pesan</label>
                                    <textarea name="pesan" rows="5" class="form-input" placeholder="Tulis pesan Anda..." required
                                        style="resize:none;"></textarea>
                                </div>
                                <button type="submit" class="btn-kirim">
                                    <i class="bi bi-send-fill"></i>
                                    Kirim Pesan
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-lg-6" data-aos="fade-left">

                    <div class="stag"><i class="bi bi-map-fill"></i>Lokasi</div>
                    <h2 class="stitle">Temukan <em>Kami</em></h2>
                    <div class="divider"></div>
                    <div
                        style="border-radius:var(--r);overflow:hidden;border:2px solid var(--br-100);box-shadow:var(--sh-sm);">
                        <iframe
                            src="https://maps.google.com/maps?q=-1.7375161006912656,110.01042955355726&hl=id&t=m&z=17&output=embed"
                            width="100%" height="340" style="border:0;display:block;" allowfullscreen loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div
                        style="background:var(--cr-50);border:1px solid var(--br-100);border-radius:var(--r-sm);padding:18px;margin-top:16px;">
                        <div style="font-size:.82rem;color:var(--tx-400);line-height:1.8;">
                            <div class="d-flex gap-2 mb-2"><i class="bi bi-geo-alt-fill mt-1"
                                    style="color:var(--br-500);flex-shrink:0;"></i>
                                Jl. Ketapang–Tanjungpura</div>
                            <div class="d-flex gap-2 mb-3"><i class="bi bi-clock-fill mt-1"
                                    style="color:var(--br-500);flex-shrink:0;"></i>
                                Senin – Jumat: 08:00 – 17:00 WIB</div>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=-1.7375161006912656,110.01042955355726"
                                target="_blank" rel="noopener" class="btn-br"
                                style="padding:9px 18px;font-size:.82rem;justify-content:center;width:100%;">
                                <i class="bi bi-signpost-split-fill"></i> Arahkan ke Lokasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend>
