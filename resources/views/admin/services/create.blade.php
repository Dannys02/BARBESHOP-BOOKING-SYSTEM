@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div>
            <p class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-1">Katalog Layanan</p>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Tambah <span class="text-gold">Layanan Baru</span></h1>
        </div>
        <a href="{{ route('services.index') }}"
            class="min-h-[44px] inline-flex items-center px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
            Kembali
        </a>
    </div>

    <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">
        <form id="serviceForm" action="{{ route('services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Nama Layanan</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 focus:border-amber-400 outline-none text-white placeholder-slate-400 transition"
                    placeholder="Contoh: Gentleman's Haircut, Beard Trim">
                @error("name")
                    <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Harga Tarif (Rp)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 focus:border-amber-400 outline-none text-white placeholder-slate-400 transition"
                        placeholder="Contoh: 50000">
                    @error("price")
                        <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Durasi Pengerjaan (Menit)</label>
                    <input type="number" id="duration" name="duration" value="{{ old('duration') }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 focus:border-amber-400 outline-none text-white placeholder-slate-400 transition"
                        placeholder="Contoh: 45">
                    @error("duration")
                        <p class="mt-2 text-red-400 text-xs font-semibold" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <button id="submitBtn" type="submit"
                    class="min-h-[48px] w-full bg-gold text-slate-950 py-3.5 rounded-xl font-extrabold uppercase tracking-wider text-xs sm:text-sm hover:bg-amber-300 transition">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    document.getElementById('serviceForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.textContent = 'Menyimpan Layanan...';
    });
</script>
@endsection
