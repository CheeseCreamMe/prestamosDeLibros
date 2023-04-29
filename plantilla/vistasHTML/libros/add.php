<?php
require_once(__DIR__ . '/../../sqlconect/libros/libros.crud.php');
$agregar = false;
$crud = new Libros();
if (isset($_POST['ok'])) {
    if ($_POST['titulo'] != null && $_POST['autor'] != null && $_POST['editorial'] != null && $_POST['fecha'] != null && $_POST['isbn'] != null) {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $fecha = $_POST['fecha'];
        $isbn = $_POST['isbn'];
        try {
            $agregar = $crud->agregar($titulo, $autor, $editorial, $fecha, $isbn);
            if ($agregar != true) {
                echo '<script>alert("Parece no se ha podido registrar el libro");</script>';
            } else {
                echo '<script>alert("Se ha registrado el libro");</script>';
            }
        } catch (\Throwable $th) {
            echo $th;
        }

    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>Registrar libro</h1>
        <form method="POST">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input placeholder="Título" class="form-control" type="text" name=titulo id=titulo required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input placeholder="Autor" class="form-control" name=autor id=autor type=text required>
            </div>
            <div class="form-group">
                <label for="editorial">Editorial</label>
                <input placeholder="Editorial" class="form-control" name=editorial id=editorial type=text required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de publicación</label>
                <input placeholder="Fecha de publicación" class="form-control" name=fecha id=fecha type=date required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input placeholder="ISBN" class="form-control" name=isbn id=isbn type=text required>
            </div>
            <div class="form-group"><button class="btn btn-success" name=ok>Guardar</button></div>
        </form>
    </div>
</div>
