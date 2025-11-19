<?php
session_start(); // cukup sekali di paling atas

require_once 'vendor/autoload.php';
require_once 'config.php';       // koneksi database mysqli
$config_oauth = include 'config_oauth.php'; // client id & secret

use Hybridauth\Hybridauth;

$error = "";

// Jika sudah login → redirect sesuai role
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] === 'admin') {
    header("Location: dashboard_admin.php");
    exit();
  } else {
    header("Location: homepage.php");
    exit();
  }
}

// ===== LOGIN MANUAL (EMAIL & PASSWORD) =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['role'] = $user['role'];

      header("Location: " . ($user['role'] === 'admin' ? 'dashboard_admin.php' : 'homepage.php'));
      exit();
    } else {
      $error = "Password salah!";
    }
  } else {
    $error = "Email tidak ditemukan!";
  }
}

// ===== LOGIN VIA OAUTH (Google / Facebook) =====
if (isset($_GET['provider'])) {
  try {
    $providerName = $_GET['provider'];
    $hybridauth = new Hybridauth($config_oauth);
    $adapter = $hybridauth->getAdapter($providerName);
    $adapter->authenticate();
    $userProfile = $adapter->getUserProfile();

    // Ambil data user dari provider
    $email = $userProfile->email;
    $name = $userProfile->displayName ?: $email;

    // Cek apakah user sudah ada di DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
    } else {
      // User baru → simpan ke DB
      $password = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT);
      $role = 'user';
      $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
      $stmt->bind_param("ssss", $name, $email, $password, $role);
      $stmt->execute();
      $user = [
        'id' => $conn->insert_id,
        'name' => $name,
        'email' => $email,
        'role' => $role
      ];
    }

    // Simpan session
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['provider'] = $providerName;

    // Tutup koneksi OAuth
    $adapter->disconnect();

    // Redirect sesuai role
    header("Location: " . ($user['role'] === 'admin' ? 'dashboard_admin.php' : 'homepage.php'));
    exit();

  } catch (Exception $e) {
    $error = "Login gagal: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <style>
    <?php include "assets/css/login.css"; ?>
  </style>
  <link href="assets/css/login.css" rel="stylesheet" />
  <link rel="shortcut icon" href="fcon.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <img alt="Background" class="background" src="https://placehold.co/600x600/png?text=Food+Background" />

    <div class="card">
      <div class="logo">
        <img alt="CAFETARIA Logo" src="/assets/img/logo.png" />
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
        <a href="login_google.php"><img src="/assets/img/google.png" alt="Google" /></a>
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