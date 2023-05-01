<?php
class controllerViews
{

    public function home()
    {
        require_once(__DIR__ . '/../vistasHTML/home.view.php');
    }
    //aca se cartgan todas las plantillas html de la carpeta "vistasHTML" 
    //cada una como una funcion distinta

    //la vista por defecta siempre sera home

    //todas las vistas del crud de esculas van a ir aqui...
    public function Escuelas()
    {
        require_once(__DIR__ . '/../vistasHTML/escuelas/add.view.php');
    }
    public function editarEscuelas()
    {
        require_once(__DIR__ . '/../vistasHTML/escuelas/eliminar.editar.php');
    }
    //todas las vistas del crud de carreras van a ir aqui...
    public function Carreras()
    {
        require_once(__DIR__ . '/../vistasHTML/carreras/add.view.php');
    }
    public function editarCarrera()
    {
        require_once(__DIR__ . '/../vistasHTML/carreras/eliminar.editar.php');
    }
    //todas las vitas de Libros
    public function Libros()
    {
        require_once(__DIR__ . '/../vistasHTML/libros/add.view.php');
    }
    public function editarLibros()
    {
        require_once(__DIR__ . '/../vistasHTML/libros/eliminar.editar.php');
    }

    public function Alumnos()
    {
        require_once(__DIR__ . '/../vistasHTML/Alumnos/add.view.php');
    }
    public function editarAlumnos()
    {
        require_once(__DIR__ . '/../vistasHTML/Alumnos/eliminar.editar.php');
    }
    public function Prestamos()
    {
        require_once(__DIR__ . '/../vistasHTML/prestamos/add.php');
    }
    public function editarPrestamos()
    {
        require_once(__DIR__ . '/../vistasHTML/Alumnos/eliminar.editar.php');
    }
    public function Error()
    {
        require_once(__DIR__ . '/../core/pagina404.php');
    }
}