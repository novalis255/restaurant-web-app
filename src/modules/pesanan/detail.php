<?php
require_once "../../auth/cek_login.php";
require_once "../../config/database.php";

$id = $_GET['id'];

$detail = $conn->query("
  SELECT detail_pesanan.*, menu.nama_menu
  FROM detail_pesanan
  JOIN menu ON detail_pesanan.id_menu = menu.id_menu
  WHERE id_pesanan = $id
");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper wide">
        <h2>Detail Pesanan</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail as $d): ?>
                    <tr>
                        <td><?= $d['nama_menu'] ?></td>
                        <td style="text-align:center"><?= $d['qty'] ?></td>
                        <td class="price">Rp <?= number_format($d['subtotal']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="index.php" class="btn-secondary" style="margin-top:15px;display:inline-block">
            Kembali
        </a>
    </div>

</body>

</html>