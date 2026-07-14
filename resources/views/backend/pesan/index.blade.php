<x-backend>

    <div class="card p-5 mb-6">

        <form action="{{ url('backend/pesan') }}" method="GET">

            <div class="flex flex-col md:flex-row gap-3">

                {{-- Search --}}
                <div class="relative flex-1">

                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pesan..."
                        class="w-full rounded-xl border border-slate-300 bg-white pl-12 pr-4 py-3
                           focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                           transition duration-200">

                </div>

                {{-- Tombol --}}
                <div class="flex gap-2">

                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari
                    </button>
                    @if (request('search'))
                        <a href="{{ url('backend/pesan') }}"
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
            <h2 class="text-xl font-bold text-slate-800">Kelola Pesan Masuk</h2>
        </div>
    </div>



    {{-- Tabel Pesan --}}
    <div class="card overflow-hidden">

        <table class="w-full">

            <thead class="tbl-head">
                <tr>
                    <th class="text-left">No</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-left">Pengirim</th>
                    <th class="text-left">Tujuan</th>
                    <th class="text-left">Pesan</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Tanggal</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($list_pesan as $pesan)
                    <tr class="tbl-row">

                        <td class="text-slate-400 text-xs">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-2">

                                {{-- Lihat detail --}}
                                @if ($pesan->status_baca == '0')
                                    <a href="{{ url('backend/pesan/show', $pesan) }}" class="btn-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                @endif



                                {{-- Hapus --}}
                                <button onclick="openDel('{{ url('backend/pesan/destroy', $pesan) }}')"
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

                            @if ($pesan->telepon)
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
                            @if ($pesan->status_baca)
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
