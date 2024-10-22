<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto mt-5">
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
                    <div class="alert alert-success">
                        Sign up successful! Please log in.
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="include/login.inc.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>

                <!-- Sign Up Form -->
                <div class="card mt-4">
                    <div class="card-header">Sign Up</div>
                    <div class="card-body">
                        <form action="include/signup.inc.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="passwordRepeat" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>