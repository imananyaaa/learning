<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Event</h2>
            <p class="text-sm text-slate-500 mt-0.5">Total event terdaftar</p>
        </div>
        <a href="{{ url('backend/event/create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Event
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="tbl-head">
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-left">Event</th>
                        <th class="text-left">Tanggal</th>
                        <th class="text-left">Lokasi</th>
                        <th class="text-left">Jenis</th>
                        <th class="text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_event as $event)
                        <tr class="tbl-row">

                            <td class="text-slate-400 text-xs">{{ $loop->iteration }}</td>

                            {{-- Event --}}

                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ url('backend/event/show', $event->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ url('backend/event/edit', $event->id) }}" class="btn-warning"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- Hapus --}}
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"
                                        href="{{ url("backend/event/delete/$event->id") }}')" class="btn-danger"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    @if ($event->foto)
                                        <img src="{{ url("public/$event->foto") }}"
                                            class="w-12 h-12 rounded-lg object-cover border border-slate-200">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-calendar text-green-500 text-sm"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $event->judul }}</p>
                                        <p class="text-xs text-slate-400">
                                            {{ $event->kuota ? number_format($event->kuota) . ' peserta' : 'Tidak terbatas' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- Tanggal --}}
                            <td>
                                <p class="font-medium text-slate-700">
                                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                </p>
                                <p class="text-xs text-slate-400">
                                    {{ \Carbon\Carbon::parse($event->waktu)->format('H:i') }} WIB
                                </p>
                            </td>

                            {{-- Lokasi --}}
                            <td class="text-slate-600 text-sm">{{ $event->lokasi }}</td>

                            {{-- Jenis --}}
                            <td>
                                <span class="badge badge-{{ $event->jenis == 'internal' ? 'blue' : 'green' }}">
                                    {{ ucfirst($event->jenis) }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td>
                                <span
                                    class="badge badge-{{ $event->status == 'aktif' ? 'green' : ($event->status == 'selesai' ? 'gray' : 'red') }}">
                                    {{ ucfirst($event->status ?? 'aktif') }}
                                </span>
                            </td>

                            {{-- Aksi --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend>
