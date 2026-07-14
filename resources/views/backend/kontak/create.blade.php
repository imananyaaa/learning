<x-backend>

    <div class="max-w">
        <a href="{{ url('backend/kontak') }}"
            class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
        </a>
        <div class="card p-7">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Tambah Kontak Baru</h2>

            <form action="{{ url('backend/kontak') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="form-label">Telepon <span class="text-red-500">*</span></label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}" class="form-input"
                                required>
                            @error('telepon')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Whatsapp <span class="text-red-500">*</span></label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="form-input"
                                required>
                            @error('whatsapp')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Instagram <span class="text-red-500">*</span></label>
                            <input type="text" name="instagram" value="{{ old('instagram') }}" class="form-input"
                                required>
                            @error('instagram')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                            <label class="form-label">Maps<span class="text-red-500">*</span></label>
                            <input type="text" step="any" name="link_maps"  class="form-input"
                                required>
                            @error('link_maps')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="flex gap-3 pt-2">
                        <a href="{{ url('admin.event.index') }}"
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
