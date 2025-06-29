<?php
session_start();
include 'db/koneksi.php';
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffaf0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #e67e22;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #f39c12;
      color: white;
    }
    a.btn {
      text-decoration: none;
      padding: 6px 10px;
      border-radius: 5px;
      color: white;
      font-weight: bold;
    }
    .btn-edit {
      background-color: #e67e22;
    }
    .btn-hapus {
      background-color: #e74c3c;
    }
    .btn-tambah {
      display: inline-block;
      background: linear-gradient(to right, #e74c3c, #f39c12, #f1c40f);
      padding: 10px 15px;
      margin-bottom: 15px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      transition: 0.2s;
    }
    .btn-tambah:hover {
      opacity: 0.8;
    }
    .image {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<h2>Kelola Produk - Warung Makan XYZ</h2>

<a href="tambah_produk.php" class="btn-tambah">+ Tambah Menu Baru</a>

<table>
  <tr>
    <th>No</th>
    <th>Nama Menu</th>
    <th>Harga</th>
    <th>Kategori</th>
    <th>Gambar</th>
    <th>Aksi</th>
  </tr>

  <?php
  $no = 1;
  $menu = mysqli_query($koneksi, "
    SELECT m.*, k.nama_kategori 
    FROM menu m 
    JOIN kategori_menu k ON m.id_kategori = k.id_kategori
  ");
  while ($row = mysqli_fetch_assoc($menu)) {
    echo "<tr>
      <td>{$no}</td>
      <td>{$row['nama_menu']}</td>
      <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
      <td>{$row['nama_kategori']}</td>
      <td><img class='image' src='img/{$row['gambar']}' alt='{$row['nama_menu']}'></td>
      <td>
        <a class='btn btn-edit' href='edit_produk.php?id={$row['id_menu']}'>Edit</a>
        <a class='btn btn-hapus' href='hapus_produk.php?id={$row['id_menu']}' onclick=\"return confirm('Yakin ingin hapus menu ini?')\">Hapus</a>
      </td>
    </tr>";
    $no++;
  }
  ?>
</table>

</body>
</html>