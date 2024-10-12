<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <h1>Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
        <p>Your email: <?= htmlspecialchars($user['email']) ?></p>
        <a href="home.php" class="btn btn-primary">Go to Dashboard</a>

        <!-- Logout link -->
        <a href="logout.php" class="btn btn-danger">Logout</a> <!-- Add Logout button -->
    </div>
</body>

</html>