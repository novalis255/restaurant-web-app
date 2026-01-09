<?php
require_once "../../auth/cek_login.php";
only('ADMIN'); // ⬅️ KUNCI ADMIN
require_once "../../config/database.php";

$data = $conn->query("
    SELECT m.*, k.nama_kategori
    FROM menu m
    JOIN kategori k ON m.id_kategori = k.id_kategori
    ORDER BY m.id_menu DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Menu</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <h2 class="admin-logo">Blanc</h2>
            <nav class="admin-menu">
                <a href="../../dashboard/admin.php">Dashboard</a>
                <a href="../kategori/index.php">Kategori</a>
                <a href="index.php" class="active">Menu</a>
                <a href="../pesanan/index.php">Pesanan</a>
                <a href="../../auth/logout.php" class="logout">Logout</a>
            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="admin-content">

            <div class="admin-header-row">
                <h1>Data Menu</h1>
                <a href="tambah.php" class="btn-primary">+ Tambah Menu</a>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="../../assets/img/menu/<?= $row['gambar'] ?>" class="table-img">
                            </td>
                            <td><?= $row['nama_menu'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td>Rp <?= number_format($row['harga']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id_menu'] ?>" class="btn-edit">Edit</a>
                                <a href="hapus.php?id=<?= $row['id_menu'] ?>"
                                    class="btn-delete"
                                    onclick="return confirm('Hapus menu ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </main>
    </div>

</body>

</html>