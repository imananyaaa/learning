<x-backend>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kelola Tentang Kami</h2>
        </div>
        @if($list_tentang_kami->isEmpty())
        <a href="{{ url('backend/tentang_kami/create') }}"
            class="btn-primary">
            <i class="fa-solid fa-plus"></i>
            Tambah Data
        </a>
    @endif

    </div>

    <div class="card p-6">

    @foreach ($list_tentang_kami as $tentang_kami)

    <table class="w-full border border-slate-300">
    <div class="flex justify-end items-center gap-2 mb-4">

    <a href="{{ url('backend/tentang_kami/show', $tentang_kami->id) }}"
        class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition"
        title="Lihat Detail">
        <i class="fa-solid fa-eye"></i>
    </a>

    <a href="{{ url('backend/tentang_kami/edit', $tentang_kami->id) }}"
        class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200 transition"
        title="Edit">
        <i class="fa-solid fa-pen"></i>
    </a>

</div>


        <tr>
            <td class="border p-3 font-semibold">
                Visi
            </td>

            <td class="border p-3">
                {{ $tentang_kami->visi }}
            </td>
        </tr>

        <tr>
            <td class="border p-3 font-semibold">
                Misi
            </td>

            <td class="border p-3">
                {{ $tentang_kami->misi }}
            </td>
        </tr>

        <tr>
            <td class="border p-3 font-semibold align-top">
                Sejarah
            </td>

            <td class="border p-3">
                {!! nl2br($tentang_kami->sejarah) !!}
            </td>
        </tr>

        <tr>
            <td class="border p-3 font-semibold">
                Foto
            </td>

            <td class="border p-3">

                @if($tentang_kami->foto)
                    <img src="{{ url("public/$tentang_kami->foto") }}"
                         class="w-44 rounded-lg border">
                @endif

            </td>
        </tr>

    </table>

    @endforeach

</div>
</x-backend>
