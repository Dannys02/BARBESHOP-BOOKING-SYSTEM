# DESIGN.md - Barbershop Booking System

## Brand Identity & Personality
- **Style Direction**: Heritage Gentleman's Club
- **Character**: Klasik, tegas, maskulin, presisi, dengan sentuhan medali (medallion) barbershop tradisional yang dipadukan dengan tata letak editorial modern yang bersih.
- **Dials**: `Dial: ENERGY 2 / RHYTHM 3 / MOTION 1`

## Color Palette (Max 3 Core + 1 Accent)
- **Base Dark (Background Primary)**: `#0f172a` (Slate 900) - Memberikan kesan ruang pangkas pria klasik yang intim dan maskulin.
- **Surface Dark (Elevated / Crest / Bar)**: `#020617` (Slate 950) & `#1e293b` (Slate 800) - Memisahkan hierarki elemen navigasi dan kartu dari latar belakang utama.
- **Text Primary & Secondary**: `#f8fafc` (Slate 50) untuk judul utama, `#cbd5e1` (Slate 300) untuk teks sekunder (memenuhi kontras WCAG AA > 4.5:1 di atas latar gelap).
- **Deliberate Accent**: `#fbbf24` (Amber 400 / Gold) - Digunakan secara terukur pada emblem logo tengah, penanda aktif, bingkai tipis heritage, dan tombol aksi utama (Reservasi).

## Typography
- **Font Family**: `'Plus Jakarta Sans', sans-serif` - Dipilih karena keterbacaan geometris yang tajam pada ukuran kecil (navigasi uppercase tracking) sekaligus bobot ekstra tebal yang kokoh pada heading.
- **Navigation Voice**: Uppercase dengan letter-spacing terukur (`0.18em`), ukuran `12px`-`13px` (`font-bold`), dilengkapi ornamen garis/titik belah ketupat (`◆`) khas barbershop klasik.

## Navigation Architecture (Split-Center Medallion)
- **Desktop Layout**:
  - **Sayap Kiri**: `Beranda`, `Layanan`, `Galeri`
  - **Pusat Horizontal & Vertikal (Focal Point)**: Medali bundar sempurna (`rounded-full`, `w-14 h-14`) berisi `logo.png` yang berada tepat di tengah secara horizontal dan vertikal di dalam baris header (`h-20`) tanpa keluar dari batas kontainer navbar.
  - **Sayap Kanan**: `Kapster`, `Lacak Jadwal` (tombol status berbingkai rapi `rounded-lg`), dan CTA utama `Reservasi` (tombol tegas beraksen emas `rounded-lg`).
- **Mobile Layout**:
  - Bar atas kompak (`h-16` / `h-20`) dengan medali logo bundar sempurna (`w-12 h-12 rounded-full`) tepat di tengah secara horizontal dan vertikal, diapit tombol `Reservasi` di kiri dan tombol `Menu` di kanan.
  - Drawer navigasi penuh yang menampilkan logo bundar di header drawer, daftar tautan terstruktur, serta dua aksi utama (`Reservasi Kursi` & `Lacak Jadwal`).

## Section Rhythm & Composition (RHYTHM 3 — Varied Editorial)
1. **Hero (`#beranda`)**: Komposisi 2 kolom asimetris (7:5). Kolom kiri berisi narasi utama, CTA ganda, dan bar info jam operasional & lokasi; kolom kanan menampilkan bingkai lengkung cermin barbershop (*arch portrait*) dengan lencana medali bundar.
2. **Standar & Filosofi (`#about`)**: Komposisi editorial 5:7 dengan potret ruang pangkas berbingkai ganda emas di kiri dan daftar bernomor (`01`, `02`, `03`) standar higienitas serta teknik cukur di kanan.
3. **Katalog Layanan (`#services`)**: Format *Heritage Grooming Menu Board* (bukan grid kartu seragam). Menampilkan baris menu cukur dengan garis penghubung ke nominal harga, durasi menit, dan tautan pilih langsung, didampingi panel informasi reservasi di sisi kiri.
4. **Galeri Karya (`#gallery`)**: Tata letak *Lookbook* dengan header rata kiri-kanan dan bingkai dokumentasi berlabel nomor urut dan judul gaya rambut.
5. **Tim Kapster (`#barbers`)**: Barisan potret vertikal (`aspect-[3/4]`) dengan bingkai emas tipis di bagian dalam dan pintasan reservasi langsung.
6. **Banner Reservasi & Footer**: Panel penutup berbingkai ganda emas yang memfasilitasi pemesanan kursi atau pelacakan jadwal sebelum memasuki struktur informasi footer.
