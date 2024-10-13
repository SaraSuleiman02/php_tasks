<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Check if the logged-in user is an admin
$is_admin = isset($_SESSION['is_admin']);
$user_id = $_SESSION['user_id']; // The logged-in user's ID

// For admins, allow updating any user via the URL parameter 'id'
if ($is_admin && isset($_GET['id'])) {
    $user_id = $_GET['id'];
}

// Fetch the user's data based on the ID (either the logged-in user or a selected user by the admin)
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

// If the user doesn't exist
if (!$user) {
    if ($is_admin) {
        header('Location: admin_dashboard.php');
    } else {
        header('Location: home.php');
    }
    exit;
}

// Get updated user info
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    // Initialize file variables
    $profile_image = $_FILES['profile_image'] ?? null;
    $cv_file = $_FILES['cv_file'] ?? null;

    // Update user data
    $sql = "UPDATE users SET name = :name, email = :email, mobile = :mobile, date_of_birth = :date_of_birth";

    // Add image and CV update if provided
    if ($profile_image && $profile_image['error'] == 0) {
        $target_dir = "uploads/";
        $image_name = time() . '_' . basename($profile_image['name']);
        $target_image_file = $target_dir . $image_name;
        $image_file_type = strtolower(pathinfo($target_image_file, PATHINFO_EXTENSION));
        $valid_image_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($image_file_type, $valid_image_types) && move_uploaded_file($profile_image['tmp_name'], $target_image_file)) {
            $sql .= ", profile_image = :profile_image";
        } else {
            echo "Error uploading the profile image.";
        }
    }

    if ($cv_file && $cv_file['error'] == 0) {
        $target_dir = "uploads/";
        $cv_name = time() . '_' . basename($cv_file['name']);
        $target_cv_file = $target_dir . $cv_name;
        $cv_file_type = strtolower(pathinfo($target_cv_file, PATHINFO_EXTENSION));
        $valid_cv_types = ['pdf', 'doc', 'docx'];

        if (in_array($cv_file_type, $valid_cv_types) && move_uploaded_file($cv_file['tmp_name'], $target_cv_file)) {
            $sql .= ", cv_file = :cv_file";
        } else {
            echo "Error uploading the CV.";
        }
    }

    // Finish SQL query
    $sql .= " WHERE id = :id";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $params = [
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'date_of_birth' => $dob,
        'id' => $user_id,
    ];

    if (isset($image_name)) {
        $params['profile_image'] = $image_name;
    }

    if (isset($cv_name)) {
        $params['cv_file'] = $cv_name;
    }

    // Execute the update
    if ($stmt->execute($params)) {
        if ($is_admin) {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: home.php');
        }
        exit;
    } else {
        echo "Error: Could not update information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Update Info</h2>
                        <form method="POST" action="update.php<?= $is_admin ? '?id=' . htmlspecialchars($user_id) : '' ?>" id="update-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="mobile" id="mobile" value="<?= htmlspecialchars($user['mobile']) ?>" pattern="\d{14}" required />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($user['date_of_birth']) ?>" max="<?= date('Y-m-d'); ?>" required />
                            </div>
                            <div class="form-group">
                                <span style="margin-left: 10px;">Current Image:</span>
                                <?php if (!empty($user['profile_image'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" alt="Profile Image" style="width: 100px; margin-left: 10px;" />
                                <?php endif; ?>
                                <label for="profile_image"><i class="zmdi zmdi-camera"></i></label>
                                <input type="file" name="profile_image" id="profile_image" accept="image/*"/>
                            </div>
                            <div class="form-group">
                                <span style="margin-left: 10px;">Current CV:</span>
                                <?php if (!empty($user['cv_file'])): ?>
                                    <a href="uploads/<?= htmlspecialchars($user['cv_file']) ?>" target="_blank"><?= htmlspecialchars($user['cv_file']) ?></a>
                                <?php endif; ?>
                                <label for="cv_file"><i class="zmdi zmdi-file"></i></label>
                                <input type="file" name="cv_file" id="cv_file" accept=".pdf,.doc,.docx" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="update" class="form-submit" value="Update" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/update.png" alt="update image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>