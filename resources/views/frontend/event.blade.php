<x-frontend>
    <section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-ov"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div data-aos="fade-up">
           <div class="hero-badge">
                <i class="bi bi-calendar-event-fill"></i>
                 EVENT
           </div>
            <h1 class="stitle" style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Acara & <em style="color:var(--primary-lighter);font-style:normal;"> Kegiatan</em>
            </h1>
            <p style="color:rgba(255,255,255,.85);max-width:600px;line-height:1.8;font-size:1.1rem;">
                Berbagai kegiatan internal dan eksternal yang diselenggarakan di Learning Center.
            </p>
        </div>
    </div>
</section>

<section style="background:var(--cr-100);">
    <div class="container">
        {{-- TAB FILTER --}}
        <div class="d-flex gap-3 flex-wrap mb-5 justify-content-center" data-aos="fade-up">
            <button class="event-tab-btn active"
                    onclick="filterEvents('semua',this)">
                Semua Acara
            </button>

            <button class="event-tab-btn"
                    onclick="filterEvents('internal',this)">
                Acara Internal
            </button>

            <button class="event-tab-btn"
                    onclick="filterEvents('eksternal',this)">
                Acara Eksternal
            </button>
        </div>

        <div class="row g-4" id="eventGrid">

        @foreach($list_event as $event)

        <div class="col-lg-4 col-md-6 event-item"
             data-type="{{ $event->jenis }}"
             data-aos="fade-up">

        <div class="ev-card">

            <div class="ev-card-img">

                @if($event->foto)
                    <img src="{{ Storage::url($event->foto) }}"
                         alt="{{ $event->judul }}">
                @else
                    <img src="{{ asset('images/foto lc.jpg') }}"
                         alt="{{ $event->judul }}">
                @endif

            </div>

            <div class="ev-body">

                <div class="d-flex gap-2 flex-wrap">

                    <span class="ev-badge badge-{{ $event->jenis }}">
                        {{ ucfirst($event->jenis) }}
                    </span>

                    <span class="ev-badge badge-open">
                        {{ ucfirst($event->status) }}
                    </span>

                </div>

                <div style="font-weight:700;font-size:.96rem;color:var(--tx-900);margin-bottom:6px;">
                    {{ $event->judul }}
                </div>

                <p style="font-size:.83rem;color:var(--tx-400);line-height:1.65;margin-bottom:10px;">
                  {{ $event->deskripsi }}
                </p>

                <div class="ev-meta">
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

            </div>

        </div>

</div>

@endforeach

</div>

    </div>
</section>

@push('scripts')
<script>
function filterEvents(type, btn) {
    document.querySelectorAll('.event-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.event-item').forEach(item => {
        if (type === 'semua' || item.dataset.type === type) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endpush
</x-frontend>
