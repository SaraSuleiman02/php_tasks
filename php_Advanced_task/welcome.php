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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        h1 {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
        <?php if (!empty($user['profile_image'])): ?>
            <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" alt="Profile Image" class="profile-img">
        <?php else: ?>
            <img src="uploads/default.jpg" alt="Default Image" class="profile-img">
        <?php endif; ?>
        <p>Your email: <?= htmlspecialchars($user['email']) ?></p>

        <a href="home.php" class="btn btn-primary">Go to Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>