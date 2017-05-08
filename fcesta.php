<?php
session_start();

//Clases
require_once ('BD.php');
require_once('Cesta.php');
require_once('Smarty.class.php');
$smarty = new Smarty;
 //cargo la librería de xajax
require ('xajax_core/xajax.inc.php');
$ajax = new xajax();
 
//Para poder tener una traza de lo que ocurre
$ajax->configure('debug',true);
//Especificar la ubicación de la librería (En este caso innecesario)
$ajax->configure('javascript URI','./');
 
//Ahora registramos las funciones que podrán ser invocadas de forma asíncrona desde el cliente
$ajax->register(XAJAX_FUNCTION, 'actualiza');
$ajax->register(XAJAX_FUNCTION, 'cargarCesta');
$ajax->register(XAJAX_FUNCTION, 'vaciarCesta');
//Estas acciones implicarán que en el html del cliente se creen las funciones xajax_saludar ()   y xajax_otraFuncion()
 
//Este método procesará las llamadas que reciba la página  ????
//Imporante llamarla antes de que el guión genere ningúna salida.
$ajax->processRequest();
 
 
//La librería necesita generar código java script en la página que enviamos al cliente
$ajax->printJavascript();


// require_once('smarty')
function actualiza($post){
    $codigo=$post['cod'];
   
    
     if (isset($this->unidades[$codigo])){
            if ($_SESSION['unidadesCesta'][$codigo] > 0) {
                $_SESSION['unidadesCesta'][$codigo] ++;
            } 
       }else {
                $producto = BD::obtieneProducto($codigo);
                $_SESSION['productosCesta'][$codigo]=$producto['PVP'];
                $_SESSION['unidadesCesta'][$codigo]= 1;
                
                
        }
      $salida= new xajaxResponse();
      $salida->assign('cesta', 'innerHTML', $_SESSION['productosCesta']);
            
    return $salida;
}
?>
<html>
    <head>
        <title>Cesta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
         <?php $ajax->printJavascript(); ?>
    </head>
    <body onload='xajax_actualiza(xajax_actualiza(xajax.getFormValues('listado'))'>
        <div id="contenedor">
            <div id='cesta'>
                <div id='pagcesta'>

                    <h3><img src="imagenes/cesta.png" alt='Cesta' width='24' heigth='21' /> Cesta</h3>
                    <hr />
                    <p id='cesta'></p>
                    
                    <hr />
                     <form action='productos.php' method ='post'>
                        <input class='cestaAccion' type='submit' disabled name='cestaAccion' value='pagar'>
                        <input class='cestaAccion' type='submit' disabled name='cestaAccion' value='vaciar'>
                    </form>
                    
                </div>    
            </div>
        </div>
    </body>
</html>