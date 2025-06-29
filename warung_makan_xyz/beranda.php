<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Beranda - Warung Makan XYZ</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fffaf0;
    }

    .header {
      background: linear-gradient(to right, #e74c3c, #f39c12, #f1c40f);
      padding: 20px;
      color: white;
      text-align: center;
    }

    .content {
      padding: 40px;
      text-align: center;
    }

    .content h2 {
      color: #e67e22;
      margin-bottom: 10px;
    }

    .content p {
      font-size: 18px;
      color: #444;
      line-height: 1.6;
      max-width: 700px;
      margin: 0 auto;
    }

    .highlight-box {
      margin: 40px auto;
      background-color: #ffeaa7;
      border-left: 6px solid #e67e22;
      padding: 20px;
      max-width: 600px;
      border-radius: 8px;
    }

    .highlight-box h3 {
      margin-top: 0;
      color: #d35400;
    }

    .highlight-box ul {
      text-align: left;
    }

    .highlight-box li {
      margin-bottom: 8px;
    }

    .footer {
      margin-top: 40px;
      text-align: center;
      font-size: 14px;
      color: #aaa;
    }

    a {
      text-decoration: none;
      font-weight: bold;
    }

    .menu-link {
      color: #e67e22;
    }

    .admin-link {
      color: #e74c3c;
    }
  </style>
</head>
<body>

<div class="header">
  <h1>Selamat Datang di Warung Makan XYZ</h1>
</div>

<div class="content">
  <h2>Makanan Lezat, Harga Bersahabat!</h2>
  <p>Warung Makan XYZ menyajikan beragam pilihan makanan, minuman, dan cemilan yang menggugah selera. Dengan sistem pemesanan online yang mudah, kamu bisa langsung memilih menu favorit tanpa antre!</p>

  <div class="highlight-box">
    <h3>Kenapa Pilih Kami?</h3>
    <ul>
      <li>✅ Menu lengkap: makanan, minuman, cemilan</li>
      <li>✅ Pemesanan cepat & mudah</li>
      <li>✅ Harga terjangkau, rasa istimewa</li>
      <li>✅ Bisa bayar via transfer atau QRIS</li>
    </ul>
  </div>

  <p style="margin-top: 20px;">
    Klik di sini untuk 
    <a class="menu-link" href="index.php">mulai memesan</a> 
    atau 
    <a class="admin-link" href="produk_admin.php">kelola produk bagi admin</a>.
  </p>
</div>

<div class="footer">
  &copy; <?= date('Y') ?> Warung Makan XYZ. All rights reserved.
</div>

</body>
</html>