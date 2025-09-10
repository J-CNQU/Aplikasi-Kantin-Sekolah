<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Admin - Cafeteria</title>
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
            <a href="logout.php" class="btns">Log out</a>
            <a href="signup.php" class="btns">Sign Up</a>
        </nav>
    </div>
</header>


    <main class="container">
        <section class="card-section">
            <div class="card">
                <h2>Halo, <?php echo $_SESSION['name']; ?> 👑</h2>
                <p>Kelola cafeteria dengan fitur-fitur di bawah ini:</p>

                <h3>Manajemen Menu</h3>
                <div class="menu-links">
                    <a class="btn" href="tambah_menu.php"> Tambah Menu</a>
                    <a class="btn-ghost" href="daftar_menu.php"> Lihat / Ubah Menu</a>
                </div>

                <h3>Manajemen Pesanan</h3>
                <div class="menu-links">
                    <a class="btn" href="daftar_pesanan.php"> Lihat Pesanan User</a>
                </div>
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