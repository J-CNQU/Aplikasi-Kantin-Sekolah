<?php
session_start();
include("config.php");

$isLoggedIn = isset($_SESSION['id']) ? 'true' : 'false';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script>
    // Melewatkan status login PHP ke variabel JavaScript
    const IS_LOGGED_IN = <?php echo $isLoggedIn; ?>;
  </script>
  <title>Cafeteria Sekolah - Home</title>

  <!-- CSS (TIDAK DIUBAH) -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style-index.css">
  <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">
</head>

<body class="site-bg">

  <!-- NAVBAR (TIDAK DIUBAH) -->
  <nav class="navbar">
    <div class="logo">
      <img src="assets/img/logo-copy.png" class="logo" alt="Logo">
      <span>CafeTaria</span>
    </div>

    <ul class="nav-links">
      <li><a class="active" href="index.php">Home</a></li>

      <?php if (isset($_SESSION['name'])): ?>
        <li><a href="../cafetaria/Counter1.php" class="btns">Menu</a></li>
        <li><a href="orders.php" class="btns">Orders</a></li>
        <li><a href="logout.php" class="btns-logout">Signout</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btns">Login</a></li>
        <li><a href="signup.php" class="btns">Sign Up</a></li>
      <?php endif; ?>

      <li><a href="/helppage/help.php">Help</a></li>
    </ul>

    <div class="nav-icons">
      <button><i class="fas fa-search"></i></button>
      <button><i class="fas fa-user"></i></button>
      <button><i class="fas fa-shopping-cart"></i></button>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <main class="container">
    <section class="hero">
      <div class="hero-card">
        <h1>Selamat Datang di <strong>Aplikasi Cafeteria Sekolah</strong></h1>
        <p>Nikmati makanan bergizi, cepat, dan terjangkau — langsung dari kantin sekolah.</p>
        <div class="hero-cta">
          <a class="btn" href="login.php">Login</a>
          <a class="btn-ghost" href="signup.php">Sign Up</a>
        </div>
      </div>
      <div class="hero-image" aria-hidden="true"></div>
    </section>
  </main>

  <!-- LOCKED SECTION -->
  <!-- ALL THIS CONTENT IS LOCKED -->
  <div id="lock-area" class="locked-section lock-area">

    <!-- Banner -->
    <section class="banner lock-area">
      <img id="slideshow-img" src="./assets/homepage/slideshow-1.png" class="slideshow-img" alt="Slideshow Banner">
    </section>

    <!-- Counter -->
    <section class="counter lock-area">
      <p>Shop by Counter</p>
      <div class="counter-grid">
        <a href="../php/counter.php" class="counter-item lock-area">
          <img src="/assets/homepage/counter 1.png" alt="Counter 1">
        </a>
        <a href="../php/counter.php?id=2" class="counter-item lock-area">
          <img src="/assets/homepage/counter 2.png" alt="Counter 2">
        </a>
        <a href="../php/counter.php?id=3" class="counter-item lock-area">
          <img src="/assets/homepage/counter 3.png" alt="Counter 3">
        </a>
        <a href="../php/counter.php?id=4" class="counter-item lock-area">
          <img src="/assets/homepage/counter 4.png" alt="Counter 4">
        </a>
      </div>
    </section>

    <!-- Promo -->
    <section class="promo lock-area">
      <div class="promo-card lock-area">
        <img src="/assets/homepage/iklan kecil.png" alt="Rice Bowl" />
      </div>
      <div class="promo-card-2 lock-area">
        <img src="/assets/homepage/iklan kecil 2.png" alt="Best deal" />
      </div>
    </section>

    <!-- Categories -->
    <section class="categories lock-area">
      <p>Categories</p>
      <div class="category-list">
        <button class="category-btn lock-area" data-category="Sate">
          <img src="/assets/homepage/categories/1.png" />
          <span>Rice</span>
        </button>
        <button class="category-btn lock-area" data-category="Noodles">
          <img src="/assets/homepage/categories/2.png" />
          <span>Noodles</span>
        </button>
        <button class="category-btn lock-area" data-category="Bakso">
          <img src="/assets/homepage/categories/3.png" />
          <span>Chicken</span>
        </button>
        <button class="category-btn lock-area" data-category="Rice">
          <img src="/assets/homepage/categories/5.png" />
          <span>Bakso</span>
        </button>
      </div>
    </section>

    <!-- BEST SELLER -->
    <section class="menu lock-area">
      <section class="categories lock-area">
        <p>Best Seller</p>

        <div class="item lock-area">
          <img src="/assets/homepage/fried rice.jpeg" alt="Nasi Goreng Spesial" />
          <div class="info">
            <h1>Nasi Goreng Spesial</h1>
            <p>Nasi goreng spesial khas cafeTaria, gurih - manis, pedas yang nikmat.</p>
            <span class="price">Rp18.000</span>
          </div>
          <button class="add-to-cart-button lock-area">Review?</button>
        </div>

        <div class="item lock-area">
          <img src="/assets/homepage/hainam.jpeg" alt="Nasi Hainam" />
          <div class="info">
            <h1>Nasi Hainam</h1>
            <p>Nasi hainam lembut dengan ayam gurih, kaya rasa oriental.</p>
            <span class="price">Rp27.000</span>
          </div>
          <button class="add-to-cart-button lock-area">Review?</button>
        </div>

        <div class="item lock-area">
          <img src="/assets/homepage/nasi padang.jpeg" alt="Nasi Padang A" />
          <div class="info">
            <h1>Nasi Padang A</h1>
            <p>Nasi Padang dengan rendang, ayam ubi, sambal ijo, dan bawang.</p>
            <span class="price">Rp25.000</span>
          </div>
          <button class="add-to-cart-button lock-area">Review?</button>
        </div>

        <div class="item lock-area">
          <img src="/assets/homepage/mie ayam spesial Bakso.jpeg" alt="Bakmi Spesial Bakso" />
          <div class="info">
            <h1>Bakmi Spesial Bakso</h1>
            <p>Mie ayam dengan bakso kenyal, kuah gurih nikmat.</p>
            <span class="price">Rp22.000</span>
          </div>
          <button class="add-to-cart-button lock-area">Review?</button>
        </div>

        <div class="item lock-area">
          <img src="/assets/homepage/udon.jpeg" alt="Udon Chicken Curry" />
          <div class="info">
            <h1>Udon Chicken Curry</h1>
            <p>Udon lembut dengan kuah kari ayam khas Jepang.</p>
            <span class="price">Rp30.000</span>
          </div>
          <button class="add-to-cart-button lock-area">Review?</button>
        </div>

      </section>
    </section>

  </div>

  <!-- FOOTER (TIDAK DIUBAH) -->
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
          <li><a href="orders.html">Orders</a></li>
          <li><a href="helps.php">Help</a></li>
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
        <a href="#"><img src="logo2 footer/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="logo2 footer/instagram.png" alt="Instagram"></a>
        <a href="#"><img src="logo2 footer/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="logo2 footer/youtube.png" alt="YouTube"></a>
      </div>

      <div>
        <h4>Download the app</h4>
        <a href="#"><img src="logo2 footer/apple.png" alt="App Store"></a>
        <a href="#"><img src="logo2 footer/playstore.png" alt="Play Store"></a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>©2025 CafeTaria | CafeTaria is a simple online place for school teachers, staff, and students to order their
        favorite meals.</p>
    </div>
  </footer>

  <!-- POPUP FIXED TANPA DUPLIKAT -->
  <div id="popupOverlay" class="popup-overlay" style="display: none;">
    <div class="popup-box">
      <h2>Please Login Or Sign up first</h2>
      <p>Daftar Akun atau Login terlebih dahulu</p>
      <p>untuk mengakses fitur fitur cafetaria</p>
      <br>
      <div class="popup-actions">
        <button id="popupLoginBtn" class="popup-btn login">Login</button>
        <button id="popupSignupBtn" class="popup-btn signup">Sign Up</button>
      </div>
    </div>
  </div>


  <script src="/assets/js/popup.js"></script>
</body>

</html>