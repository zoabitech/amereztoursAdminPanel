<?php

use Admin as GlobalAdmin;

class Admin
{
    protected $username;
    protected $email;
    protected $userPassword;
    //Geter and Setter
    public function getUserName()
    {
        return $this->username;
    }

    public function setUserName($name)
    {
        $this->username = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserPassword($password)
    {
        $this->userPassword = $password;
    }
}
