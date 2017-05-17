<?php
require_once('BD.php');
require_once('Cesta.php');
require_once('Smarty.class.php');

/***************************************************************************/
require ('xajax_core/xajax.inc.php');
$ajax = new xajax('fcesta.php');
 
//Para poder tener una traza de lo que ocurre
$ajax->configure('debug',true);
//Especificar la ubicación de la librería (En este caso innecesario)
$ajax->configure('javascript URI','./');
 
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
// cesta a cero
if (isset($_SESSION['productosCesta'])){

}

// obtenermos la lista de productos
$cesta=new Cesta();
$baseDeDatos=new BD();

$smarty->assign('listaProductos',$baseDeDatos->obtieneProductos());




if (isset($_POST['enviar'])) {
    $producto=$baseDeDatos->obtieneProducto($_POST['cod']);
    $cesta->nuevo_articulo($producto['cod']);
    $smarty->assign("productosCesta",$cesta->get_productos());
    $smarty->assign("productosCesta",$_SESSION['productosCesta']);
    $smarty->assign("unidadesCesta",$_SESSION['unidadesCesta']);
    $smarty->assign('total',$cesta->coste());
}

if (isset($_POST['borrar'])){
    if ($_SESSION['unidadesCesta'][$_POST['codigo']]>1){
        $_SESSION['unidadesCesta'][$_POST['codigo']]=$_SESSION['unidadesCesta'][$_POST['codigo']]-1;
    } else {
        unset($_SESSION['unidadesCesta'][$_POST['codigo']]);
        unset($_SESSION['productosCesta'][$_POST['codigo']]);
    }
    $smarty->assign("productosCesta",$_SESSION['productosCesta']);
    $smarty->assign("unidadesCesta",$_SESSION['unidadesCesta']);
    $cesta->carga_cesta();
    $smarty->assign('total',$cesta->coste());
}

    if (!isset($_SESSION['unidadesCesta'])||empty($_SESSION['unidadesCesta']))
        $smarty->assign('activarBoton','disabled');
    else {
        $smarty->assign('activarBoton','enabled') ;   
    }


    if (isset($_POST['cestaAccion'])){
        if ($_POST['cestaAccion']=='pagar'){
            $smarty->assign('usuario',$_SESSION['usuario']);
            $smarty->assign("productosCesta",$_SESSION['productosCesta']);
            $smarty->assign("unidadesCesta",$_SESSION['unidadesCesta']);
            $cesta->carga_cesta();
            $smarty->assign('total',$cesta->coste());
            $totalUnidades=0;
            foreach ($_SESSION['unidadesCesta']as $valor){
                $totalUnidades+= intval($valor);
            }
            $smarty->assign('totalUnidades',$totalUnidades);
            $smarty->display('smarty/pagar.tpl');

        } elseif ($_POST['cestaAccion']=='vaciar'){

            $cesta->vacia();  
            $smarty->assign('cestaAccion','disabled',true);
            $smarty->display("smarty/productos.tpl");
        }
        
    } else {
        $smarty->display("smarty/productos.tpl");
    }
 




?>
