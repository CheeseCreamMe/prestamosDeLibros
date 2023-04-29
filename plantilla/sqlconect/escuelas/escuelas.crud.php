<?php
require_once(__DIR__ . '/../cn.php');
class Escuelas
{
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
        /* function ver()
        {$conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $resultado = $mysqli->query("SELECT * FROM escuelas");
        $escuelas = array();
        while ($fila = mysqli_fetch_array($resultado)) {
        $escuelas[] = $fila;
        }
        return $escuelas;
        }
        */
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