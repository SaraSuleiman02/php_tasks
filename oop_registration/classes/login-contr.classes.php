<?php

class LoginContr extends Login
{

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        // Call the getUser method in Login
        return $this->getUser($this->email, $this->password);
    }
}
