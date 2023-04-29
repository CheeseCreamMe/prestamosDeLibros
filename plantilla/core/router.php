<?php
class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }
    public function matchRoute()
    {

        $parte = explode('?', URL);
        $urlbase = explode('/', $parte[0]);
        $this->controller = 'controller';
        $this->method = !empty($urlbase[1]) ? $urlbase[1] : 'home';

        if (empty($this->method)) {
            $this->method = 'home';
        }

        $this->controller = $this->controller . 'Views';
        require_once(__DIR__ . '/../controller/' . $this->controller . '.php');
    }

    public function run()
    {
        $controller = new $this->controller();
        $method = $this->method;

        if (!method_exists($controller, $method)) {
            header('Location: http://localhost/plantilla/Error');
            exit;
        }

        $controller->$method();
    }

}