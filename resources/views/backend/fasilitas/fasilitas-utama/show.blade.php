<x-backend>
<div class="max-w">

    <a href="{{ url('backend/fasilitas-utama') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">

        <i class="fa-solid fa-arrow-left"></i>
        Kembali
    </a>

    <div class="card p-7">

        <input type="text" name="id_fasilitas" value="{{ $fasilitas->id }}" hidden>
        <h2 class="text-2xl font-bold text-slate-800 mb-5">
            {{ $fasilitas->nama }}
        </h2>

        @if($fasilitas->foto)
            <img src="{{ url("public/$fasilitas->foto") }}"
                 class="w-full rounded-xl mb-5 max-h-96 object-cover">
        @endif

        <div class="grid grid-cols-2 gap-4 mb-5">

            <div>
                <p class="text-sm text-slate-500">Jenis</p>
                <p class="font-semibold">
                    {{ ucfirst($fasilitas->jenis) }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Kapasitas</p>
                <p class="font-semibold">
                    {{ $fasilitas->kapasitas ?? '-' }} Orang
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Status</p>
                <p class="font-semibold">
                    {{ ucfirst($fasilitas->status) }}
                </p>
            </div>

        </div>

        <div class="bg-slate-50 rounded-xl p-5">

            <p class="text-sm text-slate-500 mb-2">
                Deskripsi
            </p>

            <p class="text-slate-700">
                {{ $fasilitas->deskripsi }}
            </p>

        </div>

    </div>

</div>

</x-backend>

