<?php
// PHP Block: Logika Data & Session
// =======================================================
session_start();

// Pastikan path ke config.php benar (Asumsi: dari /cafetaria/ naik ke /UnFixed/)
include("../config.php");

$userRole = $_SESSION['role'] ?? null;
$isLoggedIn = isset($_SESSION['id']) ? 'true' : 'false';

$category_filter = 'Counter 1'; // Filter menu yang akan ditampilkan
$dynamic_menus = [];
$error_message = "";

// Ambil menu dinamis dari database (Ambil kolom ID juga)
$sql = "SELECT id, name, price, description, image 
        FROM menu 
        WHERE category = ? AND is_available = TRUE 
        ORDER BY name";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category_filter);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dynamic_menus = $result->fetch_all(MYSQLI_ASSOC);
    }
    $stmt->close();
} catch (Exception $e) {
    $error_message = "❌ Gagal memuat menu dari database: " . $e->getMessage();
}

$conn->close(); // Tutup koneksi setelah selesai mengambil data

// --- DEFINISI MENU STATIS SEBAGAI ARRAY PHP ---
// PERBAIKAN: Tambahkan ID unik negatif untuk menu statis
$static_menus = [
    [
        'id' => -1,
        'name' => 'Nasi Goreng Spesial',
        'price' => 15000,
        'description' => 'Nasi Goreng Spesial khas CafeTaria, gurih-manis pedas yang nikmat dan bikin nagih.',
        'image' => 'counter 1/1. nasi goreng.png'
    ],
    [
        'id' => -2,
        'name' => 'Nasi Hainam',
        'price' => 25000,
        'description' => 'Nasi harum lembut dengan ayam gurih, kaya rasa oriental yang menenangkan.',
        'image' => 'counter 1/1. nasi hainam.png'
    ],
    [
        'id' => -3,
        'name' => 'Nasi Padang A',
        'price' => 27000,
        'description' => 'Nasi hangat dengan lauk bumbu rempah Minang, rendang, sayur ubi, sambal khas, ayam dengan bakwan.',
        'image' => 'counter 1/1. nasi padang.png'
    ],
    [
        'id' => -4,
        'name' => 'Nasi Uduk',
        'price' => 22000,
        'description' => 'Nasi uduk dimasak dengan santan dan rempah, dihidangkan bersama ayam serondeng, telur, bihun, dan tahu.',
        'image' => 'counter 1/1. nasi uduk.png'
    ],
    [
        'id' => -5,
        'name' => 'Nasi Kuning',
        'price' => 19000,
        'description' => 'Nasi kuning dihidangkan bersama ayam goreng, tempe orek, telur, dan sambal bawang.',
        'image' => 'counter 1/1. nasi kuning.png'
    ],
    [
        'id' => -6,
        'name' => 'Nasi Padang B',
        'price' => 20000,
        'description' => 'Nasi hangat dengan lauk bumbu rempah Minang, rendang, telur, sambal hijau, sayur ubi, dan perkedel.',
        'image' => 'counter 1/1. nasi padang B.png'
    ],
    [
        'id' => -7,
        'name' => 'Nasi Liwet',
        'price' => 19000,
        'description' => 'Nasi liwet dimasak dengan santan dan ikan teri, menghadirkan rasa gurih khas tradisional.',
        'image' => 'counter 1/1. nasi liwet.png'
    ],
    [
        'id' => -8,
        'name' => 'Nasi Bakar',
        'price' => 17000,
        'description' => 'Nasi bakar dibungkus daun pisang, dipanggang hingga wangi, berisi ayam rempah.',
        'image' => 'counter 1/1. nasi bakar.png'
    ],
    [
        'id' => -9,
        'name' => 'Nasi Ayam Geprek',
        'price' => 18000,
        'description' => 'Nasi panas dengan ayam goreng yang digeprek dan sambal pedas khas CafeTaria.',
        'image' => 'counter 1/1. ayam geprek.png'
    ]
];

// Gabungkan menu dinamis dan statis
$all_menus = array_merge($dynamic_menus, $static_menus);

// Urutkan semua menu berdasarkan nama agar terlihat lebih rapi
usort($all_menus, function ($a, $b) {
    return strcmp($a['name'], $b['name']);
});
// =======================================================
// END PHP Block
// =======================================================
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cafeteria Sekolah - Counter</title>
    <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">
    <link rel="stylesheet" href="./counter1.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="site-bg">
    <nav class="navbar">
        <div class="logo">
            <img src="/cafetaria/../assets/img/logo-copy.png" class="logo" alt="Logo">
            <span>CafeTaria</span>
        </div>

        <ul class="nav-links">
            <li><a href="../../homepage.php" class="btns">Home</a></li>
            <li><a href="../php/counter.php" class="active">Menu</a></li>
            <li><a href="../orders/orders.php" class="btns">Orders</a></li>
            <li><a href="../helppage/help.php" class="btns">Helps</a></li>
        </ul>

        <div class="nav-icons">
            <?php
            if ($isLoggedIn === 'true') {
              $user_icon_url = ($userRole === 'admin') ? 'counter1.php' : 'homepage.php';
              $user_icon = ($userRole === 'admin') ? 'fas fa-user-shield' : 'fas fa-user';
            } else {
              $user_icon_url = 'login.php';
              $user_icon = 'fas fa-user';
            }
            $show_cart = ($isLoggedIn === 'true' && $userRole !== 'admin');
            ?>

            <a href="#" id="search-icon" title="Pencarian Cepat">
              <i class="fas fa-search"></i>
            </a>

            <a href="#" id="user-icon" title="Profil Pengguna/Admin">
              <i class="<?php echo htmlspecialchars($user_icon); ?>"></i>
            </a>
            <?php if ($show_cart): ?>
                <a href="../orders/orders.php" title="Lihat Keranjang Belanja">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <div id="search-modal">
        <input type="search" placeholder="Cari menu, counter, atau kategori..." />
        <button id="f" type="button">Cari</button>
    </div>

    <div id="user-dropdown">
        <?php if ($isLoggedIn === 'true'): ?>
            <p>Halo, <?= htmlspecialchars($_SESSION['name']) ?></p>
            <hr>
            <a href="<?php echo htmlspecialchars($user_icon_url); ?>">Dashboard / Profil</a>
            <hr>
            <a href="../acc/logout.php">Logout</a>
        <?php else: ?>
            <a href="../acc/login.php">Login</a>
            <hr>
            <a href="../acc/signup.php">Sign Up</a>
        <?php endif; ?>
    </div>
    </nav>

    <section class="counters">
        <div class="counter-content">
            <div class="counter-background">
                <img src="/cafetaria/counter 1/iklan counter 1.png" alt="counter 1">
            </div>

            <img src="/cafetaria/logo per counter/1.png" alt="counter 1" class="counter-logo">

            <div class="counter-selection">
                <a href="../php/counter.php?id=1" class="counter-item active">
                    Counter <span class="number">1</span>
                </a>
                <a href="../php/counter.php?id=2" class="counter-item">
                    Counter <span class="number">2</span>
                </a>
                <a href="../php/counter.php?id=3" class="counter-item">
                    Counter <span class="number">3</span>
                </a>
                <a href="../php/counter.php?id=4" class="counter-item">
                    Counter <span class="number">4</span>
                </a>
            </div>
        </div>
    </section>

    <section class="menus">
        <h1 class="h1">Menu</h1>
        <div class="menu-grid">

            <?php if (!empty($error_message)): ?>
                <p style="grid-column: 1 / -1; color: red; text-align: center;"><?php echo $error_message; ?></p>
            <?php elseif (!empty($all_menus)): ?>
                <?php foreach ($all_menus as $menu_item): ?>

                    <?php
                    // Membuat slug/ID menu untuk atribut data-menu
                    $menu_slug = strtolower(str_replace(' ', '-', $menu_item['name']));
                    ?>

                    <div class="list-menu" data-menu="<?php echo $menu_slug; ?>"
                        data-name="<?php echo htmlspecialchars($menu_item['name']); ?>"
                        data-price="<?php echo htmlspecialchars($menu_item['price']); ?>">

                        <div class="menu-info">
                            <h3 class="menu-title"><?php echo htmlspecialchars($menu_item['name']); ?></h3>

                            <p class="menu-desc">
                                <?php echo htmlspecialchars($menu_item['description'] ?? 'Deskripsi belum tersedia.'); ?>
                            </p>

                            <div class="menu-button">
                                <span class="menu-price">Rp<?php echo number_format($menu_item['price'], 0, ',', '.'); ?></span>

                                <div class="menu-qty">
                                    <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                                    <span class="qty-number">0</span>
                                    <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p style="grid-column: 1 / -1; text-align: center;">Tidak ada menu yang tersedia saat ini untuk Counter 1.
                </p>
            <?php endif; ?>

        </div>
    </section>


    <div class="order-button-container">
        <a href="../orders/orders.php"><button class="order-button">Order</button></a>
    </div>

    <br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">
        <div class="footer-container">

            <div class="footer-column">
                <div class="title">
                    <h2>CafeTaria</h2>
                </div>
                <h3>Navigations</h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">Orders</a></li>
                    <li><a href="">Help</a></li>
                </ul>
            </div>

            <div class="footer-column about">
                <h3>About Us</h3>
                <p>
                    CafeTaria hadir untuk memudahkan guru, staf, dan siswa memesan makanan favorit dengan cepat,
                    praktis, dan tanpa ribet.
                </p>
            </div>

            <div class="footer-column contact">
                <h3>Contact</h3>
                <p>WhatsApp: 0000-0000-0000</p>
                <p>Email: CafeTaria@gmail.com</p>
            </div>
        </div>

        <div class="footer-social">
            <div>
                <h4>Connect with us</h4>
                <a href="#"><img src="/cafetaria/logo2 footer/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="/cafetaria/logo2 footer/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="/cafetaria/logo2 footer/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="/cafetaria/logo2 footer/youtube.png" alt="YouTube"></a>
            </div>

            <div>
                <h4>Download the app</h4>
                <a href="#"><img src="/cafetaria/logo2 footer/apple.png" alt="App Store"></a>
                <a href="#"><img src="logo2 footer/playstore.png" alt="Play Store"></a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>©2025 CafeTaria | CafeTaria is a simple online place for school teachers, staff, and students to order
                their favorite meals.</p>
        </div>
    </footer>

    <script src="counter.js"></script>
    <script src="../admin/admin-js/homepage-admin.js"></script>
</body>

</html>