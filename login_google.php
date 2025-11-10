<?php
require 'vendor/autoload.php';
require 'config.php';
$config = include 'config_oauth.php';

use Hybridauth\Hybridauth;

session_start();

try {
    $hybridauth = new Hybridauth($config);
    $adapter = $hybridauth->getAdapter('Google');
    $adapter->authenticate();

    $userProfile = $adapter->getUserProfile();

    // Ambil data user
    $email = $userProfile->email;
    $name = $userProfile->displayName ?: $email;

    // Cek user di DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    } else {
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

    $adapter->disconnect();

    // Redirect sesuai role
    header("Location: " . ($user['role'] === 'admin' ? 'dashboard_admin.php' : 'homepage.php'));
    exit;

} catch (Exception $e) {
    echo "<h2>Login gagal:</h2>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}
