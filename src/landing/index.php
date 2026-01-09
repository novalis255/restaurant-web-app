<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restaurant Landing Page</title>
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">Blanc Restaurant</div>
        <nav>
            <a href="menu.php">Menu</a>
            <a href="#">About</a>
            <a href="#">Gallery</a>
            <a href="#">Contact</a>
            <a href="../auth/login.php" class="login-link">Login</a>
            <a href="#" class="btn-primary">Book a Table</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <h1>Welcome to <span>Our Restaurant</span></h1>
            <p>Home of the best food experience</p>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature-box">
            <h3>Magical Atmosphere</h3>
            <p>Filled with delicious aromas and comfort</p>
        </div>
        <div class="feature-box">
            <h3>Best Food Quality</h3>
            <p>Only premium ingredients used</p>
        </div>
        <div class="feature-box">
            <h3>Unforgettable Taste</h3>
            <p>Prepared by professional chefs</p>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about">
        <div class="about-text">
            <h2>Our <span>Story</span></h2>
            <p>
                Our restaurant was founded with passion for culinary excellence.
                Every dish tells a story of quality and tradition.
            </p>

            <div class="stats">
                <div><strong>93</strong><span>Drinks</span></div>
                <div><strong>206</strong><span>Foods</span></div>
                <div><strong>71</strong><span>Snacks</span></div>
            </div>
        </div>

        <div class="about-images">
            <img src="../assets/images/dish1.jpg">
            <img src="../assets/images/dish2.jpg">
        </div>
    </section>

    <!-- MENU -->
    <section class="menu">
        <h2>Our <span>Dishes</span></h2>

        <div class="menu-list">
            <div class="menu-item">
                <img src="../assets/images/dish1.jpg">
                <div>
                    <h4>Chicken with Sauce</h4>
                    <p>2500</p>
                </div>
            </div>

            <div class="menu-item">
                <img src="../assets/images/dish2.jpg">
                <div>
                    <h4>Fish with Vegetables</h4>
                    <p>3500</p>
                </div>
            </div>
        </div>

        <a href="#" class="btn-secondary">View Full Menu</a>
    </section>

    <!-- GALLERY -->
    <section class="gallery">
        <h2>Gallery</h2>
        <div class="gallery-grid">
            <img src="../assets/images/dish1.jpg">
            <img src="../assets/images/dish2.jpg">
            <img src="../assets/images/dish1.jpg">
            <img src="../assets/images/dish2.jpg">
        </div>
    </section>

    <!-- CHEFS -->
    <section class="chefs">
        <h2>Our <span>Chefs</span></h2>
        <div class="chef-list">
            <img src="../assets/images/chef1.jpg">
            <img src="../assets/images/chef2.jpg">
            <img src="../assets/images/chef3.jpg">
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>© 2025 Restaurant. All Rights Reserved.</p>
    </footer>

</body>

</html>