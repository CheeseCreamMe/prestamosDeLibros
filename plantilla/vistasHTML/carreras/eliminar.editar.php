<?php
require_once(__DIR__ . '/../../sqlconect/carreras/carreras.crud.php');

$crud = new Carreras();
$carrera[] = $crud->verPorId($_GET['id']);

if (isset($_POST['eliminar'])) {
    try {
        $idEscuela = $_GET['id'];
        $borrar = $crud->eliminar($idEscuela);
        if ($borrar != false) {
            echo '<script>alert("Se ha eliminado la escuela");</script>';
            exit;
        }
    } catch (\Throwable $th) {
        echo "Upps parece que no puedes hacer esto<br>
        intente verificar que
        <ul>
        <li>no se ha borrado anteriormente esta escuela</li>
        <li>no existan carreras ligadas a esta escuela</li>
        <li>no existan alumnos ligados a esta escuela</li>
        </ul>";
    }

}
if (isset($_POST['cancelar'])) {
    header('Location: http://localhost/plantilla/Carreras');
    exit;
}

if (isset($_POST['ok'])) {

    $nombre = $_POST['nombre'];
    $idEscuelaCarrera = $_POST['idEscuelaCarrera'];
    $asignaturas = $_POST['asignaturas'];
    try {
        $editar = $crud->editar($_GET['id'],$idEscuelaCarrera,$nombre,$asignaturas);
        if ($editar != true) {
            echo '<script>alert("Parece no se ha podido registrar la carrera");</script>';
        }
        header('Location: http://localhost/plantilla/Carreras');
        exit;

    } catch (\Throwable $th) {
        echo $th;
    }

}
?>

<div class="row">
    <div class="col-12">
        <h1>Editar Carrera</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name=nombre id=nombre
                    value="<?php echo $carrera[0]['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idEscuelaCarrera">ID de Escuela</label>
                <?php echo '<select name="idEscuelaCarrera" class="form-control">'; ?>
                <?php
                $escuelas = $crud->verEscuelas();
                foreach ($escuelas as $datosEscuela) {
                    $selected = ($datosEscuela['idEscuela'] == $carrera[0]['escuela']) ? 'selected' : '';
                    echo '<option value="' . $datosEscuela['idEscuela'] . '" ' . $selected . '>' . $datosEscuela['nombre'] . '</option>';
                }
                ?>
                <?php echo "</select>"; ?>
            </div>
            <div class="form-group">
                <label for="asignaturas">Número de Asignaturas</label>
                <input placeholder="Número de Asignaturas" class="form-control" type="number" name=asignaturas
                    id=asignaturas value="<?php echo $carrera[0]['asignaturas']; ?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" name=ok>Guardar</button>
                <button class="btn btn-success" name=cancelar>cancelar</button>
                <button class="btn btn-success" name=eliminar>eliminar</button>
            </div>
        </form>
    </div>
</div>