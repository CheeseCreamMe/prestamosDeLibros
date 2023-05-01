<h1>Alumnos Registrados</h1>
<?php
require_once(__DIR__ . '/../../sqlconect/alumnos/alumnos.crud.php');

$crud = new Alumnos();
$alumnos = $crud->ver();

if ($alumnos) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Carreras</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($alumnos as $alumno) { ?>
                <tr>
                    <td>
                        <?php echo $alumno["idAlumno"] ?>
                    </td>
                    <td>
                        <?php echo $alumno["nombres"] ?>
                    </td>
                    <td>
                        <?php echo $alumno["apellidos"] ?>
                    </td>

                    <td>
                        <?php echo $alumno["idCarreraAlumno"] ?>
                    </td>
                    <td>
                        <form method="post">
                        <button class="btn btn-primary" value="<?php echo $alumno["idAlumno"] ?>" name=alumn>Botón de Bootstrap</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No se encontraron resultados.";
}
?>
<div class="container">
    <div class="row">
        <div class='col'>
            <?php
            if (isset($_POST['alumn'])) {
                print_r($_POST['alumn']);
            }
            ?>
        </div>
    </div>
</div>