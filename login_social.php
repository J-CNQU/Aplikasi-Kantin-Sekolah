<?php
require 'vendor/autoload.php';
require 'config.php';

use Hybridauth\Hybridauth;

if (isset($_GET['provider'])) {
    $provider = $_GET['provider'];
    $config = include 'hybridauth_config.php';

    try {
        $hybridauth = new Hybridauth($config);
        $adapter = $hybridauth->authenticate($provider);
        $userProfile = $adapter->getUserProfile();

        $email = $userProfile->email;
        $name = $userProfile->displayName ?? $userProfile->firstName . ' ' . $userProfile->lastName;

        // Cek user di database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $role = 'user';
            $password = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $password, $role);
            $stmt->execute();
        }

        $user = $result->fetch_assoc() ?: ['id' => $conn->insert_id, 'name' => $name, 'email' => $email, 'role' => 'user'];

        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header("Location: homepage.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
