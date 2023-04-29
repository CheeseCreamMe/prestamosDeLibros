<?php
class cn
{
    public function obtener_mysqli()
    {
        $host = "localhost";
        $usuario = "root";
        $contrasenia = "";
        $base_de_datos = "biblioteca";
        $mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
        if ($mysqli->connect_errno) {
            return NULL;
        }
        return $mysqli;
    }
}