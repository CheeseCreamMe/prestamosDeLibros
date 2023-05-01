<?php

//obtenemos EL DOCUMENTO ACTUAL atraves de la url
$folderPath=dirname($_SERVER['SCRIPT_NAME']);
//obtenemos la url completa actual
$urlPath=$_SERVER['REQUEST_URI'];
//definimos lo que quremos establecer como url
$url=substr($urlPath,strlen($folderPath));

define('URL',$url);
define('RUTA', 'http://localhost/laboratorio1/');
/*Este script de PHP tiene varias líneas que hacen lo siguiente:

1. La primera línea comienza un bloque PHP.

2. La segunda línea utiliza la función "dirname()" para obtener la ruta del directorio donde se encuentra el archivo PHP actual. La variable $_SERVER['SCRIPT_NAME'] contiene la ruta relativa del archivo PHP actual.

3. La tercera línea utiliza la variable $_SERVER['REQUEST_URI'] para obtener la URL completa actual, incluyendo la ruta del archivo PHP.

4. La cuarta línea utiliza la función "substr()" para eliminar la ruta del directorio del inicio de la URL, dejando solo la ruta del archivo PHP.

5. La quinta línea define una constante "URL" estableciéndola como la ruta del archivo PHP actual sin la ruta del directorio.

6. La sexta línea define una constante "RUTA" estableciéndola como la URL completa del sitio web local.

En general, este scriptesta estableciendo algunas constantes útiles para el sitio web, como la ruta actual de la URL y la URL completa del sitio web local. */