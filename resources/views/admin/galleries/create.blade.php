@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div>
            <p class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-1">Dokumentasi Baru</p>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Unggah <span class="text-gold">Foto Galeri</span></h1>
        </div>
        <a href="{{ route('galleries.index') }}"
            class="min-h-[44px] inline-flex items-center px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
            Kembali
        </a>
    </div>

    <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">
        <form id="galleryForm" action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">File Foto Karya</label>
                <input type="file" id="image" name="image" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl p-2.5 text-slate-300 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gold file:text-slate-950 file:font-extrabold hover:file:bg-amber-300 transition">
                <p class="text-xs text-slate-400 mt-2">
                    Format foto: JPG, PNG, WEBP (Disarankan rasio 4:3 atau persegi).
                </p>
                @error('image')
                    <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Judul Gaya Rambut</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 focus:border-amber-400 outline-none text-white placeholder-slate-400 transition"
                    placeholder="Contoh: Classic Pompadour &amp; Taper Fade">
                @error('title')
                    <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Kategori / Subjudul</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 focus:border-amber-400 outline-none text-white placeholder-slate-400 transition"
                    placeholder="Contoh: Classic Cut">
                @error('subtitle')
                    <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button id="submitBtn" type="submit"
                    class="min-h-[48px] w-full bg-gold text-slate-950 py-3.5 rounded-xl font-extrabold uppercase tracking-wider text-xs sm:text-sm hover:bg-amber-300 transition">
                    Simpan ke Galeri
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    document.getElementById('galleryForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.textContent = 'Mengunggah Foto...';
    });
</script>
@endsection
