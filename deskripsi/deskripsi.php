<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ambil file dari query
$id = isset($_GET['id']) ? strtolower($_GET['id']) : 'ayamgeprek';

// File valid
$allowedFiles = [
    'ayamgeprek',
    'nasigoreng',
    'nasihainam',
    'nasiuduk'
];

if (!in_array($id, $allowedFiles)) {
    $id = 'ayamgeprek';
}

// Path folder → disesuaikan dengan struktur kamu
$deskripsiDir = realpath(__DIR__ . '/../cafetaria/descriptions/counter1');

if (!$deskripsiDir || !is_dir($deskripsiDir)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ Folder descriptions/counter1 tidak ditemukan.</h2>";
    exit;
}

// Path file php
$deskripsiFile = $deskripsiDir . "/{$id}.php";

if (!file_exists($deskripsiFile)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ File {$id}.php tidak ditemukan di descriptions/counter1.</h2>";
    exit;
}

// Ambil isi file
ob_start();
include $deskripsiFile;
$content = ob_get_clean();

// Base href
$baseUrl = '/cafetaria/descriptions/counter1/';

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
