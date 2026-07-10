<x-backend>
<div class="max-w">
    <a href="{{ url('backend/tentang_kami') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>

    <div class="card overflow-hidden">

        {{-- Foto --}}
        @if($tentang_kami->foto)
            <img src="{{ url("public/$tentang_kami->foto") }}"
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
                <a href="{{ url('backend/tentang_kami/edit', $tentang_kami) }}"
                   class="btn-warning shrink-0">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-4 mb-6">

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Visi
                    </p>
                    <p class="font-semibold text-slate-700">{{ $tentang_kami->visi }}</p>
                </div>

                 <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Misi
                    </p>
                    <p class="font-semibold text-slate-700">{{ $tentang_kami->misi }}</p>
                </div>

                 <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Sejarah
                    </p>
                    <p class="font-semibold text-slate-700">{{ $tentang_kami->sejarah }}</p>
                </div>

            </div>

            {{-- Footer Timestamp --}}
            <div class="flex items-center justify-between pt-5 border-t border-slate-100">
                <p class="text-xs text-slate-400">
                    <i class="fa-regular fa-clock mr-1"></i>
                    Dibuat: {{ $tentang_kami->created_at->translatedFormat('d F Y, H:i') }}
                </p>
                <p class="text-xs text-slate-400">
                    <i class="fa-solid fa-pen-to-square mr-1"></i>
                    Diperbarui: {{ $tentang_kami->updated_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>

        </div>
    </div>
</div>

</x-backend>

