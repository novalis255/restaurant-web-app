<?php
require_once "../../auth/cek_login.php";
require_once "../../config/database.php";

$kategori = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper">

        <h2>Tambah Menu</h2>

        <form action="simpan.php" method="POST" enctype="multipart/form-data" class="admin-form">

            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" required>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori'] ?>">
                            <?= $k['nama_kategori'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="nama_menu" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" required>
            </div>

            <div class="form-group">
                <label>Gambar Menu</label>
                <input type="file" name="gambar" accept="image/*" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Simpan</button>
                <button type="button" onclick="window.location='index.php' " class="btn-secondary">Batal</button>
            </div>

        </form>

    </div>

</body>

</html>