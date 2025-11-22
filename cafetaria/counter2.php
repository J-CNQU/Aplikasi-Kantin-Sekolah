<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cafeteria Sekolah - Counter</title>
    <link rel="stylesheet" href="/cafetaria/counter-2.css">
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
                <img src="counter 1/iklan counter 2.png" alt="counter 1">
            </div>

            <img src="logo per counter/2.png" alt="counter 1" class="counter-logo">

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

            <div class="list-menu" data-menu="BakmieBiasa" data-name="Bakmie Biasa" data-price="25000">
                <div class="menu-image">
                    <img src="counter 2/2.bakmie-biasa.png">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Bakmie Biasa</h3>
                    <p class="menu-desc">Mie kenyal dengan topping ayam cincang gurih dan sayuran segar.</p>

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

            <div class="list-menu" data-menu="FettuccineAlfredo" data-name="Fettuccine Alfredo" data-price="37000">
                <div class="menu-image">
                    <img src="counter 2/2.fettuccine.png" alt="fettuccine alfredo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Fettuccine Alfredo</h3>
                    <p class="menu-desc">Pasta fettuccine lembut dengan saus krim keju dan daging ayam.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp37.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="UdonChickenCurry" data-name="Udon Chicken Curry" data-price="35000">
                <div class="menu-image">
                    <img src="counter 2/2.udon-chicken-curry.png" alt="udon chicken curry">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Udon Chicken Curry</h3>
                    <p class="menu-desc">Udon lembut dengan kuah kari ayam Jepang yang kental dan harum.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp35.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="UdonBeef" data-name="Udon Beef" data-price="30000">
                <div class="menu-image">
                    <img src="counter 2/2.udon-beef.png" alt="udon beef">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Udon Beef</h3>
                    <p class="menu-desc">Udon tebal khas Jepang dengan irisan daging sapi dan kuah kaldu gurih.</p>

                    <div class="menu-button">
                        <span class="menu-price">Rp30.000</span>
                        <div class="menu-qty">
                            <button class="qty-btn plus"><img src="icons/plus.png" alt="+"></button>
                            <span class="qty-number">0</span>
                            <button class="qty-btn minus"><img src="icons/minus.png" alt="-"></button>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="list-menu" data-menu="KwetiauBiasa" data-name="Kwetiau Biasa" data-price="19000">
                <div class="menu-image">
                    <img src="counter 2/2.kwetiau-biasa.png" alt="kwetiau biasa">
                </div>
                <div class="menu-info">
                    <h3 class="menu-title">Kwetiau Biasa</h3>
                    <p class="menu-desc">Kwetiau goreng sederhana dengan kecap manis, telur, dan sayur, rasa klasik yang
                        nikmat.</p>

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