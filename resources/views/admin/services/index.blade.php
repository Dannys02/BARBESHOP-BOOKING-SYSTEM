@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Katalog &amp; Tarif</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">
                Daftar <span class="text-gold">Menu Layanan</span>
            </h1>
            <p class="text-slate-300 text-sm mt-1">
                Atur jenis paket perawatan rambut, harga resmi, serta durasi pengerjaan.
            </p>
        </div>

        <a href="{{ route('services.create') }}"
            class="min-h-[44px] inline-flex items-center gap-2 bg-gold text-slate-950 px-5 py-2.5 rounded-lg font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
            <span>+ Tambah Layanan</span>
        </a>
    </div>

    <div class="surface-card rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-950 text-gold uppercase text-xs font-extrabold tracking-wider border-b border-slate-800">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Layanan</th>
                        <th class="p-4">Tarif Resmi</th>
                        <th class="p-4">Estimasi Durasi</th>
                        <th class="p-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-sm">
                    @forelse($services as $index => $service)
                        <tr class="hover:bg-slate-900/60 transition">
                            <td class="p-4 font-bold text-slate-400">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <span class="font-bold text-white text-base">{{ $service->name }}</span>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <span class="text-gold font-extrabold text-base">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <span class="px-3 py-1 rounded-md bg-slate-900 border border-slate-700 text-slate-200 text-xs font-bold">
                                    {{ $service->duration }} menit
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('services.edit', $service->id) }}"
                                        class="min-h-[38px] inline-flex items-center px-3.5 py-1.5 bg-gold text-slate-950 hover:bg-amber-300 rounded-lg transition text-xs font-extrabold uppercase tracking-wider">
                                        Edit
                                    </a>

                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus layanan {{ $service->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="min-h-[38px] inline-flex items-center px-3.5 py-1.5 bg-slate-900 border border-red-500/40 text-red-300 hover:bg-red-600 hover:text-white rounded-lg transition text-xs font-bold uppercase tracking-wider">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-slate-300 text-sm">
                                Belum ada paket layanan yang terdaftar. Silakan klik tombol "+ Tambah Layanan".
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
