<?php
include("./layout/header.php");

require 'conn.php';

// Fetch all users
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<style>

</style>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-danger-subtle border-end" id="sidebar">
        <div class="position-sticky text-center">
            <h4 class="p-3"></h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Orders</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex-grow-1 p-3">
        <div class="container">
            <h1>Users</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th><?= htmlspecialchars($user['user_id']) ?></th>
                            <td><?= htmlspecialchars($user['user_name']) ?></td>
                            <td><?= htmlspecialchars($user['user_mobile']) ?></td>
                            <td><?= htmlspecialchars($user['user_email']) ?></td>
                            <td><?= htmlspecialchars($user['user_address']) ?></td>
                            <td><a href='./feature/update_page.php?id=<?= $user["user_id"]?>' class='btn btn-primary'>Edit</a>
                            </td>
                            <td><a href='./feature/delete.php?id=<?= $user["user_id"]?>' class='btn btn-danger'>Delete</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
        </div>
    </div>
</div>

<?php
include("./layout/footer.php");
?>