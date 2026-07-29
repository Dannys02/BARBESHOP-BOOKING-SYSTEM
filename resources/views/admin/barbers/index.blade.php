@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold">Daftar <span class="text-gold">Staf Barbershop</span></h2>
        <a href="{{ route('barbers.create') }}"
            class="bg-gold text-xs md:text-base text-slate-900 px-6 py-2 rounded-full font-bold hover:scale-105 transition transform">
            + Tambah Staf Barbershop
        </a>
    </div>

    <div class="bg-slate-800 rounded-2xl border border-gray-700 overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-gold uppercase text-sm">
                <tr>
                    <th class="p-4 text-xs font-bold">No</th>
                    <th class="p-4 text-xs font-bold">Foto</th>
                    <th class="p-4 text-xs font-bold">Nama</th>
                    <th class="p-4 text-xs font-bold">Bio</th>
                    <th class="p-4 text-xs font-bold text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-700">
                @forelse($barbers as $index => $barber)
                    <tr class="hover:bg-slate-700/50 transition">
                        <td class="p-4 text-gray-300">{{ $index + 1 }}</td>

                        <td class="p-4">
                            <img src="{{ asset('storage/' . $barber->photo) }}" class="w-20 h-20 object-cover rounded-lg">
                        </td>

                        <td class="p-4 text-gold font-semibold">
                            {{ $barber->name }}
                        </td>

                        <td class="p-4 text-gray-300">
                            {{ Str::limit($barber->bio, 100) }}
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center space-x-2">

                                <a href="{{ route('barbers.show', $barber->id) }}"
                                    class="px-4 py-2 bg-blue-600 rounded-full hover:bg-blue-700 transition text-sm">
                                    Detail
                                </a>

                                <a href="{{ route('barbers.edit', $barber->id) }}"
                                    class="px-4 py-2 bg-yellow-600 rounded-full hover:bg-yellow-700 transition text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus dan pecat {{ $barber->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition text-sm">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-400">
                            Data barber kosong.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
