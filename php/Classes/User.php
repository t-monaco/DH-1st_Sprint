<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $apellido;

    public function __construct(string $email,
                                string $password,
                                string $name = null,
                                string $apellido = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->apellido = $apellido;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
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
    
}