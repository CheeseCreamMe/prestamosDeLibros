<h1>Carreras Registradas</h1>
<?php
require_once(__DIR__ .'/../../sqlconect/carreras/carreras.crud.php');

$crud = new Carreras();
$carreras = $crud->ver();

if ($carreras) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Escuela</th>
                <th>Más</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($carreras as $carrera) { ?>
                <tr>
                    <td>
                        <?php echo $carrera["idCarrera"] ?>
                    </td>
                    <td>
                        <?php echo $carrera["nombreCarrera"] ?>
                    </td>
                    <td>
                        <?php echo $carrera["idEscuelaCarrera"] ?>
                    </td>
                    <td>
                        <?php echo $carrera["asignaturas"] ?>
                    </td>
                    <td>
                        <a href="editarCarrera?id=<?php  echo $carrera["idCarrera"] ?>">Editar</a>
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
