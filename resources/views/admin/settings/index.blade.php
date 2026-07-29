@extends("layouts.admin")

@section("content")
<div class="max-w-5xl mx-auto space-y-8">
  
  <!-- Header -->
  <div class="border-gray-800 pb-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-3xl font-bold text-gray-50 flex items-center gap-3">
        Pengaturan <span class="text-gold">Akun</span>
      </h1>
      <p class="text-sm text-gray-400 mt-1">
        Kelola informasi profil, email, dan keamanan kata sandi akun Anda.
      </p>
    </div>
    
  </div>

  <!-- Main Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left Navigation / User Summary Card -->
    <div class="space-y-6">
      <div class="bg-slate-800/60 p-6 rounded-2xl border border-gray-700 shadow-xl flex flex-col items-center text-center">
        <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-yellow-600 to-amber-300 p-1 mb-4 shadow-lg shadow-amber-500/10">
          <div class="w-full h-full rounded-full bg-slate-600 flex items-center justify-center text-3xl font-black text-gold">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
        </div>
        <h3 class="text-xl font-bold ">{{ Auth::user()->name }}</h3>
        <p class="text-sm text-gray-400 mb-4">{{ Auth::user()->email }}</p>
        
        <div class="w-full pt-4 border-t border-gray-700/60 flex justify-between text-xs text-gray-400">
          <span>Terdaftar Sejak:</span>
          <span class="font-semibold text-gray-200">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</span>
        </div>
      </div>

      <!-- Quick Info Card -->
      <div class="bg-slate-800/40 p-5 rounded-2xl border border-gray-800 text-xs text-gray-400 space-y-3">
        <div class="flex items-center gap-2 text-gold font-semibold uppercase tracking-wider text-[11px]">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Informasi Fitur Akun
        </div>
        <ul class="space-y-2 list-disc list-inside text-gray-300">
          <li><strong class="">Nama</strong>: Nama Administrator.</li>
          <li><strong class="">Email</strong>: Alamat email utama.</li>
          <li><strong class="">Sandi  </strong>: Kata sandi enkripsi akun.</li>
        </ul>
      </div>
    </div>

    <!-- Right Forms Section -->
    <div class="lg:col-span-2 space-y-8">
      
      <!-- Section 1: Update Profil -->
      <div class="bg-slate-800/50 p-6 md:p-8 rounded-2xl border border-gray-700 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gold/5 rounded-full blur-2xl pointer-events-none"></div>

        <div class="mb-6">
          <h2 class="text-xl font-bold  flex items-center gap-2">
            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            Informasi Profil
          </h2>
          <p class="text-xs text-gray-400 mt-1">Perbarui informasi profil dan alamat email akun Anda.</p>
        </div>

        <form method="POST" action="{{ route('settings.update-profile') }}" class="space-y-5">
          @csrf
          @method('PATCH')

          <div class="mb-4">
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required 
              class="w-full px-4 py-3 bg-slate-900 border border-gray-700 rounded-xl  focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition duration-200 text-sm">
            @error('name')
              <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required 
              class="w-full px-4 py-3 bg-slate-900 border border-gray-700 rounded-xl  focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition duration-200 text-sm">
            @error('email')
              <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
            @enderror
          </div>

          <div class="pt-2 flex justify-end">
            <button type="submit" class="py-2 px-4 bg-gold text-slate-950 font-bold rounded-xl hover:bg-yellow-400 focus:ring-2 focus:ring-gold/50 transition-all duration-200 text-sm shadow-lg shadow-gold/10 flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>

      <!-- Section 2: Update Password -->
      <div class="bg-slate-800/50 p-6 md:p-8 rounded-2xl border border-gray-700 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-2xl pointer-events-none"></div>

        <div class="mb-6">
          <h2 class="text-xl font-bold  flex items-center gap-2">
            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            Perbarui Kata Sandi
          </h2>
          <p class="text-xs text-gray-400 mt-1">Pastikan akun Anda menggunakan kata sandi yang kuat dan acak untuk menjaga keamanan.</p>
        </div>

        <form method="POST" action="{{ route('settings.update-password') }}" class="space-y-5">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Kata Sandi Saat Ini</label>
            <input type="password" id="current_password" name="current_password" required 
              class="w-full px-4 py-3 bg-slate-900 border border-gray-700 rounded-xl  focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition duration-200 text-sm">
            @error('current_password', 'updatePassword')
              <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Kata Sandi Baru</label>
            <input type="password" id="password" name="password" required 
              class="w-full px-4 py-3 bg-slate-900 border border-gray-700 rounded-xl  focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition duration-200 text-sm">
            @error('password', 'updatePassword')
              <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Konfirmasi Kata Sandi Baru</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required 
              class="w-full px-4 py-3 bg-slate-900 border border-gray-700 rounded-xl  focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition duration-200 text-sm">
            @error('password_confirmation', 'updatePassword')
              <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
            @enderror
          </div>

          <div class="pt-2 flex justify-end">
            <button type="submit" class="py-2 px-4 bg-gold text-slate-950 font-bold px-6 py-2.5 rounded-xl hover:bg-yellow-400 focus:ring-2 focus:ring-gold/50 transition-all duration-200 text-sm shadow-lg shadow-gold/10 flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 0121 9z"></path></svg>
              Perbarui Kata Sandi
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
