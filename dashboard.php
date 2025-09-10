<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - Cafeteria</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/main.js"></script>
</head>
<body class="site-bg">
<header class="topbar">
    <div class="container topbar-inner">
        <div class="brand-container">
            <img src="assets/img/logo-copy.png" class="logo" alt="Logo">
            <a class="brand" href="index.php">Cafeteria<span class="dot">.</span></a>
        </div>
        <nav class="nav">
            <a href="index.php" class="btns">Home</a>
            <a href="login.php" class="btns">Login</a>
            <a href="signup.php" class="btns">Sign Up</a>
        </nav>
    </div>
</header>


<main class="container">
    <section class="card-section">
        <div class="card card--center">
            <h1>Selamat datang, <?php echo $_SESSION['name']; ?>!</h1>
            <p>Role: <strong><?php echo $_SESSION['role']; ?></strong></p>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container footer-inner">
        <div>© 2025 Cafeteria Sekolah</div>
        <div class="small">Made with ❤️ untuk SMK</div>
    </div>
</footer>
</body>
</html>

