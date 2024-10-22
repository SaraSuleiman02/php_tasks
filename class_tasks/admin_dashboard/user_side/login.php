<?php
require '../includes/db.php';
include '../includes/header.php';

$error_message = ""; // Initialize variable to store error messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch the user by email
    $sql = "SELECT * FROM users WHERE user_email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Check if the user exists and verify the password
    if ($user && password_verify($password, $user['user_password'])) {
        session_start();
        $_SESSION['user_id'] = $user['user_id'];

        header('Location: categories.php');
        exit;
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div>
        <section class="sign-in">
            <div class="container" style="margin-top: 40px;">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action="login.php" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign in image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Display error message using SweetAlert2 if there is an error
        <?php if ($error_message): ?>
            Swal.fire({
                title: 'Error!',
                text: '<?= htmlspecialchars($error_message); ?>',
                icon: 'error'
            });
        <?php endif; ?>
    </script>
</body>

</html>