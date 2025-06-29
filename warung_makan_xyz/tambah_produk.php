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
  <title>Upload Nota / Rapor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffaf0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-container {
      background: white;
      border: 2px solid #f39c12;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
    }
    h2 {
      text-align: center;
      color: #e67e22;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    select, input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: #e74c3c;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Upload Nota / Rapor</h2>
  <form action="proses_upload.php" method="POST" enctype="multipart/form-data">
    <label>Nama Pengguna:</label>
    <select name="username" required>
      <?php
      $pengguna = mysqli_query($koneksi, "SELECT username, nama_lengkap FROM users WHERE role = 'user'");
      while ($row = mysqli_fetch_assoc($pengguna)) {
        echo "<option value='{$row['username']}'>{$row['nama_lengkap']}</option>";
      }
      ?>
    </select>

    <label>Pilih File (PDF):</label>
    <input type="file" name="nota" accept="application/pdf" required>

    <button type="submit">Upload</button>
  </form>
</div>

</body>
</html>