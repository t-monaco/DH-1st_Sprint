<?php

class User
{
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $avatar;

    public function __construct(string $email = null,
                                string $password = null,
                                string $first_name = null,
                                string $last_name = null,
                                $avatar = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->first_name = ucwords(strtolower($first_name));
        $this->last_name = ucwords(strtolower($last_name));
        $this->avatar = $avatar;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }
    
}