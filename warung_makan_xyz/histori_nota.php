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
  <title>Histori Nota PDF - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffaf0;
      padding: 20px;
    }
    h2 {
      color: #e67e22;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
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
    a.download {
      background-color: #e74c3c;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      text-decoration: none;
    }
  </style>
</head>
<body>

<h2>Histori Nota PDF</h2>

<table>
  <tr>
    <th>No</th>
    <th>Nama Pelanggan</th>
    <th>Kategori</th>
    <th>Nama File</th>
    <th>Tanggal Upload</th>
    <th>File</th>
  </tr>

  <?php
  $no = 1;
  $query = mysqli_query($koneksi, "SELECT * FROM file_upload ORDER BY tanggal_upload DESC");
  while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
      <td>{$no}</td>
      <td>{$row['username']}</td>
      <td>{$row['kategori']}</td>
      <td>{$row['nama_file']}</td>
      <td>{$row['tanggal_upload']}</td>
      <td><a class='download' href='uploads/{$row['nama_file']}' target='_blank'>Lihat PDF</a></td>
    </tr>";
    $no++;
  }
  ?>
</table>

</body>
</html>