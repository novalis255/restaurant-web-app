<?php
require_once "../../config/database.php";
$id = $_GET['id'];

$conn->prepare("DELETE FROM detail_pesanan WHERE id_pesanan=?")
    ->execute([$id]);

$conn->prepare("DELETE FROM pesanan WHERE id_pesanan=?")
    ->execute([$id]);

header("Location: index.php");
