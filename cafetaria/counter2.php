<?php
// =======================================================
// A. LOGIKA PHP: Mengambil Data Menu dari Database & Menu Statis
// =======================================================
session_start();
$userRole = $_SESSION['role'] ?? null;
$isLoggedIn = isset($_SESSION['id']) ? 'true' : 'false';
include("../config.php"); 

$category_filter = 'Counter 2';
$dynamic_menus = [];
$error_message = "";

$sql = "SELECT name, price, description, image 
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

$conn->close();
$static_menus = [
    [
        'name' => 'Bakmie Biasa',
        'price' => 25000,
        'description' => 'Mie kenyal dengan topping ayam cincang gurih dan sayuran segar.',
        'image' => 'counter 2/bakmie.png' // <-- Contoh path baru
    ],
    [
        'name' => 'Fettuccine Alfredo',
        'price' => 37000,
        'description' => 'Pasta fettuccine lembut dengan saus krim keju dan daging ayam.',
        'image' => 'counter 2/fettuccine.png'
    ],
    [
        'name' => 'Udon Chicken Curry',
        'price' => 35000,
        'description' => 'Udon lembut dengan kuah kari ayam Jepang yang kental dan harum.',
        'image' => 'counter 2/udon-curry.png'
    ],
    [
        'name' => 'Udon Beef',
        'price' => 30000,
        'description' => 'Udon tebal khas Jepang dengan irisan daging sapi dan kuah kaldu gurih.',
        'image' => 'counter 2/udon-beef.png'
    ],
    [
        'name' => 'Kwetiau Biasa',
        'price' => 19000,
        'description' => 'Kwetiau goreng sederhana dengan kecap manis, telur, dan sayur, rasa klasik yang nikmat.',
        'image' => 'counter 2/kwetiau.png'
    ],
    // Tambahkan item statis lainnya untuk Counter 2 di sini jika ada
];

// Gabungkan menu dinamis dan statis
$all_menus = array_merge($dynamic_menus, $static_menus);

// Urutkan semua menu berdasarkan nama agar terlihat lebih rapi
usort($all_menus, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cafeteria Sekolah - Counter</title>
    <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">
    <link rel="stylesheet" href="/cafetaria/counter-2.css">
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
            <li><a href="../../orders.php" class="btns">Orders</a></li>
            <li><a href="../helppage/help.php" class="btns">Helps</a></li>
        </ul>

        <div class="nav-icons">
            <?php
            if ($isLoggedIn === 'true') {
              $user_icon_url = ($userRole === 'admin') ? 'counter2.php' : 'homepage.php';
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
                <img src="/cafetaria/counter 2/iklan counter 2.png" alt="counter 2"> 
            </div>

            <img src="/cafetaria/logo per counter/2.png" alt="counter 2" class="counter-logo">

            <div class="counter-selection">
                <a href="../php/counter.php?id=1" class="counter-item">
                    Counter <span class="number">1</span>
                </a>
                <a href="../php/counter.php?id=2" class="counter-item active">
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
                
                <div class="list-menu" data-menu="<?php echo $menu_slug; ?>" data-name="<?php echo htmlspecialchars($menu_item['name']); ?>" data-price="<?php echo htmlspecialchars($menu_item['price']); ?>">
                    
                    <div class="menu-info">
                        <h3 class="menu-title"><?php echo htmlspecialchars($menu_item['name']); ?></h3>
                        
                        <p class="menu-desc"><?php echo htmlspecialchars($menu_item['description'] ?? 'Deskripsi belum tersedia.'); ?></p>
                        
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
                <p style="grid-column: 1 / -1; text-align: center;">Tidak ada menu yang tersedia saat ini untuk Counter 2.</p>
            <?php endif; ?>

        </div>
    </section>

    <div class="order-button-container">
        <a href="../../orders.php"><button class="order-button">Order</button></a>
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