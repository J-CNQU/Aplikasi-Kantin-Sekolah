<?php
require 'config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        $error = "Password minimal 6 karakter.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";

        // Cek apakah email sudah terdaftar
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "❌ Email sudah terdaftar, silakan login.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
            if ($stmt->execute()) {
                $success = "✅ Registrasi berhasil, silakan login.";
            } else {
                $error = "Terjadi kesalahan, coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Cafeteria Sekolah - Sign Up</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="assets/css/login.css" rel="stylesheet"/>
</head>
<body>
  <div class="container">
    <img alt="Background" class="background" src="https://placehold.co/600x600/png?text=Food+Background"/>

    <div class="card">
      <div class="logo">
        <img alt="CAFETARIA Logo" src="/assets/img/logo.png"/>
      </div>

      <h1>Sign Up</h1>

      <?php if (!empty($error)): ?>
        <p class="error-msg"><?= htmlspecialchars($error) ?></p>
      <?php elseif (!empty($success)): ?>
        <p class="success-msg"><?= htmlspecialchars($success) ?></p>
      <?php endif; ?>

      <form method="POST" action="">
        <input type="text" name="name" placeholder="Nama lengkap" class="input" required />

        <input type="email" name="email" placeholder="Email" class="input" required />

        <div class="password-field">
          <input type="password" name="password" placeholder="Password minimal 6 karakter" class="input" required />
          <button type="button" onclick="togglePassword()">
            <i class="far fa-eye"></i>
          </button>
        </div>

        <button type="submit" class="btn-primary">Daftar</button>
      </form>

      <p class="muted">Sudah punya akun? <a href="logout.php">Login</a></p>
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
