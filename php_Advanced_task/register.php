<?php
require 'config.php';

$error_message = ""; // Initialize variable to store error messages
$success_message = ""; // Initialize variable to store success messages

$fname = $mname = $lname = $family_name = $email = $mobile = $dob = ""; // Initialize empty variables to retain values

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
        // Concatenate the full name
        $full_name = trim("$fname $mname $lname $family_name");

        // Handle image upload
        $target_dir = "uploads/"; // Directory to store images

        // Check if the file is uploaded and no errors occurred
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $profile_image = $_FILES['profile_image'];
            $image_name = time() . '_' . basename($profile_image['name']); // unique name
            $target_file = $target_dir . $image_name;
            $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validate image type (jpg, png, gif)
            $valid_image_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($image_file_type, $valid_image_types)) {
                $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            } elseif (move_uploaded_file($profile_image['tmp_name'], $target_file)) {
                // Insert user into the database with image path
                $sql = "INSERT INTO users (name, email, password, mobile, date_of_birth, profile_image) 
                        VALUES (:name, :email, :password, :mobile, :date_of_birth, :profile_image)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'name' => $full_name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'mobile' => $mobile,
                    'date_of_birth' => $dob,
                    'profile_image' => $image_name // Save the image file name
                ]);
                $success_message = "Registration successful! Redirecting to login page...";
            } else {
                $error_message = "There was an error uploading your file.";
            }
        } else {
            $error_message = "Please upload a valid profile image.";
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
    <div>
        <section class="signup">
            <div class="container" style="margin-top: 40px;">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" action="register.php" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname" placeholder="First Name" value="<?= htmlspecialchars($fname) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="mname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mname" id="mname" placeholder="Middle Name" value="<?= htmlspecialchars($mname) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?= htmlspecialchars($lname) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="family_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="family_name" id="family_name" placeholder="Family Name" value="<?= htmlspecialchars($family_name) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?= htmlspecialchars($email) ?>" required />
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
                                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number" value="<?= htmlspecialchars($mobile) ?>" pattern="\d{14}" required />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($dob) ?>" max="<?= date('Y-m-d'); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="profile_image"><i class="zmdi zmdi-camera"></i></label>
                                <input type="file" name="profile_image" id="profile_image" accept="image/*" required />
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
                window.location = 'login.php';
            });
        <?php endif; ?>
    </script>
</body>

</html>