<?php
require_once "../../auth/cek_login.php";
require_once "../../config/database.php";

$id_kategori = $_POST['id_kategori'];
$nama_menu   = $_POST['nama_menu'];
$harga       = $_POST['harga'];

/* =====================
   UPLOAD GAMBAR
===================== */

$folderUpload = "../../uploads/menu/";

if (!is_dir($folderUpload)) {
    mkdir($folderUpload, 0777, true);
}

$gambar      = $_FILES['gambar'];
$namaFile    = time() . "_" . basename($gambar['name']);
$targetFile  = $folderUpload . $namaFile;

if (!move_uploaded_file($gambar['tmp_name'], $targetFile)) {
    die("Gagal upload gambar");
}

/* =====================
   SIMPAN KE DATABASE
===================== */

$query = $conn->prepare("
    INSERT INTO menu (id_kategori, nama_menu, harga, gambar)
    VALUES (?, ?, ?, ?)
");

$query->execute([
    $id_kategori,
    $nama_menu,
    $harga,
    $namaFile
]);

header("Location: index.php");
exit;
