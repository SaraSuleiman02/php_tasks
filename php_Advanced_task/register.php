<?php
require 'config.php';

$error_message = ""; // Initialize variable to store error messages
$success_message = ""; // Initialize variable to store success messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input fields
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $family_name = $_POST['family_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    // Password validation
    if ($password !== $password_confirm) {
        $error_message = "Passwords do not match.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $error_message = "Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
    } else {
        // Calculate age
        $currentDate = new DateTime();
        $birthDate = new DateTime($dob);
        $age = $currentDate->diff($birthDate)->y;

        if ($age < 16) {
            $error_message = "You must be at least 16 years old to register.";
        } else {
            // Concatenate the full name
            $full_name = trim("$fname $mname $lname $family_name");

            // Insert user into the database
            $sql = "INSERT INTO users (name, email, password, mobile, date_of_birth) 
                    VALUES (:name, :email, :password, :mobile, :date_of_birth)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $full_name,  // Store the full name in a single column
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'mobile' => $mobile,
                'date_of_birth' => $dob
            ]);
            $success_message = "Registration successful! Redirecting to login page...";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" action="register.php" id="register-form">
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname" placeholder="First Name" required />
                            </div>
                            <div class="form-group">
                                <label for="mname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mname" id="mname" placeholder="Middle Name" required />
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname" placeholder="Last Name" required />
                            </div>
                            <div class="form-group">
                                <label for="family_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="family_name" id="family_name" placeholder="Family Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="password_confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required />
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number" pattern="\d{14}" required />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" max="<?= date('Y-m-d'); ?>" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sign up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already a member</a>
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
        // Check for PHP error messages and display them
        <?php if ($error_message): ?>
            Swal.fire({
                title: 'Error!',
                text: '<?php echo $error_message; ?>',
                icon: 'error'
            });
        <?php endif; ?>

        <?php if ($success_message): ?>
            Swal.fire({
                title: 'Success!',
                text: '<?php echo $success_message; ?>',
                icon: 'success'
            }).then(function() {
                window.location = 'login.php'; // Redirect on confirmation
            });
        <?php endif; ?>
    </script>
</body>

</html>