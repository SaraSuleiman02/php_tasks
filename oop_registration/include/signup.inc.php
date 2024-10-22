<?php
// include/signup.inc.php
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    // Include the necessary classes
    include '../classes/db.classes.php';
    include '../classes/signUp.classes.php';
    include '../classes/signUp-contr.classes.php';

    try {
        // Instantiate the SignUpContr class and call signUpUser method
        $signup = new SignUpContr($name, $email, $password, $passwordRepeat);
        $signup->signUpUser();

        // Redirect to index.php with success message
        header("Location: ../index.php?signup=success");
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
