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
  <title>Dashboard Admin - Warung Makan XYZ</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fffaf0;
    }

    .header {
      background: linear-gradient(to right, #e74c3c, #f39c12, #f1c40f);
      padding: 20px;
      color: white;
      text-align: center;
    }

    nav {
      background-color: #f39c12;
      padding: 10px;
      display: flex;
      justify-content: center;
      gap: 25px;
    }

    nav a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      padding: 6px 12px;
      border-radius: 5px;
    }

    nav a:hover {
      background-color: #e67e22;
    }

    .content {
      padding: 30px;
    }

    .box {
      background-color: #ffffff;
      border: 2px solid #f39c12;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
    }

    .box h3 {
      color: #e67e22;
      margin-top: 0;
    }

    .box p {
      margin-bottom: 10px;
    }

    .btn {
      display: inline-block;
      background-color: #e74c3c;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

<div class="header">
  <h1>Dashboard Admin</h1>
  <p>Selamat Datang di Warung Makan XYZ</p>
</div>

<nav>
  <a href="beranda.php" target="_blank">Beranda</a>
  <a href="produk_admin.php">Kelola Produk</a>
  <a href="upload_file.php">Upload Nota</a>
  <a href="histori_nota.php">Histori Pesanan</a>
  <a href="logout.php">Logout</a>
</nav>

<div class="content">
  <div class="box">
    <h3>Upload File</h3>
    <p>Unggah file PDF nota pembelian pelanggan.</p>
    <a class="btn" href="upload_file.php">Upload Sekarang</a>
  </div>

  <div class="box">
    <h3>Kelola Produk</h3>
    <p>Tambah, edit, atau hapus produk makanan di sistem.</p>
    <a class="btn" href="produk_admin.php">Kelola Produk</a>
  </div>
</div>

</body>
</html>