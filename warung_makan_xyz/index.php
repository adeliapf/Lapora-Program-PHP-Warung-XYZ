<?php include 'db/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu Warung Makan XYZ</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Daftar Menu Warung Makan XYZ</h1>

  <!-- Form Filter Kategori -->
  <form method="GET">
    <label>Filter Kategori:</label>
    <select name="kategori" onchange="this.form.submit()">
      <option value="">Semua</option>
      <option value="1">Makanan</option>
      <option value="2">Minuman</option>
      <option value="3">Cemilan</option>
    </select>
  </form>

  <br>

  <table>
    <tr>
      <th>Gambar</th>
      <th>Nama Menu</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>

    <?php
    $filter = isset($_GET['kategori']) ? $_GET['kategori'] : '';
    if ($filter) {
      $menu = mysqli_query($koneksi, "
        SELECT menu.*, kategori_menu.nama_kategori 
        FROM menu 
        LEFT JOIN kategori_menu ON menu.id_kategori = kategori_menu.id_kategori
        WHERE menu.id_kategori = $filter
      ");
    } else {
      $menu = mysqli_query($koneksi, "
        SELECT menu.*, kategori_menu.nama_kategori 
        FROM menu 
        LEFT JOIN kategori_menu ON menu.id_kategori = kategori_menu.id_kategori
      ");
    }

    while ($row = mysqli_fetch_assoc($menu)) {
      echo "<tr>
              <td><img src='img/{$row['gambar']}' width='100'></td>
              <td>{$row['nama_menu']}</td>
              <td>{$row['nama_kategori']}</td>
              <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
              <td><a href='pesan.php?id={$row['id_menu']}'>Pesan</a></td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>