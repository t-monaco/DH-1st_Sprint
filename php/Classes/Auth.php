<?php

class Auth
{
    public function login($email)
    {
        Session::set('email', $email);
        Cookie::set('email', $email, 3600);
    }

    public function validatePassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function createSession($user)
    {
        Session::start();
        Session::set('first_name', $user['first_name']);
        Session::set('email', $user['email']);
        Session::set('last_name', $user['last_name']);
        Session::set('admin', $user['admin']);
    }

    public function remember($password)
    {
        Cookie::set('password', $password, 3600);
    }

}