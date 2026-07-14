<x-backend>

    <div x-data="{
        modalIsOpen: false,
        bookingId: null,
        aksi: ''
    }">
        @include('section.notif')
        <div class="card p-5 mb-6">

            <form action="{{ url('backend/booking') }}" method="GET">

                <div class="flex flex-col md:flex-row gap-3">

                    {{-- Search --}}
                    <div class="relative flex-1">

                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..."
                            class="w-full rounded-xl border border-slate-300 bg-white pl-12 pr-4 py-3
                           focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                           transition duration-200">

                    </div>

                    {{-- Tombol --}}
                    <div class="flex gap-2">

                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Cari
                        </button>

                        @if (request('search'))
                            <a href="{{ url('backend/booking') }}"
                                class="px-6 py-3 rounded-xl border border-red-300
                              bg-red-50 text-red-600 font-semibold
                              hover:bg-red-100 transition">

                                <i class="fa-solid fa-rotate-left mr-2"></i>
                                Reset

                            </a>
                        @endif

                    </div>

                </div>

            </form>

        </div>
        <div class="flex items-center justify-between mb-6">

            <div>
                <h2 class="text-xl font-bold text-slate-800">Kelola Data Booking</h2>
            </div>
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
                                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                            title="Lihat Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        @if ($booking->status == '2')
                                            <form action="{{ url('backend/booking/selesai', $booking->id) }}"
                                                method="POST" class="flex">
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
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">
                                            Booking Baru
                                        </span>
                                    @elseif ($booking->status == '2')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-600">
                                            Sedang Berlangsung
                                        </span>
                                    @elseif ($booking->status == '3')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">
                                            Ditolak
                                        </span>
                                    @elseif ($booking->status == '4')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white text-slate-600 border border-slate-200">
                                            Selesai
                                        </span>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="px-6 py-4 border-t border-slate-200">
                    {{ $list_booking->links() }}
                </div>
            </div>
        </div>

        <div x-cloak x-show="modalIsOpen" x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center p-4">

            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="modalIsOpen=false"></div>
            <div x-show="modalIsOpen" x-transition
                class="relative w-full max-w-xl bg-white rounded-2xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

                            <i class="bi bi-check2-circle text-blue-600 text-xl"></i>

                        </div>

                        <div>

                            <h3 class="text-xl font-bold">

                                <span x-show="aksi=='terima'">
                                    Terima Booking
                                </span>

                                <span x-show="aksi=='tolak'">
                                    Tolak Booking
                                </span>

                            </h3>

                            <p class="text-sm text-gray-500">

                                Konfirmasi booking terlebih dahulu

                            </p>

                        </div>

                    </div>

                    <button @click="modalIsOpen=false" class="text-gray-400 hover:text-red-500">

                        <i class="bi bi-x-lg text-xl"></i>

                    </button>

                </div>

                <!-- Body -->

                <div class="p-6 space-y-5">
                    <form method="POST" x-bind:action="'{{ url('backend/booking/konfirmasi') }}/' + bookingId">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="aksi" :value="aksi">

                        <div>

                            <label class="block text-sm font-semibold mb-2">
                                Catatan
                            </label>

                            <textarea name="catatan" rows="5" class="w-full border rounded-lg p-4" placeholder="Masukkan catatan..." required></textarea>

                        </div>

                        <div class="mt-5 flex justify-end gap-3">

                            <button type="button" @click="modalIsOpen=false" class="px-5 py-2 bg-gray-300 rounded-lg">

                                Batal

                            </button>

                            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg">

                                Simpan

                            </button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</x-backend>
