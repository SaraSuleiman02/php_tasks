<?php
// The password you want to hash
$password = "Admin2024@2024";

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Output the hashed password
echo $hashedPassword;
?>
