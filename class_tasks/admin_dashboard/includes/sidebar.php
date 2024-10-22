<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Add SweetAlert2 and jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: white;
            border-radius: 6px;
            color: #a3c5ff !important;
        }
    </style>
</head>

<body>
<div class="d-flex flex-column p-3 text-center" style="width: 200px; min-height:100vh; background-color: #d0e1ff;">
    <h5 class="text-primary">Admin Dashboard</h5>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="users.php" class="nav-link text-black">Users</a>
        </li>
        <li>
            <a href="items.php" class="nav-link text-black">Items</a>
        </li>
        <li>
            <a href="orders.php" class="nav-link text-black">Orders</a>
        </li>
    </ul>
</div>
