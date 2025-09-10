<?php
session_start();

// Hapus semua variabel session
$_SESSION = [];

// Hancurkan session
session_destroy();

// Redirect ke halaman login / index
header("Location: index.php");
exit();
?>
