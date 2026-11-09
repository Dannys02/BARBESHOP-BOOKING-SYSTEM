<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Grooming &amp; Pangkas Rambut Pria</title>
    <meta name="description" content="Kenyamanan dan gaya rambut pria presisi dengan sentuhan klasik. Reservasi kursi kapster dan lacak status jadwal Anda secara langsung.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="{{ asset('assets/img/Home.webp') }}" fetchpriority="high">
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
            border: 1px solid rgba(251, 191, 36, 0.18);
        }

        .surface-dark {
            background-color: #020617;
            border: 1px solid rgba(251, 191, 36, 0.22);
        }

        .cv-auto {
            content-visibility: auto;
            contain-intrinsic-size: 1px 650px;
        }

        .from-bottom {
            opacity: 0;
            transform: translate3d(0, 24px, 0);
            transition: opacity 0.55s ease-out, transform 0.55s ease-out;
        }

        .from-bottom.active {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    </style>
</head>

<body class="text-slate-200 antialiased selection:bg-amber-400 selection:text-slate-950">

    <header class="fixed top-0 inset-x-0 z-50">
        <!-- Garis Ornamen Atas -->
        <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-400/70 to-transparent"></div>

        <nav aria-label="Navigasi Utama" class="nav-glass border-b border-amber-400/25 shadow-2xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

                <!-- Desktop Split-Center Medallion Layout -->
                <div class="hidden lg:grid lg:grid-cols-[1fr_auto_1fr] items-center h-20">

                    <!-- Sayap Kiri: Navigasi Eksplorasi -->
                    <div class="flex items-center justify-end gap-6 xl:gap-8 pr-8 xl:pr-12">
                        <a href="#beranda"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 active:text-amber-300 transition-colors">
                            Beranda
                        </a>
                        <span class="text-amber-400/40 text-[10px] select-none" aria-hidden="true">◆</span>
                        <a href="#services"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 active:text-amber-300 transition-colors">
                            Layanan
                        </a>
                        <span class="text-amber-400/40 text-[10px] select-none" aria-hidden="true">◆</span>
                        <a href="#gallery"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 active:text-amber-300 transition-colors">
                            Galeri
                        </a>
                    </div>

                    <!-- Pusat Horizontal & Vertikal: Medali Bundar Sempurna -->
                    <div class="flex items-center justify-center">
                        <a href="#beranda" aria-label="Kembali ke Beranda"
                            class="group relative flex items-center justify-center w-14 h-14 rounded-full bg-slate-950 border-2 border-amber-400/70 shadow-md hover:border-amber-400 active:scale-95 transition-all duration-300">
                            <span class="absolute inset-1 rounded-full border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                            <img src="{{ asset('assets/img/logo.png') }}"
                                alt="Logo Emblem"
                                width="144"
                                height="120"
                                decoding="async"
                                class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-300">
                        </a>
                    </div>

                    <!-- Sayap Kanan: Kapster, Lacak Jadwal & Reservasi -->
                    <div class="flex items-center justify-start gap-4 xl:gap-6 pl-8 xl:pl-12">
                        <a href="#barbers"
                            class="min-h-[44px] inline-flex items-center px-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-200 hover:text-amber-400 active:text-amber-300 transition-colors">
                            Kapster
                        </a>

                        <span class="h-4 w-px bg-slate-700/80" aria-hidden="true"></span>

                        <a href="{{ route('booking.cekStatusForm') }}"
                            class="min-h-[44px] inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-slate-900/90 border border-slate-700 text-xs font-bold uppercase tracking-[0.14em] text-slate-200 hover:border-amber-400/60 hover:text-amber-400 active:bg-slate-800 transition-all">
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

                <!-- Mobile & Tablet Bar: Aksi Cepat + Logo Bundar Tengah + Tombol Menu -->
                <div class="grid grid-cols-3 lg:hidden items-center h-20">
                    <div class="flex items-center justify-start">
                        <a href="{{ url('/booking/create') }}"
                            class="min-h-[44px] inline-flex items-center px-3 py-2 rounded-lg bg-gold text-slate-950 text-xs font-extrabold uppercase tracking-wider hover:bg-amber-300 active:scale-95 transition">
                            Reservasi
                        </a>
                    </div>

                    <div class="flex items-center justify-center">
                        <a href="#beranda" aria-label="Kembali ke Beranda"
                            class="relative flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 border-2 border-amber-400/70 shadow-md">
                            <span class="absolute inset-0.5 rounded-full border border-amber-400/20 pointer-events-none" aria-hidden="true"></span>
                            <img src="{{ asset('assets/img/logo.png') }}"
                                alt="Logo Emblem"
                                width="144"
                                height="120"
                                decoding="async"
                                class="w-7 h-7 object-contain">
                        </a>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="button"
                            id="mobile-menu-trigger"
                            aria-label="Buka menu navigasi"
                            aria-expanded="false"
                            aria-controls="mobile-nav"
                            class="min-h-[44px] min-w-[44px] inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-900 border border-amber-400/40 text-amber-400 text-xs font-bold uppercase tracking-widest hover:bg-slate-800 active:scale-95 transition">
                            <span>Menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </nav>
    </header>

    <!-- Dialog Menu Mobile -->
    <div id="mobile-nav"
        role="dialog"
        aria-modal="true"
        aria-label="Menu Navigasi Mobile"
        class="fixed inset-0 bg-slate-950/95 z-[60] flex flex-col justify-between p-6 transform -translate-y-full transition-transform duration-300 lg:hidden">

        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-slate-900 border border-amber-400/60">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Emblem" width="144" height="120" loading="lazy" decoding="async" class="w-6 h-6 object-contain">
                </div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-400">Navigasi Utama</span>
            </div>
            <button type="button"
                id="mobile-menu-close"
                aria-label="Tutup menu navigasi"
                class="min-h-[44px] min-w-[44px] inline-flex items-center justify-center rounded-lg bg-slate-900 border border-slate-700 text-slate-200 hover:text-amber-400 hover:border-amber-400 transition">
                <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex flex-col items-center justify-center space-y-4 my-auto">
            <a href="#beranda"
                class="mobile-nav-link min-h-[48px] w-full max-w-xs flex items-center justify-center rounded-xl text-lg font-bold uppercase tracking-[0.18em] text-slate-200 hover:text-amber-400 hover:bg-slate-900 transition">
                Beranda
            </a>
            <a href="#services"
                class="mobile-nav-link min-h-[48px] w-full max-w-xs flex items-center justify-center rounded-xl text-lg font-bold uppercase tracking-[0.18em] text-slate-200 hover:text-amber-400 hover:bg-slate-900 transition">
                Layanan
            </a>
            <a href="#gallery"
                class="mobile-nav-link min-h-[48px] w-full max-w-xs flex items-center justify-center rounded-xl text-lg font-bold uppercase tracking-[0.18em] text-slate-200 hover:text-amber-400 hover:bg-slate-900 transition">
                Galeri
            </a>
            <a href="#barbers"
                class="mobile-nav-link min-h-[48px] w-full max-w-xs flex items-center justify-center rounded-xl text-lg font-bold uppercase tracking-[0.18em] text-slate-200 hover:text-amber-400 hover:bg-slate-900 transition">
                Kapster
            </a>
        </div>

        <div class="flex flex-col gap-3 border-t border-slate-800 pt-6 max-w-xs mx-auto w-full">
            <a href="{{ url('/booking/create') }}"
                class="min-h-[48px] inline-flex items-center justify-center gap-2 rounded-xl bg-gold text-slate-950 font-extrabold text-sm uppercase tracking-wider hover:bg-amber-300 transition">
                <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Reservasi Kursi</span>
            </a>
            <a href="{{ route('booking.cekStatusForm') }}"
                class="min-h-[48px] inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 border border-amber-400/50 text-amber-400 font-bold text-sm uppercase tracking-wider hover:bg-slate-800 transition">
                <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Lacak Jadwal</span>
            </a>
        </div>
    </div>

    <main>
        <!-- 1. HERO SECTION: Editorial Split Layout (7:5) -->
        <section id="beranda" class="relative pt-28 pb-16 lg:pt-36 lg:pb-24 overflow-hidden border-b border-amber-400/15">
            <!-- Latar Belakang Halus -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-900 pointer-events-none" aria-hidden="true"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">

                    <!-- Kolom Kiri: Tipografi Utama & Aksi -->
                    <div class="lg:col-span-7 text-left">
                        <div class=" inline-flex items-center gap-3 mb-5">
                            <span class="h-px w-8 bg-amber-400" aria-hidden="true"></span>
                            <span class="text-gold font-bold tracking-[0.25em] uppercase text-xs">
                                Heritage Gentleman's Grooming
                            </span>
                        </div>

                        <h1 class="text-4xl sm:text-5xl xl:text-6xl font-black text-white leading-[1.12] tracking-tight mb-6">
                            Ketelitian Klasik untuk <span class="text-gold">Karakter Pria Modern.</span>
                        </h1>

                        <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-xl mb-8">
                            Lebih dari sekadar pangkas rambut. Kami memadukan teknik guntingan tradisional, handuk hangat, dan peralatan steril dalam suasana ruang pangkas yang tenang. Pesan kursi Anda tanpa perlu mengantre.
                        </p>

                        <!-- Baris Tombol Utama -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 mb-12">
                            <a href="{{ url('/booking/create') }}"
                                class="min-h-[48px] inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-gold text-slate-950 font-extrabold text-xs sm:text-sm uppercase tracking-[0.15em] rounded-lg hover:bg-amber-300 active:scale-95 transition">
                                <svg class="w-4 h-4 shrink-0" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Pesan Kursi Sekarang</span>
                            </a>
                            <a href="{{ route('booking.cekStatusForm') }}"
                                class="min-h-[48px] inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-slate-950 border border-slate-700 text-slate-200 font-bold text-xs sm:text-sm uppercase tracking-[0.14em] rounded-lg hover:border-amber-400 hover:text-amber-400 active:scale-95 transition">
                                <svg class="w-4 h-4 text-amber-400 shrink-0" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Lacak Status Jadwal</span>
                            </a>
                        </div>

                        <!-- Info Strip: Jam Buka & Lokasi Nyata -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-8 border-t border-slate-800/90 max-w-xl">
                            <div class="flex items-start gap-3.5">
                                <div class="w-10 h-10 rounded-full bg-slate-950 border border-amber-400/40 flex items-center justify-center text-gold shrink-0">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-gold">Jam Operasional</p>
                                    <p class="text-sm text-slate-200 font-medium mt-0.5">Senin - Jumat: 09:00 - 21:00</p>
                                    <p class="text-xs text-slate-400">Sabtu - Minggu: 10:00 - 22:00</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3.5">
                                <div class="w-10 h-10 rounded-full bg-slate-950 border border-amber-400/40 flex items-center justify-center text-gold shrink-0">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-gold">Lokasi Studio</p>
                                    <p class="text-sm text-slate-200 font-medium mt-0.5">Jl. Nasional No. 3</p>
                                    <p class="text-xs text-slate-400">Kota Banyuwangi, Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Bingkai Cermin Barbershop (Arch Portrait) -->
                    <div class="lg:col-span-5">
                        <div class="relative mx-auto max-w-md lg:max-w-none">
                            <!-- Bingkai Luar Beraksen Emas -->
                            <div class="p-3 sm:p-4 rounded-t-[140px] rounded-b-2xl surface-dark shadow-2xl relative">
                                <div class="relative overflow-hidden rounded-t-[128px] rounded-b-xl aspect-[4/5] border border-amber-400/30">
                                    <img src="{{ asset('assets/img/Home.webp') }}"
                                        alt="Suasana ruang pangkas rambut klasik"
                                        width="1200"
                                        height="800"
                                        fetchpriority="high"
                                        decoding="sync"
                                        class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent" aria-hidden="true"></div>

                                    <!-- Keterangan di Dalam Bingkai Bawah -->
                                    <div class="absolute bottom-0 inset-x-0 p-6 flex items-center justify-between gap-4">
                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold">Est. 2026</p>
                                            <p class="text-sm font-bold text-white">Kenyamanan Kursi Klasik</p>
                                        </div>
                                        <div class="w-12 h-12 rounded-full bg-slate-950 border-2 border-amber-400/80 flex items-center justify-center shrink-0">
                                            <img src="{{ asset('assets/img/logo.png') }}"
                                                alt="Logo Emblem"
                                                width="144"
                                                height="120"
                                                decoding="async"
                                                class="w-7 h-7 object-contain">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 2. ABOUT SECTION: Filosofi & 3 Standar Utama (5:7) -->
        <section id="about" class="cv-auto py-16 md:py-24 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

                    <!-- Kolom Foto Interior & Kutipan -->
                    <div class="lg:col-span-5 from-bottom">
                        <div class="relative">
                            <div class="p-3 surface-card rounded-2xl">
                                <div class="overflow-hidden rounded-xl aspect-[4/5] border border-slate-700">
                                    <img src="{{ asset('assets/img/studio-interior.webp') }}"
                                        alt="Interior ruang pangkas klasik dan peralatan kapster"
                                        width="640"
                                        height="800"
                                        loading="lazy"
                                        decoding="async"
                                        class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                                </div>
                            </div>

                            <!-- Kartu Kutipan Kepala Kapster -->
                            <div class="mt-4 p-5 surface-dark rounded-xl">
                                <p class="text-slate-200 text-sm italic leading-relaxed">
                                    "Kepercayaan diri seorang pria bermula dari kursi pangkas kami. Setiap detail guntingan dikerjakan tanpa tergesa-gesa."
                                </p>
                                <div class="mt-3 flex items-center gap-2">
                                    <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                                    <span class="font-bold text-gold text-xs uppercase tracking-[0.18em]">Kepala Kapster</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Narasi & Daftar Standar Bernomor -->
                    <div class="lg:col-span-7 from-bottom" style="transition-delay: 0.15s;">
                        <div class="inline-flex items-center gap-2.5 mb-3">
                            <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                            <span class="text-gold font-bold tracking-[0.22em] uppercase text-xs">Warisan &amp; Standar Kerja</span>
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-6">
                            Dirancang untuk Pria yang Menghargai <span class="text-gold">Kerapian Sejati.</span>
                        </h2>

                        <p class="text-slate-300 text-base sm:text-lg leading-relaxed mb-8">
                            Didirikan pada tahun 2026 di Banyuwangi, kami menghadirkan ruang perawatan rambut dan janggut yang mengutamakan kebersihan alat, ketepatan proporsi wajah, serta kenyamanan waktu Anda.
                        </p>

                        <!-- 3 Pilar Bernomor (RHYTHM Variation: Numbered Ledger Rows) -->
                        <div class="divide-y divide-slate-800 border-y border-slate-800">
                            <div class="py-5 flex items-start gap-5">
                                <span class="text-gold font-black text-lg tracking-wider shrink-0 pt-0.5">01</span>
                                <div>
                                    <h3 class="text-white font-bold text-base sm:text-lg">Sterilisasi Sinar UV Setiap Sesi</h3>
                                    <p class="text-slate-300 text-sm mt-1 leading-relaxed">
                                        Seluruh gunting, clipper, dan sisir melalui proses sterilisasi ultraviolet sebelum menyentuh rambut dan kulit kepala Anda.
                                    </p>
                                </div>
                            </div>

                            <div class="py-5 flex items-start gap-5">
                                <span class="text-gold font-black text-lg tracking-wider shrink-0 pt-0.5">02</span>
                                <div>
                                    <h3 class="text-white font-bold text-base sm:text-lg">Konsultasi Kontur &amp; Bentuk Wajah</h3>
                                    <p class="text-slate-300 text-sm mt-1 leading-relaxed">
                                        Kapster kami membantu menentukan potongan klasik maupun modern yang paling serasi dengan struktur rahang dan arah tumbuh rambut.
                                    </p>
                                </div>
                            </div>

                            <div class="py-5 flex items-start gap-5">
                                <span class="text-gold font-black text-lg tracking-wider shrink-0 pt-0.5">03</span>
                                <div>
                                    <h3 class="text-white font-bold text-base sm:text-lg">Pomade &amp; Tonik Pilihan</h3>
                                    <p class="text-slate-300 text-sm mt-1 leading-relaxed">
                                        Setiap sesi diakhiri dengan penataan menggunakan produk perawatan rambut yang mudah dibilas dan menyehatkan kulit kepala.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 3. SERVICES SECTION: Heritage Grooming Menu Board -->
        <section id="services" class="cv-auto py-16 md:py-24 bg-slate-950/70 border-y border-amber-400/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">

                    <!-- Kolom Kiri: Pengantar Menu & Info Reservasi -->
                    <div class="lg:col-span-4 from-bottom">
                        <div class="inline-flex items-center gap-2.5 mb-3">
                            <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                            <span class="text-gold font-bold tracking-[0.22em] uppercase text-xs">Daftar Perawatan</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight mb-4">
                            Menu Layanan &amp; <span class="text-gold">Tarif Resmi.</span>
                        </h2>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-6">
                            Setiap layanan sudah mencakup pencucian rambut, handuk hangat, dan penataan akhir. Pilih perawatan yang Anda butuhkan dan tentukan jam kedatangan.
                        </p>

                        <div class="p-6 surface-card rounded-2xl">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gold mb-2">Tanpa Antre di Lokasi</p>
                            <p class="text-slate-300 text-sm leading-relaxed mb-5">
                                Amankan jam potong rambut Anda lebih awal melalui formulir reservasi daring kami.
                            </p>
                            <a href="{{ url('/booking/create') }}"
                                class="min-h-[44px] w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-lg bg-gold text-slate-950 font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
                                <span>Buka Formulir Reservasi</span>
                            </a>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Papan Menu Klasik (Menu Board) -->
                    <div class="lg:col-span-8 from-bottom" style="transition-delay: 0.15s;">
                        <div class="surface-dark rounded-2xl p-6 sm:p-8 lg:p-10 shadow-2xl">
                            <div class="flex items-center justify-between border-b border-slate-800 pb-4 mb-6">
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-gold">Layanan Kapster</span>
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-slate-300">Tarif &amp; Aksi</span>
                            </div>

                            @forelse($services as $service)
                                <div class="py-5 first:pt-0 last:pb-0 border-b last:border-b-0 border-slate-800/90 group">
                                    <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 sm:gap-4">
                                        <div class="flex items-baseline gap-3">
                                            <span class="text-amber-400/70 text-xs font-bold">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</span>
                                            <h3 class="text-lg sm:text-xl font-extrabold text-white group-hover:text-amber-400 transition-colors">
                                                {{ $service->name }}
                                            </h3>
                                        </div>

                                        <!-- Garis Titik-Titik Penghubung di Layar Lebar -->
                                        <div class="hidden sm:block flex-grow border-b border-dashed border-slate-700 mx-2" aria-hidden="true"></div>

                                        <div class="flex items-center justify-between sm:justify-end gap-4 mt-2 sm:mt-0">
                                            <span class="text-gold font-extrabold text-lg sm:text-xl whitespace-nowrap">
                                                Rp {{ number_format($service->price ?? 0, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ url('/booking/create') }}"
                                                class="min-h-[44px] inline-flex items-center px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-200 hover:border-amber-400 hover:text-amber-400 transition">
                                                Pilih
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-2 sm:pl-7 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs sm:text-sm text-slate-300">
                                        <span>Estimasi durasi: <strong class="text-white">{{ $service->duration ?? 30 }} menit</strong></span>
                                        <span class="text-slate-600" aria-hidden="true">•</span>
                                        <span>Ditangani langsung oleh kapster pilihan Anda</span>
                                    </div>
                                </div>
                            @empty
                                <div class="py-10 text-center">
                                    <p class="text-white font-bold text-lg mb-2">Daftar layanan sedang diperbarui</p>
                                    <p class="text-slate-300 text-sm mb-6">Silakan menuju halaman reservasi untuk memeriksa jadwal kapster yang tersedia.</p>
                                    <a href="{{ url('/booking/create') }}"
                                        class="min-h-[44px] inline-flex items-center px-6 py-2.5 rounded-lg bg-gold text-slate-950 font-extrabold text-xs uppercase tracking-wider">
                                        Ke Halaman Reservasi
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 4. GALLERY SECTION: Lookbook Dokumentasi -->
        <section id="gallery" class="cv-auto py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

                <!-- Header Sejajar Kiri-Kanan -->
                <div class="from-bottom flex flex-col md:flex-row md:items-end justify-between mb-12 pb-6 border-b border-slate-800 gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2.5 mb-3">
                            <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                            <span class="text-gold font-bold tracking-[0.22em] uppercase text-xs">Arsip Visual</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">
                            Galeri Hasil <span class="text-gold">Potongan.</span>
                        </h2>
                    </div>
                    <p class="text-slate-300 text-sm sm:text-base max-w-md">
                        Dokumentasi asli hasil pangkas rambut dan penataan janggut pelanggan di kursi studio kami.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($galleries as $item)
                        <article class="from-bottom surface-card rounded-2xl overflow-hidden group flex flex-col">
                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-950">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title ?? 'Dokumentasi hasil potong rambut' }}"
                                    width="800"
                                    height="600"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5 flex items-center justify-between gap-4 bg-slate-950/80 border-t border-slate-800">
                                <div>
                                    @if(!empty($item->subtitle))
                                        <p class="text-gold font-bold text-[11px] uppercase tracking-[0.18em] mb-1">
                                            {{ $item->subtitle }}
                                        </p>
                                    @endif
                                    <h3 class="text-white font-bold text-base">
                                        {{ $item->title }}
                                    </h3>
                                </div>
                                <span class="text-xs font-bold text-slate-400 border border-slate-800 rounded-full px-2.5 py-1">
                                    #{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full surface-card rounded-2xl p-10 text-center">
                            <p class="text-white font-bold text-lg mb-2">Belum ada foto galeri yang diunggah</p>
                            <p class="text-slate-300 text-sm">Dokumentasi hasil cukur terbaru akan segera ditampilkan setelah diunggah oleh admin.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </section>

        <!-- 5. BARBERS SECTION: Tim Kapster -->
        <section id="barbers" class="cv-auto py-16 md:py-24 bg-slate-950/70 border-t border-amber-400/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

                <div class="from-bottom text-center max-w-2xl mx-auto mb-12 md:mb-16">
                    <div class="inline-flex items-center justify-center gap-2.5 mb-3">
                        <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                        <span class="text-gold font-bold tracking-[0.22em] uppercase text-xs">Tim Profesional</span>
                        <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4">
                        Kapster <span class="text-gold">Pilihan Anda.</span>
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base">
                        Pilih kapster andalan Anda saat mengisi formulir reservasi untuk mendapatkan gaya potongan yang konsisten di setiap kunjungan.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    @forelse($barbers as $barber)
                        <div style="transition-delay: {{ $loop->index * 0.1 }}s"
                            class="from-bottom surface-card rounded-2xl p-3 flex flex-col justify-between group hover:border-amber-400/60 transition">
                            <div class="relative overflow-hidden rounded-xl aspect-[3/4] bg-slate-950 mb-4">
                                <img src="{{ asset('storage/' . $barber->photo) }}"
                                    alt="Potret Kapster {{ $barber->name }}"
                                    width="600"
                                    height="800"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 scale-105 group-hover:scale-100">
                                <span class="absolute inset-2 rounded-lg border border-amber-400/25 pointer-events-none" aria-hidden="true"></span>
                            </div>

                            <div class="px-2 pb-2 text-center">
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-gold mb-1">Master Kapster</p>
                                <h3 class="font-extrabold text-lg text-white mb-4">{{ $barber->name }}</h3>
                                <a href="{{ url('/booking/create') }}"
                                    class="min-h-[44px] w-full inline-flex items-center justify-center rounded-lg bg-slate-900 border border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-200 hover:border-amber-400 hover:text-amber-400 transition">
                                    Pesan Jadwal
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full surface-card rounded-2xl p-10 text-center">
                            <p class="text-white font-bold text-lg mb-2">Data kapster sedang disiapkan</p>
                            <p class="text-slate-300 text-sm">Daftar kapster yang bertugas akan muncul di sini setelah ditambahkan oleh admin.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </section>

        <!-- 6. CLOSING APPOINTMENT BANNER -->
        <section aria-label="Ajakan Reservasi" class="py-16 md:py-20 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
                <div class="from-bottom surface-dark rounded-2xl p-8 sm:p-12 border-2 border-amber-400/40 relative overflow-hidden">
                    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
                        <div class="max-w-2xl">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="text-amber-400 text-xs" aria-hidden="true">◆</span>
                                <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Siap Tampil Rapi Hari Ini?</span>
                            </div>
                            <h2 class="text-2xl sm:text-4xl font-black text-white leading-tight mb-3">
                                Atur Jadwal Pangkas Rambut Anda Sekarang.
                            </h2>
                            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                                Tentukan tanggal, jam kedatangan, serta kapster pilihan Anda dalam hitungan detik, atau periksa status reservasi yang sudah Anda buat sebelumnya.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full lg:w-auto shrink-0">
                            <a href="{{ url('/booking/create') }}"
                                class="min-h-[48px] inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-lg bg-gold text-slate-950 font-extrabold text-xs sm:text-sm uppercase tracking-wider hover:bg-amber-300 transition">
                                <span>Buat Reservasi</span>
                            </a>
                            <a href="{{ route('booking.cekStatusForm') }}"
                                class="min-h-[48px] inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 font-bold text-xs sm:text-sm uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                                <span>Lacak Status Jadwal</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 pt-16 pb-10 border-t border-amber-400/25">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <a href="#beranda" class="inline-flex items-center gap-3.5 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-slate-900 border-2 border-amber-400/70">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Emblem" width="144" height="120" loading="lazy" decoding="async" class="w-7 h-7 object-contain">
                    </div>
                    <div>
                        <span class="block text-base font-extrabold tracking-[0.18em] text-gold uppercase">Heritage Grooming</span>
                        <span class="block text-xs text-slate-400">Studio Pangkas Rambut Pria</span>
                    </div>
                </a>
                <p class="text-slate-300 leading-relaxed text-sm">
                    Standar perawatan rambut dan janggut pria sejak 2026. Ketelitian cukur dan kenyamanan ruang adalah prioritas utama kami.
                </p>
            </div>

            <div>
                <h3 class="font-bold text-white mb-4 uppercase tracking-[0.18em] text-xs">Waktu Operasional</h3>
                <ul class="text-slate-300 space-y-3 text-sm">
                    <li class="flex items-center justify-between border-b border-slate-800/80 pb-2.5">
                        <span>Senin - Jumat</span>
                        <span class="text-gold font-bold">09:00 - 21:00 WIB</span>
                    </li>
                    <li class="flex items-center justify-between border-b border-slate-800/80 pb-2.5">
                        <span>Sabtu - Minggu</span>
                        <span class="text-gold font-bold">10:00 - 22:00 WIB</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-white mb-4 uppercase tracking-[0.18em] text-xs">Lokasi &amp; Navigasi</h3>
                <p class="text-slate-300 text-sm mb-5 leading-relaxed">
                    Jl. Nasional No. 3, Kota Banyuwangi, Indonesia
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="#services"
                        class="min-h-[44px] inline-flex items-center px-3.5 py-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                        Menu Layanan
                    </a>
                    <a href="#gallery"
                        class="min-h-[44px] inline-flex items-center px-3.5 py-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                        Galeri
                    </a>
                    <a href="#barbers"
                        class="min-h-[44px] inline-flex items-center px-3.5 py-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                        Kapster
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 text-center text-slate-400 text-xs border-t border-slate-900 pt-8">
            &copy; 2026 Heritage Grooming Barbershop. Hak cipta dilindungi.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elemen = document.querySelectorAll('.from-bottom');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    rootMargin: '0px 0px -40px 0px',
                    threshold: 0.05
                });

                elemen.forEach(box => observer.observe(box));
            } else {
                elemen.forEach(box => box.classList.add('active'));
            }

            const mobileNav = document.getElementById('mobile-nav');
            const openBtn = document.getElementById('mobile-menu-trigger');
            const closeBtn = document.getElementById('mobile-menu-close');
            const mobileLinks = document.querySelectorAll('.mobile-nav-link');

            function openMobileMenu() {
                mobileNav.classList.remove('-translate-y-full');
                openBtn.setAttribute('aria-expanded', 'true');
                closeBtn.focus();
            }

            function closeMobileMenu() {
                mobileNav.classList.add('-translate-y-full');
                openBtn.setAttribute('aria-expanded', 'false');
                openBtn.focus();
            }

            openBtn.addEventListener('click', openMobileMenu);
            closeBtn.addEventListener('click', closeMobileMenu);

            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileNav.classList.add('-translate-y-full');
                    openBtn.setAttribute('aria-expanded', 'false');
                });
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !mobileNav.classList.contains('-translate-y-full')) {
                    closeMobileMenu();
                }
            });
        });
    </script>
</body>

</html>
