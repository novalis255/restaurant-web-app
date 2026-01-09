<?php
require_once "../../auth/cek_login.php";
only('ADMIN'); // ⬅️ KUNCI ADMIN
require_once "../../config/database.php";

$data = $conn->query("SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Kategori | Blanc Restaurant</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="admin-wrapper">

        <!-- SIDEBAR (REUSE ADMIN) -->
        <aside class="admin-sidebar">
            <h2 class="admin-logo">Blanc</h2>
            <nav class="admin-menu">
                <a href="../../dashboard/admin.php">Dashboard</a>
                <a href="index.php" class="active">Kategori</a>
                <a href="../menu/index.php">Menu</a>
                <a href="../pesanan/index.php">Pesanan</a>
                <a href="../../auth/logout.php" class="logout">Logout</a>
            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="admin-content">
            <header class="admin-header">
                <h1>Data Kategori</h1>
                <a href="tambah.php" class="btn-primary">+ Tambah Kategori</a>
            </header>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="edit.php?id=<?= $row['id_kategori'] ?>" class="btn-edit">Edit</a>
                                    <a href="hapus.php?id=<?= $row['id_kategori'] ?>"
                                        class="btn-delete"
                                        onclick="return confirm('Hapus kategori ini?')">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

    </div>

</body>

</html>