<x-backend>
    <div class="card p-5 mb-6">

            <form action="{{ url('backend/pengguna') }}" method="GET">

                <div class="flex flex-col md:flex-row gap-3">

                    {{-- Search --}}
                    <div class="relative flex-1">

                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama..."
                            class="w-full rounded-xl border border-slate-300 bg-white pl-12 pr-4 py-3
                           focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                           transition duration-200">

                    </div>

                    {{-- Tombol --}}
                    <div class="flex gap-2">

                        <button type="submit"
                            class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold
                           hover:bg-blue-700 transition">

                            <i class="fa-solid fa-magnifying-glass mr-2"></i>
                            Cari

                        </button>

                        @if (request('search'))
                            <a href="{{ url('backend/pengguna') }}"
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
                <h2 class="text-xl font-bold text-slate-800">Kelola Data pengguna</h2>
            </div>
        </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th style="color:white">No</th>
                        <th style="color:white">Aksi</th>
                        <th style="color:white">Nama</th>
                        <th style="color:white">Alamat</th>
                        <th style="color:white">Status</th>
                        <th style="color:white">Poto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pengguna as $pengguna)
                        <tr class="tbl-row">

                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>


                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/pengguna/show', $pengguna->nik) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    {{-- Verifikasi --}}
                                     @if ($pengguna->status == '1')
                                        <form action="{{ url('backend/pengguna/verifikasi', $pengguna->nik) }}"
                                            method="POST" class="flex">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="flex items-center justify-center space-x-1 px-3 py-1.5 bg-blue-600 text-white hover:bg-blue-700 rounded-md font-medium transition"
                                                title="Verifikasi"
                                                onclick="return confirm('Apakah Anda yakin ingin memverifikasi pengguna ini?')">
                                                <i class="bi bi-check-lg"></i>
                                                <span class="text-xs">Verifikasi</span>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Hapus --}}
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                        href="{{ url("backend/pengguna/delete/$pengguna->nik") }}')" class="btn-danger"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>

                            {{-- Nama --}}
                            <td class="text-slate-600 text-sm">{{ $pengguna->nama }}</td>


                            {{-- Alamat --}}
                            <td class="text-slate-600 text-sm">{{ $pengguna->alamat }}</td>



                            {{-- Status --}}
                                                        <td class="text-center">
                                @if ($pengguna->status == '1')
                                <span class="btn-primary">Belum Terverifikasi</span>
                                @elseif ($pengguna->status == '2')
                                <span class="btn-danger">Sudah Terverifikasi</span>
                                @endif
                            </td>

                           <td class="text-center">
                                <img src="{{ url("public/$pengguna->foto") }}" width="50" >
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
