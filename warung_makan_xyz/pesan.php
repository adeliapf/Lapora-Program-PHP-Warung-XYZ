<?php
include 'db/koneksi.php';
$id = $_GET['id'];
$menu = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu=$id"));
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Pemesanan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Form Pemesanan</h2>
  <form method="POST" action="proses.php">
    <input type="hidden" name="id_menu" value="<?= $menu['id_menu'] ?>">
    <p>Menu: <b><?= $menu['nama_menu'] ?></b></p>
    <p>Harga Satuan: <b>Rp <?= number_format($menu['harga'], 0, ',', '.') ?></b></p>

    <label>Nama Anda:</label>
    <input type="text" name="nama" required>

    <label>No HP:</label>
    <input type="text" name="no_hp" required>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" min="1" required>

    <button type="submit">Pesan</button>
  </form>
</body>
</html>