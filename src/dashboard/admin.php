<?php
require_once "../auth/cek_login.php";
only('ADMIN');
require_once "../config/database.php";

$menu     = $conn->query("SELECT COUNT(*) FROM menu")->fetchColumn();
$kategori = $conn->query("SELECT COUNT(*) FROM kategori")->fetchColumn();
$pesanan  = $conn->query("SELECT COUNT(*) FROM pesanan")->fetchColumn();
$user     = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();

$pendapatan = $conn->query("
    SELECT IFNULL(SUM(total),0)
    FROM pesanan
    WHERE status='SELESAI'
")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="dashboard-container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h2 class="logo">Blanc</h2>

            <nav>
                <a href="admin.php" class="active">Dashboard</a>
                <a href="../modules/kategori/index.php">Kategori</a>
                <a href="../modules/menu/index.php">Menu</a>
                <a href="../modules/pesanan/index.php">Pesanan</a>
            </nav>

            <a href="../auth/logout.php" class="btn-logout">Logout</a>
        </aside>

        <!-- CONTENT -->
        <main class="content">

            <div class="content-header">
                <div>
                    <h1>Dashboard Admin</h1>
                    <p class="subtitle">Ringkasan data restoran</p>
                </div>
            </div>

            <div class="table-wrapper">

                <!-- HEADER -->
                <div class="table-header">
                    <div>No</div>
                    <div>Data</div>
                    <div>Jumlah</div>
                </div>

                <!-- ROW -->
                <div class="table-row">
                    <div>1</div>
                    <div>Menu</div>
                    <div><?= $menu ?></div>
                </div>

                <div class="table-row">
                    <div>2</div>
                    <div>Kategori</div>
                    <div><?= $kategori ?></div>
                </div>

                <div class="table-row">
                    <div>3</div>
                    <div>Pesanan</div>
                    <div><?= $pesanan ?></div>
                </div>

                <div class="table-row">
                    <div>4</div>
                    <div>User</div>
                    <div><?= $user ?></div>
                </div>

                <div class="table-row">
                    <div>5</div>
                    <div>Total Pendapatan</div>
                    <div>
                        Rp <?= number_format($pendapatan, 0, ',', '.') ?>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>

</html>