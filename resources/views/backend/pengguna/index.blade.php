<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Pengguna</h2>
            <p class="text-sm text-slate-500 mt-0.5">Total Pengguna Terdaftar</p>
        </div>
        <a href="{{ url('backend/pengguna/create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-left">Nama</th>
                        <th class="text-left">Alamat</th>
                        <th class="text-left">No_Hp</th>
                        <th class="text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pengguna as $pengguna)
                        <tr class="tbl-row">

                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>

                            {{-- Event --}}

                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/pengguna/show', $pengguna->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    {{-- Verifikasi --}}
                                    @if ($pengguna->status != 'aktif')
                                        <a href="{{ url('backend/pengguna/verifikasi', $pengguna->id) }}"
                                            onclick="return confirm('Verifikasi pengguna ini?')"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-green-50 text-green-600 hover:bg-green-100"
                                            title="Verifikasi">

                                            <i class="fa-solid fa-user-check"></i>

                                        </a>
                                    @endif

                                    </a>
                                    {{-- Hapus --}}
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                        href="{{ url("backend/pengguna/delete/$pengguna->id") }}')" class="btn-danger"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>

                            {{-- Nama --}}
                            <td class="text-slate-600 text-sm">{{ $pengguna->nama }}</td>


                            {{-- Alamat --}}
                            <td class="text-slate-600 text-sm">{{ $pengguna->alamat }}</td>

                            {{-- No_Hp --}}
                            <td class="text-slate-600 text-sm">{{ $pengguna->no_hp }}</td>

                            {{-- Status --}}
                            <td>
                                @if ($pengguna->status == 'aktif')
                                    <span class="badge badge-green">
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge badge-yellow">
                                        Belum Diverifikasi
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
