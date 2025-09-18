```

Cafeteria Project

Aplikasi web sederhana berbasis PHP dan MySQL yang dikembangkan menggunakan Laragon.  
Saat ini project fokus pada sistem autentikasi (login & signup) dengan keamanan dasar menggunakan `password_hash()` dan `password_verify()`.  
Fitur manajemen pesanan & menu masih dalam tahap pengembangan.

Fitur

- Sistem **signup** dengan password hashing
- Sistem **login** dengan validasi user
- Sistem **logout** untuk mengakhiri sesi user
- Proteksi halaman tertentu → user harus login terlebih dahulu
- Struktur database awal dengan tabel `users`, serta rancangan tabel lain (orders, menu, transaksi, dll)

Instalasi

1. Clone repository ini
   ```bash
   git clone https://github.com/username/cafeteria.git
   cd cafeteria
   Buat database di phpMyAdmin

Nama database: cafeteria

Import file SQL yang ada di folder /databases

Konfigurasi koneksi database
Edit file config.php:
$host = "localhost";
$user = "root";
$pass = "";
$db = "cafeteria";
Jalankan project di browser melalui Laragon

Akun Login Default
Akun Testing :

Username: fishicella@gmail.co
Password: user123

Struktur Folder & File
cafeteria/
├── assets/ # File pendukung frontend
│ ├── css/ # File CSS (login, signup, index, pop-up)
│ ├── font/ # Font (cocogoose.etf)
│ ├── homepage/ # Gambar untuk halaman homepage
│ ├── img/ # Logo dan ikon sosial media
│ └── js/ # Script JS (index, masih tahap pengembangan)
│
├── databases/ # File SQL untuk create database & tabel
│ └── db.sql
│
├── includes/ # (Rencana: function/helper PHP)
│
├── config.php # Koneksi ke database
├── dashboard.php # Dashboard default (belum digunakan penuh)
├── dashboard_user.php # Dashboard untuk user
├── dashboard_admin.php # Dashboard admin (tidak digunakan lagi)
├── hash.php # File hashing password
├── index.php # Landing page (sementara redirect ke login/signup)
├── index-login.php # Rencana dashboard setelah login
├── login.php # Proses login
├── logout.php # Proses logout
├── pop-up.php # Pop-up: user harus login/signup
├── signup.php # Registrasi akun user

Struktur Database (sementara)
users → menyimpan akun user (aktif digunakan)
menu → rencana daftar menu makanan/minuman
orders, order_items, pesanan, detail_pesanan → rencana sistem pesanan
products, stok_log → rencana manajemen produk & stok
transaksi → rencana pencatatan transaksi
Saat ini hanya tabel users yang aktif berfungsi.

Flow Aplikasi
User membuka aplikasi → diarahkan ke signup/login

Jika signup → password otomatis di-hash sebelum masuk ke database
Jika login sukses → diarahkan ke dashboard_user
Jika belum login → akses halaman lain akan diarahkan ke pop-up

User bisa logout untuk mengakhiri sesi

Author
Juan Felix Katoro

📧 Email: jferxiic@gmail.com

💻 GitHub: @jferxiic
```
