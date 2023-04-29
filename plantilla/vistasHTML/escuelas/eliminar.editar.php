<?php
require_once(__DIR__ . '/../../sqlconect/escuelas/escuelas.crud.php');

$crud = new Escuelas();
$escuela[] = $crud->verPorId($_GET['id']);

if (isset($_POST['eliminar'])) {
    try {
        $idEscuela = $_GET['id'];
        $borrar = $crud->eliminar($idEscuela);
        if ($borrar != false) {
            echo '<script>alert("Se ha eliminado la escuela");</script>';
            exit;
        }
    } catch (\Throwable $th) {
        echo "Upps parece que no puedes hacer esto";
    }

}
if (isset($_POST['cancelar'])) {
    header('Location: http://localhost/plantilla/Escuelas');
    exit;
}

if (isset($_POST['ok'])) {
    try {
        $idEscuela = $_GET['id'];
        $nombre = $_POST['nombre'];
        $director = $_POST['director'];
        $borrar = $crud->editar($idEscuela, $nombre, $director);
        if ($borrar != false) {
            echo '<script>alert("Se ha editado correctamente la escuela ");</script>';
            header('Location: http://localhost/plantilla/Escuelas');
            exit();
        }
    } catch (\Throwable $th) {
        echo "Upps parece que no puedes hacer esto";
    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>Editar Escuela</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required
                    value="<?php echo $escuela[0]['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input placeholder="Director" class="form-control" type="text" name="director" id="director" required
                    value="<?php echo $escuela[0]['director']; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-success" name=cancelar>cancelar</button>
                <button class="btn btn-success" name="ok">Guardar</button>
                <button class="btn btn-success" name=eliminar>Eliminar</button>
            </div>
        </form>
    </div>
</div>