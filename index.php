<?php
require_once 'xajax_core/xajax.inc.php';

$xajax=new xajax();
$xajax->registerFunction("actualiza");

$xajax->processRequest();

function actualiza($post){
    
    $salida=new xajaxResponse();
    $salida->assign("cesta", "innerHTML", "esta es la salida");
    
    return $salida;
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <?php
        {$xajax->printJavascript();}
        ?>
        <title></title>
    </head>
    <body>
        <form id='listado' action='' method="post">
            <input type="submit" name='boton' onclick="xajax_actualiza(xajax.getFormValues('listado'))"
        </form>
        <div id="cesta"></div>
    </body>
</html>
