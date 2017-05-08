<?php

//Clase BD
require_once ('BD.php');
require_once ('Smarty.class.php');
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
$ajax->register(XAJAX_FUNCTION, 'otraFuncion');
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
            
    $smarty->assign('usuario',$_SESSION['usuario']);
    $smarty->assign("productosCesta",$_SESSION['productosCesta']);
    $smarty->assign("unidadesCesta",$_SESSION['unidadesCesta']);
    $smarty->display('smarty/productos.tpl');

}
?>