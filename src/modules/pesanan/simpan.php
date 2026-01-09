<?php
require_once "../../auth/cek_login.php";
only(['KASIR','PELAYAN']);
require_once "../../config/database.php";

$id_user = $_SESSION['id_user'];
$tanggal = date('Y-m-d H:i:s');
$status  = "PROSES";

$conn->beginTransaction();

$stmt = $conn->prepare("
  INSERT INTO pesanan (tanggal, id_user, total, status)
  VALUES (?, ?, 0, ?)
");
$stmt->execute([$tanggal, $id_user, $status]);

$id_pesanan = $conn->lastInsertId();
$total = 0;

foreach ($_POST['qty'] as $id_menu => $qty) {
  if ($qty > 0) {
    $harga = $conn->query("
          SELECT harga FROM menu WHERE id_menu = $id_menu
        ")->fetch(PDO::FETCH_ASSOC)['harga'];

    $subtotal = $harga * $qty;
    $total += $subtotal;

    $conn->prepare("
          INSERT INTO detail_pesanan (id_pesanan, id_menu, qty, subtotal)
          VALUES (?, ?, ?, ?)
        ")->execute([$id_pesanan, $id_menu, $qty, $subtotal]);
  }
}

$conn->prepare("
  UPDATE pesanan SET total=? WHERE id_pesanan=?
")->execute([$total, $id_pesanan]);

$conn->commit();

header("Location: index.php");
exit;
