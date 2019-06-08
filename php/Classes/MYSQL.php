<?php

class MYSQL
{
    static public function connect($username, $password, $host, $db_name, $port = null)
    {
        $dsn = "";

        if ($port !== null) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';port=' . $port;
        } else {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;
        }

        try {

            $pdo = new PDO($dsn, $username, $password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;
        } catch (PDOException $e) {
            die('No pude conectarme' . $e->getMessage());
        }
    }

    static public function saveUser($user, $pdo)
    {
        $query = "INSERT INTO clients (first_name, last_name, email, password) values (?,?,?,?)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(1, $user['first_name']);
        $statement->bindValue(2, $user['last_name']);
        $statement->bindValue(3, $user['email']);
        $statement->bindValue(4, $user['password']);

        $statement->execute();
    }

    static public function searchUser($email, $pdo)
    {
        $query = "SELECT * FROM clients WHERE email = ?";

        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);    

        return $user;
    }

    static public function updateAvatar($user, $avatar, $pdo)
    {
        $id = $user['id'];

        $query = "UPDATE clients SET avatar =:avatar WHERE  id  =:id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(":avatar", $avatar);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public function save($userArray)
    {

    }

    public function update()
    {
        // pollo
    }

    public function delete()
    {
        // pollo
    }

    public function read()
    {
        // pollo
    }
}