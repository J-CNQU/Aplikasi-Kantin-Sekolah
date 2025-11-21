<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// ambil nama file, default = ayamgeprek
$id = isset($_GET['id']) ? strtolower($_GET['id']) : 'ayamgeprek';

// daftar file yang diizinkan
$allowedFiles = [
    'ayamgeprek',
    'nasigoreng',
    'nasihainam',
    'nasiduduk'
];

// kalau bukan file yang valid → paksa ke ayamgeprek
if (!in_array($id, $allowedFiles)) {
    $id = 'ayamgeprek';
}

// lokasi folder descriptions/counter1
$deskripsiDir = realpath(__DIR__ . '/descriptions/counter1');

if (!$deskripsiDir || !is_dir($deskripsiDir)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ Folder descriptions/counter1 tidak ditemukan.</h2>";
    exit;
}

// path file .php
$deskripsiFile = $deskripsiDir . "/{$id}.php";

if (!file_exists($deskripsiFile)) {
    echo "<h2 style='text-align:center;margin-top:40px;color:red;'>❌ File {$id}.php tidak ditemukan di descriptions/counter1.</h2>";
    exit;
}

// buffer output file
ob_start();
include $deskripsiFile;
$content = ob_get_clean();

// base url untuk relative path gambar/css/js
$baseUrl = '/descriptions/counter1/';

// tambahkan base tag jika ada <head>
if (stripos($content, '<head') !== false) {
    $content = preg_replace(
        '/(<head[^>]*>)/i',
        '$1' . "\n" . '<base href="' . $baseUrl . '">' . "\n",
        $content,
        1
    );
}

// tampilkan halaman
echo $content;
?>
