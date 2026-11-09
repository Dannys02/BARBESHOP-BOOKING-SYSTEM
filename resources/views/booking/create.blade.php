<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kursi | Heritage Grooming</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    {!! NoCaptcha::renderJs() !!}
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

    <!-- Header -->
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
                            class="min-h-[44px] inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-slate-900/90 border border-slate-700 text-xs font-bold uppercase tracking-[0.14em] text-slate-200 hover:border-amber-400/60 hover:text-amber-400 transition-all">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Lacak Jadwal</span>
                        </a>
                        <a href="{{ url('/booking/create') }}"
                            aria-current="page"
                            class="min-h-[44px] inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gold text-slate-950 text-xs font-extrabold uppercase tracking-[0.15em] hover:bg-amber-300 transition-all">
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
                        <a href="{{ route('booking.cekStatusForm') }}"
                            class="min-h-[44px] inline-flex items-center px-3 py-2 rounded-lg bg-slate-900 border border-amber-400/50 text-amber-400 text-xs font-bold uppercase tracking-wider hover:bg-slate-800 transition">
                            Lacak Jadwal
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto py-12 px-4 sm:px-6 flex-grow">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <p class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Formulir Jadwal</p>
                <h1 class="text-3xl sm:text-4xl font-black text-white mb-2">Reservasi <span class="text-gold">Kursi</span></h1>
                <p class="text-slate-300 text-sm sm:text-base">
                    Pilih kapster, layanan perawatan, serta waktu kedatangan Anda.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-950/90 text-emerald-200 p-4 rounded-xl mb-6 border border-emerald-400/50 font-medium text-sm" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-950/90 text-red-200 p-4 rounded-xl mb-6 border border-red-400/50 font-medium text-sm" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-950/90 text-red-200 p-4 rounded-xl mb-6 border border-red-400/50 font-medium text-sm" role="alert">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/booking') }}" method="POST" id="booking-form" class="surface-card rounded-2xl p-6 sm:p-10 shadow-2xl">
                @csrf

                <!-- Nama Customer -->
                <div class="mb-6">
                    <label for="customer_name" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Nama Lengkap</label>
                    <input type="text" name="customer_name" id="customer_name" required
                        class="w-full bg-slate-900 text-white placeholder-slate-400 px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition"
                        placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('customer_name') }}">
                </div>

                <!-- No HP -->
                <div class="mb-6">
                    <label for="customer_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Nomor WhatsApp</label>
                    <input type="tel" name="customer_phone" id="customer_phone" required
                        class="w-full bg-slate-900 text-white placeholder-slate-400 px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition"
                        placeholder="Contoh: 081234567890"
                        value="{{ old('customer_phone') }}">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <!-- Pilih Barber -->
                    <div>
                        <label for="barber_id" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Pilih Kapster</label>
                        <select name="barber_id" id="barber_id" required
                            class="w-full bg-slate-900 text-white px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition">
                            <option value="">Pilih Kapster</option>
                            @foreach($barbers as $barber)
                                <option value="{{ $barber->id }}" {{ old('barber_id') == $barber->id ? 'selected' : '' }}>
                                    {{ $barber->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Service -->
                    <div>
                        <label for="service_id" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Pilih Layanan</label>
                        <select name="service_id" id="service_id" required
                            class="w-full bg-slate-900 text-white px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition">
                            <option value="">Pilih Layanan</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }} (Rp {{ number_format($service->price, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    <!-- Tanggal Booking -->
                    <div>
                        <label for="booking_date" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Tanggal Kedatangan</label>
                        <input type="date" name="booking_date" id="booking_date" required
                            class="w-full bg-slate-900 text-white px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition"
                            min="{{ date('Y-m-d') }}"
                            value="{{ old('booking_date') }}">
                    </div>

                    <!-- Waktu Booking -->
                    <div>
                        <label for="booking_time" class="block text-xs font-bold uppercase tracking-wider text-slate-200 mb-2">Jam Kedatangan</label>
                        <select name="booking_time" id="booking_time" required
                            class="w-full bg-slate-900 text-white px-4 py-3.5 rounded-xl border border-slate-700 focus:border-amber-400 outline-none transition">
                            <option value="">Pilih Jam</option>
                            @foreach(['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00'] as $jam)
                                <option value="{{ $jam }}" {{ old('booking_time') == $jam ? 'selected' : '' }}>{{ $jam }} WIB</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <p class="text-red-400 text-xs mt-2 font-semibold">
                            Silakan centang verifikasi keamanan terlebih dahulu.
                        </p>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    id="booking-submit-btn"
                    class="min-h-[48px] w-full bg-gold text-slate-950 font-extrabold py-4 rounded-xl uppercase tracking-wider text-sm hover:bg-amber-300 active:scale-[0.99] transition">
                    Konfirmasi Reservasi Kursi
                </button>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('booking-form').addEventListener('submit', function() {
            const btn = document.getElementById('booking-submit-btn');
            btn.setAttribute('aria-disabled', 'true');
            btn.textContent = 'Memproses Jadwal Reservasi...';
        });
    </script>
</body>

</html>
