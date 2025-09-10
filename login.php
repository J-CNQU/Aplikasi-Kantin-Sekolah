<?php
session_start();
require 'config.php'; // koneksi database

// Jika sudah login, redirect
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: dashboard_admin.php");
        exit();
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: dashboard_user.php");
        exit();
    }
}

// Variabel untuk pesan error
$error = "";

// Proses login
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Ambil data user dari database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Cek password hash
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect sesuai role
            if ($user['role'] === 'admin') {
                header("Location: dashboard_admin.php");
            } else {
                header("Location: dashboard_user.php");
            }
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Sign In</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
  <style>
    <?php include "assets/css/login.css"; ?>
  </style>
</head>
<body>
  <div class="container">
    <img alt="Background" class="background" src="https://placehold.co/600x600/png?text=Food+Background"/>

    <div class="card">
      <div class="logo">
        <img alt="CAFETARIA Logo" src="/assets/img/logo.png"/>
      </div>

      <h1>Sign In</h1>

      <?php if (!empty($error)): ?>
        <p class="error-msg"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" class="input" required />

        <div class="password-field">
          <input type="password" name="password" placeholder="Password" class="input" required />
          <button type="button" onclick="togglePassword()">
            <i class="far fa-eye"></i>
          </button>
        </div>

        <a href="signup.php" class="forget">Forget password?</a>
        <button type="submit" name="login" class="btn-primary">Sign In</button>
      </form>

      <p class="or-with">Or With</p>
      <div class="socials">
        <a href="https://www.google.com/"><img src="/assets/img/google.png" alt="Google"/></a>
        <a href="https://www.facebook.com/"><img src="/assets/img/facebook.png" alt="Facebook"/></a>
        <a href="https://x.com/"><img src="/assets/img/x.png" alt="X"/></a>
      </div>

      <a href="signup.php" class="signup">
        Don’t have an account? Click <span>here</span>
      </a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const pwd = document.querySelector('.password-field input');
      const icon = document.querySelector('.password-field i');
      if (pwd.type === "password") {
        pwd.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        pwd.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
