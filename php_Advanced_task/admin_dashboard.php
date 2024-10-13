<?php
session_start();
require 'config.php';

if (!isset($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

// Fetch all users
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        h1 {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date Created</th>
                    <th>Date Last Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th><?= htmlspecialchars($user['id']) ?></th>
                        <td>
                            <?php if (!empty($user['profile_image'])): ?>
                                <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" alt="Profile Image" class="profile-img">
                            <?php else: ?>
                                <img src="uploads/default.jpg" alt="Default Image" class="profile-img">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['mobile']) ?></td>
                        <td><?= htmlspecialchars($user['created_at']) ?></td>
                        <td><?= htmlspecialchars($user['last_login']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                            <form method="POST" action="delete.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>