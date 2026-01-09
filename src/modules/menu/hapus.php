<?php
session_start();
require_once "../../config/database.php";

$id = $_GET['id'];

$data = $conn->query("SELECT gambar FROM menu WHERE id_menu=$id")->fetch();

if ($data && file_exists("../../uploads/menu/" . $data['gambar'])) {
    unlink("../../uploads/menu/" . $data['gambar']);
}

$conn->query("DELETE FROM menu WHERE id_menu=$id");

$_SESSION['success'] = "Menu berhasil dihapus";
header("Location: index.php");
exit;
