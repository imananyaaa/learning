<x-backend>
    <div class="max-w">
        <a href="{{ url('backend/event') }}"
            class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>
        <div class="card p-7">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Edit Event</h2>

            <form action="{{ url('backend/event/update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div
                        style="background:#fee2e2;border:1px solid #ef4444;color:#b91c1c;padding:15px;margin-bottom:20px;border-radius:8px;">
                        <strong>Terjadi Kesalahan:</strong>
                        <ul style="margin-top:10px;">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-5">
                    <div>
                        <label class="form-label">Nama Event <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul', $event->judul) }}" class="form-input"
                            required>
                        @error('nama')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $event->tanggal) }}"
                                class="form-input" required>
                        </div>
                        <div>
                            <label class="form-label">Waktu <span class="text-red-500">*</span></label>
                            <input type="time" name="waktu" value="{{ old('waktu', $event->waktu) }}"
                                class="form-input" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Jenis <span class="text-red-500">*</span></label>
                            <select name="jenis" class="form-input" required>
                                <option value="">-- Pilih --</option>
                                <option value="internal"
                                    {{ old('jenis', $event->jenis) == 'internal' ? 'selected' : '' }}>Internal</option>
                                <option value="eksternal"
                                    {{ old('jenis', $event->jenis) == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Kuota Peserta</label>
                            <input type="number" name="kuota" value="{{ old('kuota', $event->kuota) }}"
                                class="form-input" min="0" placeholder="Kosongkan = tidak terbatas">
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Lokasi <span class="text-red-500">*</span></label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $event->lokasi) }}"
                            class="form-input" required>
                    </div>

                    <div>
                        <label class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" class="form-input" rows="4" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-input">
                            <option value="aktif" {{ old('status', $event->status) == 'aktif' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="selesai"
                                {{ old('status', $event->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan"
                                {{ old('status', $event->status) == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Foto Event</label>
                        @if ($event->foto)
                            <div class="mb-3">
                                <img src="{{ Storage::url($event->foto) }}"
                                    class="rounded-xl h-40 object-cover border border-slate-200">
                                <p class="text-xs text-slate-400 mt-1">Foto saat ini. Upload baru untuk mengganti.</p>
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-input" accept="image/*"
                            onchange="previewImg(this,'prev')">
                        @error('foto')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                        <img id="prev" class="mt-3 rounded-xl h-40 object-cover hidden border border-slate-200">
                    </div>

                    <div class="flex gap-3 pt-2">
                        <a href="{{ url('backend/event') }}"
                            class="flex-1 py-2.5 text-center rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</a>
                        <button type="submit" class="btn-primary flex-1 justify-center py-2.5">
                            <i class="fa-solid fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @push('scripts')
        <script>
            function previewImg(input, id) {
                if (input.files && input.files[0]) {
                    const r = new FileReader();
                    r.onload = e => {
                        const img = document.getElementById(id);
                        img.src = e.target.result;
                        img.classList.remove('hidden');
                    };
                    r.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
</x-backend>
