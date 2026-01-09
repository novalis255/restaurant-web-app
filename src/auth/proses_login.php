<?php
session_start();
require_once "../config/database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = $conn->prepare("
  SELECT users.*, roles.nama_role 
  FROM users 
  JOIN roles ON users.id_role = roles.id_role 
  WHERE username = ?
");
$sql->execute([$username]);
$user = $sql->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {

    // ✅ SESSION WAJIB LENGKAP
    $_SESSION['login']   = true;
    $_SESSION['id_user'] = $user['id_user'];   // 🔥 INI KUNCI UTAMA
    $_SESSION['user']    = $user['nama'];
    $_SESSION['role']    = $user['nama_role'];

    // redirect sesuai role
    if ($user['nama_role'] === 'ADMIN') {
        header("Location: ../dashboard/admin.php");
    } elseif ($user['nama_role'] === 'KASIR') {
        header("Location: ../dashboard/kasir.php");
    } else {
        header("Location: ../dashboard/pelayan.php");
    }
    exit;
} else {
    $_SESSION['error'] = "Username atau password salah";
    header("Location: login.php");
    exit;
}
