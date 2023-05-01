<?php
require_once(__DIR__ . '/../../sqlconect/prestamos/prestamos.crud.php');
$libro;
$alumno;
if (isset($_POST['Libro'])) {
    $libro = $_POST['Libro'];
    echo "este seria el id del libro: " . $libro;
}
if (isset($_POST['alumn'])) {
    $alumno = $_POST['alumn'];
    echo "este seria el id del alumno: " . $alumno;
}

$agregar = false;
$crud = new Prestamos();
$idLibro;
if (isset($_POST['ok'])) {
    if ($_POST['id_libro'] != null && $_POST['id_usuario'] != null && $_POST['fecha_prestamo'] != null && $_POST['fecha_devolucion'] != null) {
        $id_libro = $_POST['id_libro'];
        $id_usuario = $_POST['id_usuario'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        try {
            $agregar = $crud->agregar($id_libro, $id_usuario, $fecha_prestamo, $fecha_devolucion, $estado);
            if ($agregar != true) {
                echo '<script>alert("Parece no se ha podido registrar el préstamo");</script>';
            } else {
                echo '<script>alert("Se ha registrado el préstamo");</script>';
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
?>
<div class="container">

    <div class="row">
        <div class="col">
            <h1>Registrar préstamo</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="id_libro">ID del libro</label>
                    <input placeholder="ID del libro" class="form-control" type="text" name="id_libro" id="id_libro"
                        required>
                </div>
                <div class="form-group">
                    <label for="id_usuario">ID del usuario</label>
                    <input placeholder="ID del usuario" class="form-control" name="id_usuario" id="id_usuario"
                        type="text" required>
                </div>
                <div class="form-group">
                    <label for="fecha_prestamo">Fecha de préstamo</label>
                    <input placeholder="Fecha de préstamo" class="form-control" name="fecha_prestamo"
                        id="fecha_prestamo" type="date" required>
                </div>
                <div class="form-group">
                    <label for="fecha_devolucion">Fecha de devolución</label>
                    <input placeholder="Fecha de devolución" class="form-control" name="fecha_devolucion"
                        id="fecha_devolucion" type="date" required>
                </div>
                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <select id="estado" name="estado" class="form-select">
                        <option value="0" class="bg-primary text-light">Pendiente</option>
                        <option value="1" class="bg-danger text-light">Devuelto</option>
                    </select>
                </div>
                <div class="form-group"><button class="btn btn-success" name="ok">Guardar</button></div>
            </form>
        </div>
    </div>
    <div class="row">
        <!--         <label for="tipo" class="form-label">Seleccionar:</label>
        <select id="tipo" name="tipo" class="form-select">
            <option value="libro">Seleccionar libros</option>
            <option value="alumno">Seleccionar Alumnos</option>
        </select> -->
        <div class=col>
            <?php require_once(__DIR__ . "/seleccionarLibro.php"); ?>
        </div>
        <div class=col>
            <?php require_once(__DIR__ . "/seleccionarAlumno.php"); ?>
        </div>


    </div>

</div>