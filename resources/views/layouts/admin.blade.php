<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin | Heritage Grooming</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>
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
            border: 1px solid rgba(251, 191, 36, 0.18);
        }

        .surface-dark {
            background-color: #020617;
            border: 1px solid rgba(251, 191, 36, 0.22);
        }

        .dataTables_paginate {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 0.5rem !important;
            padding: 1.25rem 1rem !important;
            width: 100% !important;
            border-top: 1px solid #1e293b !important;
            box-sizing: border-box !important;
        }

        .paginate_button {
            min-height: 38px !important;
            display: inline-flex !important;
            align-items: center !important;
            padding: 0.4rem 0.85rem !important;
            background-color: #0f172a !important;
            border: 1px solid #334155 !important;
            border-radius: 0.5rem !important;
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            color: #e2e8f0 !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
        }

        .paginate_button.current,
        .paginate_button.current:hover {
            background-color: #fbbf24 !important;
            border-color: #fbbf24 !important;
            color: #020617 !important;
        }

        .paginate_button:hover:not(.current) {
            border-color: #fbbf24 !important;
            color: #fbbf24 !important;
        }
    </style>
</head>

<body class="text-slate-200 antialiased min-h-screen flex flex-col lg:flex-row selection:bg-amber-400 selection:text-slate-950">

    @php
        $navItems = [
            [
                'url' => url('/admin/dashboard'),
                'name' => 'Dashboard',
                'pattern' => 'admin/dashboard',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />',
            ],
            [
                'url' => route('booking.index'),
                'name' => 'Jadwal Reservasi',
                'pattern' => 'admin/booking*',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            ],
            [
                'url' => route('barbers.index'),
                'name' => 'Data Kapster',
                'pattern' => 'admin/barbers*',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />',
            ],
            [
                'url' => route('services.index'),
                'name' => 'Menu Layanan',
                'pattern' => 'admin/services*',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L5 19m0-14l4.121 4.121" />',
            ],
            [
                'url' => route('galleries.index'),
                'name' => 'Galeri Karya',
                'pattern' => 'admin/galleries*',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            ],
            [
                'url' => route('settings.index'),
                'name' => 'Pengaturan Akun',
                'pattern' => 'admin/settings*',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />',
            ],
        ];
    @endphp

    <!-- Mobile Top Bar -->
    <header class="lg:hidden sticky top-0 z-40 bg-slate-950 border-b border-amber-400/25 px-4 h-16 flex items-center justify-between">
        <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-slate-900 border-2 border-amber-400/70 flex items-center justify-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Emblem" width="144" height="120" decoding="async" class="w-6 h-6 object-contain">
            </div>
            <div>
                <span class="block text-xs font-extrabold uppercase tracking-[0.18em] text-gold">Heritage Grooming</span>
                <span class="block text-[11px] text-slate-400">Panel Pengelola</span>
            </div>
        </a>

        <button type="button"
            id="menu-toggle"
            aria-label="Buka menu sidebar"
            aria-expanded="false"
            aria-controls="sidebar-nav"
            class="min-h-[44px] min-w-[44px] inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-900 border border-amber-400/40 text-amber-400 text-xs font-bold uppercase tracking-wider">
            <span>Menu</span>
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Overlay Gelap untuk Mobile Drawer -->
    <div id="menu-overlay" class="fixed inset-0 bg-slate-950/80 z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden" aria-hidden="true"></div>

    <!-- LEFT SIDEBAR (Fixed on Desktop, Drawer on Mobile) -->
    <aside id="sidebar-nav"
        aria-label="Navigasi Sidebar Admin"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-950 border-r border-amber-400/20 flex flex-col justify-between transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">

        <!-- Bagian Atas: Brand Medallion & Daftar Menu -->
        <div class="flex flex-col flex-grow overflow-y-auto">
            <!-- Header Sidebar -->
            <div class="p-6 border-b border-slate-800/90 flex items-center justify-between">
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3.5 group">
                    <div class="relative w-12 h-12 rounded-full bg-slate-900 border-2 border-amber-400/75 flex items-center justify-center shrink-0 group-hover:border-amber-400 transition">
                        <span class="absolute inset-0.5 rounded-full border border-amber-400/20 pointer-events-none" aria-hidden="true"></span>
                        <img src="{{ asset('assets/img/logo.png') }}"
                            alt="Logo Emblem"
                            width="144"
                            height="120"
                            decoding="async"
                            class="w-7 h-7 object-contain">
                    </div>
                    <div>
                        <span class="block text-sm font-extrabold uppercase tracking-[0.16em] text-gold">Heritage</span>
                        <span class="block text-xs font-semibold text-slate-300">Admin Studio</span>
                    </div>
                </a>

                <button type="button"
                    id="menu-close"
                    aria-label="Tutup menu sidebar"
                    class="lg:hidden min-h-[44px] min-w-[44px] inline-flex items-center justify-center rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-amber-400">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Navigasi -->
            <nav aria-label="Menu Utama Admin" class="p-4 space-y-1.5">
                <p class="px-3 pb-2 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">
                    Menu Pengelolaan
                </p>

                @foreach($navItems as $item)
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp
                    <a href="{{ $item['url'] }}"
                        @if($isActive) aria-current="page" @endif
                        class="min-h-[46px] flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-[0.12em] transition-all duration-200 {{ $isActive ? 'bg-gold text-slate-950 shadow-md' : 'text-slate-300 hover:bg-slate-900 hover:text-amber-400' }}">
                        <svg class="w-5 h-5 shrink-0 {{ $isActive ? 'text-slate-950' : 'text-amber-400/80' }}" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $item['icon'] !!}
                        </svg>
                        <span>{{ $item['name'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Bagian Bawah Sidebar: Pintasan Website, Profil & Logout -->
        <div class="p-4 border-t border-slate-800/90 space-y-3 bg-slate-950">
            <a href="{{ url('/') }}"
                class="min-h-[44px] w-full flex items-center justify-between px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-xs font-bold text-slate-200 hover:border-amber-400/60 hover:text-amber-400 transition">
                <span class="uppercase tracking-wider">Lihat Halaman Utama</span>
                <svg class="w-4 h-4 text-amber-400" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>

            <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-full bg-slate-950 border border-amber-400/60 flex items-center justify-center text-xs font-extrabold text-gold shrink-0">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                    @csrf
                    <button type="submit"
                        aria-label="Keluar dari akun admin"
                        title="Keluar"
                        class="min-h-[40px] min-w-[40px] inline-flex items-center justify-center rounded-lg bg-red-950/60 border border-red-500/40 text-red-300 hover:bg-red-600 hover:text-white transition">
                        <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- AREA KONTEN UTAMA -->
    <div class="flex-1 lg:pl-72 flex flex-col min-h-screen min-w-0">
        <!-- Garis Ornamen Atas -->
        <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-400/60 to-transparent" aria-hidden="true"></div>

        <main class="flex-1 p-4 sm:p-6 lg:p-10 max-w-7xl w-full mx-auto">
            @if (session('success'))
                <div class="bg-emerald-950/90 text-emerald-200 p-4 rounded-xl mb-6 border border-emerald-400/50 font-medium text-sm flex items-center justify-between" role="status">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-950/90 text-red-200 p-4 rounded-xl mb-6 border border-red-400/50 font-medium text-sm flex items-center justify-between" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="px-6 py-5 border-t border-slate-800/80 text-center lg:text-left text-xs text-slate-400">
            &copy; 2026 Heritage Grooming Barbershop. Sistem Manajemen Studio.
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnToggle = document.getElementById('menu-toggle');
            const btnClose = document.getElementById('menu-close');
            const sidebar = document.getElementById('sidebar-nav');
            const overlay = document.getElementById('menu-overlay');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
                if (btnToggle) btnToggle.setAttribute('aria-expanded', 'true');
                if (btnClose) btnClose.focus();
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                if (btnToggle) {
                    btnToggle.setAttribute('aria-expanded', 'false');
                    btnToggle.focus();
                }
            }

            if (btnToggle) btnToggle.addEventListener('click', openSidebar);
            if (btnClose) btnClose.addEventListener('click', closeSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 1024) {
                    closeSidebar();
                }
            });

            if (window.jQuery && $.fn.DataTable && $('#tabelPesanan').length) {
                $('#tabelPesanan').DataTable({
                    "dom": 'tp',
                    "ordering": false,
                    "pageLength": 10,
                    "language": {
                        "emptyTable": "Belum ada data reservasi yang tercatat.",
                        "paginate": {
                            "previous": "Sebelumnya",
                            "next": "Berikutnya"
                        }
                    },
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var tableId = settings.sTableId;
                        var jumlahKolom = api.columns().header().length;
                        $('#' + tableId + ' .dataTables_empty')
                            .addClass('text-center p-10 text-slate-300 font-medium text-sm')
                            .attr('colspan', jumlahKolom);
                    }
                });
            }
        });
    </script>

</body>

</html>
