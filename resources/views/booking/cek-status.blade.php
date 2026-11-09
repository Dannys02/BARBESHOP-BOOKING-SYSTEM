<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Status Jadwal | Heritage Grooming</title>
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

        .nav-glass {
            background-color: rgba(2, 6, 23, 0.96);
        }

        @media (min-width: 1024px) {
            .nav-glass {
                background-color: rgba(2, 6, 23, 0.9);
                backdrop-filter: blur(8px);
            }
        }

        .surface-card {
            background-color: #1e293b;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }
    </style>
</head>

<body class="text-slate-200 antialiased min-h-screen flex flex-col selection:bg-amber-400 selection:text-slate-950">

    <header class="sticky top-0 inset-x-0 z-50">
        <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-400/70 to-transparent"></div>
        <nav aria-label="Navigasi Utama" class="nav-glass border-b border-amber-400/25 shadow-2xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
                <!-- Desktop Split-Center Medallion -->
                <div class="hidden lg:grid lg:grid-cols-[1fr_auto_1fr] items-center h-20">
                    <div class="flex items-center justify-end gap-6 xl:gap-8 pr-8 xl:pr-12">
                        <a href="{{ url('/') }}#beranda"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 transition-colors">
                            Beranda
                        </a>
                        <span class="text-amber-400/40 text-[10px] select-none" aria-hidden="true">◆</span>
                        <a href="{{ url('/') }}#services"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 transition-colors">
                            Layanan
                        </a>
                        <span class="text-amber-400/40 text-[10px] select-none" aria-hidden="true">◆</span>
                        <a href="{{ url('/') }}#gallery"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 transition-colors">
                            Galeri
                        </a>
                    </div>

                    <div class="flex items-center justify-center">
                        <a href="{{ url('/') }}" aria-label="Kembali ke Beranda"
                            class="group relative flex items-center justify-center w-14 h-14 rounded-full bg-slate-950 border-2 border-amber-400/70 shadow-md hover:border-amber-400 transition-all duration-300">
                            <span class="absolute inset-1 rounded-full border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                            <img src="{{ asset('assets/img/logo.png') }}"
                                alt="Logo Emblem"
                                width="144"
                                height="120"
                                decoding="async"
                                class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-300">
                        </a>
                    </div>

                    <div class="flex items-center justify-start gap-4 xl:gap-6 pl-8 xl:pl-12">
                        <a href="{{ url('/') }}#barbers"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 transition-colors">
                            Kapster
                        </a>
                        <span class="h-4 w-px bg-slate-700/80" aria-hidden="true"></span>
                        <a href="{{ route('booking.cekStatusForm') }}"
                            aria-current="page"
                            class="min-h-[44px] inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-slate-900 border border-amber-400 text-xs font-bold uppercase tracking-[0.14em] text-amber-400 transition-all">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Lacak Jadwal</span>
                        </a>
                        <a href="{{ url('/booking/create') }}"
                            class="min-h-[44px] inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gold text-slate-950 text-xs font-extrabold uppercase tracking-[0.15em] hover:bg-amber-300 active:scale-95 transition-all">
                            <svg class="w-4 h-4 shrink-0" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Reservasi</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile Header -->
                <div class="grid grid-cols-3 lg:hidden items-center h-20">
                    <div class="flex items-center justify-start">
                        <a href="{{ url('/') }}"
                            class="min-h-[44px] inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                            <span>Beranda</span>
                        </a>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="{{ url('/') }}" aria-label="Kembali ke Beranda"
                            class="relative flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 border-2 border-amber-400/70 shadow-md">
                            <span class="absolute inset-0.5 rounded-full border border-amber-400/20 pointer-events-none" aria-hidden="true"></span>
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Emblem" width="144" height="120" decoding="async" class="w-7 h-7 object-contain">
                        </a>
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="{{ url('/booking/create') }}"
                            class="min-h-[44px] inline-flex items-center px-3 py-2 rounded-lg bg-gold text-slate-950 text-xs font-extrabold uppercase tracking-wider hover:bg-amber-300 transition">
                            Reservasi
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow flex items-center justify-center px-4 py-12 sm:py-16">
        <div class="w-full max-w-lg surface-card p-6 sm:p-10 rounded-2xl shadow-2xl">
            <div class="text-center mb-8">
                <p class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Tiket &amp; Antrean</p>
                <h1 class="text-2xl sm:text-3xl font-black text-white">Lacak Status <span class="text-gold">Jadwal</span></h1>
                <p class="text-slate-300 text-sm mt-2">
                    Masukkan nomor WhatsApp yang Anda gunakan saat melakukan pemesanan kursi.
                </p>
            </div>

            <form action="{{ route('booking.cekStatusResult') }}" method="POST" class="mb-8" id="cek-status-form">
                @csrf
                <div class="mb-5">
                    <label for="customer_phone" class="block text-xs font-bold text-slate-200 mb-2 uppercase tracking-wider">
                        Nomor WhatsApp Terdaftar
                    </label>
                    <input type="tel"
                        id="customer_phone"
                        name="customer_phone"
                        value="{{ request('customer_phone') }}"
                        placeholder="Contoh: 081234567890"
                        required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3.5 text-white placeholder-slate-400 focus:border-amber-400 outline-none transition">
                    @error('customer_phone')
                        <p class="text-red-400 text-xs mt-2 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    id="submit-status-btn"
                    class="min-h-[48px] w-full bg-gold hover:bg-amber-300 active:scale-[0.99] text-slate-950 font-extrabold py-3.5 rounded-xl uppercase tracking-wider text-sm transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span id="submit-status-text">Periksa Status Jadwal</span>
                </button>
            </form>

            @if(isset($booking))
                <div class="p-6 bg-slate-950 rounded-xl border border-amber-400/40" role="status" aria-live="polite">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-3 mb-4">
                        <span class="text-xs text-slate-300 uppercase tracking-widest font-bold">
                            Jadwal Terakhir Ditemukan
                        </span>
                        <span class="px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider border
                            {{ $booking->status == 'pending' ? 'bg-amber-950 text-amber-300 border-amber-400/50' : '' }}
                            {{ $booking->status == 'konfirmasi' ? 'bg-emerald-950 text-emerald-300 border-emerald-400/50' : '' }}
                            {{ $booking->status == 'batal' ? 'bg-red-950 text-red-300 border-red-400/50' : '' }}
                            {{ $booking->status == 'selesai' ? 'bg-sky-950 text-sky-300 border-sky-400/50' : '' }}">
                            {{ strtoupper($booking->status) }}
                        </span>
                    </div>

                    <h2 class="font-extrabold text-xl text-white mb-1">{{ $booking->customer_name }}</h2>
                    <p class="text-sm text-slate-300 mb-4">
                        Layanan: <span class="text-white font-semibold">{{ $booking->service->name }}</span>
                        <span class="mx-1.5 text-amber-400">•</span>
                        Kapster: <span class="text-white font-semibold">{{ $booking->barber->name }}</span>
                    </p>

                    <div class="p-3.5 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-between text-xs sm:text-sm text-slate-200">
                        <span class="font-semibold">Tanggal: {{ $booking->booking_date }}</span>
                        <span class="font-bold text-gold">Pukul {{ $booking->booking_time }}</span>
                    </div>
                </div>
            @elseif(request()->isMethod('post'))
                <div class="p-5 bg-red-950/60 border border-red-400/50 rounded-xl text-center" role="alert">
                    <p class="text-red-200 font-bold text-sm mb-1">
                        Jadwal tidak ditemukan untuk nomor tersebut
                    </p>
                    <p class="text-slate-300 text-xs mb-4">
                        Pastikan nomor WhatsApp yang dimasukkan sama persis dengan saat Anda mengisi formulir reservasi.
                    </p>
                    <a href="{{ url('/booking/create') }}"
                        class="min-h-[44px] inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gold text-slate-950 font-bold text-xs uppercase tracking-wider">
                        Buat Reservasi Baru
                    </a>
                </div>
            @else
                <div class="p-5 bg-slate-900/80 border border-slate-800 rounded-xl text-center">
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Belum ada pencarian yang dilakukan. Masukkan nomor WhatsApp di atas untuk menampilkan detail waktu potong rambut dan status konfirmasi kapster Anda.
                    </p>
                </div>
            @endif
        </div>
    </main>

    <script>
        document.getElementById('cek-status-form').addEventListener('submit', function() {
            const btn = document.getElementById('submit-status-btn');
            const text = document.getElementById('submit-status-text');
            btn.setAttribute('aria-disabled', 'true');
            text.textContent = 'Memeriksa Data Jadwal...';
        });
    </script>
</body>

</html>
