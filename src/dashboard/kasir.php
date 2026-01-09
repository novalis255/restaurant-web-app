<?php
require_once "../auth/cek_login.php";
only('KASIR');
require_once "../config/database.php";

// ambil ringkasan
$totalPesanan = $conn->query("SELECT COUNT(*) FROM pesanan")->fetchColumn();
$totalPendapatan = $conn->query("SELECT IFNULL(SUM(total),0) FROM pesanan")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="dashboard-container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h2 class="logo">Blanc</h2>
            <nav>
                <a href="kasir.php" class="active">Dashboard</a>
                <a href="../modules/pesanan/index.php">Pesanan</a>
            </nav>
            <a href="../auth/logout.php" class="btn-logout">Logout</a>
        </aside>

        <!-- CONTENT -->
        <main class="content">
            <h1>Dashboard Kasir</h1>
            <p>Ringkasan aktivitas kasir hari ini</p>

            <div class="card-grid">
                <div class="card">
                    <h3>Total Pesanan</h3>
                    <p><?= $totalPesanan ?></p>
                </div>
                <div class="card">
                    <h3>Total Pendapatan</h3>
                    <p>Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></p>
                </div>
            </div>
        </main>

    </div>

</body>

</html>