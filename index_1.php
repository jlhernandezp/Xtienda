<?php
//cargo la librería de xajax
require ('xajax_core/xajax.inc.php');
 
$ajax = new xajax();
 
//Para poder tener una traza de lo que ocurre
$ajax->configure('debug',true);
//Especificar la ubicación de la librería (En este caso innecesario)
$ajax->configure('javascript URI','./');
 
//Ahora registramos las funciones que podrán ser invocadas de forma asíncrona desde el cliente
$ajax->register(XAJAX_FUNCTION, 'saludar');
$ajax->register(XAJAX_FUNCTION, 'otraFuncion');
//Estas acciones implicarán que en el html del cliente se creen las funciones xajax_saludar ()   y xajax_otraFuncion()
 
//Este método procesará las llamadas que reciba la página  ????
//Imporante llamarla antes de que el guión genere ningúna salida.
$ajax->processRequest();
 
 
//La librería necesita generar código java script en la página que enviamos al cliente
$ajax->printJavascript();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Probando xajax</title>
        <script type="text/javascript" src="valida.js"></script>
 
 
    </head>
    <body>
        <h1> Accede al código fuente de esta página y verás código javascript</h1>
 
 
    </body>
</html>