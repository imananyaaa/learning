<x-backend>
    <a href="{{ url('backend/booking') }}" class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>

    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="{{ url('public/' . $booking->pengguna->foto) }}"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>
                            <h1 class="text-xl font-bold">{{ $booking->pengguna->nama }}</h1>
                            <p class="text-gray-700">{{ $booking->pengguna->email }}</p>

                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">No Hp</span>
                            <ul>
                                <li class="mb-2">{{ $booking->pengguna->no_hp }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mt-6 mb-4">Detail Booking</h2>
                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">Nama Fasilitas</span>
                                <p>
                                    <span class="text-gray-700 mr-2">{{ $booking->fasilitas->nama }}</span>

                                </p>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">Nama Kegiatan</span>
                                <p>
                                    <span class="text-gray-700 mr-2">{{ $booking->nama_kegiatan }}</span>

                                </p>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">Tanggal Mulai</span>
                                <p>
                                    <span
                                        class="text-gray-700 mr-2">{{ date('d-M-Y', strtotime($booking->tanggal_mulai)) }}</span>

                                </p>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">Tanggal Selesai</span>
                                <p>
                                    <span
                                        class="text-gray-700 mr-2">{{ date('d-M-Y', strtotime($booking->tanggal_selesai)) }}</span>

                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">Catatan</span>
                                <p>
                                    <span class="text-gray-700 mr-2">{{ $booking->catatan }}</span>

                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                <span class="text-gray-700 font-bold">File Proposal</span>
                                <p>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        <a href="{{ url("public/$booking->file_proposal") }}" target="_blank"> Lihat
                                            Proposal</a>
                                    </button>

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-backend>
