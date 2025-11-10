<?php
header("Location: callback.php?provider=Facebook");
require 'vendor/autoload.php';
require 'config.php';
$config = include 'config_oauth.php';

use Hybridauth\Hybridauth;

session_start();

try {
    $hybridauth = new Hybridauth($config);
    $adapter = $hybridauth->getAdapter('Facebook');
    $adapter->authenticate(); // memulai proses login
    header("Location: callback-facebook.php");
    exit;
} catch (\Exception $e) {
    echo "Error login Facebook: " . htmlspecialchars($e->getMessage());
}
