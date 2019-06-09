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
        $query = "INSERT INTO clients (first_name, last_name, email, password, avatar) values (?,?,?,?,?)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(1, $user['first_name']);
        $statement->bindValue(2, $user['last_name']);
        $statement->bindValue(3, $user['email']);
        $statement->bindValue(4, $user['password']);
        $statement->bindValue(5, $user['avatar']);

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

    static public function saveProduct($product, $pdo)
    {
        $query = "INSERT INTO products (title, price, category_id, description, avatar ) values (?,?,?,?,?)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(1, $product['title']);
        $statement->bindValue(2, $product['price']);
        $statement->bindValue(3, $product['category_id']);
        $statement->bindValue(4, $product['description']);
        $statement->bindValue(5, $product['avatar']);

        $statement->execute();
    }

    static public function productList($tabla, $pdo)
    {
        //Aquí ejecuto la consulta deseada, para mostrar algunos campos del usuario
        $sql = "select $tabla.id, $tabla.title, $tabla.price, $tabla.description from $tabla";
        //Aquí ejecuto el prepare de la sentencia, noten que lo estoy ejecutando de forma directa haciendo uso del método query de la clase PDO, es para que vean que se puede trabajar de diferentes formas
        $consulta = $pdo->query($sql);
        //Aquí ejecuto la consulta que tengo preparada, para así traer todos los usuarios registrados y almacenarlos en la variable $listado, la cual retorno
        $listado = $consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
    }

    static public function searchProduct($productId ,$pdo)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $productId);
        $statement->execute();

        $product = $statement->fetch(PDO::FETCH_ASSOC);

        return $product;

    }

    static public function updateFirstName($data, $userID,$pdo)
    {
        $sql = "update clients set first_name=:first_name where clients.id=:id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':first_name', $data);
        $query->bindValue(':id', $userID);
        $query->execute();
        $usuarioModificar = $query->fetch(PDO::FETCH_ASSOC);
        return $usuarioModificar;
    }
    static public function updateLastName($data, $userID, $pdo)
    {
        $sql = "update clients set last_name=:last_name where clients.id=:id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':last_name', $data);
        $query->bindValue(':id', $userID);
        $query->execute();
        $usuarioModificar = $query->fetch(PDO::FETCH_ASSOC);
        return $usuarioModificar;
    }

    static public function categoriesList($pdo)
    {
        $sql = "select * from categories";
        //Aquí ejecuto el prepare de la sentencia, noten que lo estoy ejecutando de forma directa haciendo uso del método query de la clase PDO, es para que vean que se puede trabajar de diferentes formas
        $consulta = $pdo->query($sql);
        //Aquí ejecuto la consulta que tengo preparada, para así traer todos los usuarios registrados y almacenarlos en la variable $listado, la cual retorno
        $listado = $consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
    }


    // Estos son los metodos que se extienden de Database pero no los uso

    // public function save($userArray)
    // {

    // }

    // public function update()
    // {
    //     // pollo
    // }

    // public function delete()
    // {
    //     // pollo
    // }

    // public function read()
    // {
    //     // pollo
    // }
}