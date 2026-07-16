<footer class="site-footer text-white">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand d-flex align-items-center gap-3 mb-4">
                    <div class="footer-logos">
                        <img src="{{ url('public/images/logo-iar.png') }}"
                             alt="Logo IAR"
                             class="footer-logo-img">

                        <img src="{{ url('public/images/logo-lc.png') }}"
                             alt="Logo Learning Center"
                             class="footer-logo-img">
                    </div>
                    <div>
                         <div class="footer-brand-text">
                            <h5>IAR Indonesia</h5>
                            <span>Learning Center</span>
                        </div>
                    </div>
                </div>
                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.5); line-height: 1.8; margin-bottom: 24px;">
                    Pusat pembelajaran, pelatihan, dan pengembangan diri untuk mencetak generasi unggul dan berdaya saing.
                </p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/learningcenterketapang/" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/6285750057187" target="_blank" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="#" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-title">Menu</h6>
                <ul class="list-unstyled d-flex flex-column gap-1">
                    <li><a href="{{url('home') }}" class="footer-link">Beranda</a></li>
                    <li><a href="{{url('tentang-kami') }}" class="footer-link">Tentang Kami</a></li>
                    <li><a href="{{url('fasilitas') }}" class="footer-link">Fasilitas</a></li>
                    <li><a href="{{url('event') }}" class="footer-link">Event</a></li>
                    <li><a href="{{url('ulasan') }}" class="footer-link">Ulasan</a></li>
                    <li><a href="{{url('kontak') }}" class="footer-link">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-title">Fasilitas</h6>
                <ul class="list-unstyled d-flex flex-column gap-1">
                    <li><a href="#" class="footer-link">Ruang Rapat</a></li>
                    <li><a href="#" class="footer-link">Aula Serbaguna</a></li>
                    <li><a href="#" class="footer-link">Kamar</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h6 class="footer-title">Kontak & Lokasi</h6>
                <div class="footer-contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Sungai Awan Kiri, Kecamatan Muara Pawan, Kabupaten Ketapang, Kalimantan Barat 78813</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+62 857-5005-7187</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>info@iarindonesia.org</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container d-flex flex-wrap justify-content-center align-items-center gap-2">
            <span class="footer-bottom-text">© {{ date('Y') }} IAR Indonesia Learning Center. All rights reserved.</span>
        </div>
    </div>
</footer>
