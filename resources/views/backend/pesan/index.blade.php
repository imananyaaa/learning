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

        @foreach($list_pesan as $pesan)

            <tr class="tbl-row">

                <td class="text-slate-400 text-xs">
                    {{ $loop->iteration }}
                </td>

                <td>
                    <div class="flex items-center justify-center gap-2">

                        {{-- Lihat detail --}}
                        <a href="{{ url('backend/pesan/show', $pesan) }}"
                           class="btn-info">
                            <i class="fa-solid fa-eye"></i>
                        </a>


                        {{-- Hapus --}}
                        <button
                            onclick="openDel('{{ url('backend/pesan/destroy', $pesan) }}')"
                            class="btn-danger">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>
                </td>


                <td>
                    <p class="font-semibold text-slate-800">
                        {{ $pesan->nama }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ $pesan->email }}
                    </p>

                    @if($pesan->telepon)
                        <p class="text-xs text-slate-400">
                            {{ $pesan->telepon }}
                        </p>
                    @endif
                </td>


                <td>
                    {{ $pesan->tujuan }}
                </td>

                <td class="max-w-xs">
                    <p class="text-sm text-slate-700 line-clamp-2">
                        {{ $pesan->pesan }}
                    </p>
                </td>

                <td>
                    @if($pesan->status_baca)
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
                    {{ $pesan->created_at ? $pesan->created_at->format('d M Y H:i') : '-' }}
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>


    {{-- Pagination --}}


</div>

</x-backend>


