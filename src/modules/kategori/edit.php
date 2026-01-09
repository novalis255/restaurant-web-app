<?php
require_once "../../auth/cek_login.php";
require_once "../../config/database.php";

$id = $_GET['id'];
$data = $conn->prepare("SELECT * FROM kategori WHERE id_kategori=?");
$data->execute([$id]);
$row = $data->fetch();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="form-wrapper">
        <h2>Edit Kategori</h2>

        <form method="post" action="update.php" class="styled-form">
            <input type="hidden" name="id" value="<?= $row['id_kategori'] ?>">
            <input type="text" name="nama_kategori" value="<?= $row['nama_kategori'] ?>" required>

            <button class="btn-primary">Update</button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>