<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Pelanggan - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fff5e6;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #e67e22;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .container {
      margin: 30px auto;
      max-width: 600px;
      background: white;
      border: 2px solid #f39c12;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    a.btn {
      display: inline-block;
      margin-top: 20px;
      background-color: #e74c3c;
      color: white;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<header>
  <h2>Dashboard Pelanggan</h2>
  <p>Selamat datang, <?= $_SESSION['username'] ?> di Warung Makan XYZ</p>
</header>

<div class="container">
  <p>Silakan mulai memesan makanan favorit kamu!</p>
  <a class="btn" href="index.php">Lihat Menu & Pesan</a><br>
  <a class="btn" href="logout.php" style="background:#f39c12;">Logout</a>
</div>

</body>
</html>