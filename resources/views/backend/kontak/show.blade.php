<x-backend>
<div class="max-w">
    <a href="{{ url('backend/kontak') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>

    <div class="card overflow-hidden">

        <div class="p-7">

            {{-- Judul + Badge + Tombol --}}
            <div class="flex items-start justify-between gap-4 mb-6">

                <a href="{{ url('backend/kontak/edit', $kontak) }}"
                   class="btn-warning shrink-0">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-4 mb-6">

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-clock mr-1"></i> Telepon
                    </p>
                    <p class="font-semibold text-slate-700">
                        {{ $kontak->telepon }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Whatsapp
                    </p>
                    <p class="font-semibold text-slate-700">{{ $kontak->whatsapp }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Instagram
                    </p>
                    <p class="font-semibold text-slate-700">{{ $kontak->instagram }}</p>
                </div>

                 <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Latitude
                    </p>
                    <p class="font-semibold text-slate-700">{{ $kontak->latitude }}</p>
                </div>

                 <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Longitude
                    </p>
                    <p class="font-semibold text-slate-700">{{ $kontak->longitude }}</p>
                </div>

            </div>

        </div>
    </div>
</div>

</x-backend>

