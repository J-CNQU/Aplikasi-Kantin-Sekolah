<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

if ($id < 1 || $id > 4) $id = 1;

$cafetariaDir = realpath(__DIR__ . '/../cafetaria');

if (!$cafetariaDir || !is_dir($cafetariaDir)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ Folder 'cafetaria' tidak ditemukan.<br>Periksa struktur direktori kamu.</h2>";
    exit;
}

$counterFile = $cafetariaDir . "/counter{$id}.php";

if (!file_exists($counterFile)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ File counter{$id}.php tidak ditemukan di folder cafetaria.</h2>";
    exit;
}

ob_start();
include $counterFile;
$content = ob_get_clean();

$baseUrl = '/cafetaria/';

if (stripos($content, '<head') !== false) {
    $content = preg_replace(
        '/(<head[^>]*>)/i',
        '$1' . "\n" . '<base href="' . $baseUrl . '">' . "\n",
        $content,
        1
    );
}

echo $content;
?>