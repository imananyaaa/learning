<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">
                Kelola Kontak
            </h2>
        </div>

        @if($list_kontak->isEmpty())
        <a href="{{ url('backend/kontak/create') }}"
            class="btn-primary">
            <i class="fa-solid fa-plus"></i>
            Tambah Kontak
        </a>
    @endif

    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="tbl-head">
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-left">Telepon</th>
                        <th class="text-left">Whatsapp</th>
                        <th class="text-left">Instagram</th>
                        <th class="text-left">Maps</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($list_kontak as $kontak)

                        <tr class="tbl-row">

                            {{-- No --}}
                            <td class="text-slate-400 text-xs">
                                {{ $loop->iteration }}
                            </td>

                            {{-- Aksi --}}
                            <td>
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Detail --}}
                                    <a href="{{ url('backend/kontak/show/' . $kontak->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">

                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ url('backend/kontak/edit/' . $kontak->id) }}"
                                        class="btn-warning"
                                        title="Edit">

                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    {{-- Hapus --}}
                                    <a href="{{ url('backend/kontak/delete/' . $kontak->id) }}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        class="btn-danger"
                                        title="Hapus">

                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                </div>
                            </td>

                            {{-- Telepon --}}
                            <td class="text-slate-600 text-sm">
                                {{ $kontak->telepon ?? '-' }}
                            </td>

                            {{-- Whatsapp --}}
                            <td class="text-slate-600 text-sm">
                                {{ $kontak->whatsapp ?? '-' }}
                            </td>

                            {{-- Instagram --}}
                            <td class="text-slate-600 text-sm">
                                {{ $kontak->instagram ?? '-' }}
                            </td>

                             {{-- Latitude --}}
                            <td class="text-slate-600 text-sm">
                                {{ $kontak->link_maps ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6"
                                class="text-center text-slate-400 py-8">

                                Belum ada data kontak.

                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</x-backend>
