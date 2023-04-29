<?php
require_once(__DIR__ . '/../../sqlconect/alumnos/alumnos.crud.php');
$crud = new Alumnos();
$alumno[] = $crud->buscarPorId($_GET['id']);
print_r($alumno);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar Alumno</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input placeholder="Nombres" class="form-control" type="text" name="nombres" id="nombres"
                    value="<?php echo $alumno[0]['nombres'] ?>" required>
            </div>

            <div class="form-group">
                <label for="idCarreraAlumno">Carrera del alumno</label>
                <select name="idCarreraAlumno" class="form-control">
                    <?php
                    $carreras = $crud->verCarreras();
                    foreach ($carreras as $datosCarrera) {
                        $selected = ($datosCarrera['idCarrera'] == $alumno[0]['idCarreraAlumno']) ? 'selected' : '';
                        echo '<option value="' . $datosCarrera['idCarrera'] . '" ' . $selected . '>' . $datosCarrera['nombreCarrera'] . '</option>';
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input placeholder="Apellidos" class="form-control" type="text" name="apellidos" id="apellidos"
                value="<?php echo $alumno[0]['apellidos'] ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">direccion</label>
                <input placeholder="direccion" class="form-control" type="text" name="direccion" id="direccion"
                value="<?php echo $alumno[0]['direccion'] ?>" required>
            </div>
            <div class="form-group">
                <label for="telefonos">telefono</label>
                <input placeholder="telefono" class="form-control" type="text" name="telefonos" id="telefonos" value="<?php echo $alumno[0]['telefonos'] ?>" required>
            </div>
            <div class="form-group"><button class="btn btn-success" name=ok>Guardar</button></div>
    </div>
</div>
<?php
/*
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
*/