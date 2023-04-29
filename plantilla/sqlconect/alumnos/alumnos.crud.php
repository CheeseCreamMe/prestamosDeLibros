<?php
require_once(__DIR__ . '/../cn.php');

class Alumnos
 {
    function verCarreras()
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $resultado = $mysqli->query("SELECT idCarrera, nombreCarrera FROM carreras");
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
            $resultado = $mysqli->query("SELECT * FROM alumnos");
            $alumnos = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $alumnos[] = $fila;
            }
            return $alumnos;
        } catch (Exception $e) {
            echo 'UPPS Lo siento parece ha ocurrido un error y no se han podido recuperar los alumnos';
        }
    }

    function buscarPorId($idAlumno)
    {
        try {
            $conexion = new cn();
            $mysqli = $conexion->obtener_mysqli();
            $sentencia = $mysqli->prepare("SELECT * FROM alumnos WHERE idAlumno = ?");
            $sentencia->bind_param("i", $idAlumno);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            $alumno = mysqli_fetch_array($resultado);
            return $alumno;
        } catch (Exception $e) {
            echo 'UPPS Lo siento parece ha ocurrido un error y no se ha podido recuperar el alumno';
        }
    }

    function eliminar($idAlumno)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("DELETE FROM alumnos WHERE idAlumno = ?");
        $sentencia->bind_param("i", $idAlumno);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function agregar($idCarreraAlumno, $nombres, $apellidos, $direccion, $telefonos)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("INSERT INTO alumnos (idCarreraAlumno, nombres, apellidos, direccion, telefonos) VALUES (?, ?, ?, ?, ?)");
        $sentencia->bind_param("issss", $idCarreraAlumno, $nombres, $apellidos, $direccion, $telefonos);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function editar($idAlumno, $idCarreraAlumno, $nombres, $apellidos, $direccion, $telefonos)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("UPDATE alumnos SET idCarreraAlumno = ?, nombres = ?, apellidos = ?, direccion = ?, telefonos = ? WHERE idAlumno = ?");
        $sentencia->bind_param("issssi", $idCarreraAlumno, $nombres, $apellidos, $direccion, $telefonos, $idAlumno);
        $result = $sentencia->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function buscarPorIdCarrera($idCarrera)
    {
        $conexion = new cn();
        $mysqli = $conexion->obtener_mysqli();
        $sentencia = $mysqli->prepare("SELECT * FROM `alumnos` WHERE `idCarreraAlumno` = ?");
        $sentencia->bind_param("i", $idCarrera);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $alumnos = array();
        while ($fila = mysqli_fetch_array($resultado)) {
            $alumnos[] = $fila;
        }
        return $alumnos;
    }
}    