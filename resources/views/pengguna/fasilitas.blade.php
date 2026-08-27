<x-pengguna>
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-ov"></div>
        <div class="container" style="position:relative;z-index:2;">
            <div data-aos="fade-up">
                <div class="stag"
                    style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.25);">
                    <i class="bi bi-building"></i> Fasilitas
                </div>
                <h1
                    style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                    Fasilitas <em style="color:var(--primary-lighter);font-style:normal;">Lengkap & Modern</em>
                </h1>
                <p style="color:rgba(255,255,255,.75);max-width:500px;line-height:1.8;margin:0;font-size:1rem;">
                    Berbagai fasilitas terlengkap untuk mendukung kegiatan konservasi, pelatihan, dan edukasi.
                </p>
            </div>
        </div>
    </section>

    {{-- FASILITAS UTAMA --}}
    <section style="background:var(--bg-light);">
        <div class="container">
            @include('section.notif')
            <div class="row justify-content-between align-items-end mb-5">

                <div class="container padding-bottom-3x mb-1">
                    @foreach ($list_booking as $booking)
                        @if (Auth::guard('pengguna')->user()->nik == $booking->nik)
                            @if (in_array($booking->status, ['1', '2']))
                                <div class="card mb-3">
                                    <div
                                        class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-dark">
                                        <div class="w-100 text-left py-1 px-2 text-white">
                                            <span class="text-uppercase">Tracking Pemesanan : </span>
                                            <span class="text-medium">{{ $booking->kode_booking }}</span>
                                        </div>
                                        <div class="w-100 text-right py-1 px-2 text-white">
                                            <span class="text-uppercase">Total Harga : </span>
                                            <span class="text-medium">{{ $booking->total_harga }}</span>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                                        <div class="w-100 text-center py-1 px-2">
                                            <span class="text-medium">
                                                Nama Fasilitas :
                                            </span>
                                            {{ $booking->fasilitas->nama }}
                                        </div>
                                        <div class="w-100 text-center py-1 px-2">
                                            <span class="text-medium">
                                                Nama Kegiatan :
                                            </span>
                                            {{ $booking->nama_kegiatan }}
                                        </div>
                                        <div class="w-100 text-center py-1 px-2">
                                            <span class="text-medium">
                                                Tanggal Kegiatan :
                                            </span>
                                            {{ date('d M Y', strtotime($booking->tanggal_mulai)) }} /
                                            {{ date('d M Y', strtotime($booking->tanggal_selesai)) }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div
                                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                                </div>
                                                <h4 class="step-title">
                                                    Pemesanan Dibuat
                                                </h4>
                                            </div>
                                            @foreach ($list_tracking as $tracking)
                                                @if ($tracking->id_booking == $booking->id)
                                                    @if ($tracking->status == 'Menunggu Verifikasi')
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon">
                                                                    <i class="bi bi-envelope-check"></i>
                                                                </div>
                                                            </div>
                                                            <h4 class="step-title">
                                                                Menunggu Verifikasi
                                                            </h4>
                                                        </div>
                                                    @endif
                                                    @if ($tracking->status == 'Diterima')
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-check"></i></div>
                                                            </div>
                                                            <h4 class="step-title">
                                                                Diterima
                                                            </h4>
                                                        </div>

                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="bi bi-list"></i></div>
                                                            </div>
                                                            <h4 class="step-title">
                                                                Sedang Berlangsung
                                                            </h4>
                                                        </div>
                                                    @endif

                                                    @if ($tracking->status == 'Ditolak')
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="bi bi-x-lg"></i></div>
                                                            </div>
                                                            <h4 class="step-title">
                                                                Ditolak
                                                            </h4>
                                                        </div>
                                                    @endif


                                                    @if ($tracking->status == 'Selesai')
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i
                                                                        class="bi bi-hand-thumbs-up-fill"></i></div>
                                                            </div>
                                                            <h4 class="step-title">
                                                                Selesai
                                                            </h4>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        <a class="btn btn-outline-primary btn-rounded btn-sm float-star"
                                            href="{{ url("public/$booking->file_proposal") }}" target="_blank">
                                            Lihat Dokumen
                                        </a>

                                        @php
                                            $expired = now()->greaterThan(
                                                \Carbon\Carbon::parse($booking->created_at)->addMinutes(30),
                                            );
                                        @endphp



                                        @if ($booking->status == '1')
                                            @if (!$expired)
                                                <a href="{{ url('pengguna/fasilitas/batal', $booking->id) }}"
                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?')"
                                                    class="btn btn-outline-danger btn-rounded btn-sm float-end">
                                                    Batalkan Pemesanan
                                                </a>
                                            @else
                                                <button type="button"
                                                    class="btn btn-secondary btn-rounded btn-sm float-end" disabled>
                                                    Waktu Pembatalan Habis
                                                </button>
                                            @endif
                                        @endif
                                        @if ($booking->status == '2')
                                            @if (empty($booking->bukti_transfer))
                                                <button class="btn btn-primary btn-rounded btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#UploadBukti{{ $booking->id }}">
                                                    <i class="bi bi-upload"></i>
                                                    Upload Bukti Transfer
                                                </button>
                                            @else
                                                <span class="btn btn-warning btn-rounded btn-sm">
                                                    <i class="bi bi-check-circle"></i>
                                                    Bukti Transfer Sudah Diupload
                                                </span>
                                            @endif
                                        @endif


                                        <div class="modal fade" id="UploadBukti{{ $booking->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Upload Bukti Transfer {{ $booking->nama_kegiatan }}
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ url('pengguna/fasilitas/bukti-transfer', $booking->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">

                                                            <div class="form-group row mt-3">
                                                                <label for="inputEmail3"
                                                                    class="col-sm-4 col-form-label">
                                                                    Bukti Transfer
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="file" class="form-control"
                                                                        name="bukti_transfer"
                                                                        accept=".jpg, .png, .jpeg" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bi bi-times"></i> Batal</button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="bi bi-save"></i>
                                                                Upload </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6 mt-5" data-aos="fade-right">
                    <div class="stag"><i class="bi bi-star-fill"></i> Fasilitas Utama</div>

                    <div class="stag">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#riwayatbooking">
                            <i class="bi bi-cursor"></i> Riwayat Booking
                        </a>
                    </div>
                    <h2 class="stitle">Fasilitas <em>Utama</em></h2>
                    <div class="divider"></div>
                    <p class="sdesc">Fasilitas utama yang tersedia untuk mendukung kegiatan inti.</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($list_fasilitas as $fasilitas)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="">
                        <div class="fac-card">
                            <div class="fac-img" title="Klik untuk detail">
                                <img src="{{ url("public/$fasilitas->foto") }}" alt="{{ $fasilitas->nama }}"
                                    onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">
                                <div class="fac-img-overlay" data-bs-toggle="modal"
                                    data-bs-target="#detailPendukung{{ $fasilitas->id }}">
                                    <span><i class="bi bi-zoom-in"></i> Lihat Detail</span>
                                </div>
                            </div>
                            <div class="fac-body">
                                <span class="fac-tag utama">Fasilitas Utama</span>
                                <div
                                    style="font-weight:700;font-size:.97rem;color:var(--text-dark);margin-bottom:6px;">
                                    {{ $fasilitas->nama }}</div>


                                <div class="row g-4">
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-5">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalBooking{{ $fasilitas->id }}">
                                            <i class="bi bi-cart"></i> Booking
                                        </button>
                                    </div>
                                    <div class="col-lg-5">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $fasilitas->id }}">
                                            <i class="bi bi-info"></i> Detail
                                        </button>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal{{ $fasilitas->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Detail {{ $fasilitas->nama }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card mb-4">
                                                <div class="card-body text-center">
                                                    <img src="{{ url("public/$fasilitas->foto") }}" class="img-fluid"
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <p class="mb-0">Nama Fasilitas</p>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <p class="text-muted mb-0">{{ $fasilitas->nama }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <p class="mb-0">Kapasitas</p>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <p class="text-muted mb-0">{{ $fasilitas->kapasitas }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <p class="mb-0">Status</p>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <p class="text-muted mb-0">{{ $fasilitas->status }}</p>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <p class="mb-0">Harga</p>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <p class="text-muted mb-0">Rp. {{ $fasilitas->harga }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-4 mb-md-0">
                                                    <div class="card-body">
                                                        <p class="mb-4">
                                                            {{ $fasilitas->deskripsi }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            class="bi bi-times"></i>Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save
                                        changes</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModalBooking{{ $fasilitas->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Detail {{ $fasilitas->nama }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('pengguna/fasilitas') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <input type="text" name="nik" value="{{ $pengguna->nik }}" hidden>
                                    <input type="text" name="id_fasilitas" value="{{ $fasilitas->id }}" hidden>

                                    <div class="modal-body">
                                        <div class="form-group row mt-3">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama
                                                Kegiatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama_kegiatan"
                                                    placeholder="Nama Kegiatan" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label class="col-sm-4 col-form-label">Tanggal Mulai
                                                Kegiatan</label>
                                            <div class="col-sm-8">
                                                <input id="tanggal_mulai{{ $fasilitas->id }}" type="date"
                                                    class="form-control" name="tanggal_mulai" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Selesai
                                                Kegiatan</label>
                                            <div class="col-sm-8">
                                                <input id="tanggal_selesai{{ $fasilitas->id }}" type="date"
                                                    class="form-control" name="tanggal_selesai" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label"> Harga</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="total_harga{{ $fasilitas->id }}"
                                                    class="form-control" name="total_harga" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Proposal
                                                Kegiatan</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="file_proposal"
                                                    accept="application/pdf" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="bi bi-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                            Booking Sekarang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="riwayatbooking" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Riwayat Booking {{ $pengguna->nama }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">

                                                    @foreach ($list_booking as $booking)
                                                        @if (Auth::guard('pengguna')->user()->nik == $booking->nik)
                                                            @if (in_array($booking->status, ['3', '4', '5']))
                                                                <div class="card mb-3">
                                                                    <div
                                                                        class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-dark">
                                                                        <div
                                                                            class="w-100 text-left py-1 px-2 text-white">
                                                                            <span class="text-uppercase">Tracking
                                                                                Pemesanan : </span>
                                                                            <span
                                                                                class="text-medium">{{ $booking->kode_booking }}</span>
                                                                        </div>
                                                                        <div
                                                                            class="w-100 text-right py-1 px-2 text-white">
                                                                            <span class="text-uppercase">Total Harga :
                                                                            </span>
                                                                            <span
                                                                                class="text-medium">{{ $booking->total_harga }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                                                                        <div class="w-100 text-center py-1 px-2">
                                                                            <span class="text-medium">
                                                                                Nama Fasilitas :
                                                                            </span>
                                                                            {{ $booking->fasilitas->nama }}
                                                                        </div>
                                                                        <div class="w-100 text-center py-1 px-2">
                                                                            <span class="text-medium">
                                                                                Nama Kegiatan :
                                                                            </span>
                                                                            {{ $booking->nama_kegiatan }}
                                                                        </div>
                                                                        <div class="w-100 text-center py-1 px-2">
                                                                            <span class="text-medium">
                                                                                Tanggal Kegiatan :
                                                                            </span>
                                                                            {{ date('d M Y', strtotime($booking->tanggal_mulai)) }}
                                                                            /
                                                                            {{ date('d M Y', strtotime($booking->tanggal_selesai)) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                                            <div class="step completed">
                                                                                <div class="step-icon-wrap">
                                                                                    <div class="step-icon"><i
                                                                                            class="pe-7s-cart"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="step-title">
                                                                                    Pemesanan Dibuat
                                                                                </h4>
                                                                            </div>
                                                                            @foreach ($list_tracking as $tracking)
                                                                                @if ($tracking->id_booking == $booking->id)
                                                                                    @if ($tracking->status == 'Menunggu Verifikasi')
                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="bi bi-envelope-check"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Menunggu Verifikasi
                                                                                            </h4>
                                                                                        </div>
                                                                                    @endif
                                                                                    @if ($tracking->status == 'Diterima')
                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="pe-7s-check"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Diterima
                                                                                            </h4>
                                                                                        </div>

                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="bi bi-list"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Sedang Berlangsung
                                                                                            </h4>
                                                                                        </div>
                                                                                    @endif

                                                                                    @if ($tracking->status == 'Ditolak')
                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="bi bi-x-lg"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Ditolak
                                                                                            </h4>
                                                                                        </div>
                                                                                    @endif

                                                                                    @if ($tracking->status == 'Dibatalkan')
                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="bi bi-hand-thumbs-up-fill"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Dibatalkan
                                                                                            </h4>
                                                                                        </div>
                                                                                    @endif

                                                                                    @if ($tracking->status == 'Selesai')
                                                                                        <div class="step completed">
                                                                                            <div
                                                                                                class="step-icon-wrap">
                                                                                                <div class="step-icon">
                                                                                                    <i
                                                                                                        class="bi bi-hand-thumbs-up-fill"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                            <h4 class="step-title">
                                                                                                Selesai
                                                                                            </h4>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="btn btn-outline-primary btn-rounded btn-sm float-star"
                                                                            href="{{ url("public/$booking->file_proposal") }}"
                                                                            target="_blank">
                                                                            Lihat Dokumen
                                                                        </a>

                                                                        <a class="btn btn-outline-primary btn-rounded btn-sm float-star"
                                                                            href="{{ url("public/$booking->bukti_transfer") }}"
                                                                            target="_blank">
                                                                            Lihat Bukti Transfer
                                                                        </a>


                                                                        @if ($booking->status == '1')
                                                                            <a class="btn btn-outline-danger btn-rounded btn-sm float-end"
                                                                                href="orderDetails">
                                                                                Batalkan Pemesanan
                                                                            </a>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                        class="bi bi-times"></i>Close</button>
                                {{-- <button type="button" class="btn btn-primary">Save
                                        changes</button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FASILITAS PENDUKUNG --}}
    <section style="background:var(--bg-white);">
        <div class="container">
            <div class="row justify-content-between align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="stag"><i class="bi bi-tools"></i> Fasilitas Pendukung</div>
                    <h2 class="stitle">Perlengkapan <em>Pendukung</em></h2>
                    <div class="divider"></div>
                    <p class="sdesc">Peralatan dan perlengkapan yang tersedia untuk mendukung kegiatan.</p>
                </div>
            </div>
            <div class="row g-4">

                @forelse ($list_fasilitas_pendukung as $fasilitas)
                    <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up">

                        <div class="fac-card w-100 d-flex flex-column">

                            {{-- GAMBAR --}}
                            <div class="fac-img" title="Klik untuk melihat detail" style="cursor:pointer;"
                                data-bs-toggle="modal" data-bs-target="#detailPendukung{{ $fasilitas->id }}">

                                <img src="{{ $fasilitas->foto ? url('public/' . $fasilitas->foto) : url('public/images/lc.jpg') }}"
                                    alt="{{ $fasilitas->nama }}"
                                    onerror="this.onerror=null;this.src='{{ url('public/images/lc.jpg') }}'">

                                <div class="fac-img-overlay" data-bs-toggle="modal"
                                    data-bs-target="#detailPendukung{{ $fasilitas->id }}">
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
                                    <button type="button" class="btn-primary-custom" data-bs-toggle="modal"
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
                    <div class="modal fade" id="detailPendukung{{ $fasilitas->id }}" tabindex="-1"
                        aria-labelledby="detailPendukungLabel{{ $fasilitas->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content"
                                style="border-radius:20px;
                                       border:none;
                                       overflow:hidden;">


                                {{-- HEADER --}}
                                <div class="modal-header"
                                    style="border-bottom:1px solid #e8eef7;
                                           padding:20px 28px;">

                                    <h5 class="modal-title" id="detailPendukungLabel{{ $fasilitas->id }}"
                                        style="font-weight:700;
                                               color:var(--text-dark);">

                                        <i class="bi bi-tools me-2"></i>
                                        Detail {{ $fasilitas->nama }}
                                    </h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>

                                </div>


                                {{-- BODY --}}
                                <div class="modal-body" style="padding:28px;">

                                    <div class="row g-4 align-items-start">


                                        {{-- FOTO --}}
                                        <div class="col-lg-5">

                                            <img src="{{ $fasilitas->foto ? url('public/' . $fasilitas->foto) : url('public/images/lc.jpg') }}"
                                                alt="{{ $fasilitas->nama }}" class="img-fluid w-100"
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

                                                    <small style="color:var(--text-light);">
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

                                                    <small style="color:var(--text-light);">
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
                                    <div class="mt-4"
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
                                <div class="modal-footer"
                                    style="border-top:1px solid #e8eef7;
                                           padding:18px 28px;">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

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

                            <i class="bi bi-tools" style="font-size:3rem;color:var(--text-light);">
                            </i>

                            <p class="mt-3" style="color:var(--text-light);">

                                Data fasilitas pendukung belum tersedia.
                            </p>

                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    {{-- PAKET LAYANAN --}}
    <section style="background:var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center" data-aos="fade-up">
                    <div class="stag"><i class="bi bi-box-seam-fill"></i> Paket Layanan</div>
                    <h2 class="stitle">Pilih <em>Paket</em> yang Sesuai</h2>
                    <div class="divider mx-auto"></div>
                    <p class="sdesc">Tersedia berbagai paket layanan yang dapat disesuaikan dengan kebutuhan kegiatan
                        Anda.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
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

                @foreach ($pakets as $i => $pk)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                        <div class="paket-card {{ $pk[5] }}">
                            <div class="stag" style="{{ $pk[6] ? 'background:var(--primary);color:#fff;' : '' }}">
                                {{ $pk[0] }}
                            </div>
                            <h5 style="font-weight:600;color:var(--text-dark);margin-bottom:6px;">{{ $pk[1] }}
                            </h5>
                            <div class="paket-price">{{ $pk[2] }}</div>
                            <div style="font-size:.75rem;color:var(--text-light);margin-bottom:20px;">
                                {{ $pk[3] }}</div>
                            <ul class="paket-list list-unstyled">
                                @foreach ($pk[4] as $item)
                                    <li><i class="bi bi-check-circle-fill"></i> {{ $item }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- MENU KONSUMSI --}}
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12">
                    <div
                        style="background:var(--bg-white);border:1px solid var(--primary-lightest);border-radius:var(--radius-lg);padding:36px;">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-3">
                                <div class="stag"><i class="bi bi-cup-hot-fill"></i> Paket Konsumsi</div>
                                <h3 class="stitle" style="font-size:1.6rem;">Pilihan <em>Konsumsi</em></h3>
                                <div class="divider"></div>
                                <p class="sdesc" style="font-size:.88rem;">Tersedia berbagai pilihan konsumsi yang
                                    dapat ditambahkan pada paket Anda.</p>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-3">
                                    @foreach ([['Coffee Break', 'Snack + minuman hangat/dingin', 'Rp 25.000/orang'], ['Makan Siang', 'Nasi + lauk + sayur + minuman', 'Rp 45.000/orang'], ['Makan Malam', 'Nasi + lauk + sayur + minuman', 'Rp 45.000/orang'], ['Paket Full Catering', '3x makan + 2x coffee break', 'Rp 130.000/orang']] as $m)
                                        <div class="col-md-6">
                                            <div
                                                style="background:var(--bg-light);border-radius:var(--radius);padding:16px 20px;display:flex;justify-content:space-between;align-items:center;border:1px solid var(--primary-lightest);">
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.92rem;color:var(--text-dark);">
                                                        {{ $m[0] }}</div>
                                                    <div style="font-size:.78rem;color:var(--text-light);">
                                                        {{ $m[1] }}</div>
                                                </div>
                                                <div
                                                    style="font-weight:700;color:var(--primary);font-size:.88rem;white-space:nowrap;margin-left:12px;">
                                                    {{ $m[2] }}</div>
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

    {{-- MODAL DETAIL FASILITAS --}}
    <div class="modal fade" id="facilityModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius:var(--radius-lg);border:none;">
                <div class="modal-header" style="border-bottom:1px solid var(--primary-lightest);padding:20px 28px;">
                    <h5 class="modal-title" id="modalTitle" style="font-weight:700;color:var(--text-dark);">Fasilitas
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:24px 28px;">
                    <img id="modalImg" src="" class="modal-facility-img" alt="Fasilitas">
                    <div class="modal-facility-body">
                        <p id="modalDesc"
                            style="font-size:.93rem;color:var(--text-medium);line-height:1.82;margin-bottom:24px;"></p>
                        <a id="modalWa" href="" target="_blank" class="btn-primary-custom"
                            style="width:auto;padding:12px 24px;">
                            <i class="bi bi-whatsapp"></i> Pesan Tempat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let tanggalBlock = @json($tanggal_block);

        @foreach ($list_fasilitas as $fasilitas)

            const harga{{ $fasilitas->id }} = {{ $fasilitas->harga }};
            let block{{ $fasilitas->id }} = tanggalBlock[{{ $fasilitas->id }}] ?? [];

            function hitungTotal{{ $fasilitas->id }}() {

                let mulai = document.getElementById('tanggal_mulai{{ $fasilitas->id }}').value;
                let selesai = document.getElementById('tanggal_selesai{{ $fasilitas->id }}').value;

                if (mulai && selesai) {

                    let tglMulai = new Date(mulai);
                    let tglSelesai = new Date(selesai);

                    let selisih = (tglSelesai - tglMulai) / (1000 * 60 * 60 * 24);

                    if (selisih >= 0) {

                        let jumlahHari = selisih + 1;

                        let total = jumlahHari * harga{{ $fasilitas->id }};

                        document.getElementById('total_harga{{ $fasilitas->id }}').value =
                            "Rp. " + total.toLocaleString('id-ID', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });

                    } else {

                        document.getElementById('total_harga{{ $fasilitas->id }}').value = "";

                    }
                }
            }

            document.getElementById('tanggal_mulai{{ $fasilitas->id }}')
                .addEventListener('change', function() {

                    if (block{{ $fasilitas->id }}.includes(this.value)) {
                        alert('Tanggal sudah dibooking');
                        this.value = '';
                    }

                    hitungTotal{{ $fasilitas->id }}();

                });

            document.getElementById('tanggal_selesai{{ $fasilitas->id }}')
                .addEventListener('change', function() {

                    if (block{{ $fasilitas->id }}.includes(this.value)) {
                        alert('Tanggal sudah dibooking');
                        this.value = '';
                    }

                    hitungTotal{{ $fasilitas->id }}();

                });
        @endforeach
    </script>

    </x-frontend>
