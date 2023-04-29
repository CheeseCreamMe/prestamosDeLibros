<?php
require_once(__DIR__ . '/../cn.php');

class Libros
{
    function verPorId($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $resultado = $mysqli->prepare("SELECT `titulo`,`autor`,`editorial`,`fecha`,`ISBM` FROM `libros` WHERE `idLibro`=?");
        $resultado->bind_param("i", $id);
        $resultado->execute();
        $resultado->bind_result($titulo, $autor, $editorial, $fecha, $ISBM);
        $resultado->fetch();
        return array("titulo" => $titulo, "autor" => $autor, "editorial" => $editorial, "fecha" => $fecha, "ISBM" => $ISBM);
    }
    
    function ver()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT * FROM libros");
            $libros = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $libros[] = $fila;
            }
            return $libros;
        } catch (Exception $e) {
            echo 'UPPS Lo lameto parece ha ocurrido un error y ';
        }
    }
    
    function eliminar($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("DELETE FROM `libros` WHERE `idLibro` = ?");
        $sentencia->bind_param("i", $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function agregar($titulo, $autor, $editorial, $fecha, $ISBM)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("INSERT INTO `libros` 
        (
        `titulo`, 
        `autor`,
        `editorial`,
        `fecha`,
        `ISBM`
        )
        VALUES
        ( 
        ?, 
        ?,
        ?,
        ?,
        ?
        )
    ");
        $sentencia->bind_param("sssss", $titulo, $autor, $editorial, $fecha, $ISBM);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function editar($idLibro, $titulo, $autor, $editorial, $fecha, $ISBM)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("UPDATE `libros` 
        SET 
        `titulo` = ?, 
        `autor` = ?, 
        `editorial` = ?, 
        `fecha` = ?, 
        `ISBM` = ?
        
        WHERE
        `idLibro` =  ?;");
        $sentencia->bind_param("sssssi", $titulo, $autor, $editorial, $fecha, $ISBM, $idLibro);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}    