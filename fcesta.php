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
$ajax->configure('javascript URI','.');
$ajax->setCharEncoding('ISO-8859-1');
//Ahora registramos las funciones que podrán ser invocadas de forma asíncrona desde el cliente
$ajax->register(XAJAX_FUNCTION, 'actualiza');
$ajax->register(XAJAX_FUNCTION, 'borrarProducto');
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
        
            $linea.=$_SESSION['unidadesCesta'][$productoCesta]." ".$productoCesta." ".$pvp."<br />";
            $linea.="<form id='compra' action='javascript:void(null)'  method='post' onsubmit='borrarProducto()'>"
                            ."<input type='hidden' name='codigo' value='".$productoCesta."' />"
                            ."<input class='borrar' type='submit' name='borrar' value='X' />"
                        ."</form>";
            $total+= floatval($_SESSION['unidadesCesta'][$productoCesta])*floatval($pvp);
   }
       
      $linea.="<hr />Total: ".$total." €";
      $linea.="<hr/>"
                    ."<form name='cestaAccion' method='post' ><button class='cestaAccion' name='cestaAccion' type='submit' formaction='productos.php' value='pagar'>Pagar</button></form>"
                    ."<button class='cestaAccion' name='vaciar' onclick='javascript:vaciarCesta()'>Vaciar</button>";
      $salida= new xajaxResponse();
      $salida->assign('pagcesta', 'innerHTML', $linea );
            
    return $salida;
}

function vaciarCesta() {
   Cesta::vacia();
   $linea="";
   $total=0.0;
   
   $linea.="<hr />Total: ".$total." €";
      $linea.="<hr/><button class='cestaAccion' name='pagar'>Pagar</button>"
                    ."<button class='cestaAccion' name='vaciar' onclick='javascript:vaciarCesta()'>Vaciar</button>";
      $salida= new xajaxResponse();
      $salida->assign('pagcesta', 'innerHTML', $linea );
            
    return $salida;
           
}

function borrarProducto($productoABorrar){
    session_start();
    $retorno->alert('entradaen borrar producto');
    
    $linea="";
    $total=0.0;
    //borramos el producto en el caso de que solo haya un artículo, disminuimos en uno el valor de unidades si hay más de 1
   if (floatval($_SESSION['unidadesCesta'][$productoABorrar['codigo']]<=1)){
       unset($_SESSION['productosCesta'][$productoABorrar['codigo']]);
       unset($_SESSION['unidadesCesta'][$productoABorrar['codigo']]);
   } else {
       $_SESSION['unidadesCesta'][$productoABorrar['codigo']]= floatval($_SESSION['unidadesCesta'][$productoABorrar['codigo']])-1;
   }
   //mostramos otra vez la lista. Si existen más productos.
   foreach ($_SESSION['productosCesta'] as $productoCesta => $pvp){
        
            $linea.=$_SESSION['unidadesCesta'][$productoCesta]." ".$productoCesta." ".$pvp."<br />";
            $linea.="<form id='compra' action='javascript:void(null)'  method='post' onsubmit='borrarProducto();'>"
                            ."<input type='hidden' name='codigo' value='".$productoCesta."' />"
                            ."<input class='borrar' type='submit' name='borrar' value='X' />"
                        ."</form>";
            $total+= floatval($_SESSION['unidadesCesta'][$productoCesta])*floatval($pvp);
   }
       
      $linea.="<hr />Total: ".$total." €";
      $linea.="<hr/>"
                    ."<form name='cestaAccion' method='post' ><button class='cestaAccion' name='cestaAccion' type='submit' formaction='productos.php' value='pagar'>Pagar</button></form>"
                    ."<button class='cestaAccion' name='vaciar' onclick='javascript:vaciarCesta()'>Vaciar</button>";
    
    $salida= new xajaxResponse();
    $salida->assign('pagcesta', 'innerHTML', $linea );
            
    return $salida;
}