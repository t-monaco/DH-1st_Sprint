<?php

class Queries
{
    public function createClient($name, $last_name, $email, $password)
    {
        $model = new Conection();
        $conection = $model->getConection();
        $query = "INSERT INTO clients(name, last_name, email, password) values(:name, :last_name, :email, :password)";
        $statement = $conection->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        
        if(!$statement){
            return 'Error al crear el registro';
        }else{
            $statement->execute();
            return 'Registro creado correctamente';
        }
    }
} 