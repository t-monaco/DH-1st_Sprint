<?php

class Cookie
{
    static public function set( string $name, string $value, int $duration): void
    {
        setCookie($name, $value, time() + $duration);
    }

    static public function jsonTransform(array $array): string
    {
        return json_encode($array);
    }
}