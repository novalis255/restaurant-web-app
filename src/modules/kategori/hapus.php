<?php
require_once "../../config/database.php";

$conn->prepare("DELETE FROM kategori WHERE id_kategori=?")
    ->execute([$_GET['id']]);

header("Location: index.php");
