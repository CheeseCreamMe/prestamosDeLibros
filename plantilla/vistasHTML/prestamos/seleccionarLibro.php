<h1>Seleccione un libro</h1>
<?php
require_once(__DIR__ .'/../../sqlconect/libros/libros.crud.php');

$crud = new Libros();
$libros = $crud->ver();

if ($libros) {
    ?>
  <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro) { ?>
                <tr>
                    <td><?php echo $libro["idLibro"] ?></td>
                    <td><?php echo $libro["titulo"] ?></td>
                    <td><?php echo $libro["autor"] ?></td>

                    <td>
                        <a href="?idLibro=<?php echo $libro["idLibro"] ?>nombreLibro=<?php echo $libro["titulo"] ?>">Seleccionar</a>
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