<h1>Libros Registradas</h1>
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
                <th>Editorial</th>
                <th>Fecha de publicación</th>
                <th>ISBN</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro) { ?>
                <tr>
                    <td><?php echo $libro["idLibro"] ?></td>
                    <td><?php echo $libro["titulo"] ?></td>
                    <td><?php echo $libro["autor"] ?></td>
                    <td><?php echo $libro["editorial"] ?></td>
                    <td><?php echo $libro["fecha"] ?></td>
                    <td><?php echo $libro["ISBM"] ?></td>
                    <td>
                        <a href="editarLibros?id=<?php echo $libro["idLibro"] ?>">Editar</a>
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





