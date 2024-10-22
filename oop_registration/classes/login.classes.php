<?php

class Login extends DBConnection
{

    public function getUser($email, $password)
    {
        $dbh = $this->connect();  // Get the DB connection

        // Check if the email exists in the database
        $stmt = $dbh->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->execute([$email]);

        // If no user found, return an error
        if ($stmt->rowCount() === 0) {
            throw new Exception("No user found with this email");
        }

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the password matches
        $passwordHashed = $user['user_password'];
        if (!password_verify($password, $passwordHashed)) {
            throw new Exception("Incorrect password");
        }

        // Return the user data if successful
        return $user;
    }
}