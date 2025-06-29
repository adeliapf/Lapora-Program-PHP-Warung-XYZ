<?php
include 'db/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Pesanan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Daftar Semua Pesanan</h1>
  <table>
    <tr>
      <th>Nama</th>
      <th>Menu</th>
      <th>Jumlah</th>
      <th>Total Harga</th>
    </tr>
    <?php
    $pesanan = mysqli_query($koneksi, "
      SELECT pesanan.*, menu.nama_menu 
      FROM pesanan 
      JOIN menu ON pesanan.id_menu = menu.id_menu
    ");
    while ($row = mysqli_fetch_assoc($pesanan)) {
      echo "<tr>
              <td>{$row['nama_pelanggan']}</td>
              <td>{$row['nama_menu']}</td>
              <td>{$row['jumlah']}</td>
              <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>