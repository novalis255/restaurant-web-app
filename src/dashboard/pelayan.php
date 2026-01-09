<?php
require_once "../auth/cek_login.php";
only('PELAYAN');
require_once "../config/database.php";

$totalPesanan = $conn->query("
    SELECT COUNT(*) FROM pesanan WHERE status='BARU'
")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelayan</title>
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>

<body class="admin-page">

    <div class="dashboard-container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h2 class="logo">Blanc</h2>
            <nav>
                <a href="pelayan.php" class="active">Dashboard</a>
                <a href="../modules/pesanan/index.php">Pesanan</a>
            </nav>
            <a href="../auth/logout.php" class="btn-logout">Logout</a>
        </aside>

        <!-- CONTENT -->
        <main class="content">
            <h1>Dashboard Pelayan</h1>
            <p>Pesanan yang menunggu diproses</p>

            <div class="card-grid">
                <div class="card">
                    <h3>Pesanan Baru</h3>
                    <p><?= $totalPesanan ?></p>
                </div>
            </div>
        </main>

    </div>

</body>

</html>