<x-backend>

{{-- Statistik --}}
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">

        </div>
        <span class="badge badge-blue mt-1">
            Total Ulasan
        </span>
    </div>

    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">

            ⭐
        </div>
        <span class="badge badge-yellow mt-1">
            Rata-rata Rating
        </span>
    </div>
</div>


{{-- Tabel Ulasan --}}
<div class="card overflow-hidden">

    <table class="w-full">

        <thead class="tbl-head">
            <tr>
                <th class="text-left">#</th>
                <th class="text-center">Aksi</th>
                <th class="text-left">Pengguna</th>
                <th class="text-left">Instansi</th>
                <th class="text-left">Rating</th>
                <th class="text-left">Komentar</th>
                <th class="text-left">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($list_ulasan as $ulasan)

            <tr class="tbl-row">

                <td class="text-slate-400 text-xs">
                    {{ $loop->iteration }}
                </td>

                <td class="font-semibold text-slate-800">
                    {{ $ulasan->user->name ?? 'User tidak ditemukan' }}
                </td>

                <td>
                    {{ $ulasan->instansi ?? '-' }}
                </td>

                <td class="text-yellow-500 font-bold">
                    {{ str_repeat('★', $ulasan->rating) }}
                    <span class="text-slate-300">
                        {{ str_repeat('★', 5 - $ulasan->rating) }}
                    </span>
                </td>

                <td class="max-w-xs">
                    <p class="text-sm text-slate-700 line-clamp-2">
                        {{ $ulasan->komentar }}
                    </p>
                </td>

                <td class="text-xs text-slate-500">
                    {{ $ulasan->created_at->format('d M Y') }}
                </td>


                <td>
                    <div class="flex items-center justify-center gap-2">

                       <a href="{{ url('backend/ulasan/show', $ulasan) }}"
                          class="btn-info">

                          <i class="fa-solid fa-eye"></i>

                       </a>

                       <button
                           onclick="openDel('{{ url('ulasan/ulasan/destroy', $ulasan) }}')"
                           class="btn-danger">

                           <i class="fa-solid fa-trash"></i>

                       </button>

                    </div>
                </td>

            </tr>


            <tr>
                <td colspan="7"
                    class="text-center py-12 text-slate-400">
                    Belum ada ulasan.
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>




</div>

</x-backend>
