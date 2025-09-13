<?php
$host = "localhost";  // pakai MySQL lokal Laragon
$user = "root";       // default Laragon
$pass = "";           // defaultnya kosong (jika belum diubah)
$db   = "cafeteria";  // bikin database manual di phpMyAdmin Laragon

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
