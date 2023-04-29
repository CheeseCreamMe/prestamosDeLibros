<?php

//obtenemos EL DOCUMENTO ACTUAL atraves de la url
$folderPath=dirname($_SERVER['SCRIPT_NAME']);
//obtenemos la url completa actual
$urlPath=$_SERVER['REQUEST_URI'];
//definimos lo que quremos establecer como url
$url=substr($urlPath,strlen($folderPath));

define('URL',$url);
define('RUTA', 'http://localhost/laboratorio1/');