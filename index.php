<?php
session_start();
include("config.php"); // koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
      // set session
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['role'] = $row['role'];

      // cek role untuk redirect
      if ($row['role'] === 'admin') {
        header("Location: dashboard_admin.php");
        exit();
      } else {
        header("Location: dashboard_user.php");
        exit();
      }
    } else {
      echo "Password salah!";
    }
  } else {
    echo "Email tidak ditemukan!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Cafeteria Sekolah - Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style-index.css">
  <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
</head>

<body class="site-bg">
  <nav class="navbar">
    <div class="logo">
      <img src="assets/img/logo-copy.png" class="logo" alt="Logo">
      <span>CafeTaria</span>
    </div>
    <ul class="nav-links">
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="login.php" class="btns">Login</a></li>
      <li><a href="signup.php" class="btns">Sign Up</a></li>
      <li><a href="#">Help</a></li>

    </ul>
    <div class="nav-icons">
      <button><i class="fas fa-search"></i></button>
      <button><i class="fas fa-user"></i></button>
      <button><i class="fas fa-shopping-cart"></i></button>
    </div>
  </nav>


  <main class="container">
    <section class="hero">
      <div class="hero-card">
        <h1>Selamat Datang di <strong>Cafeteria Sekolah</strong></h1>
        <p>Nikmati makanan bergizi, cepat, dan terjangkau — langsung dari kantin sekolah.</p>
        <div class="hero-cta">
          <a class="btn" href="login.php">Login</a>
          <a class="btn-ghost" href="signup.php">Sign Up</a>
        </div>
      </div>
      <div class="hero-image" aria-hidden="true"></div>
    </section>
  </main>

  <!-- Banner -->
  <section class="banner">
    <img src="./assets/homepage/slideshow-2.png" class="Slideshow2">
  </section>

  <!-- Shop by Counter -->
  <section class="counter">
    <p>Shop by counter</p>
    <div class="counter-grid">
      <img src="/assets/homepage/counter 1.png" alt="Counter 1" />
      <img src="/assets/homepage/counter 2.png" alt="Counter 2" />
      <img src="/assets/homepage/counter 3.png" alt="Counter 3" />
      <img src="/assets/homepage/counter 4.png" alt="Counter 4" />
    </div>
  </section>

  <!-- Promo -->
  <section class="promo">
    <div class="promo-card">
      <img src="/assets/homepage/iklan kecil.png" alt="Rice Bowl" />
    </div>
    <div class="promo-card-2">
      <img src="/assets/homepage/iklan kecil 2.png" alt="Best deal" />
    </div>
  </section>

  <!-- Categories -->
  <section class="categories">
    <p>Categories</p>
    <div class="category-list">
      <button class="category-btn" data-category="Sate">
        <img src="/assets/homepage/categories/1.png" />
        <span>Sate</span>
      </button>
      <button class="category-btn" data-category="Noodles">
        <img src="/assets/homepage/categories/2.png" />
        <span>Noodles</span>
      </button>
      <button class="category-btn" data-category="Bakso">
        <img src="/assets/homepage/categories/3.png" />
        <span>Bakso</span>
      </button>
      <button class="category-btn" data-category="Rice">
        <img src="/assets/homepage/categories/5.png" />
        <span>Rice</span>
      </button>
    </div>
  </section>

  <style>

  </style>
  <script src="/assets/js/script.js"></script>

  <!-- Item Section -->
  <section class="menu">
      <section class="categories">
    <p>Best Seller</p>
    <div class="item">
      <img src="/assets/homepage/fried rice.jpeg" alt="Nasi Goreng Spesial" />
      <div class="info">
        <h1>Nasi Goreng Spesial</h1>
        <p>Nasi goreng spesial khas cafeTaria, gurih - manis, pedas yang nikmat.</p>
        <span class="price">Rp18.000</span>
      </div>
      <button><i class="fas fa-thumbs-up"></i></button>
    </div>

    <div class="item">
      <img src="/assets/homepage/hainam.jpeg" alt="Nasi Hainam" />
      <div class="info">
        <h1>Nasi Hainam</h1>
        <p>Nasi hainam lembut dengan ayam gurih, kaya rasa oriental.</p>
        <span class="price">Rp27.000</span>
      </div>
      <button><i class="fas fa-thumbs-up"></i></button>
    </div>

    <div class="item">
      <img src="/assets/homepage/nasi padang.jpeg" alt="Nasi Padang A" />
      <div class="info">
        <h1>Nasi Padang A</h1>
        <p>Nasi Padang dengan rendang, ayam ubi, sambal ijo, dan bawang.</p>
        <span class="price">Rp25.000</span>
      </div>
      <button><i class="fas fa-thumbs-up"></i></button>
    </div>

    <div class="item">
      <img src="/assets/homepage/mie ayam spesial Bakso.jpeg" alt="Bakmi Spesial Bakso" />
      <div class="info">
        <h1>Bakmi Spesial Bakso</h1>
        <p>Mie ayam dengan bakso kenyal, kuah gurih nikmat.</p>
        <span class="price">Rp22.000</span>
      </div>
      <button><i class="fas fa-thumbs-up"></i></button>
    </div>

    <div class="item">
      <img src="/assets/homepage/udon.jpeg" alt="Udon Chicken Curry" />
      <div class="info">
        <h1>Udon Chicken Curry</h1>
        <p>Udon lembut dengan kuah kari ayam khas Jepang.</p>
        <span class="price">Rp30.000</span>
      </div>
      <button><i class="fas fa-thumbs-up"></i></button>
    </div>
  </section>

  </section>

  <!-- Footer -->
  <footer>
    <div class="footer">
      <div class="footer-main">
        <div class="footer-section">
          <h2 class="brand">CafeTaria</h2>
          <h3 class="title">Navigations</h3>
          <ul class="nav-list">
            <li class="nav-item active">Home</li>
            <li class="nav-item">Menu</li>
            <li class="nav-item">Orders</li>
            <li class="nav-item">Help</li>
          </ul>
        </div>

        <div class="footer-section">
          <h3 class="title">About Us</h3>
          <p class="text">
            CafeTaria hadir untuk memudahkan guru, staf, dan siswa memesan makanan favorit dengan cepat, praktis, dan
            tanpa ribet.
          </p>
        </div>

        <div class="footer-container">
          <!-- Section Connect -->
          <div class="footer-section">
            <h3 class="title">Connect with Us</h3>
            <div class="contact-item">
              <span class="label">WhatsApp:</span>
              <div class="number">0000-0000-0000</div>
            </div>
            <div class="contact-item">
              <span class="label">Email:</span>
              <span class="email">CafeTaria@gmail.com</span>
            </div>
          </div>
        </div>


        <div class="footer-extra">
          <div class="socials">
            <span>Connect with us</span>
            <div class="icons">
              <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
              <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
              <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>


        <div class="download">
          <span>Download the app</span>
          <div class="stores">
            <img id="apple" src="/assets/homepage/apple.png" alt="Apple logo">
            <img src="/assets/homepage/google.svg" alt="Google Play Store logo">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="copyright">
        ©2023 <p>CafeTaria |CafeTaria is a simple online place for school teachers, staff, and students to order meals.
        </p>
      </div>
    </div>
  </footer>
  <!-- di akhir body -->
  <!-- Popup -->
  <div class="popup-overlay" id="popup">
    <div class="card">
      <button class="close-btn" id="closePopup">&times;</button>
      <div class="card-inner">
        <h1>Please Login or Sign up first</h1>
        <p>
          Daftar akun atau log masuk terlebih dahulu untuk mengakses berbagai fitur di CafeTaria
        </p>
        <div class="button-container">
          <button class="btn-login" type="button">Login</button>
          <button class="btn-signup" type="button">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="/assets/js/index.js"></script>

</html>