<?php
session_start();
include 'db/koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    
    if ($row['role'] == 'admin') {
      header("Location: dashboard_admin.php");
    } else {
      header("Location: dashboard_user.php");
    }
    exit;
  } else {
    $error = "Username atau Password salah!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Warung Makan XYZ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffaf0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-top: 6px solid #e74c3c;
      width: 350px;
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

    input[type="text"], input[type="password"] {
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

    .register-link {
      margin-top: 15px;
      text-align: center;
    }

    .register-link a {
      text-decoration: none;
      color: #e67e22;
      font-weight: bold;
    }

    .error {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Login</h2>

  <?php if (isset($error)) { echo "<div class='error'>$error</div>"; } ?>

  <form method="POST">
    <label>Username:</label>
    <input type="text" name="username" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>
  </form>

  <div class="register-link">
    Belum punya akun? <a href="register.php">Daftar di sini</a>
  </div>
</div>

</body>
</html>