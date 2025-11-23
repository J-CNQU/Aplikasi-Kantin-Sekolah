<?php
include("../config.php");

$sql = "SELECT name, price, image, category FROM menu ORDER BY category, name";

$result = $conn->query($sql);

$menus = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $category = $row['category'];
        if (!isset($menus[$category])) {
            $menus[$category] = [];
        }
        $menus[$category][] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cafeteria Sekolah - Home</title>
    <link rel="stylesheet" href="/cafetaria/counter-4.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style-index.css">
    <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">

</head>

<body class="site-bg">
    <nav class="navbar">
        <div class="logo">
            <img src="../assets/img/logo-copy.png" class="logo" alt="Logo">
            <span>CafeTaria</span>
        </div>

        <ul class="nav-links">
            <li><a href="../../homepage.php" class="btns">Home</a></li>
            <li><a href="../../counter1.php" class="active">Menu</a></li>
            <li><a href="../../orders.php" class="btns">Orders</a></li>
            <li><a href="../../helps.php" class="btns">Helps</a></li>
        </ul>

        </ul>

        <div class="nav-icons">
            <button><i class="fas fa-search"></i></button>
            <button><i class="fas fa-user"></i></button>
            <button><i class="fas fa-shopping-cart"></i></button>

        </div>

    </nav>



    <section class="counters">
        <div class="counter-content">
            <div class="counter-background">
                <img src="counter 1/iklan counter 4.png" alt="counter 1">
            </div>

            <img src="logo per counter/4.png" alt="counter 1" class="counter-logo">

            <div class="counter-selection">
                <a href="../php/counter.php?id=1" class="counter-item">
                    Counter <span class="number">1</span>
                </a>
                <a href="../php/counter.php?id=2" class="counter-item">
                    Counter <span class="number">2</span>
                </a>
                <a href="../php/counter.php?id=3" class="counter-item">
                    Counter <span class="number">3</span>
                </a>
                <a href="../php/counter.php?id=4" class="counter-item active">
                    Counter <span class="number">4</span>
                </a>
            </div>


        </div>
    </section>

    <section class="menus">
        <h1 class="h1">Menu</h1>

        <div class="menu-grid">
            <div class="list-menu" data-menu="SateKambing" data-name="Sate Kambing" data-price="18000">
                <div class="menu-image">
                    <img src="counter 4/4.sate-kambing.png" alt="sate kambing">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Sate Kambing</h3>
                    <p class="menu-desc">Potongan daging kambing empuk dibakar dengan bumbu kecap khas, disajikan dengan
                        lontong.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp18.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="SateAyam" data-name="Sate Ayam" data-price="16000">
                <div class="menu-image">
                    <img src="counter 4/4.sate-ayam.png" alt="sate ayam">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Sate Ayam</h3>
                    <p class="menu-desc">Sate ayam bakar dengan bumbu kacang gurih dan sedikit manis, nikmat dengan
                        lontong.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp16.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="BaksoUrat" data-name="Bakso Urat" data-price="19000">
                <div class="menu-image">
                    <img src="counter 4/4.bakso-urat.png" alt="bakso urat">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Bakso Urat</h3>
                    <p class="menu-desc">Bakso urat kenyal dan gurih disajikan dalam kuah kaldu sapi hangat.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp19.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="BaksoBiasa" data-name="Bakso Biasa" data-price="16000">
                <div class="menu-image">
                    <img src="counter 4/4.bakso-biasa.png" alt="bakso biasa">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Bakso Biasa</h3>
                    <p class="menu-desc">Bakso daging sapi lembut dalam kuah gurih, disajikan dengan mie dan tahu.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp16.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="BaksoKomplit" data-name="Bakso Komplit" data-price="24000">
                <div class="menu-image">
                    <img src="counter 4/4.bakso-komplit.png" alt="bakso komplit">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Bakso Komplit</h3>
                    <p class="menu-desc">Campuran bakso urat, tahu, dan mie dalam kuah kaldu sapi gurih hangat.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp24.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="GadoGado" data-name="Gado-Gado" data-price="20000">
                <div class="menu-image">
                    <img src="counter 4/4.gado-gado.png" alt="gado gado">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Gado-Gado</h3>
                    <p class="menu-desc">Sayuran segar, lontong, dan telur rebus disiram bumbu kacang khas Betawi.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp20.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

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
            <p>©2025 CafeTaria | CafeTaria is a simple online place for school teachers, staff, and students to order
                their favorite meals.</p>
        </div>
    </footer>

    <script src="counter.js"></script>
</body>

</html>