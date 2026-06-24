<x-backend>
<div class="max-w-3xl">
    <a href="{{ url('backend/event') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>

    <div class="card overflow-hidden">

        {{-- Foto --}}
        @if($event->foto)
            <img src="{{ url("public/$event->foto") }}"
                 class="w-full h-80 object-cover">
        @else
            <div class="w-full h-80 bg-green-50 flex flex-col items-center justify-center gap-3">
                <i class="fa-solid fa-calendar text-green-200 text-6xl"></i>
                <p class="text-slate-400 text-sm">Tidak ada foto</p>
            </div>
        @endif

        <div class="p-7">

            {{-- Judul + Badge + Tombol --}}
            <div class="flex items-start justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">{{ $event->judul }}</h2>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="badge badge-{{ $event->jenis == 'internal' ? 'blue' : 'green' }}">
                            {{ ucfirst($event->jenis) }}
                        </span>
                        <span class="badge badge-{{ $event->status == 'aktif' ? 'green' : ($event->status == 'selesai' ? 'gray' : 'red') }}">
                            {{ ucfirst($event->status ?? 'aktif') }}
                        </span>
                    </div>
                </div>
                <a href="{{ url('backend/event/edit', $event) }}"
                   class="btn-warning shrink-0">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-calendar-day mr-1"></i> Tanggal
                    </p>
                    <p class="font-semibold text-slate-700">
                        {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-clock mr-1"></i> Waktu
                    </p>
                    <p class="font-semibold text-slate-700">
                        {{ \Carbon\Carbon::parse($event->waktu)->format('H:i') }} WIB
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Lokasi
                    </p>
                    <p class="font-semibold text-slate-700">{{ $event->lokasi }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-users mr-1"></i> Kuota Peserta
                    </p>
                    <p class="font-semibold text-slate-700">
                        {{ $event->kuota ? number_format($event->kuota) . ' orang' : 'Tidak terbatas' }}
                    </p>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <p class="text-xs text-slate-400 mb-2">
                    <i class="fa-solid fa-align-left mr-1"></i> Deskripsi
                </p>
                <div class="bg-slate-50 rounded-xl p-4 text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                    {{ $event->deskripsi }}
                </div>
            </div>

            {{-- Footer Timestamp --}}
            <div class="flex items-center justify-between pt-5 border-t border-slate-100">
                <p class="text-xs text-slate-400">
                    <i class="fa-regular fa-clock mr-1"></i>
                    Dibuat: {{ $event->created_at->translatedFormat('d F Y, H:i') }}
                </p>
                <p class="text-xs text-slate-400">
                    <i class="fa-solid fa-pen-to-square mr-1"></i>
                    Diperbarui: {{ $event->updated_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>

        </div>
    </div>
</div>

</x-backend>

