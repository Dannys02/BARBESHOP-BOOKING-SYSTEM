@extends("layouts.admin")

@section("content")
<div class="space-y-8">

    <div class="pb-6 border-b border-slate-800">
        <div class="inline-flex items-center gap-2 mb-2">
            <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
            <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Keamanan &amp; Identitas</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-white">
            Pengaturan <span class="text-gold">Akun Pengelola</span>
        </h1>
        <p class="text-sm text-slate-300 mt-1">
            Perbarui nama profil, alamat email utama, serta kata sandi akses panel admin Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <!-- Kolom Kiri: Kartu Ringkasan Pengelola -->
        <div class="lg:col-span-4 space-y-6">
            <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl flex flex-col items-center text-center">
                <div class="relative w-24 h-24 rounded-full bg-slate-950 border-2 border-amber-400/75 flex items-center justify-center mb-4">
                    <span class="absolute inset-1 rounded-full border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                    <span class="text-3xl font-black text-gold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>

                <h2 class="text-xl font-black text-white">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-slate-300 mt-1 mb-6">{{ Auth::user()->email }}</p>

                <div class="w-full pt-4 border-t border-slate-800 flex items-center justify-between text-xs">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider">Terdaftar Sejak</span>
                    <span class="font-bold text-gold">
                        {{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : 'Aktif' }}
                    </span>
                </div>
            </div>

            <div class="surface-dark p-5 rounded-2xl text-xs text-slate-300 space-y-2.5">
                <div class="flex items-center gap-2 text-gold font-bold uppercase tracking-wider">
                    <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                    <span>Catatan Keamanan</span>
                </div>
                <p class="leading-relaxed">
                    Gunakan kombinasi huruf, angka, dan simbol saat mengganti kata sandi untuk melindungi akses jadwal reservasi studio.
                </p>
            </div>
        </div>

        <!-- Kolom Kanan: Formulir Pembaruan Profil & Sandi -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Bagian 1: Informasi Profil -->
            <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">
                <div class="mb-6 pb-4 border-b border-slate-800">
                    <h2 class="text-lg font-extrabold text-white">Informasi Profil</h2>
                    <p class="text-xs text-slate-300 mt-1">Perbarui nama lengkap dan alamat email yang digunakan untuk masuk.</p>
                </div>

                <form method="POST" action="{{ route('settings.update-profile') }}" class="space-y-5">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
                            class="w-full px-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition text-sm">
                        @error('name')
                            <p class="text-xs text-red-400 mt-2 font-semibold" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                            class="w-full px-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition text-sm">
                        @error('email')
                            <p class="text-xs text-red-400 mt-2 font-semibold" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit"
                            class="min-h-[44px] px-6 py-2.5 bg-gold text-slate-950 font-extrabold rounded-lg hover:bg-amber-300 transition text-xs uppercase tracking-wider">
                            Simpan Profil
                        </button>
                    </div>
                </form>
            </div>

            <!-- Bagian 2: Perbarui Kata Sandi -->
            <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">
                <div class="mb-6 pb-4 border-b border-slate-800">
                    <h2 class="text-lg font-extrabold text-white">Perbarui Kata Sandi</h2>
                    <p class="text-xs text-slate-300 mt-1">Masukkan kata sandi lama Anda sebelum menetapkan kata sandi baru.</p>
                </div>

                <form method="POST" action="{{ route('settings.update-password') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Kata Sandi Saat Ini</label>
                        <input type="password" id="current_password" name="current_password" required
                            placeholder="Masukkan kata sandi saat ini"
                            class="w-full px-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition text-sm">
                        @error('current_password', 'updatePassword')
                            <p class="text-xs text-red-400 mt-2 font-semibold" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Kata Sandi Baru</label>
                            <input type="password" id="password" name="password" required
                                placeholder="Minimal 8 karakter"
                                class="w-full px-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition text-sm">
                            @error('password', 'updatePassword')
                                <p class="text-xs text-red-400 mt-2 font-semibold" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Ulangi Kata Sandi Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                placeholder="Ketik ulang kata sandi baru"
                                class="w-full px-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition text-sm">
                            @error('password_confirmation', 'updatePassword')
                                <p class="text-xs text-red-400 mt-2 font-semibold" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit"
                            class="min-h-[44px] px-6 py-2.5 bg-gold text-slate-950 font-extrabold rounded-lg hover:bg-amber-300 transition text-xs uppercase tracking-wider">
                            Perbarui Kata Sandi
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
