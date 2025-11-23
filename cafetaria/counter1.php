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
    <title>Cafeteria Sekolah - Counter</title>
    <link rel="shortcut icon" href="/assets/img/fcon.png" type="image/x-icon">
    <link rel="stylesheet" href="/cafetaria/counter1.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style-index.css">

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

            <div class="list-menu" data-menu="nasi-goreng" data-name="Nasi Goreng Spesial" data-price="15000">
                <div class="menu-image">
                    <a href="../../cafetaria/descriptions/counter1/nasigoreng.php">
                        <img src="counter 1/1. nasi goreng.png" alt="nasi goreng">
                    </a>
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Goreng Spesial</h3>
                    <p class="menu-desc">Nasi Goreng Spesial khas CafeTaria, gurih-manis pedas yang nikmat dan bikin
                        nagih.</p>
                    <div class="menu-button">
                        <span class="menu-price">Rp15.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>                
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="nasi-hainam" data-name="Nasi Hainam" data-price="25000">
                <div class="menu-image">
                    <a href="../cafetaria/descriptions/counter1/nasihainam.php">
                        <img src="counter 1/1. nasi hainam.png" alt="nasi hainam">
                    </a>
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Hainam</h3>
                    <p class="menu-desc">Nasi harum lembut dengan ayam gurih, kaya rasa oriental yang menenangkan.</p>
                    <div class="menu-button">
                        <span class="menu-price">Rp25.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="nasi-padang-a" data-name="Nasi Padang A" data-price="27000">
                <div class="menu-image">
                    <img src="counter 1/1. nasi padang.png" alt="nasi padang a">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Padang A</h3>
                    <p class="menu-desc">Nasi hangat dengan lauk bumbu rempah Minang, rendang, sayur ubi, sambal khas,
                        ayam dengan bakwan.</p>
                    <div class="menu-button">
                        <span class="menu-price">Rp27.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="nasi-uduk" data-name="Nasi Uduk" data-price="22000">
                <div class="menu-image">
                    <a href="../cafetaria/descriptions/counter1/nasiuduk.php">
                        <img src="counter 1/1. nasi uduk.png" alt="nasi uduk">
                    </a>
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Uduk</h3>
                    <p class="menu-desc">Nasi uduk dimasak dengan santan dan rempah, dihidangkan bersama ayam serondeng,
                        telur, bihun, dan tahu.</p>
                    <div class="menu-button">
                        <span class="menu-price">Rp22.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="nasi-kuning" data-name="Nasi Kuning" data-price="19000">
                <div class="menu-image">
                    <img src="counter 1/1. nasi kuning.png" alt="nasi kuning">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Kuning</h3>
                    <p class="menu-desc">Nasi kuning dihidangkan bersama ayam goreng, tempe orek, telur, dan sambal
                        bawang.</p>
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

            <div class="list-menu" data-menu="nasi-padang-b" data-name="Nasi Padang B" data-price="20000">
                <div class="menu-image">
                    <img src="counter 1/1. nasi padang B.png" alt="nasi padang b">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Padang B</h3>
                    <p class="menu-desc">Nasi hangat dengan lauk bumbu rempah Minang, rendang, telur, sambal hijau,
                        sayur ubi, dan perkedel.</p>
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

            <div class="list-menu" data-menu="nasi-liwet" data-name="Nasi Liwet" data-price="19000">
                <div class="menu-image">
                    <img src="counter 1/1. nasi liwet.png" alt="nasi liwet">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Liwet</h3>
                    <p class="menu-desc">Nasi liwet dimasak dengan santan dan ikan teri, menghadirkan rasa gurih khas
                        tradisional.</p>
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

            <div class="list-menu" data-menu="nasi-bakar" data-name="Nasi Bakar" data-price="17000">
                <div class="menu-image">
                    <img src="counter 1/1. nasi bakar.png" alt="nasi bakar">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Bakar</h3>
                    <p class="menu-desc">Nasi bakar dibungkus daun pisang, dipanggang hingga wangi, berisi ayam rempah.
                    </p>
                    <div class="menu-button">
                        <span class="menu-price">Rp17.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="list-menu" data-menu="ayam-geprek" data-name="Nasi Ayam Geprek" data-price="18000">
                <div class="menu-image">
                    <a href="../../deskripsi/deskripsi.php">
                        <img src="counter 1/1. ayam geprek.png" alt="nasi ayam geprek">
                    </a>
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Nasi Ayam Geprek</h3>
                    <p class="menu-desc">Nasi panas dengan ayam goreng yang digeprek dan sambal pedas khas CafeTaria.
                    </p>
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
</body>

</html>