<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {

    echo "
    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            color: black;
            font-size: 20px;
        }
    </style>
    MOHON LOGIN DULU YA JANGAN NYEROBOS 💖
    ";
    exit();
}
?>
