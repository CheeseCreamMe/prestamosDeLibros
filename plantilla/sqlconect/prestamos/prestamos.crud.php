<?php
require_once(__DIR__ . '/../cn.php');

class Prestamos
{
    function verPorId($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $resultado = $mysqli->prepare("SELECT `idAlumno`, `idLibro`, `fechaPrestamo`, `fechaDevolucion`, `estado` FROM `prestamos` WHERE `idPrestamo`=?");
        $resultado->bind_param("i", $id);
        $resultado->execute();
        $resultado->bind_result($idAlumno, $idLibro, $fechaPrestamo, $fechaDevolucion, $estado);
        $resultado->fetch();
        return array("idAlumno" => $idAlumno, "idLibro" => $idLibro, "fechaPrestamo" => $fechaPrestamo, "fechaDevolucion" => $fechaDevolucion, "estado" => $estado);
    }
    
    
    function ver()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT * FROM prestamos");
            $prestamos = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $prestamos[] = $fila;
            }
            return $prestamos;
        } catch (Exception $e) {
            echo 'UPPS Lo lameto parece ha ocurrido un error y ';
        }
    }
    
    function eliminar($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("DELETE FROM `prestamos` WHERE `idPrestamo` = ?");
        $sentencia->bind_param("i", $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function agregar($idAlumno, $idLibro, $fechaPrestamo, $fechaDevolucion, $estado)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("INSERT INTO `prestamos` 
        (
        `idAlumno`, 
        `idLibro`,
        `fechaPrestamo`,
        `fechaDevolucion`,
        `estado`
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
        $sentencia->bind_param("iisss", $idAlumno, $idLibro, $fechaPrestamo, $fechaDevolucion, $estado);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function editar($idPrestamo, $idAlumno, $idLibro, $fechaPrestamo, $fechaDevolucion, $estado)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("UPDATE `prestamos` 
        SET 
        `idAlumno` = ?, 
        `idLibro` = ?, 
        `fechaPrestamo` = ?, 
        `fechaDevolucion` = ?, 
        `estado` = ?
        
        WHERE
        `idPrestamo` =  ?;");
        $sentencia->bind_param("iisssi", $idAlumno, $idLibro, $fechaPrestamo, $fechaDevolucion, $estado, $idPrestamo);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
}    