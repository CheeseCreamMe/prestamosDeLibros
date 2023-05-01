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
                    <form method="post">
                        <button class="btn btn-primary" value="<?php echo $libro["idLibro"] ?>" name=Libro>Botón de Bootstrap</button>
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