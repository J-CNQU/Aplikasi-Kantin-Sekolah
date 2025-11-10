```
🍱 Cafeteria Project (UnFixed)

Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan Laragon.
Proyek ini dirancang sebagai sistem kantin digital sekolah dengan fitur autentikasi lengkap (manual dan sosial media), sistem menu, serta manajemen pesanan sederhana.

Proyek masih dalam pengembangan aktif dan terus diperluas ke arah sistem transaksi dan pengelolaan stok otomatis.

🚀 Fitur Utama
🧩 Autentikasi

✅ Login dan Signup Manual dengan password_hash() & password_verify()

✅ Login Menggunakan Google dan Facebook via HybridAuth

✅ Sistem Logout Aman dengan session destroy

✅ Pop-up login otomatis jika user belum login

🍔 Menu & Pesanan (Under Development)

🧾 Halaman Menu berdasarkan kategori (Nasi, Mie, Sate, Bakso)

🛒 Struktur awal sistem cart / keranjang pesanan

💵 Rencana integrasi sistem pembayaran & laporan transaksi

⚙️ Teknologi & Tools

Frontend: HTML5, CSS3, JavaScript (Native)

Backend: PHP 8+

Database: MySQL

Server Lokal: Laragon

OAuth Library: HybridAuth v3

Version Control: Git + GitHub

⚙️ Cara Instalasi

Clone repository

git clone https://github.com/username/cafeteria.git
cd cafeteria


Buat database di phpMyAdmin

Nama database: cafeteria

Import file SQL dari folder:

/Databases/db.sql


Konfigurasi koneksi database
Edit file config.php:

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cafeteria";
?>


Konfigurasi Login Google & Facebook (OAuth)
Edit file config_oauth.php:

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


Pastikan Authorized Redirect URL di Google & Facebook Developer Console sesuai:

http://localhost/cafeteria/callback.php?provider=Google
http://localhost/cafeteria/callback-facebook.php?provider=Facebook


Jalankan project via Laragon

Start Apache & MySQL

Buka http://localhost/cafeteria

🔑 Akun Login Default (Testing)
Email / Username	Password
fishicella@gmail.co
	user123
🗂️ Struktur Folder & File
cafeteria/
├── auth_check.php
├── callback.php                        # Callback untuk Google OAuth
├── composer.json
├── composer.lock
├── config.php                          # Konfigurasi koneksi database
├── config_oauth.php                    # Konfigurasi OAuth (Google)
├── fcon.png
├── hash.php                            # Proses hashing password
├── homepage.php
├── hybridauth.log
├── hybridauth_config.php               # Config tambahan HybridAuth
├── index.php                           # Halaman utama / landing page
├── login.php                           # Login manual
├── login_google.php                    # Login via Google
├── login_social.php                    # Routing login sosial media
├── logout.php                          # Logout session
├── orders.php
├── signup.php                          # Form signup
├── README.md                           # Dokumentasi project
│
├── assets/
│   ├── css/
│   │   ├── footer.css
│   │   ├── homepage.css
│   │   ├── login.css
│   │   ├── pop-up.css
│   │   ├── signup.css
│   │   ├── style-index.css
│   │   └── style.css
│   │
│   ├── font/
│   │   └── Cocogoose-Pro-Bold-trial.ttf
│   │
│   ├── homepage/
│   │   ├── slideshow-1.png
│   │   ├── slideshow-2.png
│   │   ├── slideshow-3.png
│   │   ├── iklan help.png
│   │   ├── fried rice.jpeg
│   │   ├── hainam.jpeg
│   │   └── categories/
│   │       ├── 1.png
│   │       ├── 2.png
│   │       ├── 3.png
│   │       ├── 4.png
│   │       └── 5.png
│   │
│   ├── img/
│   │   ├── facebook.png
│   │   ├── google.png
│   │   ├── keranjang.png
│   │   ├── logo.png
│   │   └── x.png
│   │
│   └── js/
│       ├── index.js
│       └── slideshow.js
│
├── cafetaria/
│   ├── counter1.php
│   ├── counter2.php
│   ├── counter3.php
│   ├── counter4.php
│   ├── counter.js
│   ├── counter.css
│   └── logo.png
│
├── categories/
│   ├── bakso.php
│   ├── noodles.php
│   ├── rice.php
│   ├── sate.php
│   ├── counter.js
│   └── counter.css
│
├── databases/
│   └── db.sql
│
├── Css-AfterLogin/
│   └── Counter-1.css
│
├── Menu-AfterLogin/
│   └── Counter-1.php
│
├── orderpage/
│   └── orderpage.php
│
├── helppage/
│   ├── help.php
│   └── help.css
│
├── php/
│   └── counter.php
│
└── vendor/
    └── hybridauth/                    # Library untuk login sosial media

🧮 Struktur Database (db.sql)
Tabel users
Kolom	Tipe	Keterangan
id	INT (AI, PK)	ID unik user
email	VARCHAR(255)	Email pengguna
password	VARCHAR(255)	Password terenkripsi
name	VARCHAR(100)	Nama pengguna
created_at	DATETIME	Tanggal registrasi
Tabel Rencana (akan dikembangkan)

menu – daftar makanan/minuman

orders – data pesanan user

order_items – rincian isi pesanan

transactions – pencatatan transaksi

stok_log – log perubahan stok produk

🔄 Alur Aplikasi

User membuka halaman utama (index.php)

Jika belum login → muncul pop-up login/signup

Setelah login → diarahkan ke homepage.php

User dapat memilih kategori (Nasi, Mie, Bakso, dll)

Sistem menyiapkan struktur untuk:

menambah ke keranjang,

menghitung total pesanan,

dan checkout (belum aktif)

Logout akan menghapus session dan mengembalikan ke halaman utama.

🌐 Integrasi Login Sosial Media
🔹 Login dengan Google

Menggunakan HybridAuth Provider Google.php

Memerlukan Client ID dan Client Secret

Redirect ke:
http://localhost/cafeteria/callback.php?provider=Google

🔹 Login dengan Facebook

Menggunakan HybridAuth Provider Facebook.php

Memerlukan App ID dan App Secret

Redirect ke:
http://localhost/cafeteria/callback-facebook.php?provider=Facebook

Semua log proses tersimpan otomatis di file hybridauth.log

🧑‍💻 Author

Juan Felix Katoro
📧 Email: jferxiic@gmail.com

💻 GitHub: J-CNQU

📊 Status Proyek
Komponen	Status	Catatan
Login & Signup Manual	✅ Selesai	Aman & stabil
OAuth Google & Facebook	✅ Selesai	Gunakan config_oauth.php
Homepage & Menu	🟡 Dalam Progres	Struktur sudah tersedia
Pesanan & Checkout	🔴 Belum Dimulai	Akan menggunakan session cart
Dashboard User	🟡 Prototipe	Dalam perancangan UI
Sistem Transaksi	🔴 Belum tersedia	Akan ditambahkan ke MySQL
🧭 Rencana Update Selanjutnya

🔜 Tambah sistem keranjang pesanan dinamis

🔜 Buat admin panel untuk mengatur menu & pesanan

🔜 Implementasi pembayaran simulasi

🔜 Tambah fitur notifikasi pesanan

🔜 Optimasi responsif di mobile

⚠️ Catatan

Jika login sosial media gagal, pastikan:

callback.php & config_oauth.php sesuai path di Laragon

Redirect URL di Google & Facebook Developer Console sudah benar

Apache dan MySQL aktif di Laragon

Folder vendor/ lengkap dan composer install sudah dijalankan

🏁 Kesimpulan

Cafeteria Project adalah pondasi sistem kantin digital berbasis PHP yang kuat,
dengan sistem autentikasi ganda (manual dan sosial media),
rencana ekspansi ke sistem transaksi, dan desain struktur folder profesional.
💻 GitHub: Juan Felix
```
