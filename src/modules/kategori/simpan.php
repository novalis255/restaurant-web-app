<?php
require_once "../../config/database.php";

$nama = $_POST['nama_kategori'];
$conn->prepare("INSERT INTO kategori (nama_kategori) VALUES (?)")
    ->execute([$nama]);

header("Location: index.php");
