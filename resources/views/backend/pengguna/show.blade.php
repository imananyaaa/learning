<x-backend>
<div class="max-w">
    <a href="{{ url('backend/pengguna') }}"
       class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>

    <div class="card overflow-hidden">

        {{-- Foto --}}

            <img src="{{ url("public/$pengguna->foto") }}"
                 class="w-full h-80 object-cover">


        <div class="p-7">

            {{-- Judul + Badge + Tombol --}}
            <div class="flex items-start justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">{{ $pengguna->judul }}</h2>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="badge badge-{{ $pengguna->status == 'aktif' ? 'green' : ($pengguna->status == 'selesai' ? 'gray' : 'red') }}">
                            {{ ucfirst($pengguna->status ?? 'aktif') }}
                        </span>
                    </div>
                </div>
                <a href="{{ url('backend/pengguna/show', $pengguna) }}"
                   class="btn-warning shrink-0">
                    <i class="fa-solid fa-pen"></i> Lihat
                </a>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-4 mb-6">

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-id-card"></i> NIK
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->nik }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-user"></i> Nama
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->nama }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-envelope"></i> Email
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->email }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-user-tag"></i> Username
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->username }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-lock"></i> Password
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->password }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-house"></i> Alamat
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->alamat }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-phone"></i> No Hp
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->no_hp }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-location-dot mr-1"></i> Tempat Lahir
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->tempat_lahir }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-calendar-day mr-1"></i> Tanggal Lahir
                    </p>
                    <p class="font-semibold text-slate-700">
                        {{ \Carbon\Carbon::parse($pengguna->tanggal_lahir)->translatedFormat('d F Y') }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-image"></i> Foto
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->foto }}</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 mb-1">
                        <i class="fa-solid fa-circle-check"></i> Status
                    </p>
                    <p class="font-semibold text-slate-700">{{ $pengguna->status }}</p>
                </div>



            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <p class="text-xs text-slate-400 mb-2">
                    <i class="fa-solid fa-align-left mr-1"></i> Deskripsi
                </p>
                <div class="bg-slate-50 rounded-xl p-4 text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                    {{ $pengguna->deskripsi }}
                </div>
            </div>

            {{-- Footer Timestamp --}}
            <div class="flex items-center justify-between pt-5 border-t border-slate-100">
                <p class="text-xs text-slate-400">
                    <i class="fa-regular fa-clock mr-1"></i>
                    Dibuat: {{ $pengguna->created_at->translatedFormat('d F Y, H:i') }}
                </p>
                <p class="text-xs text-slate-400">
                    <i class="fa-solid fa-pen-to-square mr-1"></i>
                    Diperbarui: {{ $pengguna->updated_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>

        </div>
    </div>
</div>

</x-backend>

