<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Kontak</h2>
            <p class="text-sm text-slate-500 mt-0.5">Kontak
            <p>
        </div>
        <a href="{{ url('backend/kontak/create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Kontak
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-left">Alamat</th>
                        <th class="text-left">No Hp</th>
                        <th class="text-left">Whatsapp</th>
                        <th class="text-left">Instagram</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_kontak as $kontak)
                        <tr class="tbl-row">

                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>

                            {{-- Kontak --}}

                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/kontak/show', $kontak->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ url('backend/kontak/edit', $kontak->id) }}" class="btn-warning"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- Hapus --}}
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                        href="{{ url("backend/kontak/delete/$kontak->id") }}')" class="btn-danger"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>


                            {{-- No Hp --}}
                            @if ($kontak->no_hp)
                                <p class="text-xs text-slate-400">
                                    {{ $kontak->no_hp }}
                                </p>
                            @endif

                            {{-- Alamat --}}
                            <td class="text-slate-600 text-sm">{{ $kontak->alamat }}</td>

                            {{-- Whatsapp --}}
                            <td class="text-slate-600 text-sm">{{ $kontak->whatsapp }}</td>

                            {{--Instagram --}}
                            <td class="text-slate-600 text-sm">{{ $kontak->instagram }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
