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
    <nav class="navbar navbar-expand-lg" style="background-color: #d0e1ff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-black" aria-current="page" href="../views/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="../views/items.php">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="../views/orders.php">Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>