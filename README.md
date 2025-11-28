🍱 Cafeteria Project | Sistem Kantin Digital Sekolah
Aplikasi web berbasis PHP Native dan MySQL, dikembangkan menggunakan lingkungan server lokal Laragon. Proyek ini dirancang sebagai fondasi sistem kantin digital sekolah dengan fokus utama pada fitur autentikasi, sistem menu, dan manajemen pesanan.

Proyek ini masih dalam fase pengembangan aktif dan berencana untuk diperluas ke sistem transaksi penuh dan pengelolaan stok otomatis.

🚀 Fitur Utama & Fungsionalitas
Autentikasi yang Komprehensif
1. Login & Signup Manual — Selesai (✅)
Menggunakan password_hash() dan password_verify() untuk keamanan maksimal.
Proses registrasi dan login berjalan normal tanpa error.

2. Login Sosial Media — Selesai (✅)
Terintegrasi sepenuhnya dengan Google dan Facebook.
Menggunakan HybridAuth v3 untuk autentikasi pihak ketiga.

3. Sistem Logout Aman — Selesai (✅)
Implementasi menggunakan session_destroy().
Semua sesi dibersihkan dengan tepat untuk mencegah penyalahgunaan.

4. Pemeriksaan Sesi — Selesai (✅
Pop-up login otomatis muncul jika pengguna belum terautentikasi.
Memastikan halaman hanya bisa diakses setelah user login.

🍛 Menu & Manajemen Pesanan (Dalam Progres)
• Halaman Menu — 🟡 Dalam Progres
Tampilan menu dengan kategori: Nasi, Mie, Sate, Bakso.
• Sistem Cart — 🛒 Struktur Awal
Kerangka dasar keranjang pesanan sudah dibuat.
• Transaksi & Laporan — 💵 Rencana
Rencana integrasi pembayaran, checkout, dan laporan transaksi.

⚙️ Teknologi & Tools
• Backend
PHP 8+ (Native)
Digunakan untuk logika server-side.

• Frontend
HTML5, CSS3, JavaScript
Murni Native (Vanilla JS), tanpa framework.

• Database
MySQL
Sebagai penyimpanan data utama.

• Server Lokal
Laragon
Lingkungan pengembangan yang direkomendasikan.

• Library OAuth
HybridAuth v3
Digunakan untuk login sosial media (Google & Facebook).

• Version Control
Git + GitHub
Untuk manajemen versi dan kolaborasi.

🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menyiapkan dan menjalankan proyek di lingkungan lokal.

1. Kloning Repositori

Jalankan perintah berikut:
git clone https://github.com/username/cafeteria.git
cd cafeteria

2. Konfigurasi Database
Buka phpMyAdmin pada Laragon.
Buat database baru dengan nama: cafeteria
Impor file skema database:
/databases/db.sql

3. Konfigurasi Koneksi Database

Edit file config.php di direktori utama:

<?php
$host = "localhost";
$user = "root";
$pass = ""; // Sesuaikan jika Anda menggunakan password
$db   = "cafeteria";
?>

4. Konfigurasi Login Sosial Media (OAuth)

Edit file config_oauth.php untuk memasukkan kredensial aplikasi Anda:
```
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
    ],
];
?>
```
Pastikan Redirect URL sesuai dengan pengaturan OAuth Anda, contoh:

http://localhost/cafeteria/callback.php?provider=Google
http://localhost/cafeteria/callback-facebook.php?provider=Facebook

5. Menjalankan Aplikasi
Jalankan Apache & MySQL melalui Laragon.
Akses aplikasi melalui URL:
http://localhost/cafeteria
```
🗂️ Struktur Folder & File Proyek
Struktur folder proyek dirancang untuk memisahkan logika utama dengan aset dan modul:
│   .env
│   .env.example
│   .gitignore
│   auth_check.php
│   callback.php
│   composer.json
│   composer.lock
│   config.php
│   config_oauth.php
│   fcon.png
│   hash.php
│   homepage.php
│   hybridauth.log
│   index.php
│   login.php
│   login_google.php
│   logout.php
│   orders.js
│   orders.php
│   README.md
│   save_order.php
│   signup.php
│   slideshow.js
│   struktur.txt
│
├───Api
│       index.php
│
├───assets
│   ├───css
│   │       footer.css
│   │       homepage.css
│   │       login.css
│   │       orders.css
│   │       pop-up.css
│   │       signup.css
│   │       style-index.css
│   │       style.css
│   │
│   ├───font
│   │       Cocogoose-Pro-Bold-trial.ttf
│   │
│   ├───homepage
│   │   │   apple.png
│   │   │   counter 1.png
│   │   │   counter 2.png
│   │   │   counter 3.png
│   │   │   counter 4.png
│   │   │   fried rice.jpeg
│   │   │   google.svg
│   │   │   hainam.jpeg
│   │   │   iklan help.png
│   │   │   iklan kecil 2.png
│   │   │   iklan kecil.png
│   │   │   mie ayam spesial bakso.jpeg
│   │   │   nasi padang.jpeg
│   │   │   slideshow-1.png
│   │   │   slideshow-2.png
│   │   │   slideshow-3.png
│   │   │   udon.jpeg
│   │   │
│   │   └───categories
│   │           1.png
│   │           2.png
│   │           3.png
│   │           4.png
│   │           5.png
│   │
│   ├───img
│   │       facebook.png
│   │       fcon.png
│   │       google.png
│   │       keranjang.png
│   │       logo-copy.png
│   │       logo.png
│   │       x.png
│   │
│   └───js
│           counter.js
│           index.js
│           orders.js
│           popup.js
│
├───cafetaria
│   │   counter-2.css
│   │   counter-3.css
│   │   counter-4.css
│   │   counter.js
│   │   counter1.css
│   │   counter1.php
│   │   counter2.php
│   │   counter3.php
│   │   counter4.php
│   │   logo.png
│   │
│   ├───counter 1
│   │       1. ayam geprek.png
│   │       1. nasi bakar.png
│   │       1. nasi goreng.png
│   │       1. nasi hainam.png
│   │       1. nasi kuning.png
│   │       1. nasi liwet.png
│   │       1. nasi padang B.png
│   │       1. nasi padang.png
│   │       1. nasi uduk.png
│   │       iklan counter 1.png
│   │       iklan counter 2.png
│   │       iklan counter 3.png
│   │       iklan counter 4.png
│   │
│   ├───counter 2
│   │       2.bakmie-biasa.png
│   │       2.bakmie-spesial-bakso.png
│   │       2.fettuccine.png
│   │       2.kwetiau-biasa.png
│   │       2.pesto-pasta.png
│   │       2.spaghetti-bolognese.png
│   │       2.udon-beef.png
│   │       2.udon-chicken-curry.png
│   │       iklan counter 2.png
│   │       kwetiau-seafood.png
│   │
│   ├───Counter 3
│   │       3.ayam-cabe-garam.png
│   │       3.bibimbap.png
│   │       3.chicken-katsu.png
│   │       3.chicken-teriyaki.png
│   │       3.gyudon.png
│   │       3.oyakodon.png
│   │       iklan counter 3.png
│   │
│   ├───Counter 4
│   │       4.bakso-biasa.png
│   │       4.bakso-komplit.png
│   │       4.bakso-urat.png
│   │       4.gado-gado.png
│   │       4.sate-ayam.png
│   │       4.sate-kambing.png
│   │       iklan counter 4.png
│   │
│   ├───descriptions
│   │   │   descriptions.css
│   │   │   descriptions.js
│   │   │
│   │   └───counter1
│   │           ayamgeprek.php
│   │           nasigoreng.php
│   │           nasihainam.php
│   │           nasiuduk.php
│   │
│   ├───icons
│   │       arrow-left.png
│   │       arrow-right.png
│   │       cart.png
│   │       minus.png
│   │       person.png
│   │       plus.png
│   │       search.png
│   │       
│   ├───logo deskripsi
│   │       arrow_abu2right.png
│   │       arrow_red.png
│   │       profile.png
│   │       star.png
│   │
│   ├───logo per counter
│   │       1.png
│   │       2.png
│   │       3.png
│   │       4.png
│   │
│   └───logo2 footer
│           apple.png
│           facebook.png
│           instagram.png
│           playstore.png
│           twitter.png
│           youtube.png
│
├───categories
│       bakso.php
│       counter.css
│       counter.js
│       noodles.php
│       rice.php
│       sate.php
│
├───Css-AfterLogin
│       Counter-1.css
│
├───Databases
│       db.sql
│
├───deskripsi
│       deskripsi.php
│
├───git-filter-repo
│   │   .gitattributes
│   │   .gitignore
│   │   COPYING
│   │   COPYING.gpl
│   │   COPYING.mit
│   │   git-filter-repo
│   │   git_filter_repo.py
│   │   INSTALL.md
│   │   Makefile
│   │   pyproject.toml
│   │   README.md
│   │
│   ├───.github
│   │   │   dependabot.yml
│   │   │
│   │   └───workflows
│   │           test.yml
│   │
│   ├───contrib
│   │   └───filter-repo-demos
│   │           barebones-example
│   │           bfg-ish
│   │           clean-ignore
│   │           convert-svnexternals
│   │           filter-branch-ish
│   │           filter-lamely
│   │           insert-beginning
│   │           lint-history
│   │           README.md
│   │           signed-off-by
│   │
│   ├───Documentation
│   │       Contributing.md
│   │       converting-from-bfg-repo-cleaner.md
│   │       converting-from-filter-branch.md
│   │       examples-from-user-filed-issues.md
│   │       FAQ.md
│   │       git-filter-repo.txt
│   │
│   └───t
│       │   run_coverage
│       │   run_tests
│       │   t9390-filter-repo-basics.sh
│       │   t9391-filter-repo-lib-usage.sh
│       │   t9392-filter-repo-python-callback.sh
│       │   t9393-filter-repo-rerun.sh
│       │   t9394-filter-repo-sanity-checks-and-bigger-repo-setup.sh
│       │   test-lib-functions.sh
│       │   test-lib.sh
│       │
│       ├───t9390
│       │       basic
│       │       basic-filename
│       │       basic-mailmap
│       │       basic-message
│       │       basic-numbers
│       │       basic-replace
│       │       basic-ten
│       │       basic-twenty
│       │       degenerate
│       │       degenerate-evil-merge
│       │       degenerate-globme
│       │       degenerate-keepme
│       │       degenerate-keepme-noff
│       │       degenerate-moduleA
│       │       empty
│       │       empty-keepme
│       │       less-empty-keepme
│       │       more-empty-keepme
│       │       sample-mailmap
│       │       sample-message
│       │       sample-replace
│       │       unusual
│       │       unusual-filtered
│       │       unusual-mailmap
│       │
│       ├───t9391
│       │       commit_info.py
│       │       create_fast_export_output.py
│       │       emoji-repo
│       │       erroneous.py
│       │       file_filter.py
│       │       print_progress.py
│       │       rename-master-to-develop.py
│       │       splice_repos.py
│       │       strip-cvs-keywords.py
│       │       unusual.py
│       │
│       ├───t9393
│       │       lfs
│       │       simple
│       │
│       └───t9394
│               date-order
│
├───helppage
│       help.css
│       help.php
│
├───logo2 footer
│       apple.png
│       Counter-1.js
│       facebook.png
│       instagram.png
│       playstore.png
│       twitter.png
│       youtube.png
│
├───php
│       counter.php
│
└───vendor
    │   autoload.php
```
🧑‍💻 Struktur Tabel users

Berikut adalah struktur tabel utama untuk data pengguna:

• id — INT (AUTO_INCREMENT, PRIMARY KEY)
ID unik pengguna.

• email — VARCHAR(255)
Alamat email pengguna.

• password — VARCHAR(255)
Password terenkripsi menggunakan password_hash().

• name — VARCHAR(100)
Nama lengkap pengguna.

• created_at — DATETIME
Tanggal dan waktu registrasi.

🧭 Roadmap Pengembangan Selanjutnya
Kami merencanakan fitur-fitur berikut untuk iterasi berikutnya:

Keranjang Pesanan Dinamis: Implementasi sistem keranjang pesanan berbasis session yang fungsional.

Admin Panel: Pembuatan dashboard admin untuk manajemen menu dan pemrosesan pesanan.

Pembayaran Simulasi: Implementasi alur pembayaran dan konfirmasi.

Notifikasi: Penambahan fitur notifikasi status pesanan (misalnya: Pesanan diterima, Sedang diproses).

Optimasi: Peningkatan responsifitas tampilan di perangkat mobile.

👤 Tim Kontributor dan Pembagian Tugas
Juan Felix Katoro (Fullstack Developer)

Fokus Tugas: Pengembangan Back-end (PHP/MySQL), Logika Autentikasi, Struktur Database, dan Front-end Pendukung.

Britannia (Front-end Engineer)

Fokus Tugas: Implementasi Desain dan Pengembangan Front-end (HTML, CSS, JavaScript), termasuk responsivitas dan interaktivitas UI.

Ethan (UI/UX Designer)

Fokus Tugas: Perancangan User Interface dan User Experience (Desain Proyek), dan Implementasi Front-end Desain.
