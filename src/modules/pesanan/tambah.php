<?php
require_once "../../auth/cek_login.php";
only(['KASIR','PELAYAN']);
require_once "../../config/database.php";

$menu = $conn->query("SELECT * FROM menu ORDER BY nama_menu");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper wide">

        <h2>Tambah Pesanan</h2>

        <form action="simpan.php" method="POST" class="order-form">

            <div class="order-table">

                <div class="order-header">
                    <span>Menu</span>
                    <span>Harga</span>
                    <span>Qty</span>
                </div>

                <?php foreach ($menu as $m): ?>
                    <div class="order-row">
                        <span><?= $m['nama_menu']; ?></span>
                        <span>Rp <?= number_format($m['harga'], 0, ',', '.'); ?></span>
                        <input
                            type="number"
                            name="qty[<?= $m['id_menu']; ?>]"
                            min="0"
                            value="0">
                    </div>
                <?php endforeach; ?>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Simpan Pesanan</button>
                <button type="button" class="btn-secondary" onclick="window.location='index.php'">Batal</button>
            </div>

        </form>

    </div>

</body>

</html>