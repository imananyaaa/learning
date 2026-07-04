<x-backend>
<div class="max-w-2xl">
    <a href="{{ url('backend/pesan') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">

        <i class="fa-solid fa-arrow-left text-xs"></i>
        Kembali

    </a>

    <div class="card p-7 mb-5">
        <div class="flex items-start justify-between mb-5">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-lg">{{ strtoupper(substr($pesan->nama,0,1)) }}</div>
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">{{ $pesan->nama }}</h3>
                    <p class="text-sm text-slate-500">
                        {{ $pesan->email }}
                        {{ $pesan->telepon ? '· '.$pesan->telepon : '' }}

                        <a target="_blank" href="https://wa.me/{{ $pesan->telepon }}" class="text-blue-600">Kirim WA</a>
                    </p>
                    <p class="text-sm text-blue-600 font-medium mt-1">
                        Tujuan: {{ $pesan->tujuan }}
                    </p>
                </div>
            </div>
           @if($pesan->status_baca)
               <span class="badge badge-green">
                   Sudah Dibaca
               </span>
           @else
               <span class="badge badge-red">
                   Belum Dibaca
               </span>
           @endif
        </div>
        <div class="bg-slate-50 rounded-xl p-5 border border-slate-100">
            <p class="text-xs font-bold text-slate-400 uppercase mb-3">Pesan</p>
            <p class="text-slate-700 leading-relaxed">{{ $pesan->pesan }}</p>
        </div>
        <p class="text-xs text-slate-400 mt-3">
            Dikirim:{{ $pesan->created_at ? $pesan->created_at->format('d F Y, H:i') . ' WIB' : '-' }}</p>
    </div>
</div>
</x-backend>

