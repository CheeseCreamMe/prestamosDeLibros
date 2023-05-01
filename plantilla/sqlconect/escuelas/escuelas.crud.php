<?php
require_once(__DIR__ . '/../cn.php');
class Escuelas
{

    /*Este script es una clase llamada "Escuelas" que define varios métodos para trabajar con una tabla "escuelas" en una base de datos. Cada método ejecuta una consulta SQL específica para agregar, editar, eliminar o ver datos de la tabla.
    - La función "verPorId" recibe un ID de escuela como parámetro y devuelve un array asociativo con el nombre y el director de esa escuela.
    - La función "ver" no recibe ningún parámetro y devuelve un array con todas las filas de la tabla "escuelas".
    - La función "eliminar" recibe un ID de escuela como parámetro y devuelve true si se eliminó correctamente o false si ocurrió un error.
    - La función "agregar" recibe el nombre y el director de una escuela como parámetros y devuelve true si se agregó correctamente o false si ocurrió un error.
    - La función "editar" recibe el ID, el nuevo nombre y el nuevo director de una escuela como parámetros y devuelve true si se editó correctamente o false si ocurrió un error.
    Cada método utiliza un objeto "cn" para conectarse a la base de datos y ejecutar la consulta correspondiente. Si ocurre un error en la consulta, se muestra un mensaje en la función "ver", pero en las demás funciones simplemente se devuelve false. */
    function verPorId($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $resultado = $mysqli->prepare("SELECT `nombre`,`director` FROM `escuelas` WHERE `idEscuela`=?");
        $resultado->bind_param("s", $id);
        $resultado->execute();
        $resultado->bind_result($nombre, $director);
        $resultado->fetch();
        return array("nombre" => $nombre, "director" => $director);
    }

    function ver()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT * FROM escuelas");
            $escuelas = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $escuelas[] = $fila;
            }
            return $escuelas;
        } catch (Exception $e) {
            echo 'UPPS Lo lameto parece ha ocurrido un error y ';
        }
    }
    function eliminar($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("DELETE FROM `escuelas` WHERE `idEscuela` = ?");
        $sentencia->bind_param("i", $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function agregar($nombre, $director)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("INSERT INTO `escuelas` 
        (
        `nombre`, 
        `director`
        )
        VALUES
        ( 
        ?, 
        ?
        )
    ");
        $sentencia->bind_param("ss", $nombre, $director);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function editar($id, $nuevo_nombre, $nuevo_director)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("UPDATE `escuelas` SET `nombre` = ?, `director` = ? WHERE `idEscuela` = ?");
        $sentencia->bind_param("ssi", $nuevo_nombre, $nuevo_director, $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}