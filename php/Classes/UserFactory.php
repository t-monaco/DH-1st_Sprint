<?php

class UserFactory
{
    public function create(User $user)
    {
        $userArray = [
            'name' => $user->getName(),
            'apellido' => $user->getApellido(),
            'email' => $user->getEmail(),
            'password' => HashPassword::hash($user->getPassword()),
        ];
        
        return $userArray;
    }
}

