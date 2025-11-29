<?php
session_start();
$userRole = $_SESSION['role'] ?? null;
$isLoggedIn = isset($_SESSION['id']) ? 'true' : 'false';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pesanan - CafeTaria</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/homepage.css">
  <link rel="stylesheet" href="../assets/css/orders.css">
  <link rel="stylesheet" href="../assets/css/pop-up.css">
  <link rel="stylesheet" href="../https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="../assets/img/fcon.png" type="image/x-icon">
</head>

<body class="site-bg">
  <nav class="navbar">
    <div class="logo">
      <a href="../homepage.php"><img src="../assets/img/logo-copy.png" class="logo" alt="Logo"></a>
      <span>CafeTaria</span>
    </div>

    <ul class="nav-links">
      <li><a href="../index.php">Home</a></li>

      <?php if (isset($_SESSION['name'])): ?>
        <li><a href="../../php/counter.php" class="btns">Menu</a></li>
        <li><a class="active" href="../orders.php" class="btns">Orders</a></li>
        <li><a href="../logout.php" class="btns-logout">Logout</a></li>
      <?php else: ?>
        <li><a href="../../php/counter.php" class="btns">Menu</a></li>
        <li><a href="../orders.php" class="active">Orders</a></li>
        <li><a href="../logout.php" class="btns-logout">Logout</a></li>
      <?php endif; ?>

      <li><a href="../helppage/help.php">Helps</a></li>
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
  <main class="orders-container">
    <header class="order-page-header">
      <h2>Detail Pesanan Anda</h2>
    </header>

    <section class="orders-list">
      <h3 class="section-title">🛒 Item Pesanan</h3>

      <div id="ordersContent" class="orders-content">
      </div>

    </section>
  </main>

  <div class="checkout-bar">
    <div id="summaryDisplay" class="summary-display">
      <div class="summary-row">
        <span>Subtotal:</span>
        <span id="subtotalAmount">Rp0</span>
      </div>
      <div class="summary-row tax-row">
        <span>PPN <span id="subtotalAmount">(10%):</span></span>
        <span id="taxAmount">Rp0</span>
      </div>
      <div class="summary-row total-row">
        <span>Total Akhir:</span>
        <strong><span id="finalTotalAmount">Rp0</span></strong>
      </div>
    </div>
    <button id="checkoutBtn" class="primary-btn" disabled>Pesan Sekarang</button>
  </div>
  <footer class="footer">
    <div class="footer-container">

      <div class="footer-column">
        <div class="title">
          <h2>CafeTaria</h2>
        </div>
        <h3>Navigations</h3>
        <ul>
          <li><a href="../homepage.php">Home</a></li>
          <li><a href="../../php/counter.php">Menu</a></li>
          <li><a href="../orders.php">Orders</a></li>
          <li><a href="../../helppage/help.php">Help</a></li>
        </ul>
      </div>

      <div class="footer-column about">
        <h3>About Us</h3>
        <p>
          CafeTaria hadir untuk memudahkan guru, staf, dan siswa memesan makanan favorit dengan cepat, praktis, dan
          tanpa ribet.
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
        <a href="../#"><img src="../logo2 footer/facebook.png" alt="Facebook"></a>
        <a href="../#"><img src="../logo2 footer/instagram.png" alt="Instagram"></a>
        <a href="../#"><img src="../logo2 footer/twitter.png" alt="Twitter"></a>
        <a href="../#"><img src="../logo2 footer/youtube.png" alt="YouTube"></a>
      </div>

      <div>
        <h4>Download the app</h4>
        <a href="../#"><img src="../logo2 footer/apple.png" alt="App Store"></a>
        <a href="../#"><img src="../logo2 footer/playstore.png" alt="Play Store"></a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>©2025 CafeTaria | CafeTaria is a simple online place for school teachers, staff, and students to order their
        favorite meals.</p>
    </div>
  </footer>
  <script src="./orders.js"></script>
  <script src="../admin/admin-js/homepage-admin.js"></script>
</body>

</html>