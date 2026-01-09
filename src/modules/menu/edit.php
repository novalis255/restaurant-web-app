<?php
require_once "../../auth/cek_login.php";
require_once "../../config/database.php";

$id = $_GET['id'];
$menu = $conn->prepare("SELECT * FROM menu WHERE id_menu=?");
$menu->execute([$id]);
$m = $menu->fetch();

$kategori = $conn->query("SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Menu</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper">
        <h2>Edit Menu</h2>

        <form method="post" action="update.php" class="styled-form">
            <input type="hidden" name="id" value="<?= $m['id_menu'] ?>">

            <input type="text" name="nama_menu" value="<?= $m['nama_menu'] ?>" required>

            <select name="id_kategori">
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori'] ?>"
                        <?= $k['id_kategori'] == $m['id_kategori'] ? 'selected' : '' ?>>
                        <?= $k['nama_kategori'] ?>
                    </option>
                <?php endforeach ?>
            </select>

            <input type="number" name="harga" value="<?= $m['harga'] ?>" required>

            <button class="btn-primary">Update</button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>