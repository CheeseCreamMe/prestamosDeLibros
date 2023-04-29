<?php
require_once(__DIR__ . '/../cn.php');

class Carreras
{
    function verPorId($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $resultado = $mysqli->prepare("SELECT 	 
        `nombreCarrera`, 
        `idEscuelaCarrera`, 
        `asignaturas`
         
        FROM 
        `biblioteca`.`carreras` 
        where `idCarrera`=?");
        $resultado->bind_param("s", $id);
        $resultado->execute();
        $resultado->bind_result($nombre, $escuela, $asignaturas);
        $resultado->fetch();
        return array("nombre" => $nombre, "escuela" => $escuela, "asignaturas" => $asignaturas);
    }

    function verEscuelas()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT idEscuela, nombre FROM escuelas");
            $escuelasId = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $escuelasId[] = $fila;
            }
            return $escuelasId;
        } catch (Exception $e) {
            echo 'UPPS Lo lameto parece ha ocurrido un error';
        }
    }
    function ver()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT * FROM carreras");
            $carreras = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $carreras[] = $fila;
            }
            return $carreras;
        } catch (Exception $e) {
            echo 'UPPS Lo lameto parece ha ocurrido un error y ';
        }
    }

    function eliminar($id)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("DELETE FROM `carreras` WHERE `idCarrera` = ?");
        $sentencia->bind_param("i", $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function agregar($idEscuelaCarrera, $nombreCarrera, $asignaturas)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("INSERT INTO `carreras`
        (
        `idEscuelaCarrera`,
        `nombreCarrera`,
        `asignaturas`
        )
        VALUES
        (
        ?,
        ?,
        ?
        )
    ");
        $sentencia->bind_param("isi", $idEscuelaCarrera, $nombreCarrera, $asignaturas);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function editar($id, $idEscuela, $nuevo_nombre, $nuevo_asignaturas)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("UPDATE `carreras` 
        SET `idEscuelaCarrera` = ?, `nombreCarrera` = ?, `asignaturas` = ?
        WHERE `idCarrera` = ?");
        $sentencia->bind_param("issi", $idEscuela, $nuevo_nombre, $nuevo_asignaturas, $id);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function buscarPorIdEscuela($idEscuela)
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $sentencia = $mysqli->prepare("SELECT * FROM carreras WHERE idEscuelaCarrera = ?");
            $sentencia->bind_param("i", $idEscuela);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            $carreras = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $carreras[] = $fila;
            }
            return $carreras;
        } catch (Exception $e) {
            echo 'UPPS Lo siento parece ha ocurrido un error y no se han podido recuperar las carreras';
        }
    }

}