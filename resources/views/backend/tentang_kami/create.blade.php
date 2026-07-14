<x-backend>

    <div class="max-w">
        <a href="{{ url('backend/tentang_kami') }}"
            class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>
        <div class="card p-7">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Tambah Tentang Kami Baru</h2>

            <form action="{{ url('backend/tentang_kami') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                    {{-- PERBAIKAN: name="nama" --}}

                    <div>
                        <label class="form-label">Visi <span class="text-red-500">*</span></label>
                        <input type="text" name="visi" value="{{ old('visi') }}" class="form-input" required>
                        @error('visi')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">Misi <span class="text-red-500">*</span></label>
                        <input type="text" name="misi" value="{{ old('misi') }}" class="form-input" required>
                        @error('misi')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">Sejarah <span class="text-red-500">*</span></label>
                        <textarea name="sejarah"
                            class="w-full rounded-lg border border-gray-300 p-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="5" placeholder="Masukkan pesan..."></textarea>

                    </div>


                    <div>
                        <label class="form-label">Foto Tentang Kami</label>
                        {{-- Tidak ada batasan ukuran di sini --}}
                        <input type="file" name="foto" class="form-input" accept="image/*"
                            onchange="previewImg(this,'prev')">
                        @error('foto')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                        <img id="prev" class="mt-3 rounded-xl h-40 object-cover hidden border border-slate-200">
                    </div>

                    <div class="flex gap-3 pt-2">
                        <a href="{{ url('admin/tentang_kami') }}"
                            class="flex-1 py-2.5 text-center rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</a>
                        <button type="submit" class="btn-primary flex-1 justify-center py-2.5">
                            <i class="fa-solid fa-save"></i> Simpan
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
