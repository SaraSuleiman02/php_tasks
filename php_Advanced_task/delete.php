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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .delete-account h2 {
            text-align: center;
        }
        .form-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-buttons .btn {
            width: 200px;
            margin: 20px 5px;
        }
    </style>
</head>

<body>
    <div class="main">
        <section class="delete-account">
            <div class="container">
                <h2>Are you sure you want to delete your account?</h2>
                <form method="POST" action="delete.php">
                    <div class="form-buttons">
                        <input type="submit" name="delete" id="delete" class="btn btn-danger" value="Delete Account" />
                        <a href="home.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>