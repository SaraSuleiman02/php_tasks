<?php

class SignUp extends DBConnection
{
    protected function checkUser($email) {
        $stmt = $this->connect()->prepare("SELECT user_id FROM users WHERE user_email = ?");

        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    public function registerUser($name, $email, $password)
    {
        $dbh = $this->connect();  // Get the DB connection

        // Hash the password and insert the user
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $dbh->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        if (!$stmt->execute([$name, $email, $hashedPwd])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}