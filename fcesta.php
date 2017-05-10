<?php
require_once('Smarty.class.php');
require_once('BD.php');
require_once('Cesta.php');

session_start();
/***************************************************************************/
require ('xajax_core/xajax.inc.php');
$ajax = new xajax('fcesta.php');
 
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

/***************************************************************************/
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
// Cargamos la librería de Smarty
$smarty = new Smarty;



function actualiza($post){
   $producto=BD::obtieneProducto($post['cod']);

   Cesta::nuevo_articulo($producto['cod']);
   Cesta::carga_cesta(); 
    $codigo=$producto['cod'];
     
     if (isset($_SESSION['unidadesCesta'][$codigo])){
            if ($_SESSION['unidadesCesta'][$codigo] > 0) {
                $_SESSION['unidadesCesta'][$codigo] ++;
            } 
       }else {
               // $producto = BD::obtieneProducto($codigo);
                $_SESSION['productosCesta'][$codigo]=$producto['PVP'];
                $_SESSION['unidadesCesta'][$codigo]= 1;
                
                
        }
        Cesta::guarda_cesta();
        $linea="";
       foreach ($_SESSION['productosCesta'] as $productoCesta){
        $linea.="<p>".$_SESSION['unidadesCesta'][$codigo].$productoCesta."<br />";   
       }
       
     $otralinea=print_r($_SESSION['unidadesCesta']);
      $salida= new xajaxResponse();
      $salida->assign('pcesta', 'innerHTML', $otralinea );
            
    return $salida;
}

