@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                <span class="text-gold font-bold uppercase tracking-[0.2em] text-xs">Arsip Visual Studio</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">
                Daftar <span class="text-gold">Galeri Karya</span>
            </h1>
            <p class="text-slate-300 text-sm mt-1">
                Kelola dokumentasi foto hasil potongan rambut yang ditampilkan di halaman utama.
            </p>
        </div>

        <a href="{{ route('galleries.create') }}"
            class="min-h-[44px] inline-flex items-center gap-2 bg-gold text-slate-950 px-5 py-2.5 rounded-lg font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
            <span>+ Unggah Foto Karya</span>
        </a>
    </div>

    <div class="surface-card rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-950 text-gold uppercase text-xs font-extrabold tracking-wider border-b border-slate-800">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Pratinjau</th>
                        <th class="p-4">Judul Gaya Rambut</th>
                        <th class="p-4">Kategori / Subjudul</th>
                        <th class="p-4 text-center">Tindakan</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800 text-sm">
                    @forelse($galleries as $index => $item)
                        <tr class="hover:bg-slate-900/60 transition">
                            <td class="p-4 font-bold text-slate-400">{{ $index + 1 }}</td>

                            <td class="p-4">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title ?? 'Foto galeri' }}"
                                    width="80"
                                    height="64"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-20 h-16 object-cover rounded-xl border border-amber-400/30 bg-slate-950">
                            </td>

                            <td class="p-4 text-white font-bold text-base">
                                {{ $item->title ?? 'Tanpa Judul' }}
                            </td>

                            <td class="p-4 text-slate-300">
                                {{ $item->subtitle ?? 'Umum' }}
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('galleries.edit', $item->id) }}"
                                        class="min-h-[38px] inline-flex items-center px-3.5 py-1.5 bg-gold text-slate-950 hover:bg-amber-300 rounded-lg transition text-xs font-extrabold uppercase tracking-wider">
                                        Edit
                                    </a>

                                    <form action="{{ route('galleries.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?')">
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
                                Belum ada dokumentasi galeri yang diunggah. Silakan klik tombol "+ Unggah Foto Karya".
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
