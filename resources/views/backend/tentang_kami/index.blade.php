<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Tentng Kami</h2>
        </div>
        @if($list_tentang_kami->isEmpty())
        <a href="{{ url('backend/tentang-kami/create') }}"
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
                        <th class="text-left">Foto</th>
                        <th class="text-left">Visi</th>
                        <th class="text-left">Misi</th>
                        <th class="text-left">Sejarah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_tentang_kami as $tentang_kami)
                        <tr class="tbl-row">

                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>

                            {{-- Tentang Kami --}}

                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/tentang_kami/show', $tentang_kami->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ url('backend/tentang_kami/edit', $tentang_kami->id) }}" class="btn-warning"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    @if ($tentang_kami->foto)
                                        <img src="{{ url("public/$tentang_kami->foto") }}"
                                            class="w-12 h-12 rounded-lg object-cover border border-slate-200">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-calendar text-green-500 text-sm"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            {{-- Visi --}}
                            <td class="text-slate-600 text-sm">{{ $tentang_kami->visi }}</td>

                            {{-- Misi --}}
                            <td class="text-slate-600 text-sm">{{ $tentang_kami->misi }}</td>

                            {{-- Sejarah --}}
                            <td class="text-slate-600 text-sm">{{ $tentang_kami->sejarah }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
