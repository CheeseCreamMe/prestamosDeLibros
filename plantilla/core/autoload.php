<?php
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/router.php');
$router =new Router();
$router ->run();
/*Este script de PHP tiene tres líneas principales:

1. La primera línea requiere el archivo "config.php". La función "require_once()" incluirá el archivo especificado solo una vez durante la ejecución del script y, si el archivo no existe o contiene un error, detendrá la ejecución del script.

2. La segunda línea requiere el archivo "router.php". Este archivo parece ser una clase que define una funcionalidad de enrutamiento para la aplicación web.

3. La tercera línea crea una nueva instancia de la clase Router y llama al método "run()" para iniciar el enrutamiento de la aplicación web.

En general, este script esta iniciando el enrutamiento para una aplicación web utilizando una clase personalizada llamada "Router" y requiriendo la configuración necesaria desde el archivo "config.php". */
?>