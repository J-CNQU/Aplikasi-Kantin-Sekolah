<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetaria Menu</title>
    <link rel="stylesheet" href=/Css-AfterLogin/Counter-1.css>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/homepage.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="assets/img/logo-copy.png" class="logo" alt="Logo">
                <span>CafeTaria</span>
            </div>

            <ul class="nav-links">
                <li><a class="active" href="../index.php">Home</a></li>

                <?php if (isset($_SESSION['name'])): ?>
                    <li><a href="../Menu-AfterLogin/Counter-1.php" class="btns">Menu</a></li>
                    <li><a href="logout.php" class="btns-logout">Signout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="btns">Login</a></li>
                    <li><a href="signup.php" class="btns">Sign Up</a></li>
                <?php endif; ?>

                <li><a href="#">Help</a></li>

            </ul>

            <div class="nav-icons">
                <button><i class="fas fa-search"></i></button>
                <button><i class="fas fa-user"></i></button>
                <button><i class="fas fa-shopping-cart"></i></button>
            </div>

        </nav>
    </header>

    <div class="banner">
        <img src="https://csspicker.dev/api/image/?q=indonesian+food+nasi+goreng&image_type=photo" alt="Food Banner"
            class="banner-image">
        <div class="counter-tabs">
            <button class="counter-tab active">Counter 1</button>
            <button class="counter-tab">Counter 2</button>
            <button class="counter-tab">Counter 3</button>
            <button class="counter-tab">Counter 4</button>
        </div>
    </div>

    <main class="main-content">
        <h1 class="menu-title">Menu</h1>

        <div class="menu-grid">
            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+goreng+special&image_type=photo"
                    alt="Nasi Goreng Spesial" class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Goreng Spesial</h3>
                    <p class="menu-description">Nasi dengan lauk Cafetaria kpis umum pedas yang nikmat dan gurih</p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp15.000</span>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+uduk+indonesian&image_type=photo" alt="Nasi Uduk"
                    class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Uduk</h3>
                    <p class="menu-description">Nasi uduk dengan sambal dan tempe, dilengkapi dengan telur dadar, ayam
                        goreng, kerupuk, dan sambal</p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp22.000</span>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+hainam+chicken&image_type=photo" alt="Nasi Hainam"
                    class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Hainam</h3>
                    <p class="menu-description">Nasi khas Cafe Cafetaria dengan lauk lengkap ayam gurih, keya timun dan
                        sambal gurih menemani</p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp25.000</span>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+kuning+indonesian&image_type=photo" alt="Nasi Kuning"
                    class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Kuning</h3>
                    <p class="menu-description">Nasi kuning khas dilengkapi dengan ayam goreng, gudang, tempe, dan
                        sambal</p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp19.000</span>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+padang+rendang&image_type=photo" alt="Nasi Padang A"
                    class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Padang A</h3>
                    <p class="menu-description">Nasi hangat dengan lauk bumbu rendang, dendeng, rendang, daun ubi,
                        sambal hijau, daun dan pelengkap</p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp27.000</span>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <img src="https://csspicker.dev/api/image/?q=nasi+padang+meal&image_type=photo" alt="Nasi Padang B"
                    class="menu-image">
                <div class="menu-details">
                    <h3 class="menu-name">Nasi Padang B</h3>
                    <p class="menu-description">Nasi hangat dengan lauk bumbu rendang, miring, rendang, daun ubi, sambal
                        hijau, keya dan pelengkap</p>
                    <div class="menu-footer">
                        <p>Rp20.000</p>
                        <div class="quantity-controls">
                            <button class="qty-btn">+</button>
                            <span class="qty-display">1</span>
                            <button class="qty-btn">−</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="orders-button">Orders</button>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h2 class="footer-logo">cafeTaria</h2>
                <h4 class="footer-heading">Navigations</h4>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4 class="footer-heading">About Us</h4>
                <p class="footer-text">CafeTaria hadir untuk memudahkan guru, staf, dan siswa memesan makanan favorit
                    dengan cepat, praktis, dan tanpa ribet.</p>
            </div>

            <div class="footer-section">
                <h4 class="footer-heading">Contact</h4>
                <p class="footer-text">WhatsApp: 0000-0000-0000</p>
                <p class="footer-text">Email: CafeTaria@gmail.com</p>
            </div>
        </div>

        <div class="footer-social">
            <div class="social-section">
                <h4 class="footer-heading">Connect with us</h4>
                <div class="social-icons">
                    <i class="social-icon social-facebook"></i>
                    <i class="social-icon social-instagram"></i>
                    <i class="social-icon social-twitter"></i>
                    <i class="social-icon social-youtube"></i>
                </div>
            </div>

            <div class="social-section">
                <h4 class="footer-heading">Download the app</h4>
                <div class="app-icons">
                    <i class="app-icon app-apple"></i>
                    <i class="app-icon app-android"></i>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            ©2025 CafeTaria | CafeTaria is a simple online placer for school teachers, staff, and students to order
            their favorite meals.
        </div>
    </footer>
    <script src="/Js-AfterLogin/Counter-1.js"></script>
</body>

</html>