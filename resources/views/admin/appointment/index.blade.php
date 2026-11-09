@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <!-- Header & Pencarian -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Manajemen Antrean</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">
                Daftar <span class="text-gold">Reservasi</span>
            </h1>
            <p class="text-slate-300 text-sm mt-1">
                Konfirmasi kehadiran pelanggan, hubungi melalui WhatsApp, atau selesaikan sesi cukur.
            </p>
        </div>

        <div class="w-full sm:w-72">
            <label for="searchInput" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                Cari Pelanggan
            </label>
            <input type="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Ketik nama atau nomor HP..."
                class="w-full bg-slate-900 border border-slate-700 text-white placeholder-slate-400 text-sm rounded-xl focus:border-amber-400 px-4 py-2.5 outline-none transition">
        </div>
    </div>

    <!-- Ringkasan Status di Atas Tabel agar Mudah Dipindai -->
    @if($appointments->count() > 0)
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="surface-card rounded-xl p-4 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Pending</p>
                    <p class="text-2xl font-black text-amber-400 mt-1">{{ $appointments->where('status', 'pending')->count() }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold bg-amber-950 text-amber-300 border border-amber-400/40">Menunggu</span>
            </div>

            <div class="surface-card rounded-xl p-4 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Konfirmasi</p>
                    <p class="text-2xl font-black text-sky-400 mt-1">{{ $appointments->where('status', 'konfirmasi')->count() }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold bg-sky-950 text-sky-300 border border-sky-400/40">Terjadwal</span>
            </div>

            <div class="surface-card rounded-xl p-4 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Selesai</p>
                    <p class="text-2xl font-black text-emerald-400 mt-1">{{ $appointments->where('status', 'selesai')->count() }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-950 text-emerald-300 border border-emerald-400/40">Tuntas</span>
            </div>

            <div class="surface-card rounded-xl p-4 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Batal</p>
                    <p class="text-2xl font-black text-red-400 mt-1">{{ $appointments->where('status', 'batal')->count() }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold bg-red-950 text-red-300 border border-red-400/40">Dibatalkan</span>
            </div>
        </div>
    @endif

    <!-- Tabel Data Reservasi -->
    <div class="surface-card rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table id="tabelPesanan" class="w-full text-left text-slate-200 border-collapse">
                <thead class="bg-slate-950 text-gold uppercase text-xs font-extrabold tracking-wider border-b border-slate-800">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Pelanggan</th>
                        <th class="p-4">Kapster</th>
                        <th class="p-4">Layanan</th>
                        <th class="p-4">Waktu Kedatangan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-sm">
                    @forelse($appointments as $index => $appointment)
                        <tr class="hover:bg-slate-900/60 transition">
                            <td class="p-4 font-bold text-slate-400">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <div class="font-bold text-white">
                                    {{ $appointment->customer_name }}
                                </div>
                                <div class="text-xs text-slate-300 mt-0.5">
                                    {{ $appointment->customer_phone }}
                                </div>
                            </td>
                            <td class="p-4 font-semibold text-white">{{ $appointment->barber->name ?? 'Belum ditentukan' }}</td>
                            <td class="p-4 text-slate-200">{{ $appointment->service->name ?? 'Layanan dihapus' }}</td>
                            <td class="p-4 whitespace-nowrap">
                                <div class="font-semibold text-white">
                                    {{ \Carbon\Carbon::parse($appointment->booking_date)->format('d M Y') }}
                                </div>
                                <div class="text-xs text-gold font-bold mt-0.5">
                                    Pukul {{ $appointment->booking_time }}
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                @if($appointment->status == 'pending')
                                    <span class="inline-flex px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider bg-amber-950 text-amber-300 border border-amber-400/50">
                                        Pending
                                    </span>
                                @elseif($appointment->status == 'konfirmasi')
                                    <span class="inline-flex px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider bg-sky-950 text-sky-300 border border-sky-400/50">
                                        Konfirmasi
                                    </span>
                                @elseif($appointment->status == 'selesai')
                                    <span class="inline-flex px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider bg-emerald-950 text-emerald-300 border border-emerald-400/50">
                                        Selesai
                                    </span>
                                @elseif($appointment->status == 'batal')
                                    <span class="inline-flex px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider bg-red-950 text-red-300 border border-red-400/50">
                                        Batal
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-2 flex-wrap">
                                    @php
                                        $phone = $appointment->customer_phone;
                                        if (str_starts_with($phone, '0')) {
                                            $phone = '62' . substr($phone, 1);
                                        }
                                    @endphp

                                    @if($appointment->status == 'pending')
                                        <form action="{{ route('booking.updateStatus', $appointment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="konfirmasi">
                                            <button type="submit"
                                                class="min-h-[38px] inline-flex items-center px-3 py-1.5 rounded-lg bg-gold text-slate-950 font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
                                                Konfirmasi
                                            </button>
                                        </form>

                                        <form action="{{ route('booking.updateStatus', $appointment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="batal">
                                            <button type="submit"
                                                class="min-h-[38px] inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-900 border border-red-500/50 text-red-300 font-bold text-xs uppercase tracking-wider hover:bg-red-600 hover:text-white transition">
                                                Batalkan
                                            </button>
                                        </form>

                                        @php
                                            $pesan = "Halo Kak " . $appointment->customer_name . ", kami dari Heritage Grooming Barbershop ingin mengonfirmasi reservasi Anda pada tanggal " . $appointment->booking_date . " jam " . $appointment->booking_time . ". Apakah sudah sesuai?";
                                            $waUrl = "https://wa.me/" . $phone . "?text=" . urlencode($pesan);
                                        @endphp
                                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                                            class="min-h-[38px] inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-950 border border-emerald-400/50 text-emerald-200 hover:bg-emerald-600 hover:text-white font-bold text-xs transition">
                                            <span>Hubungi WA</span>
                                        </a>

                                    @elseif($appointment->status == 'konfirmasi')
                                        <form action="{{ route('booking.updateStatus', $appointment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="selesai">
                                            <button type="submit"
                                                class="min-h-[38px] inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-500 text-slate-950 font-extrabold text-xs uppercase tracking-wider hover:bg-emerald-400 transition">
                                                Selesaikan
                                            </button>
                                        </form>

                                        @php
                                            $pesan = "Halo Kak " . $appointment->customer_name . ", kami dari Heritage Grooming Barbershop telah mengonfirmasi reservasi Anda pada tanggal " . $appointment->booking_date . " jam " . $appointment->booking_time . ". Kami tunggu kedatangannya.";
                                            $waUrl = "https://wa.me/" . $phone . "?text=" . urlencode($pesan);
                                        @endphp
                                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                                            class="min-h-[38px] inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-950 border border-emerald-400/50 text-emerald-200 hover:bg-emerald-600 hover:text-white font-bold text-xs transition">
                                            <span>Hubungi WA</span>
                                        </a>

                                    @elseif($appointment->status == 'batal')
                                        <span class="text-slate-400 text-xs italic">Telah dibatalkan</span>
                                    @endif

                                    <form action="{{ route('booking.destroy', $appointment->id) }}" method="POST"
                                        onsubmit="return confirm('Data reservasi atas nama {{ $appointment->customer_name }} akan dihapus permanen. Lanjutkan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            aria-label="Hapus reservasi {{ $appointment->customer_name }}"
                                            class="min-h-[38px] inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-300 hover:border-red-500 hover:text-red-400 text-xs font-bold transition">
                                            <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-slate-300 text-sm">
                                Belum ada data reservasi yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        let debounceTimer;

        if (searchInput) {
            if (searchInput.value) {
                searchInput.focus();
                const val = searchInput.value;
                searchInput.value = '';
                searchInput.value = val;
            }

            searchInput.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const url = new URL(window.location.href);
                    const keyword = searchInput.value.trim();

                    if (keyword) {
                        url.searchParams.set('search', keyword);
                    } else {
                        url.searchParams.delete('search');
                    }

                    window.location.href = url.toString();
                }, 500);
            });
        }
    });
</script>
@endsection
