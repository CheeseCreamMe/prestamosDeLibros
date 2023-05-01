<?php
require_once(__DIR__ . '/../../sqlconect/libros/libros.crud.php');

$crud = new Libros();
$libro[] = $crud->verPorId($_GET['id']);

if (isset($_POST['eliminar'])) {
    try {
        $idlibro = $_GET['id'];
        $borrar = $crud->eliminar($idlibro);
        if ($borrar != false) {
            echo '<script>alert("Se ha eliminado la escuela");</script>';
            header('Location: http://localhost/plantilla/Libros');
            exit;
        }
    } catch (\Throwable $th) {
        echo "Upps parece que no puedes hacer esto";
    }

}
if (isset($_POST['cancelar'])) {
    header('Location: http://localhost/plantilla/Libros');
    exit;
}

if (isset($_POST['ok'])) {
    try {
        $idLibro = $_GET['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $fecha = $_POST['fecha'];
        $isbm = $_POST['isbm'];
        $borrar = $crud->editar($idLibro, $titulo, $autor, $editorial, $fecha, $isbm);
        if ($borrar != false) {
            echo '<script>alert("Se ha editado correctamente la escuela ");</script>';
            header('Location: http://localhost/plantilla/Libros');
            exit();
        }
        else echo "error";
    } catch (\Throwable $th) {
        echo "Upps parece que no puedes hacer esto";
    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>Editarlibro</h1>
        <form method="POST">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input placeholder="Título" class="form-control" type="text" name=titulo id=titulo value="<?php echo $libro[0]['titulo'] ?>" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input placeholder="Autor" class="form-control" name=autor id=autor type=text value="<?php echo $libro[0]['autor'] ?>" required>
            </div>
            <div class="form-group">
                <label for="editorial">Editorial</label>
                <input placeholder="Editorial" class="form-control" name=editorial id=editorial type=text value="<?php echo $libro[0]['editorial'] ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de publicación</label>
                <input placeholder="Fecha de publicación" class="form-control" name=fecha id=fecha type=date value="<?php echo $libro[0]['fecha'] ?>" required>
            </div>
            <div class="form-group">
                <label for="isbm">isbm</label>
                <input placeholder="ISBM" class="form-control" name=isbm id=isbm type=text value="<?php echo $libro[0]['ISBM'] ?>" required>
            </div>
            <button class="btn btn-success" name=cancelar>cancelar</button>
            <button class="btn btn-success" name="ok">Guardar</button>
            <button class="btn btn-success" name=eliminar>Eliminar</button>
        </form>
    </div>
</div>