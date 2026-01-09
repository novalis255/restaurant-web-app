<?php
require_once "../../auth/cek_login.php";
only(['ADMIN', 'KASIR', 'PELAYAN']);
require_once "../../config/database.php";

// ambil data pesanan + user
$sql = $conn->query("
  SELECT 
    p.id_pesanan,
    p.tanggal,
    p.total,
    p.status,
    u.nama AS nama_user
  FROM pesanan p
  JOIN users u ON p.id_user = u.id_user
  ORDER BY p.tanggal DESC
");
$pesanan = $sql->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pesanan</title>
    <link rel="stylesheet" href="../../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="dashboard-container">

        <!-- SIDEBAR (SAMA PERSIS DENGAN MENU) -->
        <aside class="sidebar">
            <h2 class="logo">Blanc</h2>

            <nav>
                <a href="../../dashboard/<?= strtolower($_SESSION['role']) ?>.php">Dashboard</a>

                <?php if ($_SESSION['role'] === 'ADMIN'): ?>
                    <a href="../kategori/index.php">Kategori</a>
                    <a href="../menu/index.php">Menu</a>
                <?php endif; ?>

                <a href="../pesanan/index.php">Pesanan</a>
            </nav>

            <a href="../../auth/logout.php" class="btn-logout">Logout</a>
        </aside>

        <!-- CONTENT -->
        <main class="content">

            <div class="content-header">
                <h1>Data Pesanan</h1>
                <a href="tambah.php" class="btn-primary">+ Tambah Pesanan</a>
            </div>

            <div class="table-wrapper">

                <!-- HEADER -->
                <div class="table-header pesanan">
                    <div>No</div>
                    <div>Tanggal</div>
                    <div>User</div>
                    <div>Total</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>

                <!-- DATA -->
                <?php if (count($pesanan) > 0): ?>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <div class="table-row pesanan">
                            <div><?= $i + 1 ?></div>
                            <div><?= date('d-m-Y H:i', strtotime($p['tanggal'])) ?></div>
                            <div><?= $p['nama_user'] ?></div>
                            <div>Rp <?= number_format($p['total'], 0, ',', '.') ?></div>
                            <div>
                                <span class="badge badge-proses"><?= $p['status'] ?></span>
                            </div>
                            <div class="aksi">

                                <a href="detail.php?id=<?= $p['id_pesanan'] ?>" class="btn-edit">
                                    Detail
                                </a>

                                <!-- PELAYAN: BARU → PROSES -->
                                <?php if ($_SESSION['role'] === 'PELAYAN' && $p['status'] === 'BARU'): ?>
                                    <a href="update_status.php?id=<?= $p['id_pesanan'] ?>&to=PROSES"
                                        class="btn-primary">
                                        Proses
                                    </a>
                                <?php endif; ?>

                                <!-- KASIR: PROSES → SELESAI -->
                                <?php if ($_SESSION['role'] === 'KASIR' && $p['status'] === 'PROSES'): ?>
                                    <a href="update_status.php?id=<?= $p['id_pesanan'] ?>&to=SELESAI"
                                        class="btn-primary">
                                        Selesaikan
                                    </a>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty">Belum ada data pesanan.</p>
                <?php endif; ?>

            </div>

        </main>

    </div>

</body>

</html>