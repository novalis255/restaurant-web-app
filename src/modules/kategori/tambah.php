<?php require_once "../../auth/cek_login.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper">
        <h2>Tambah Kategori</h2>

        <form method="post" action="simpan.php" class="styled-form">
            <input type="text" name="nama_kategori" placeholder="Nama Kategori" required>
            <button class="btn-primary">Simpan</button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>