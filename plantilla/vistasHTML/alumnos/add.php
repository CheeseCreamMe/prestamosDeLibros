<?php
require_once(__DIR__ . '/../../sqlconect/alumnos/alumnos.crud.php');
$agregar = false;
$crud = new Alumnos();
if (isset($_POST['ok'])) {
        $nombres = $_POST['nombres'];
        $idCarreraAlumno = $_POST['idCarreraAlumno'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefonos = $_POST['telefonos'];

        try {
            $agregar = $crud->agregar($idCarreraAlumno, $nombres, $apellidos, $direccion, $telefonos);
            if ($agregar != true) {
                echo '<script>alert("Parece no se ha podido agregar el alumno");</script>';
            } else {
                echo '<script>alert("Se ha agregado el alumno");</script>';
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    
}
?>

<div class="row">
    <div class="col-12">
        <h1>Agregar Alumno</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input placeholder="Nombres" class="form-control" type="text" name="nombres" id="nombres" required>
            </div>
            <div class="form-group">
                <label for="idCarreraAlumno">Carrera del alumno</label>
                <?php echo '<select name="idCarreraAlumno" class="form-control">';
                $carreras = $crud->verCarreras();
                foreach ($carreras as $datosCarrera) {
                    echo '<option value="' . $datosCarrera['idCarrera'] . '">' . $datosCarrera['nombreCarrera'] . '</option>';
                }
                echo '</select>'; ?>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input placeholder="Apellidos" class="form-control" type="text" name="apellidos" id="apellidos" required>
            </div>
            <div class="form-group">
                <label for="direccion">direccion</label>
                <input placeholder="direccion" class="form-control" type="text" name="direccion" id="direccion" required>
            </div>
            <div class="form-group">
                <label for="telefonos">telefono</label>
                <input placeholder="telefono" class="form-control" type="text" name="telefonos" id="telefonos" required>
            </div>
            <div class="form-group"><button class="btn btn-success" name=ok>Guardar</button></div>
    </div>
</div>