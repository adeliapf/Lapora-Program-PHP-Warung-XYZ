<?php
session_start();
include 'db/koneksi.php';
if ($_SESSION['role'] != 'admin') {
  header("Location: login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['username'];
  $file = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];

  move_uploaded_file($tmp, "uploads/$file");

  mysqli_query($koneksi, "INSERT INTO file_upload (username, kategori, nama_file) 
                          VALUES ('$user', 'Nota', '$file')");

  $sukses = "File berhasil diunggah.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Nota - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fffaf0;
      padding: 30px;
    }
    .container {
      background: white;
      border: 2px solid #f39c12;
      padding: 25px;
      width: 400px;
      margin: auto;
      border-radius: 10px;
    }
    h2 {
      text-align: center;
      color: #e67e22;
    }
    label {
      font-weight: bold;
    }
    input, select {
      width: 100%;
      margin-bottom: 15px;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    .success {
      text-align: center;
      color: green;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Upload Nota</h2>
  <?php if (isset($sukses)) echo "<div class='success'>$sukses</div>"; ?>
  <form method="POST" enctype="multipart/form-data">
    <label>Pilih Pelanggan:</label>
    <select name="username" required>
      <?php
      $pengguna = mysqli_query($koneksi, "SELECT username FROM users WHERE role = 'user'");
      while ($row = mysqli_fetch_assoc($pengguna)) {
        $username = $row['username'];
        echo "<option value='$username'>$username</option>";
      }
      ?>
    </select>

    <label>Pilih File (PDF):</label>
    <input type="file" name="file" accept="application/pdf" required>

    <button type="submit">Upload</button>
  </form>
</div>

</body>
</html>