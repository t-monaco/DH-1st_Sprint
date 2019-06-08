<?php

class AvatarFactory
{
    public function create($imagen)
    {
        $nombre = $imagen["avatar"]["name"];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);
        $archivoOrigen = $imagen["avatar"]["tmp_name"];
        $archivoDestino = dirname(__DIR__);
        $archivoDestino = $archivoDestino . "/img/";
        $avatar = uniqid();
        $archivoDestino = $archivoDestino . $avatar;
        $archivoDestino = $archivoDestino . "." . $ext;
        move_uploaded_file($archivoOrigen, $archivoDestino);
        $avatar = $avatar . "." . $ext;
        return $avatar;
    }
}