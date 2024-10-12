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
    <title>User Info</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="main">
        <div class="container">
            <h2>User Information</h2>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><?= htmlspecialchars($user['mobile']) ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?= htmlspecialchars($user['date_of_birth']) ?></td>
                </tr>
            </table>
            <a href="update.php" class="btn btn-primary">Update</a>
            <a href="delete.php" class="btn btn-danger">Delete Account</a>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>