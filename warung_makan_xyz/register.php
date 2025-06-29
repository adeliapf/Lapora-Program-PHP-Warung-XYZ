<?php
include 'db/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Simpan ke tabel users dengan role user
  mysqli_query($koneksi, "INSERT INTO users (username, password, role) VALUES ('$user', '$pass', 'user')");
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #f39c12, #f1c40f, #e74c3c);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .register-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
      text-align: center;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    h2 {
      color: #e67e22;
    }
    input {
      width: 90%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 95%;
      padding: 10px;
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Daftar Akun</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Buat Username" required><br>
      <input type="password" name="password" placeholder="Buat Password" required><br>
      <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
  </div>
</body>
</html>