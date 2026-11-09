# Heritage Grooming: Barbershop Booking & Queue Management System

[![English](https://img.shields.io/badge/Language-English-0f172a?style=for-the-badge)](./README.md)
[![Bahasa Indonesia](https://img.shields.io/badge/Bahasa-Indonesia-amber?style=for-the-badge)](./README.id.md)

> **Read this documentation in English:** [README.md](./README.md)

Aplikasi web reservasi kursi barbershop berbasis **Laravel 12** dan **Tailwind CSS** yang dirancang untuk menggantikan pencatatan antrean manual menjadi sistem penjadwalan terstruktur, bebas bentrok jadwal (*double-booking*), dan terintegrasi langsung dengan konfirmasi WhatsApp.

---

## Latar Belakang Masalah & Solusi

Banyak barbershop masih mengandalkan antrean datang langsung (*walk-in*) atau pencatatan manual melalui chat WhatsApp. Hal ini sering menimbulkan tiga masalah utama:
1. **Pelanggan membuang waktu menunggu di lokasi** karena tidak tahu apakah kapster pilihannya sedang kosong atau penuh.
2. **Jadwal bentrok (*double-booking*)** ketika dua pelanggan memesan kapster dan jam yang sama lewat chat yang belum sempat dibalas admin.
3. **Spam atau reservasi fiktif** yang mengacaukan slot jam operasional harian.

**Heritage Grooming** menyelesaikan masalah tersebut melalui sistem reservasi terpusat:
- Pelanggan dapat melihat daftar layanan, estimasi durasi, tarif transparan, dan profil kapster sebelum memesan kursi.
- Sistem secara otomatis menolak pemesanan pada kapster dan jam yang sudah terisi (*anti-conflict validation*), menolak pemilihan jam yang sudah lewat pada hari yang sama, serta membatasi satu nomor telepon hanya untuk satu reservasi aktif dalam satu waktu.
- Pelanggan dapat melacak status reservasinya (`Pending`, `Konfirmasi`, `Selesai`, `Batal`) secara mandiri tanpa perlu membuat akun.
- Admin mengelola seluruh antrean dari satu *sidebar dashboard* dan dapat mengirimkan pesan konfirmasi atau pembatalan ke WhatsApp pelanggan hanya dengan satu klik.

---

## Fitur Utama

### 1. Portal Pelanggan (Tanpa Perlu Login)
- **Katalog Layanan & Kapster:** Menampilkan daftar layanan lengkap dengan harga, estimasi durasi pengerjaan, galeri hasil cukur, serta profil kapster.
- **Reservasi Kursi Anti-Bentrok:** Formulir pemesanan dengan validasi ketersediaan jadwal kapster, pencegahan pemilihan jam yang sudah terlewat di hari yang sama, dan batasan satu reservasi aktif per nomor WhatsApp.
- **Lacak Status Jadwal Mandiri:** Pelanggan cukup memasukkan nomor WhatsApp di halaman `/cek-status` untuk memantau status reservasi terbaru mereka.
- **Keamanan Form Publik:** Dilengkapi Google reCAPTCHA v2 dan *rate limiting* (`throttle`) untuk mencegah spam bot maupun *brute-force* nomor telepon.

### 2. Panel Operasional Admin
- **Dashboard & Activity Log:** Ringkasan jumlah kapster, layanan aktif, total antrean reservasi, serta riwayat aktivitas admin secara *real-time*.
- **Manajemen Antrean & Integrasi WhatsApp:** Mengubah status reservasi (`Pending` -> `Konfirmasi` -> `Selesai` / `Batal`) sekaligus menghasilkan tautan pesan WhatsApp otomatis berisi detail jadwal pelanggan.
- **Manajemen Data Master (CRUD):**
  - **Kapster:** Tambah, ubah, lihat detail, dan hapus data kapster beserta unggahan foto profil.
  - **Layanan:** Kelola nama layanan, harga, dan durasi pengerjaan (menit).
  - **Galeri Portofolio:** Unggah dan kelola foto hasil potongan rambut (dibatasi maksimal 5 foto utama agar performa halaman tetap ringan).
- **Pengaturan Akun & Keamanan:** Pembaruan profil admin, pergantian kata sandi, penonaktifan registrasi publik, dan URL login tersembunyi (`/panel-rahasia-barbershop/login/masuk`).

---

## Teknologi yang Digunakan

| Kategori | Teknologi |
| :--- | :--- |
| **Backend Framework** | Laravel 12 (PHP 8.2+) |
| **Frontend & Templating** | Blade Templates, Tailwind CSS, Vite |
| **Database** | MySQL / SQLite |
| **Keamanan & Proteksi** | Laravel Breeze Auth, Google reCAPTCHA (`anhskohbo/no-captcha`), Route Rate Limiting |

---

## Cara Mencoba Aplikasi di Lokal

### Prasyarat
Pastikan perangkat Anda sudah terpasang:
- **PHP** >= 8.2
- **Composer**
- **Node.js & NPM**
- **MySQL** (atau SQLite)

### Langkah Instalasi

1. **Clone repositori dan masuk ke direktori proyek**
   ```bash
   git clone <url-repository-anda>
   cd BARBESHOP-BOOKING-SYSTEM
   ```

2. **Instal dependensi PHP dan JavaScript**
   ```bash
   composer install
   npm install
   ```

3. **Salin file konfigurasi `.env` dan buat *application key***
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database & Google reCAPTCHA di `.env`**
   Sesuaikan koneksi database Anda di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=barbeshop_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Untuk pengujian lokal fitur Google reCAPTCHA v2, Anda dapat menggunakan *test keys* resmi dari Google di `.env`:
   ```env
   NOCAPTCHA_SITEKEY=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
   NOCAPTCHA_SECRET=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
   ```

5. **Jalankan migrasi database beserta data awal (*Seeder*)**
   ```bash
   php artisan migrate --seed
   ```

6. **Hubungkan *storage symlink* dan *build* aset frontend**
   ```bash
   php artisan storage:link
   npm run build
   ```

7. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```

---

## Panduan Pengujian (Demo Flow)

Setelah server berjalan di `http://127.0.0.1:8000`, Anda dapat langsung menguji kedua sisi aplikasi:

### A. Menguji sebagai Pelanggan
1. Buka **Halaman Utama**: `http://127.0.0.1:8000`
2. Klik tombol **Reservasi** di navigasi atas atau buka `http://127.0.0.1:8000/booking/create`.
3. Isi nama, nomor WhatsApp (misal: `081234567890`), pilih kapster, layanan, tanggal, serta jam kedatangan, lalu kirim formulir.
4. Buka halaman **Lacak Jadwal**: `http://127.0.0.1:8000/cek-status` dan masukkan nomor `081234567890` untuk melihat status reservasi Anda.

### B. Menguji sebagai Admin
1. Buka URL **Login Admin**:
   ```text
   http://127.0.0.1:8000/panel-rahasia-barbershop/login/masuk
   ```
2. Masuk menggunakan kredensial bawaan hasil *seeder*:
   - **Email:** `admin@barbershop.com`
   - **Password:** `password`
3. Masuk ke menu **Jadwal Reservasi** (`/admin/booking`), ubah status pesanan pelanggan menjadi **Konfirmasi**, lalu klik ikon WhatsApp untuk menguji pembuatan pesan konfirmasi otomatis.

---

## Pengembang

Dikembangkan oleh **Dannys Martha Favrillia** sebagai proyek Rekayasa Perangkat Lunak (RPL) dan portofolio pengembangan aplikasi web *full-stack* Laravel.
