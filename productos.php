<?php
require_once('BD.php');
require_once('Cesta.php');
require_once('Smarty.class.php');

/***************************************************************************/
require ('xajax_core/xajax.inc.php');
$ajax = new xajax('fcesta.php');
 
//Para poder tener una traza de lo que ocurre
$ajax->configure('debug',false);
//Especificar la ubicación de la librería (En este caso innecesario)
$ajax->configure('javascript URI','./');
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

// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado,
// para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
// Cargamos la librería de Smarty
$smarty = new Smarty;
 
/*$smarty->template_dir = '/web/smarty/tiendaSmarty/templates/';
$smarty->compile_dir = '/web/smarty/tiendaSmarty/templates_c/';
$smarty->config_dir = '/web/smarty/tiendaSmarty/configs/';
$smarty->cache_dir = '/web/smarty/tiendaSmarty/cache/';*/


//De momento solo visualizamos que el usuario 
$smarty->assign("usuario",$_SESSION['usuario']);

// obtenermos la lista de productos
$cesta=new Cesta();
$baseDeDatos=new BD();
$smarty->assign('total',$cesta->coste()); // este orden para no tener que cargar la cesta dos veces.
$smarty->assign('productosCesta',$_SESSION['productosCesta']);

$smarty->assign('activarBoton', $_SESSION['productosCesta']=="" ? 'disabled' : 'enabled');
$smarty->assign('listaProductos',$baseDeDatos->obtieneProductos());

$smarty->display('smarty/productos.tpl');


?>