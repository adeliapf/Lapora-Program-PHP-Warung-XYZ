<?php
include 'db/koneksi.php';

$nama     = $_POST['nama'];
$no_hp    = $_POST['no_hp'];
$id_menu  = $_POST['id_menu'];
$jumlah   = $_POST['jumlah'];

$menu     = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu=$id_menu"));
$total    = $jumlah * $menu['harga'];

mysqli_query($koneksi, "INSERT INTO pesanan 
(nama_pelanggan, id_menu, jumlah, total_harga, no_hp) 
VALUES ('$nama', $id_menu, $jumlah, $total, '$no_hp')");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pesanan Berhasil</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Terima kasih, <?= htmlspecialchars($nama) ?>!</h2>
  <p>Pesanan Anda:</p>
  <ul>
    <li><b><?= $menu['nama_menu'] ?></b></li>
    <li>Jumlah: <?= $jumlah ?></li>
    <li>Total Harga: Rp <?= number_format($total, 0, ',', '.') ?></li>
    <li>No HP: <?= htmlspecialchars($no_hp) ?></li>
  </ul>
  <a href="index.php">Kembali ke Menu</a>
</body>
</html>