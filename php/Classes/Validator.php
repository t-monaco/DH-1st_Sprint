<?php

class Validator 
{
    public function validate(User $user, string $cpassword = null)
    {
        $errors = array();
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($user->getFirstName() != null){
            if ($user->getFirstName() == '') {
                $errors['first_name'] = 'Campo obligatorio';
            } else {
                for($i = 0; $i < strlen($user->getFirstName()); $i++) {
                    if (strpos($permitidos, substr($user->getFirstName(), $i, 1)) === false) {
                        $errors['first_name'] = 'Solo se permiten letras';
                    }
                }
            }
        }
        if ($user->getLastName() != null){
            if ($user->getLastName() == '') {
                $errors['last_name'] = 'Campo obligatorio';
            } else {
                for ($i = 0; $i < strlen($user->getLastName()); $i++) {
                    if (strpos($permitidos, substr($user->getLastName(), $i, 1)) === false) {
                        $errors['last_name'] = 'Solo se permiten letras';
                    }
                }
            }
        }
        if ($user->getEmail() != null) {
            if ($user->getEmail() == '' ){
                $errors['email'] = 'Campo obligatorio';
            } else if (!filter_var( $user->getEmail(), FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email invalido';
            }
        }
        if ($user->getPassword() != null) {
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
        }
        
        

        return $errors;

    }

    public function persist($position)
    {
        if (isset($_POST[$position])){
            return $_POST[$position];
        }
    }

    public function validateAvatar()
    {
        $errors = array();
        if(isset($_FILES['avatar'])){
            if ($_FILES["avatar"]["error"] != 0) {
                $errors["avatar"] = "Error debe subir imagen";
            }
            $nombre = $_FILES["avatar"]["name"];
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);
            if ($ext != "png" && $ext != "jpg") {
                $errors["avatar"] = "Debe seleccionar archivo png ó jpg";
            }
            return $errors;

        }
        

    }

}