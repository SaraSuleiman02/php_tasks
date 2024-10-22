<?php
// include/login.inc.php
if (isset($_POST['submit'])) {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Include the necessary classes
    include '../classes/db.classes.php';
    include '../classes/login.classes.php';
    include '../classes/login-contr.classes.php';

    try {
        // Instantiate the LoginContr class and call loginUser method
        $login = new LoginContr($email, $password);
        $user = $login->loginUser();

        // Start a session and store user information
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_email'] = $user['user_email'];

        // Redirect to a dashboard or homepage
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        // Redirect to index.php with error message
        header("Location: ../index.php?error=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // If submit not clicked, redirect back
    header("Location: ../index.php");
    exit();
}
