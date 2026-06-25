<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Fasilitas</h2>

        </div>
        <a href="{{ url('backend/fasilitas/create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Fasilitas
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-left">Fasilitas</th>
                        <th class="text-left">Jenis</th>
                        <th class="text-left">Kapasitas</th>
                        <th class="text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_fasilitas as $fasilitas)
                        <tr class="tbl-row">
                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/fasilitas/show', $fasilitas->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ url('backend/fasilitas/edit', $fasilitas->id) }}" class="btn-warning"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- Hapus --}}
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                        href="{{ url("backend/fasilitas/delete/$fasilitas->id") }}')" class="btn-danger"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    @if ($fasilitas->foto)
                                        <img src="{{ url("public/$fasilitas->foto") }}"
                                            class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                            <i class="fa-solid fa-building text-blue-500 text-sm"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $fasilitas->nama }}</p>
                                        <p class="text-xs text-slate-400 line-clamp-1 max-w-xs">{{ $fasilitas->deskripsi }}</p>
                                    </div>
                                </div>
                            </td>
                            <td><span
                                    class="badge badge-{{ $fasilitas->jenis == 'utama' ? 'blue' : 'green' }}">{{ ucfirst($fasilitas->jenis) }}</span>
                            </td>
                            <td class="text-slate-600">{{ $fasilitas->kapasitas ? $fasilitas->kapasitas : '-' }}</td>
                            <td><span
                                    class="badge badge-{{ $fasilitas->status == 'aktif' ? 'green' : 'gray' }}">{{ ucfirst($fasilitas->status ?? 'aktif') }}</span>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</x-backend>
