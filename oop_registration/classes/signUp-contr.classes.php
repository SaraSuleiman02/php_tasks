<?php
// classes/signUp-contr.classes.php
class SignUpContr extends SignUp
{

    private $name;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($name, $email, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signUpUser()
    {
        if ($this->password !== $this->passwordRepeat) {
            throw new Exception("Passwords do not match");
        }

        // Call the registerUser method in SignUp
        $this->registerUser($this->name, $this->email, $this->password);
    }
}
