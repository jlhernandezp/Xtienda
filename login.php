<?php
require_once('BD.php');
 
// Cargamos la librería de Smarty
require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->assign('error',"");
/*$smarty->template_dir = 'c:\xampp\smarty\tienda\templates';
$smarty->compile_dir = 'c:\xampp\smarty\tienda\templates_c';
$smarty->config_dir = 'c:\xampp\smarty\tienda\configs';
$smarty->cache_dir = 'c:\xampp\smarty\tienda\cache';*/
// Verificaamos si queremos validar los datos 
//del formulario o solo visualizar el formulario (login.tpl)
if (isset($_POST['enviar'])) {
    $usuario =  $_POST['usuario'];
    $pass = $_POST['password'];
    if ((empty($usuario)) || (empty($pass))) 
        $smarty->assign('error','Debes introducir un nombre de usuario y una contraseña');
    else {
        // Comprobamos las credenciales con la base de datos
        if (BD::verificaCliente($usuario, $pass)) {
            session_start();
            $_SESSION['usuario']=$usuario;
            header("Location: productos.php");                    
        }
        else {
        //     Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error','Usuario o contraseña no válidos!');
        }
    }
}
// Mostramos la plantilla
$smarty->display('smarty/login.tpl');
?>