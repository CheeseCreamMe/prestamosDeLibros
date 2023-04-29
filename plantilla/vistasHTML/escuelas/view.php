<h1>Escuelas Registradas</h1>
<?php
require_once(__DIR__ .'/../../sqlconect/escuelas/escuelas.crud.php');

$crud = new Escuelas();
$escuelas = $crud->ver();

if ($escuelas) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Director</th>
                <th>Mas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($escuelas as $escuela) { ?>
                <tr>
                    <td>
                        <?php echo $escuela["idEscuela"] ?>
                    </td>
                    <td>
                        <?php echo $escuela["nombre"] ?>
                    </td>
                    <td>
                        <?php echo $escuela["director"] ?>
                    </td>
                    <td>
                        <a href="editarEscuelas?id=<?php echo $escuela["idEscuela"] ?>">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No se encontraron resultados.";
}
