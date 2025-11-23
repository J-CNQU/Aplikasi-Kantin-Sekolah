```
 🍱 Cafeteria Project | Sistem Kantin Digital Sekolah

[![Status Proyek](https://img.shields.io/badge/Status-Development%20in%20Progress-yellow.svg)](https://github.com/J-CNQU/cafeteria)
[![Dibuat dengan](https://img.shields.io/badge/PHP-Native-8892BF)](https://www.php.net/)
[![GitHub stars](https://img.shields.io/github/stars/J-CNQU/cafeteria?style=social)](https://github.com/J-CNQU/cafeteria/stargazers)

Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan lingkungan server lokal Laragon. Proyek ini dirancang sebagai fondasi sistem kantin digital sekolah dengan fokus utama pada fitur autentikasi, sistem menu, dan manajemen pesanan.

Proyek ini masih dalam fase pengembangan aktif dan berencana untuk diperluas ke sistem transaksi penuh dan pengelolaan stok otomatis.

---

 🚀 Fitur Utama & Fungsionalitas

 1. Autentikasi yang Komprehensif
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Login & Signup Manual | ✅ Selesai | Implementasi aman dengan `password_hash()` & `password_verify()`. |
| Login Sosial Media | ✅ Selesai | Terintegrasi penuh dengan Google dan Facebook via HybridAuth v3. |
| Sistem Logout Aman | ✅ Selesai | Menggunakan `session_destroy()` untuk pembersihan sesi yang tuntas. |
| Pemeriksaan Sesi | ✅ Selesai | Pop-up login otomatis muncul jika pengguna belum terautentikasi. |

 2. Menu & Manajemen Pesanan (Dalam Progres)
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Halaman Menu | 🟡 Dalam Progres | Tampilan menu yang dikategorikan berdasarkan jenis makanan (Nasi, Mie, Sate, Bakso). |
| Sistem Cart | 🛒 Struktur Awal | Struktur dasar cart / keranjang pesanan telah disiapkan. |
| Transaksi & Laporan | 💵 Rencana | Rencana integrasi sistem pembayaran, checkout, dan laporan transaksi. |

---

 ⚙️ Teknologi & Tools

| Kategori | Komponen | Keterangan |
| :--- | :--- | :--- |
| Backend | PHP 8+ (Native) | Digunakan untuk logika server-side. |
| Frontend | HTML5, CSS3, JavaScript | Murni Native (Vanilla JS) |
| Database | MySQL | Digunakan untuk penyimpanan data. |
| Server Lokal | Laragon | Lingkungan pengembangan yang direkomendasikan. |
| Library OAuth | HybridAuth v3 | Digunakan untuk mengelola login sosial media. |
| Versi Kontrol | Git + GitHub | |

---

 🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah detail ini untuk menyiapkan dan menjalankan proyek.

 1. Kloning Repositori
Gunakan Git untuk mendapatkan salinan proyek:
```bash
git clone [https://github.com/username/cafeteria.git](https://github.com/username/cafeteria.git)
cd cafeteria

2. Konfigurasi Database
Buka phpMyAdmin pada Laragon Anda.

Buat database baru dengan nama: cafeteria.

Impor skema database dari file: /databases/db.sql.

Baik, ini adalah README.md dengan detail yang kaya dan format yang profesional, mengacu pada panjang dan kedalaman informasi dari versi awal, namun dengan penataan yang lebih terstruktur.

Markdown

 🍱 Cafeteria Project | Sistem Kantin Digital Sekolah

[![Status Proyek](https://img.shields.io/badge/Status-Development%20in%20Progress-yellow.svg)](https://github.com/J-CNQU/cafeteria)
[![Dibuat dengan](https://img.shields.io/badge/PHP-Native-8892BF)](https://www.php.net/)
[![GitHub stars](https://img.shields.io/github/stars/J-CNQU/cafeteria?style=social)](https://github.com/J-CNQU/cafeteria/stargazers)

Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan lingkungan server lokal Laragon. Proyek ini dirancang sebagai fondasi sistem kantin digital sekolah dengan fokus utama pada fitur autentikasi, sistem menu, dan manajemen pesanan.

Proyek ini masih dalam fase pengembangan aktif dan berencana untuk diperluas ke sistem transaksi penuh dan pengelolaan stok otomatis.

---

 🚀 Fitur Utama & Fungsionalitas

 1. Autentikasi yang Komprehensif
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Login & Signup Manual | ✅ Selesai | Implementasi aman dengan `password_hash()` & `password_verify()`. |
| Login Sosial Media | ✅ Selesai | Terintegrasi penuh dengan Google dan Facebook via HybridAuth v3. |
| Sistem Logout Aman | ✅ Selesai | Menggunakan `session_destroy()` untuk pembersihan sesi yang tuntas. |
| Pemeriksaan Sesi | ✅ Selesai | Pop-up login otomatis muncul jika pengguna belum terautentikasi. |

 2. Menu & Manajemen Pesanan (Dalam Progres)
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Halaman Menu | 🟡 Dalam Progres | Tampilan menu yang dikategorikan berdasarkan jenis makanan (Nasi, Mie, Sate, Bakso). |
| Sistem Cart | 🛒 Struktur Awal | Struktur dasar cart / keranjang pesanan telah disiapkan. |
| Transaksi & Laporan | 💵 Rencana | Rencana integrasi sistem pembayaran, checkout, dan laporan transaksi. |

---

 ⚙️ Teknologi & Tools

| Kategori | Komponen | Keterangan |
| :--- | :--- | :--- |
| Backend | PHP 8+ (Native) | Digunakan untuk logika server-side. |
| Frontend | HTML5, CSS3, JavaScript | Murni Native (Vanilla JS) |
| Database | MySQL | Digunakan untuk penyimpanan data. |
| Server Lokal | Laragon | Lingkungan pengembangan yang direkomendasikan. |
| Library OAuth | HybridAuth v3 | Digunakan untuk mengelola login sosial media. |
| Versi Kontrol | Git + GitHub | |

---

 🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah detail ini untuk menyiapkan dan menjalankan proyek.

 1. Kloning Repositori
Gunakan Git untuk mendapatkan salinan proyek:
```bash
git clone [https://github.com/username/cafeteria.git](https://github.com/username/cafeteria.git)
cd cafeteria
2. Konfigurasi Database
Buka phpMyAdmin pada Laragon Anda.

Buat database baru dengan nama: cafeteria.

Impor skema database dari file: /databases/db.sql.

3. Konfigurasi Koneksi Database
Edit file config.php di direktori utama:

PHP

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cafeteria";
?>

Baik, ini adalah README.md dengan detail yang kaya dan format yang profesional, mengacu pada panjang dan kedalaman informasi dari versi awal, namun dengan penataan yang lebih terstruktur.

Markdown

 🍱 Cafeteria Project | Sistem Kantin Digital Sekolah

[![Status Proyek](https://img.shields.io/badge/Status-Development%20in%20Progress-yellow.svg)](https://github.com/J-CNQU/cafeteria)
[![Dibuat dengan](https://img.shields.io/badge/PHP-Native-8892BF)](https://www.php.net/)
[![GitHub stars](https://img.shields.io/github/stars/J-CNQU/cafeteria?style=social)](https://github.com/J-CNQU/cafeteria/stargazers)

Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan lingkungan server lokal Laragon. Proyek ini dirancang sebagai fondasi sistem kantin digital sekolah dengan fokus utama pada fitur autentikasi, sistem menu, dan manajemen pesanan.

Proyek ini masih dalam fase pengembangan aktif dan berencana untuk diperluas ke sistem transaksi penuh dan pengelolaan stok otomatis.

---

 🚀 Fitur Utama & Fungsionalitas

 1. Autentikasi yang Komprehensif
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Login & Signup Manual | ✅ Selesai | Implementasi aman dengan `password_hash()` & `password_verify()`. |
| Login Sosial Media | ✅ Selesai | Terintegrasi penuh dengan Google dan Facebook via HybridAuth v3. |
| Sistem Logout Aman | ✅ Selesai | Menggunakan `session_destroy()` untuk pembersihan sesi yang tuntas. |
| Pemeriksaan Sesi | ✅ Selesai | Pop-up login otomatis muncul jika pengguna belum terautentikasi. |

 2. Menu & Manajemen Pesanan (Dalam Progres)
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Halaman Menu | 🟡 Dalam Progres | Tampilan menu yang dikategorikan berdasarkan jenis makanan (Nasi, Mie, Sate, Bakso). |
| Sistem Cart | 🛒 Struktur Awal | Struktur dasar cart / keranjang pesanan telah disiapkan. |
| Transaksi & Laporan | 💵 Rencana | Rencana integrasi sistem pembayaran, checkout, dan laporan transaksi. |

---

 ⚙️ Teknologi & Tools

| Kategori | Komponen | Keterangan |
| :--- | :--- | :--- |
| Backend | PHP 8+ (Native) | Digunakan untuk logika server-side. |
| Frontend | HTML5, CSS3, JavaScript | Murni Native (Vanilla JS) |
| Database | MySQL | Digunakan untuk penyimpanan data. |
| Server Lokal | Laragon | Lingkungan pengembangan yang direkomendasikan. |
| Library OAuth | HybridAuth v3 | Digunakan untuk mengelola login sosial media. |
| Versi Kontrol | Git + GitHub | |

---

 🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah detail ini untuk menyiapkan dan menjalankan proyek.

 1. Kloning Repositori
Gunakan Git untuk mendapatkan salinan proyek:
```bash
git clone [https://github.com/username/cafeteria.git](https://github.com/username/cafeteria.git)
cd cafeteria
2. Konfigurasi Database
Buka phpMyAdmin pada Laragon Anda.

Buat database baru dengan nama: cafeteria.

Impor skema database dari file: /databases/db.sql.

3. Konfigurasi Koneksi Database
Edit file config.php di direktori utama:

PHP

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cafeteria";
?>
4. Konfigurasi Login Sosial Media (OAuth)
Edit file config_oauth.php untuk memasukkan kredensial aplikasi Anda:

<?php
return [
    'callback' => 'http://localhost/cafeteria/callback.php',
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id' => 'YOUR_GOOGLE_CLIENT_ID',
                'secret' => 'YOUR_GOOGLE_CLIENT_SECRET'
            ],
        ],
        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id' => 'YOUR_FACEBOOK_APP_ID',
                'secret' => 'YOUR_FACEBOOK_APP_SECRET'
            ],
        ],
    ],
];
?>
Perhatian Redirect URL: Pastikan URL Alihan yang Diotorisasi di Konsol Developer Google & Facebook disetel dengan tepat sesuai jalur proyek Laragon Anda:

http://localhost/cafeteria/callback.php?provider=Google

http://localhost/cafeteria/callback-facebook.php?provider=Facebook

Baik, ini adalah README.md dengan detail yang kaya dan format yang profesional, mengacu pada panjang dan kedalaman informasi dari versi awal, namun dengan penataan yang lebih terstruktur.

Markdown

 🍱 Cafeteria Project | Sistem Kantin Digital Sekolah

[![Status Proyek](https://img.shields.io/badge/Status-Development%20in%20Progress-yellow.svg)](https://github.com/J-CNQU/cafeteria)
[![Dibuat dengan](https://img.shields.io/badge/PHP-Native-8892BF)](https://www.php.net/)
[![GitHub stars](https://img.shields.io/github/stars/J-CNQU/cafeteria?style=social)](https://github.com/J-CNQU/cafeteria/stargazers)

Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan lingkungan server lokal Laragon. Proyek ini dirancang sebagai fondasi sistem kantin digital sekolah dengan fokus utama pada fitur autentikasi, sistem menu, dan manajemen pesanan.

Proyek ini masih dalam fase pengembangan aktif dan berencana untuk diperluas ke sistem transaksi penuh dan pengelolaan stok otomatis.

---

 🚀 Fitur Utama & Fungsionalitas

 1. Autentikasi yang Komprehensif
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Login & Signup Manual | ✅ Selesai | Implementasi aman dengan `password_hash()` & `password_verify()`. |
| Login Sosial Media | ✅ Selesai | Terintegrasi penuh dengan Google dan Facebook via HybridAuth v3. |
| Sistem Logout Aman | ✅ Selesai | Menggunakan `session_destroy()` untuk pembersihan sesi yang tuntas. |
| Pemeriksaan Sesi | ✅ Selesai | Pop-up login otomatis muncul jika pengguna belum terautentikasi. |

 2. Menu & Manajemen Pesanan (Dalam Progres)
| Modul | Status | Keterangan |
| :--- | :--- | :--- |
| Halaman Menu | 🟡 Dalam Progres | Tampilan menu yang dikategorikan berdasarkan jenis makanan (Nasi, Mie, Sate, Bakso). |
| Sistem Cart | 🛒 Struktur Awal | Struktur dasar cart / keranjang pesanan telah disiapkan. |
| Transaksi & Laporan | 💵 Rencana | Rencana integrasi sistem pembayaran, checkout, dan laporan transaksi. |

---

 ⚙️ Teknologi & Tools

| Kategori | Komponen | Keterangan |
| :--- | :--- | :--- |
| Backend | PHP 8+ (Native) | Digunakan untuk logika server-side. |
| Frontend | HTML5, CSS3, JavaScript | Murni Native (Vanilla JS) |
| Database | MySQL | Digunakan untuk penyimpanan data. |
| Server Lokal | Laragon | Lingkungan pengembangan yang direkomendasikan. |
| Library OAuth | HybridAuth v3 | Digunakan untuk mengelola login sosial media. |
| Versi Kontrol | Git + GitHub | |

---

 🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah detail ini untuk menyiapkan dan menjalankan proyek.

 1. Kloning Repositori
Gunakan Git untuk mendapatkan salinan proyek:
```bash
git clone [https://github.com/username/cafeteria.git](https://github.com/username/cafeteria.git)
cd cafeteria
2. Konfigurasi Database
Buka phpMyAdmin pada Laragon Anda.

Buat database baru dengan nama: cafeteria.

Impor skema database dari file: /databases/db.sql.

3. Konfigurasi Koneksi Database
Edit file config.php di direktori utama:

PHP

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cafeteria";
?>
4. Konfigurasi Login Sosial Media (OAuth)
Edit file config_oauth.php untuk memasukkan kredensial aplikasi Anda:

PHP

<?php
return [
    'callback' => 'http://localhost/cafeteria/callback.php',
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id' => 'YOUR_GOOGLE_CLIENT_ID',
                'secret' => 'YOUR_GOOGLE_CLIENT_SECRET'
            ],
        ],
        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id' => 'YOUR_FACEBOOK_APP_ID',
                'secret' => 'YOUR_FACEBOOK_APP_SECRET'
            ],
        ],
    ],
];
?>
Perhatian Redirect URL: Pastikan URL Alihan yang Diotorisasi di Konsol Developer Google & Facebook disetel dengan tepat sesuai jalur proyek Laragon Anda:

http://localhost/cafeteria/callback.php?provider=Google

http://localhost/cafeteria/callback-facebook.php?provider=Facebook

5. Menjalankan Aplikasi
Mulai Apache & MySQL di Laragon.

Akses proyek melalui URL: http://localhost/cafeteria

🔑 Akun Login Default (Pengujian)
Email / UsernamePassword
fishicella@gmail.com / user123

🗂️ Struktur Folder & File Proyek
Struktur folder proyek dirancang untuk memisahkan logika utama dengan aset dan modul:

cafeteria/
├── auth_check.php           Pemeriksaan sesi
├── callback.php             Callback untuk Google OAuth
├── config.php               Konfigurasi koneksi database
├── config_oauth.php         Konfigurasi OAuth
├── homepage.php             Halaman utama setelah login
├── index.php                Halaman utama / landing page
├── login.php                Login manual
├── login_google.php         Routing login via Google
├── login_social.php         Routing login sosial media
├── logout.php               Pengelolaan logout
├── orders.php               Halaman pesanan
├── signup.php               Form registrasi
│
├── assets/
│   ├── css/                 Semua file styling (.css)
│   ├── font/                Font kustom
│   ├── homepage/            Aset gambar homepage
│   ├── img/                 Ikon & logo
│   └── js/                  File JavaScript
│
├── cafetaria/               Modul counter/konter pemesanan
├── categories/              Modul kategori menu (rice.php, sate.php, dll)
├── databases/
│   └── db.sql               Skema Database
├── Css-AfterLogin/          Styling untuk tampilan pasca-login
├── Menu-AfterLogin/         Halaman menu pasca-login
├── orderpage/               Halaman detail pesanan
├── helppage/                Halaman bantuan
└── vendor/
    └── hybridauth/          Library OAuth

	🧑‍💻 Struktur Tabel users
id : INT (AI, PK)

Keterangan: ID unik pengguna. Ini adalah Primary Key dan Auto Increment (nilai bertambah otomatis).

email : VARCHAR(255)

Keterangan: Alamat email pengguna.

password : VARCHAR(255)

Keterangan: Password pengguna yang sudah dienkripsi.

name : VARCHAR(100)

Keterangan: Nama lengkap pengguna.

created_at : DATETIME

Keterangan: Tanggal dan waktu registrasi pengguna.

 🍜 Cafeteria Ordering System (Web PHP Native)

Sistem pemesanan makanan/minuman berbasis web yang dikembangkan menggunakan PHP Native.

 🚀 Fitur Utama & Alur Aplikasi

 🔄 Alur Penggunaan Singkat

1.  Akses: Pengguna mengakses halaman utama (`index.php`).
2.  Otentikasi: Jika belum login, muncul pop-up Login/Sign-up.
3.  Halaman Utama: Setelah login, pengguna diarahkan ke `homepage.php`.
4.  Pemesanan: Pengguna dapat memilih kategori menu (Nasi, Mie, Bakso, dll.).
5.  Checkout (Tahap Selanjutnya): Sistem saat ini menyiapkan logika untuk penambahan ke keranjang, penghitungan total, dan checkout.
6.  Logout: Proses logout akan menghapus sesi dan mengembalikan pengguna ke halaman utama.

 🌐 Detail Integrasi Login Sosial Media (OAuth)

Proyek ini menggunakan HybridAuth untuk mengelola proses OAuth. Log otorisasi tersimpan otomatis di `hybridauth.log`.

| Provider | File Konfigurasi | Redirect URL |
| :--- | :--- | :--- |
| Google | `config_oauth.php` | `http://localhost/cafeteria/callback.php?provider=Google` |
| Facebook | `config_oauth.php` | `http://localhost/cafeteria/callback-facebook.php?provider=Facebook` |

> Catatan Kegagalan Login Sosial Media: Jika proses otorisasi gagal, pastikan `callback.php` dan `config_oauth.php` sesuai dengan path lingkungan Anda (misalnya Laragon), dan URL Pengalihan di Konsol Developer sudah diverifikasi dan benar.

 🗄️ Struktur Database (Rencana Pengembangan Lanjutan)

Berikut adalah tabel yang direncanakan untuk pengembangan sistem lebih lanjut:

 `menu`: Daftar makanan/minuman yang tersedia.
 `orders`: Data pesanan utama pengguna (misalnya ID pengguna, tanggal pesan, total).
 `order_items`: Rincian isi dari setiap pesanan.
 `transactions`: Pencatatan riwayat transaksi dan pembayaran.
 `stok_log`: Log atau riwayat perubahan stok produk.

 🧭 Roadmap Pengembangan Selanjutnya

Kami merencanakan fitur-fitur berikut untuk iterasi berikutnya:

 Keranjang Pesanan Dinamis: Implementasi sistem keranjang pesanan berbasis session yang fungsional.
 Admin Panel: Pembuatan dashboard admin untuk manajemen menu dan pemrosesan pesanan.
 Pembayaran Simulasi: Implementasi alur pembayaran dan konfirmasi.
 Notifikasi: Penambahan fitur notifikasi status pesanan (misalnya: Pesanan diterima, Sedang diproses).
 Optimasi: Peningkatan responsifitas tampilan di perangkat mobile.

**Tim Kontributor dan Pembagian Tugas**
Juan Felix Katoro (Fullstack Developer)

Fokus Tugas: Pengembangan Back-end (PHP/MySQL), Logika Autentikasi, Struktur Database, dan Front-end Pendukung.

Britannia (Front-end Engineer)

Fokus Tugas: Implementasi Design dan Pengembangan Front-end (HTML, CSS, JavaScript), termasuk responsivitas dan interaktivitas UI.

Ethan (UI/UX Designer)

Fokus Tugas: Perancangan User Interface dan User Experience (Design Proyek), dan Implementasi Front-end Desain.

```
