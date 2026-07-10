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
    <div class="card p-5 mb-6">

        <form action="{{ url('backend/ulasan') }}" method="GET">

            <div class="flex flex-col md:flex-row gap-3">

                {{-- Search --}}
                <div class="relative flex-1">

                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau komentar..."
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
                        <a href="{{ url('backend/ulasan') }}"
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
            <h2 class="text-xl font-bold text-slate-800">Data Ulasan</h2>
            <p class="text-sm text-slate-500 mt-0.5">Total ulasan terdaftar</p>
        </div>

        <button onclick="openImportModal()" class="btn-primary">

            <i class="fa-solid fa-upload"></i>
            Import Ulasan

        </button>
    </div>



    {{-- Tabel Ulasan --}}
    <div class="card overflow-hidden">

        <table class="w-full">

            <thead class="tbl-head">
                <tr>
                    <th class="text-left">#</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-left">Pengguna</th>
                    <th class="text-left">Rating</th>
                    <th class="text-left">Komentar</th>
                    <th class="text-left">Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($list_ulasan as $ulasan)
                    <tr class="tbl-row">

                        <td class="text-slate-400 text-xs">
                            {{ $list_ulasan->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-2">

                                <a href="{{ url('backend/ulasan/show', $ulasan) }}" class="btn-info">

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                                <button onclick="openDel('{{ url('ulasan/ulasan/destroy', $ulasan) }}')"
                                    class="btn-danger">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </div>
                        </td>

                        <td class="font-semibold text-slate-800">
                            {{ $ulasan->nama ?? 'User tidak ditemukan' }}
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

                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $list_ulasan->links() }}
        </div>
    </div>

    <!-- Modal Import -->
    <div id="importModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">

        <div id="importContent"
            class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6 mx-4 transform scale-90 opacity-0 transition duration-300">

            <div class="flex items-center justify-between">

                <h2 class="text-xl font-bold">
                    Import Ulasan
                </h2>

                <button onclick="closeImportModal()">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>

            </div>

            <p class="text-sm text-slate-500 mt-2">
                Pilih file Excel (.xlsx atau .xls)
            </p>

            <form action="{{ url('backend/ulasan/import') }}" method="POST" enctype="multipart/form-data"
                class="mt-6">

                @csrf

                <input type="file" name="file" accept=".xlsx,.xls" required
                    class="block w-full rounded-lg border border-slate-300 p-3">

                <div class="flex justify-end gap-3 mt-6">

                    <button type="button" onclick="closeImportModal()" class="px-5 py-2 rounded-lg border">

                        Batal

                    </button>

                    <button type="submit" class="btn-primary">

                        <i class="fa-solid fa-upload"></i>
                        Import

                    </button>

                </div>

            </form>

        </div>

    </div>


</x-backend>
