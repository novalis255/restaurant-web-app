<?php
require_once "../config/database.php";

// ambil data menu + kategori
$query = $conn->query("
  SELECT menu.*, kategori.nama_kategori 
  FROM menu 
  JOIN kategori ON menu.id_kategori = kategori.id_kategori
  ORDER BY menu.id_menu DESC
");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menu | Blanc Restaurant</title>

    <!-- CSS LANDING -->
    <link rel="stylesheet" href="assets/css/landing.css">
    <!-- CSS MENU -->
    <link rel="stylesheet" href="assets/css/menu.css">
</head>

<body>

    <!-- NAVBAR (SAMA SEPERTI LANDING) -->
    <header class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">Blanc Restaurant</a>
            </div>

            <nav class="nav-menu">
                <a href="index.php" class="active">Home</a>
                <a href="#">About</a>
                <a href="#">Gallery</a>
                <a href="#">Contact</a>
                <a href="../auth/login.php" class="btn-login">Login</a>
                <a href="#" class="btn-book">Book a Table</a>
            </nav>
        </div>
    </header>

    <!-- HEADER MENU -->
    <section class="menu-header">
        <h1>Katalog Menu</h1>
        <p>Pilihan menu terbaik kami untuk Anda</p>
    </section>

    <!-- GRID MENU -->
    <section class="menu-section">
        <div class="menu-grid">

            <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="../uploads/menu/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_menu']) ?>">
                    </div>

                    <div class="menu-info">
                        <h3><?= htmlspecialchars($row['nama_menu']) ?></h3>
                        <span class="menu-category"><?= htmlspecialchars($row['nama_kategori']) ?></span>
                        <p class="menu-price">Rp. <?= number_format($row['harga'], 0, ',', '.') ?></p>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </section>

</body>

</html>