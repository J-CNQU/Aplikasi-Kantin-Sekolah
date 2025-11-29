<?php
$password = 'richardadmin';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "Password Asli: richardadmin\n";
echo "Hash yang Benar: " . $hashed_password;
?>