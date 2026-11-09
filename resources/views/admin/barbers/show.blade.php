@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div>
            <p class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-1">Informasi Personel</p>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Profil <span class="text-gold">Kapster</span></h1>
        </div>
        <a href="{{ route('barbers.index') }}"
            class="min-h-[44px] inline-flex items-center px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-200 text-xs font-bold uppercase tracking-wider hover:border-amber-400 hover:text-amber-400 transition">
            Kembali ke Daftar
        </a>
    </div>

    <div class="surface-card rounded-2xl overflow-hidden shadow-2xl">
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="md:col-span-5 relative bg-slate-950">
                <img src="{{ asset('storage/' . $barber->photo) }}"
                    alt="Foto Kapster {{ $barber->name }}"
                    width="600"
                    height="800"
                    class="w-full h-80 md:h-full object-cover object-top border-b md:border-b-0 md:border-r border-slate-800">
            </div>

            <div class="md:col-span-7 p-6 sm:p-10 flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 mb-2">
                        <span class="text-amber-400 text-[10px]" aria-hidden="true">◆</span>
                        <span class="text-gold text-xs font-bold tracking-[0.2em] uppercase">Master Kapster</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-black text-white mb-6">{{ $barber->name }}</h2>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-gold font-bold uppercase text-xs tracking-wider mb-2">Biografi &amp; Keahlian</h3>
                            <p class="text-slate-200 leading-relaxed text-base">
                                {{ $barber->bio }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-6 border-t border-slate-800">
                            <div>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Kode Personel</p>
                                <p class="text-white font-bold text-sm mt-1">
                                    #BRB-{{ str_pad($barber->id, 3, '0', STR_PAD_LEFT) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Status Penugasan</p>
                                <p class="text-emerald-400 font-bold text-sm mt-1 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full" aria-hidden="true"></span>
                                    <span>Aktif Bertugas</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3 mt-10 pt-6 border-t border-slate-800">
                    <a href="{{ route('barbers.edit', $barber->id) }}"
                        class="min-h-[44px] inline-flex items-center px-6 py-2.5 bg-gold text-slate-950 rounded-lg font-extrabold text-xs uppercase tracking-wider hover:bg-amber-300 transition">
                        Edit Profil Kapster
                    </a>

                    <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data {{ $barber->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="min-h-[44px] inline-flex items-center px-5 py-2.5 bg-slate-900 border border-red-500/50 text-red-300 rounded-lg font-bold text-xs uppercase tracking-wider hover:bg-red-600 hover:text-white transition">
                            Hapus Permanen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
