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
$ajax->configure('javascript URI','./js');
$ajax->setCharEncoding('ISO-8859-1');
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
   Cesta::guarda_cesta();
   
   $linea="";
   $total=0.0;
   foreach ($_SESSION['productosCesta'] as $productoCesta => $pvp){
        
            $linea.=$_SESSION['unidadesCesta'][$productoCesta]." ".$productoCesta." ".$pvp."<br />";   //problema con codigo de producto 
            $total+= floatval($_SESSION['unidadesCesta'][$productoCesta])*floatval($pvp);
   }
       
      $linea.="<hr />Total: ".$total." €";
      $linea.="<hr/><form action='productos.php' method ='post'>"
                    ."<input class='cestaAccion' type='submit' enabled name='cestaAccion' value='pagar'>"
                    ."<input class='cestaAccion' type='submit' enabled name='cestaAccion' value='vaciar'>"
                    ."</form> ";
      $salida= new xajaxResponse();
      $salida->assign('pagcesta', 'innerHTML', $linea );
            
    return $salida;
}

