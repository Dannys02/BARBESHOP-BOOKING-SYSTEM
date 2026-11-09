<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Akses Pengelola | Heritage Grooming</title>
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

        .surface-card {
            background-color: #1e293b;
            border: 1px solid rgba(251, 191, 36, 0.22);
        }
    </style>
</head>

<body class="text-slate-200 antialiased min-h-screen flex flex-col justify-between selection:bg-amber-400 selection:text-slate-950">
    <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-400/70 to-transparent" aria-hidden="true"></div>

    <main class="flex-grow flex flex-col justify-center items-center p-4 sm:p-6">
        <div class="text-center mb-6">
            <a href="{{ url('/') }}" aria-label="Kembali ke Beranda"
                class="group mx-auto mb-4 relative flex items-center justify-center w-20 h-20 rounded-full bg-slate-950 border-2 border-amber-400/75 shadow-xl hover:border-amber-400 transition">
                <span class="absolute inset-1 rounded-full border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                <img src="{{ asset('assets/img/logo.png') }}"
                    alt="Logo Emblem"
                    width="144"
                    height="120"
                    decoding="async"
                    class="w-12 h-12 object-contain">
            </a>
            <div class="inline-flex items-center justify-center gap-2 mb-1">
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                <span class="text-gold font-bold uppercase tracking-[0.22em] text-xs">Heritage Grooming</span>
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
            </div>
        </div>

        <div class="w-full max-w-md surface-card p-6 sm:p-8 rounded-2xl shadow-2xl">
            {{ $slot }}
        </div>
    </main>

    <footer class="py-6 text-center text-slate-400 text-xs">
        &copy; 2026 Heritage Grooming Barbershop.
    </footer>
</body>

</html>
