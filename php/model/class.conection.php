<?php

Class Conection
{
    public function getConection()
    {
        $user = 'root';
        $pass = 'root';
        $host = 'localhost';
        $db = 'techhub';
        $conection = new PDO('mysql:host=$host;dbname=$db', $user, $pass);
        return $conection;
    }
}