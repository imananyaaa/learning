<x-backend>
    <div class="flex items-center justify-between mb-6">

    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th style="color:white">No</th>
                        <th style="color:white">Aksi</th>
                        <th style="color:white">Kode Booking</th>
                        <th style="color:white">Nama Pemesan</th>
                        <th style="color:white">Nama Fasilitas</th>
                        <th style="color:white">Nama Kegiatan</th>
                        <th style="color:white">Tanggal Kegiatan</th>
                        <th style="color:white">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_booking as $booking)
                        <tr class="tbl-row">

                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm align-middle">
                                <div class="flex items-center">
                                    <a href="{{ url('backend/booking/show', $booking->id) }}"
                                        class="flex items-center justify-center space-x-1 px-3 py-1.5 bg-sky-500 text-white hover:bg-sky-600 rounded-md transition"
                                        title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                        <span class="text-xs">Detail Booking</span>
                                    </a>

                                    @if ($booking->status == '1')
                                        <form action="{{ url('backend/booking/verifikasi', $booking->id) }}"
                                            method="POST" class="flex">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="flex items-center justify-center space-x-1 px-3 py-1.5 bg-blue-600 text-white hover:bg-blue-700 rounded-md font-medium transition"
                                                title="Verifikasi"
                                                onclick="return confirm('Apakah Anda yakin ingin memverifikasi booking ini?')">
                                                <i class="bi bi-check-lg"></i>
                                                <span class="text-xs">Verifikasi</span>
                                            </button>
                                        </form>

                                        <form action="{{ url('backend/booking/ditolak', $booking->id) }}" method="POST"
                                            class="flex">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="flex items-center justify-center space-x-1 px-3 py-1.5 bg-red-600 text-white hover:bg-red-700 rounded-md font-medium transition"
                                                title="Tolak"
                                                onclick="return confirm('Apakah Anda yakin ingin menolak booking ini?')">
                                                <i class="bi bi-x-lg"></i>
                                                <span class="text-xs">Tolak</span>
                                            </button>
                                        </form>
                                    @endif

                                    @if ($booking->status == '2')
                                        <form action="{{ url('backend/booking/selesai', $booking->id) }}" method="POST"
                                            class="flex">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="flex items-center justify-center space-x-1 px-3 py-1.5 bg-blue-600 text-white hover:bg-blue-700 rounded-md font-medium transition"
                                                title="Selesai"
                                                onclick="return confirm('Apakah Anda yakin ingin menandai booking ini sebagai selesai?')">
                                                <i class="bi bi-check-lg"></i>
                                                <span class="text-xs">Selesai</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">{{ $booking->kode_booking }}</td>
                            <td class="text-center">{{ $booking->pengguna->nama }}</td>
                            <td class="text-center">{{ $booking->fasilitas->nama }}</td>
                            <td class="text-center">{{ $booking->nama_kegiatan }}</td>
                            <td class="text-center">
                                {{ date('d-M-Y', strtotime($booking->tanggal_mulai)) }} <br>
                                Sampai <br>
                                {{ date('d-M-Y', strtotime($booking->tanggal_selesai)) }}</td>
                            <td class="text-center">
                                @if ($booking->status == '1')
                                    <span class="btn-primary">Belum Terverifikasi</span>
                                @elseif ($booking->status == '2')
                                    <span class="btn-primary">Sedang Berlangsung</span>
                                @elseif ($booking->status == '3')
                                    <span class="btn-primary">Ditolak</span>
                                @elseif ($booking->status == '4')
                                    <span class="btn-primary">Selesai</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
