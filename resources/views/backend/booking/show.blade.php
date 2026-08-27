<x-backend>

    <div x-data="{
        modalIsOpen: false,
        bookingId: {{ $booking->id }},
        aksi: ''
    }">

        <a href="{{ url('backend/booking') }}"
            class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>

        <div class="bg-gray-100">
            <div class="container mx-auto py-8">

                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">

                    {{-- DATA PENGGUNA --}}
                    <div class="col-span-4 sm:col-span-3">

                        <div class="bg-white shadow rounded-lg p-6">

                            <div class="flex flex-col items-center">

                                <img src="{{ url('public/' . $booking->pengguna->foto) }}"
                                    class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0 object-cover">

                                <h1 class="text-xl font-bold">
                                    {{ $booking->pengguna->nama }}
                                </h1>

                                <p class="text-gray-700">
                                    {{ $booking->pengguna->email }}
                                </p>

                            </div>

                            <hr class="my-6 border-t border-gray-300">

                            <div class="flex flex-col">

                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">
                                    No Hp
                                </span>

                                <ul>
                                    <li class="mb-2">
                                        {{ $booking->pengguna->no_hp }}
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>


                    {{-- DETAIL BOOKING --}}
                    <div class="col-span-4 sm:col-span-9">

                        <div class="bg-white shadow rounded-lg p-6">

                            <h2 class="text-xl font-bold mt-6 mb-4">
                                Detail Booking
                            </h2>


                            {{-- NAMA FASILITAS --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Nama Fasilitas
                                    </span>

                                    <p>
                                        <span class="text-gray-700 mr-2">
                                            {{ $booking->fasilitas->nama }}
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- NAMA KEGIATAN --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Nama Kegiatan
                                    </span>

                                    <p>
                                        <span class="text-gray-700 mr-2">
                                            {{ $booking->nama_kegiatan }}
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- TANGGAL MULAI --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Tanggal Mulai
                                    </span>

                                    <p>
                                        <span class="text-gray-700 mr-2">
                                            {{ date('d M Y', strtotime($booking->tanggal_mulai)) }}
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- TANGGAL SELESAI --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Tanggal Selesai
                                    </span>

                                    <p>
                                        <span class="text-gray-700 mr-2">
                                            {{ date('d M Y', strtotime($booking->tanggal_selesai)) }}
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- CATATAN --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Catatan
                                    </span>

                                    <p>
                                        <span class="text-gray-700 mr-2">
                                            {{ $booking->catatan ?? '-' }}
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- FILE PROPOSAL --}}
                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        File Proposal
                                    </span>

                                    <a href="{{ url("public/$booking->file_proposal") }}" target="_blank"
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

                                        Lihat Proposal

                                    </a>

                                </div>

                            </div>

                            <div class="mb-6">

                                <div class="flex justify-between flex-wrap gap-2 w-full">

                                    <span class="text-gray-700 font-bold">
                                        Bukti Transfer
                                    </span>

                                    @if (!empty($booking->bukti_transfer))
                                        <a href="{{ url("public/$booking->bukti_transfer") }}" target="_blank"
                                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

                                            Lihat Bukti Transfer

                                        </a>
                                    @else
                                        <span class="bg-blue-500 text-white italic px-4 py-2 rounded hover:bg-blue-600">
                                            Belum Upload Bukti Transfer
                                        </span>
                                    @endif

                                </div>

                            </div>


                            {{-- TOMBOL TERIMA DAN TOLAK --}}
                            @if ($booking->status == '1')
                                <div class="flex items-center justify-center gap-3 mt-10 pt-6 border-t border-gray-200">

                                    <button type="button"
                                        @click="
                                            modalIsOpen = true;
                                            aksi = 'terima';
                                        "
                                        class="flex items-center justify-center gap-2 px-6 py-2.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg font-medium transition">

                                        <i class="bi bi-check-lg"></i>

                                        <span>
                                            Diterima
                                        </span>

                                    </button>


                                    <button type="button"
                                        @click="
                                            modalIsOpen = true;
                                            aksi = 'tolak';
                                        "
                                        class="flex items-center justify-center gap-2 px-6 py-2.5 bg-red-600 text-white hover:bg-red-700 rounded-lg font-medium transition">

                                        <i class="bi bi-x-lg"></i>

                                        <span>
                                            Tolak
                                        </span>

                                    </button>

                                    <button type="button"
                                        @click="
                                            modalIsOpen = true;
                                            aksi = 'batal';
                                        "
                                        class="flex items-center justify-center gap-2 px-6 py-2.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg font-medium transition">

                                        <i class="bi bi-x-lg"></i>

                                        <span>
                                            Dibatalkan
                                        </span>

                                    </button>

                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- MODAL KONFIRMASI --}}
        <div x-cloak x-show="modalIsOpen" x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center p-4">

            {{-- BACKDROP --}}
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="modalIsOpen = false">
            </div>


            {{-- MODAL --}}
            <div x-show="modalIsOpen" x-transition
                class="relative w-full max-w-xl bg-white rounded-2xl shadow-2xl overflow-hidden">


                {{-- HEADER --}}
                <div class="flex items-center justify-between px-6 py-4 border-b">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

                            <i class="bi bi-check2-circle text-blue-600 text-xl"></i>

                        </div>

                        <div>

                            <h3 class="text-xl font-bold">

                                <span x-show="aksi == 'terima'">
                                    Terima Booking
                                </span>

                                <span x-show="aksi == 'tolak'">
                                    Tolak Booking
                                </span>

                                <span x-show="aksi == 'batal'">
                                    Booking di Batalkan
                                </span>

                            </h3>

                            <p class="text-sm text-gray-500">
                                Konfirmasi booking terlebih dahulu
                            </p>

                        </div>

                    </div>


                    <button type="button" @click="modalIsOpen = false" class="text-gray-400 hover:text-red-500">

                        <i class="bi bi-x-lg text-xl"></i>

                    </button>

                </div>


                {{-- BODY --}}
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

                            <button type="button" @click="modalIsOpen = false"
                                class="px-5 py-2 bg-gray-300 rounded-lg">

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
