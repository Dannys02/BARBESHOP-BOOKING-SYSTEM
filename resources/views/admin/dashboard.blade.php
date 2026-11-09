@extends("layouts.admin")

@section("content")
<div class="space-y-8">

    <!-- Header & Pintasan Aksi Operasional -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Ringkasan Operasional</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">
                Selamat Bertugas, <span class="text-gold">{{ auth()->user()->name }}</span>
            </h1>
            <p class="text-slate-300 text-sm mt-1">
                Pantau jadwal reservasi masuk, ketersediaan kapster, dan riwayat aktivitas studio.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('booking.index') }}"
                class="min-h-[44px] inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-gold text-slate-950 font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
                <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Kelola Reservasi</span>
            </a>
            <a href="{{ route('services.create') }}"
                class="min-h-[44px] inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 font-bold text-xs uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
                <span>+ Layanan Baru</span>
            </a>
        </div>
    </div>

    <!-- 3 Kartu Ringkasan Data Nyata -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Reservasi -->
        <a href="{{ route('booking.index') }}"
            class="surface-card p-6 rounded-2xl hover:border-amber-400/60 transition flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xs font-bold text-slate-300 tracking-[0.16em] uppercase">Total Reservasi</h2>
                <div class="w-10 h-10 rounded-full bg-slate-950 border border-amber-400/40 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-slate-950 transition">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div>
                <div class="flex items-baseline gap-2.5">
                    <span class="text-4xl font-black text-white">{{ $appointments }}</span>
                    <span class="text-xs text-gold font-bold uppercase tracking-wider">Jadwal Tercatat</span>
                </div>
                <p class="text-xs text-slate-400 mt-3 group-hover:text-slate-200 transition">
                    Buka daftar antrean dan konfirmasi jadwal pelanggan
                </p>
            </div>
        </a>

        <!-- Kapster Aktif -->
        <a href="{{ route('barbers.index') }}"
            class="surface-card p-6 rounded-2xl hover:border-amber-400/60 transition flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xs font-bold text-slate-300 tracking-[0.16em] uppercase">Kapster Studio</h2>
                <div class="w-10 h-10 rounded-full bg-slate-950 border border-amber-400/40 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-slate-950 transition">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div>
                <div class="flex items-baseline gap-2.5">
                    <span class="text-4xl font-black text-white">{{ $barbers }}</span>
                    <span class="text-xs text-gold font-bold uppercase tracking-wider">Personel</span>
                </div>
                <p class="text-xs text-slate-400 mt-3 group-hover:text-slate-200 transition">
                    Kelola profil, foto, dan spesialisasi kapster
                </p>
            </div>
        </a>

        <!-- Menu Layanan -->
        <a href="{{ route('services.index') }}"
            class="surface-card p-6 rounded-2xl hover:border-amber-400/60 transition flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xs font-bold text-slate-300 tracking-[0.16em] uppercase">Menu Layanan</h2>
                <div class="w-10 h-10 rounded-full bg-slate-950 border border-amber-400/40 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-slate-950 transition">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L5 19m0-14l4.121 4.121" />
                    </svg>
                </div>
            </div>
            <div>
                <div class="flex items-baseline gap-2.5">
                    <span class="text-4xl font-black text-white">{{ $services }}</span>
                    <span class="text-xs text-gold font-bold uppercase tracking-wider">Paket Cukur</span>
                </div>
                <p class="text-xs text-slate-400 mt-3 group-hover:text-slate-200 transition">
                    Atur tarif layanan dan estimasi durasi pengerjaan
                </p>
            </div>
        </a>

    </div>

    <!-- Log Aktivitas Terbaru -->
    <div class="surface-card p-6 sm:p-8 rounded-2xl">
        <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-800">
            <div>
                <h2 class="text-lg font-extrabold text-white">Catatan Aktivitas Terbaru</h2>
                <p class="text-xs text-slate-400 mt-0.5">Lima perubahan terakhir pada jadwal, kapster, atau layanan.</p>
            </div>
            <span class="text-xs font-bold uppercase tracking-wider text-gold">Riwayat Sistem</span>
        </div>

        <div class="space-y-3">
            @forelse($recentActivities as $act)
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 bg-slate-900/90 rounded-xl border border-slate-800">
                    <div class="flex items-start sm:items-center gap-3.5">
                        <span class="w-2.5 h-2.5 rounded-full shrink-0 mt-1.5 sm:mt-0
                            {{ $act->type == 'booking' ? 'bg-emerald-400' : '' }}
                            {{ $act->type == 'barber' ? 'bg-amber-400' : '' }}
                            {{ $act->type == 'layanan' ? 'bg-sky-400' : '' }}
                            {{ !in_array($act->type, ['booking', 'barber', 'layanan']) ? 'bg-slate-400' : '' }}"
                            aria-hidden="true">
                        </span>
                        <div>
                            <p class="text-sm text-white font-semibold">
                                {{ $act->description }}
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">
                                {{ $act->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <span class="self-start sm:self-center text-[11px] font-bold px-2.5 py-1 rounded-md bg-slate-950 border border-slate-700 text-slate-200 uppercase tracking-wider">
                        {{ $act->type }}
                    </span>
                </div>
            @empty
                <div class="text-center py-10 px-4 bg-slate-900/60 border border-slate-800 rounded-xl">
                    <p class="text-white font-bold text-base mb-1">Belum ada catatan aktivitas</p>
                    <p class="text-slate-400 text-xs">Perubahan status reservasi, penambahan kapster, dan pembaruan layanan akan tercatat otomatis di sini.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
