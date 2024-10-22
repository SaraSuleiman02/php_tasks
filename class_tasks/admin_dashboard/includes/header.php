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

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: white;
            border-radius: 6px;
            color: #a3c5ff !important;
        }

        .category-card {
            height: 100%;
            /* Makes all cards the same height */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Smooth scaling and shadow transition */
        }

        .category-card:hover {
            transform: scale(1.05);
            /* Scales the card slightly on hover */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            /* Adds shadow on hover */
        }

        .card-text {
            color: #000;
            /* Ensures the description looks like a normal paragraph */
        }

        .row .col-md-4 {
            margin-bottom: 20px;
            /* Adds space between rows */
        }

        .container {
            margin-bottom: 50px;
        }

        h2 {
            margin-top: 0;
        }

        .img-fluid {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
        }

        .form-group {
            max-width: 200px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .animated-header {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .lead {
            margin-top: 20px;
            font-size: 1.25rem;
            color: #555;
        }

        #shopNowBtn {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        #shopNowBtn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #d0e1ff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-black" aria-current="page" href="../user_side/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-black" aria-current="page" href="../user_side/about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="../user_side/contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="../user_side/categories.php">Categories</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="../user_side/basket.php">
                            <i class="fas fa-shopping-basket"></i> Basket
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>