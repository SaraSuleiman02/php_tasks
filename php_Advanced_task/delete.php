<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_SESSION['user_id']]);
    session_destroy();
    header('Location: login.php'); // Redirect to login after deletion
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="main">
        <section class="delete-account">
            <div class="container">
                <h2>Are you sure you want to delete your account?</h2>
                <form method="POST" action="delete.php">
                    <div class="form-group form-button">
                        <input type="submit" name="delete" id="delete" class="form-submit" value="Delete Account" />
                    </div>
                </form>
                <a href="home.php" class="btn btn-secondary">Cancel</a>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>