<?php
require_once(__DIR__ . '/../../sqlconect/escuelas/escuelas.crud.php');
$agregar = false;
$crud = new Escuelas();
if (isset($_POST['ok'])) {
    if ($_POST['nombre'] != null && $_POST['director'] != null) {
        $xd = $_POST['nombre'];
        $xd2 = $_POST['director'];
        try {
            $agregar = $crud->agregar($xd, $xd2);
            if ($agregar != true) {
                echo '<script>alert("Parece no se ha podido registrar la escuela");</script>';
            } else {
                echo '<script>alert("Se ha registrado la escuela");</script>';
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }

    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>Registrar Escuela</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name=nombre id=nombre required>
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input placeholder="Director" class="form-control" name=director id=director type=text required>
            </div>
            <div class="form-group"><button class="btn btn-success" name=ok>Guardar</button></div>
        </form>
    </div>
</div>