<?php
// Definimos una clase llamada "Router"
class Router
{
    // Definimos dos variables privadas que serán utilizadas por la clase
    private $controller;
    private $method;

    // Definimos el constructor de la clase. Este constructor llama a la función "matchRoute()" para determinar qué controlador y método se utilizarán.
    public function __construct()
    {
        $this->matchRoute();
    }

    // Definimos la función "matchRoute()". Esta función utiliza la constante "URL" para determinar la ruta del controlador y del método, y luego carga el controlador apropiado.
    public function matchRoute()
    {
        // Extraemos la parte de la URL que viene después del signo '?'
        $parte = explode('?', URL);

        // Extraemos las partes de la URL
        $urlbase = explode('/', $parte[0]);

        // Establecemos el controlador predeterminado
        $this->controller = 'controller';

        // Si el método está definido en la URL, lo establecemos como el método que se utilizará
        $this->method = !empty($urlbase[1]) ? $urlbase[1] : 'home';

        // Si el método está vacío, establecemos "home" como el método predeterminado
        if (empty($this->method)) {
            $this->method = 'home';
        }

        // Agregamos "Views" al nombre del controlador
        $this->controller = $this->controller . 'Views';

        // Requerimos el archivo del controlador correspondiente
        require_once(__DIR__ . '/../controller/' . $this->controller . '.php');
    }

    // Definimos la función "run()". Esta función crea una instancia del controlador y ejecuta el método correspondiente.
    public function run()
    {
        // Creamos una nueva instancia del controlador
        $controller = new $this->controller();

        // Obtenemos el método que se utilizará
        $method = $this->method;

        // Si el método no existe en el controlador, redireccionamos al usuario a una página de error
        if (!method_exists($controller, $method)) {
            header('Location: http://localhost/plantilla/Error');
            exit;
        }

        // Ejecutamos el método correspondiente
        $controller->$method();
    }
}