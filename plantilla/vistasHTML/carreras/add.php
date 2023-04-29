<?php
require_once(__DIR__ . '/../../sqlconect/carreras/carreras.crud.php');
$agregar = false;
$crud = new Carreras();
if (isset($_POST['ok'])) {
    if ($_POST['nombre'] != null && $_POST['idEscuelaCarrera'] != null && $_POST['asignaturas'] != null) {
        $nombre = $_POST['nombre'];
        $idEscuelaCarrera = $_POST['idEscuelaCarrera'];
        $asignaturas = $_POST['asignaturas'];
        try {
            $agregar = $crud->agregar($idEscuelaCarrera, $nombre, $asignaturas);
            if ($agregar != true) {
                echo '<script>alert("Parece no se ha podido registrar la carrera");</script>';
            } else {
                echo '<script>alert("Se ha registrado la carrera");</script>';
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <h1>Registrar Carrera</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name=nombre id=nombre required>
            </div>
            <div class="form-group">
                <label for="idEscuelaCarrera">ID de Escuela</label>
                <?php echo '<select name="idEscuelaCarrera" class=form-control>';
                $escuelas=$crud->verEscuelas();
                foreach ($escuelas as $datosEscuela) {
                    echo '<option value="' . $datosEscuela['idEscuela'] . '">' . $datosEscuela['nombre'] . '</option>';
                }
                echo '</select>'; ?>
            </div>
            <div class="form-group">
                <label for="asignaturas">Número de Asignaturas</label>
                <input placeholder="Número de Asignaturas" class="form-control" type="number" name=asignaturas
                    id=asignaturas required>
            </div>
            <div class="form-group"><button class="btn btn-success" name=ok>Guardar</button></div>
        </form>
    </div>
</div>