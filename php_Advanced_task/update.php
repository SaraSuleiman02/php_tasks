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

    // Update user data
    $sql = "UPDATE users SET name = :name, email = :email, mobile = :mobile, date_of_birth = :date_of_birth 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'date_of_birth' => $dob,
        'id' => $user_id
    ])) {
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
                        <form method="POST" action="update.php<?= $is_admin ? '?id=' . htmlspecialchars($user_id) : '' ?>" id="update-form">
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
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="update" class="form-submit" value="Update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>