<?php
// classes/signUp-contr.classes.php
class SignUpContr extends SignUp
{

    private $name;
    private $email;
    private $password;
    private $passwordRepeat;

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error:emptyInput");
            exit();
        }

        if ($this->invalidPwd() == false) {
            header("location: ../index.php?error:invalidPwd");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error:invalidEmail");
            exit();
        }

        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error:pwdDon'tMatch");
            exit();
        }

        if ($this->emailTakenCheck() == false) {
            header("location: ../index.php?error:emailtaken");
            exit();
        }

        $this->registerUser($this->name, $this->email, $this->password);
    }

    public function __construct($name, $email, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    private function emptyInput()
    {
        $result = false;

        if (empty($this->name) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidPwd()
    {
        // Check if the password meets the following criteria:
        // - At least 8 characters
        // - Contains at least one uppercase letter
        // - Contains at least one lowercase letter
        // - Contains at least one number
        // - Contains at least one special character
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

        if (!preg_match($pattern, $this->password)) {
            return false;
        } else {
            return true;
        }
    }


    private function pwdMatch()
    {
        $result = false;
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function emailTakenCheck()
    {
        return $this->checkUser($this->email);
    }
}
