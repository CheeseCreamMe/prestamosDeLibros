<h1>Carreras Registradas</h1>
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
                <th>direccion</th>
                <th>Carreras</th>
                <th>Telefonos</th>
                <th>Más</th>
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
                        <?php echo $alumno["direccion"] ?>
                    </td>
                    <td>
                        <?php echo $alumno["idCarreraAlumno"] ?>
                    </td>
                    <td>
                        <?php echo $alumno["telefonos"] ?>
                    </td>
                    <td>
                        <a href="editarAlumnos?id=<?php echo $alumno["idAlumno"] ?>">Editar</a>
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