<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black text-white">Registrasi <span class="text-gold">Admin</span></h1>
        <p class="text-xs text-slate-300 mt-1">Daftarkan akun pengelola studio baru.</p>
    </div>

    <form method="POST" action="{{ url('/register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                placeholder="Masukkan nama lengkap"
                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                placeholder="Masukkan alamat email"
                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="Minimal 8 karakter"
                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Ulangi Kata Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="Ketik ulang kata sandi"
                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2 flex flex-col gap-3">
            <button type="submit"
                class="min-h-[46px] w-full bg-gold text-slate-950 font-extrabold py-3 rounded-xl uppercase tracking-wider text-xs hover:bg-amber-300 transition">
                Daftarkan Akun
            </button>

            <a class="min-h-[44px] inline-flex items-center justify-center text-xs font-bold uppercase tracking-wider text-slate-300 hover:text-amber-400 transition" href="{{ route('login') }}">
                Sudah punya akun? Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>
