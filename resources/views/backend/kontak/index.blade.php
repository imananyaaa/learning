<x-backend>
{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="card p-4 text-center">

        <span class="badge badge-blue mt-1">
            Total Pesan
        </span>
    </div>
</div>


{{-- Tabel Pesan --}}
<div class="card overflow-hidden">

    <table class="w-full">

        <thead class="tbl-head">
            <tr>
                <th class="text-left">#</th>
                <th class="text-center">Aksi</th>
                <th class="text-left">Pengirim</th>
                <th class="text-left">Tujuan</th>
                <th class="text-left">Pesan</th>
                <th class="text-left">Status</th>
                <th class="text-left">Tanggal</th>
            </tr>
        </thead>


        <tbody>

        @foreach($list_kontak as $kontak)

            <tr class="tbl-row">

                <td class="text-slate-400 text-xs">
                    {{ $loop->iteration }}
                </td>

                <td>
                    <div class="flex items-center justify-center gap-2">

                        {{-- Lihat detail --}}
                        <a href="{{ url('backend/kontak/show', $kontak) }}"
                           class="btn-info">
                            <i class="fa-solid fa-eye"></i>
                        </a>


                        {{-- Hapus --}}
                        <button
                            onclick="openDel('{{ url('backend/kontak/destroy', $kontak) }}')"
                            class="btn-danger">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>
                </td>


                <td>
                    <p class="font-semibold text-slate-800">
                        {{ $kontak->nama }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ $kontak->email }}
                    </p>

                    @if($kontak->telepon)
                        <p class="text-xs text-slate-400">
                            {{ $kontak->telepon }}
                        </p>
                    @endif
                </td>


                <td>
                    {{ $kontak->tujuan }}
                </td>

                <td class="max-w-xs">
                    <p class="text-sm text-slate-700 line-clamp-2">
                        {{ $kontak->pesan }}
                    </p>
                </td>

                <td>
                    @if($kontak->status_baca)
                        <span class="badge badge-green">
                            Dibaca
                        </span>

                    @else
                        <span class="badge badge-red">
                            Baru
                        </span>
                    @endif
                </td>


                <td class="text-xs text-slate-500">
                    {{ $kontak->created_at ? $kontak->created_at->format('d M Y H:i') : '-' }}
                </td>
            </tr>



            <tr>
                <td colspan="7"
                    class="text-center py-12 text-slate-400">
                    Belum ada pesan masuk.
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>


    {{-- Pagination --}}


</div>

</x-backend>


