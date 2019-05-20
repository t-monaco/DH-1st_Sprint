<?php

class Validator 
{
    public function validate(User $user, string $cpassword = null)
    {
        $errors = array();
        if ($user->getName() != null){
            if ($user->getName() == '') {
                $errors['name'] = 'Campo obligatorio';
            }
        }
        if ($user->getApellido() != null){
            if ($user->getApellido() == '') {
                $errors['apellido'] = 'Campo obligatorio';
            }
        }
        
        if ($user->getEmail() == '' ){
            $errors['email'] = 'Campo obligatorio';
        } else if (!filter_var( $user->getEmail(), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email invalido';
        }

        if ($user->getPassword() == '' ){
            $errors['password'] = 'Porfavor complete la contraseña';
        } else if(strlen($user->getPassword()) < 8){
            $errors['password'] =   'La contraseña debe tener al menos 8 caracteres';
        } else if(!preg_match('`[a-z]`', $user->getPassword())){
            $errors['password'] = 'La contraseña debe tener al menos una minuscula';
        } else if (!preg_match('`[A-Z]`', $user->getPassword())) {
            $errors['password'] = 'La contraseña debe tener al menos una mayúscula';
        } else if (!preg_match('`[0-9]`', $user->getPassword())) {
            $errors['password'] = 'La contraseña debe tener al menos un número';
        } else if ($cpassword != null){
            if ($cpassword !== ' ' && $user->getPassword() !== $cpassword) {
                $errors['cpassword'] = 'Las contraseñas no coinciden';
            }
        }
        
        

        return $errors;

    }
}