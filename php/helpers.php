<?php

function dd($valor)
{
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}

function rediret($param)
{
    header('Location:' . $param);
}

function inputUsuario($campo)
{
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    }
}