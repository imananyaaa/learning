<x-backend>
    <div class="max-w">
        <a href="{{ url('backend/fasilitas-pendukung') }}"
            class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>
        <div class="card p-7">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Tambah Fasilitas Pendukung</h2>
            <form action="{{ url('backend/fasilitas-pendukung') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="form-label">Nama Fasilitas <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-input"
                            placeholder="contoh: Ruang Rapat Utama" required>
                        @error('nama')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                         <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-input">
                            <option value=""> Pilih Status</option>
                            <option value="Tersedia" {{ old('status', 'Tersedia') == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="DIperbaiki" {{ old('status') == 'DIperbaiki' ? 'selected' : '' }}>DIperbaiki
                            </option>
                        </select>
                    </div>
                    </div>
                    <div>
                        <label class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" class="form-input" rows="4" placeholder="Deskripsikan fasilitas ini..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">Foto Fasilitas</label>
                        <input type="file" name="foto" class="form-input" accept="image/*"
                            onchange="previewImg(this,'prev')">
                        <img id="prev" class="mt-3 rounded-xl h-40 object-cover hidden border border-slate-200">
                        @error('foto')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-3 pt-2">
                        <a href="{{ url('backend/fasilitas-pendukung') }}"
                            class="flex-1 py-2.5 text-center rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</a>
                        <button type="submit" class="btn-primary flex-1 justify-center py-2.5"><i
                                class="fa-solid fa-save"></i> Simpan</button>
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
