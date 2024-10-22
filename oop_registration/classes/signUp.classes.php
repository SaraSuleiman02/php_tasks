<?php
// classes/signUp.classes.php
class SignUp extends DBConnection
{

    public function registerUser($name, $email, $password)
    {
        $dbh = $this->connect();  // Get the DB connection

        // Check if email already exists
        $stmt = $dbh->prepare("SELECT user_email FROM users WHERE user_email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            throw new Exception("Email already in use");
        }

        // Hash the password and insert the user
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $dbh->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        if (!$stmt->execute([$name, $email, $hashedPwd])) {
            throw new Exception("Error during registration");
        }
    }
}