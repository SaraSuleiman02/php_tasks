<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body,
        html {
            height: 100%;
            /* Ensures body takes full height */
            margin: 0;
            /* Removes default margin */
        }

        #sidebar {
            height: 100vh;
            width: 200px;
        }

        .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: white;
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="bg-danger-subtle text-center" style="margin-bottom:-10px;">

        <h1 class="text-black">
            Admin Dashboard
        </h1>
    </div>