<?php

class UserFactory
{
    public function create(User $user)
    {
        $userArray = [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => HashPassword::hash($user->getPassword()),
            'avatar' => $user->getAvatar()
        ];
        
        return $userArray;
    }
}

