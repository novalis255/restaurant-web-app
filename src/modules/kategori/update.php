<?php
require_once "../../config/database.php";

$conn->prepare("UPDATE kategori SET nama_kategori=? WHERE id_kategori=?")
    ->execute([$_POST['nama_kategori'], $_POST['id']]);

header("Location: index.php");
