<x-backend>
<div class="max-w">

    <a href="{{ url('backend/ulasan') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">

        <i class="fa-solid fa-arrow-left text-xs"></i>
        Kembali

    </a>

    <div class="card p-7">

        <div class="flex items-center gap-4 mb-6">

            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-lg">
                {{ strtoupper(substr($ulasan->user->name ?? 'U',0,1)) }}
            </div>

            <div>
                <h3 class="font-bold text-slate-800 text-lg">
                    {{ $ulasan->user->name ?? 'User Tidak Ditemukan' }}
                </h3>

                <p class="text-slate-500">
                    {{ $ulasan->instansi ?? '-' }}
                </p>
            </div>

        </div>

        <div class="mb-5">

            <p class="text-sm font-semibold text-slate-500 mb-2">
                Rating
            </p>

            <div class="text-yellow-500 text-xl">
                {{ str_repeat('★', $ulasan->rating) }}
            </div>

        </div>

        <div class="bg-slate-50 rounded-xl p-5 border border-slate-100">

            <p class="text-xs font-bold text-slate-400 uppercase mb-3">
                Komentar
            </p>

            <p class="text-slate-700 leading-relaxed">
                {{ $ulasan->komentar }}
            </p>

        </div>

        <p class="text-xs text-slate-400 mt-4">
            Dikirim:
            {{ $ulasan->created_at->format('d F Y H:i') }}
        </p>

    </div>

</div>

</x-backend>

