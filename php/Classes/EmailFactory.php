<?php

class EmailFactory
{
    static public function send($data, $user)
    {
        $address = "monacotomas99@gmail.com";
        $name = $user['name'];
        $apellido = $user['apellido'];
        $email = $user['email'];
        $content =  'Nombre:' . $name . 
                    '\nApellido:' . $apellido. 
                    '\nEmail:' . $email . 
                    '\nPregunta:' .$data['new_questions'];

        $headers = 'From: ' . $address . '\r\n' .
                    'Reply-To:' . $address . '\r\n' .
                    'X-Mailer: PHP/' . phpversion();
        mail($address, 'Preguntas', $content, $headers);
    }
}