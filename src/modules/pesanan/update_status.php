<?php
require_once "../../auth/cek_login.php";
only(['PELAYAN', 'KASIR', 'ADMIN']);
require_once "../../config/database.php";

$id = $_GET['id'] ?? null;
$to = $_GET['to'] ?? null;

if (!$id || !$to) {
    header("Location: index.php");
    exit;
}

// aturan role → status
$allowed = [
    'PELAYAN' => ['BARU' => 'PROSES'],
    'KASIR'   => ['PROSES' => 'SELESAI'],
    'ADMIN'   => ['BARU' => 'PROSES', 'PROSES' => 'SELESAI']
];

// ambil status sekarang
$current = $conn->prepare("
    SELECT status FROM pesanan WHERE id_pesanan=?
");
$current->execute([$id]);
$now = $current->fetchColumn();

$role = $_SESSION['role'];

// validasi
if (!isset($allowed[$role][$now]) || $allowed[$role][$now] !== $to) {
    die("Akses tidak valid");
}

// update status
$conn->prepare("
    UPDATE pesanan SET status=? WHERE id_pesanan=?
")->execute([$to, $id]);

header("Location: index.php");
exit;
