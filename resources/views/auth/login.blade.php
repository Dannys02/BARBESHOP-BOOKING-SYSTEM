<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Panel Admin | Heritage Grooming</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #0f172a;
        }

        .text-gold {
            color: #fbbf24;
        }

        .bg-gold {
            background-color: #fbbf24;
        }

        .border-gold {
            border-color: #fbbf24;
        }

        .surface-card {
            background-color: #1e293b;
            border: 1px solid rgba(251, 191, 36, 0.22);
        }

        .surface-dark {
            background-color: #020617;
            border: 1px solid rgba(251, 191, 36, 0.25);
        }
    </style>
</head>

<body class="text-slate-200 antialiased min-h-screen flex flex-col justify-between selection:bg-amber-400 selection:text-slate-950">

    <!-- Garis Ornamen Atas -->
    <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-400/70 to-transparent" aria-hidden="true"></div>

    <main class="flex-grow flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-md">

            <!-- Identitas Medali Tengah -->
            <div class="text-center mb-8">
                <a href="{{ url('/') }}" aria-label="Kembali ke Beranda"
                    class="group mx-auto mb-5 relative flex items-center justify-center w-20 h-20 rounded-full bg-slate-950 border-2 border-amber-400/75 shadow-xl hover:border-amber-400 transition-all duration-300">
                    <span class="absolute inset-1 rounded-full border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                    <img src="{{ asset('assets/img/logo.png') }}"
                        alt="Logo Emblem"
                        width="144"
                        height="120"
                        decoding="async"
                        class="w-12 h-12 object-contain group-hover:scale-105 transition-transform duration-300">
                </a>

                <div class="inline-flex items-center justify-center gap-2 mb-2">
                    <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                    <span class="text-gold font-bold uppercase tracking-[0.22em] text-xs">Akses Pengelola</span>
                    <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                    Panel Admin <span class="text-gold">Studio</span>
                </h1>
                <p class="text-slate-300 text-sm mt-1.5">
                    Masuk untuk mengelola jadwal reservasi, layanan, dan kapster.
                </p>
            </div>

            <!-- Kartu Formulir Login -->
            <div class="surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">

                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-950/90 border border-emerald-400/50 text-emerald-200 text-xs font-semibold" role="status">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf

                    <!-- Alamat Email -->
                    <div class="mb-5">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">
                            Alamat Email
                        </label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email admin"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition">
                        @error('email')
                            <p class="text-red-400 text-xs mt-2 font-semibold" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-6">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">
                            Kata Sandi
                        </label>
                        <div class="relative">
                            <input type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan kata sandi"
                                required
                                autocomplete="current-password"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl pl-4 pr-12 py-3.5 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition">
                            <button type="button"
                                id="toggle-password"
                                aria-label="Tampilkan kata sandi"
                                aria-pressed="false"
                                class="min-h-[44px] min-w-[44px] absolute right-1 top-1/2 -translate-y-1/2 inline-flex items-center justify-center text-slate-400 hover:text-amber-400 rounded-lg transition">
                                <svg id="eye-open" class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg id="eye-closed" class="w-5 h-5 hidden" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-xs mt-2 font-semibold" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        id="login-submit-btn"
                        class="min-h-[48px] w-full bg-gold text-slate-950 font-extrabold py-3.5 rounded-xl hover:bg-amber-300 active:scale-[0.99] transition uppercase tracking-[0.15em] text-xs sm:text-sm flex items-center justify-center gap-2">
                        <span id="login-submit-text">Masuk ke Dashboard</span>
                    </button>
                </form>

                <!-- Pintasan Kembali ke Beranda -->
                <div class="mt-6 pt-5 border-t border-slate-800 text-center">
                    <a href="{{ url('/') }}"
                        class="min-h-[44px] inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider text-slate-300 hover:text-amber-400 transition">
                        <span>Kembali ke Halaman Utama</span>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-6 text-center text-slate-400 text-xs">
        &copy; 2026 Heritage Grooming Barbershop. Area terbatas pengelola.
    </footer>

    <script>
        const toggleBtn = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        toggleBtn.addEventListener('click', function() {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            toggleBtn.setAttribute('aria-pressed', isPassword ? 'true' : 'false');
            toggleBtn.setAttribute('aria-label', isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            eyeOpen.classList.toggle('hidden', isPassword);
            eyeClosed.classList.toggle('hidden', !isPassword);
        });

        document.getElementById('login-form').addEventListener('submit', function() {
            const submitBtn = document.getElementById('login-submit-btn');
            const submitText = document.getElementById('login-submit-text');
            submitBtn.setAttribute('aria-disabled', 'true');
            submitText.textContent = 'Memverifikasi Akun...';
        });
    </script>
</body>

</html>
