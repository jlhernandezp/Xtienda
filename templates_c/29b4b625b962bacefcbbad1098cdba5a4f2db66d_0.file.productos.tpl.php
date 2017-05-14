<?php
/* Smarty version 3.1.30, created on 2017-05-14 18:21:16
  from "C:\xampp\htdocs\Xtienda\smarty\productos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591883fc5c9199_85665500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29b4b625b962bacefcbbad1098cdba5a4f2db66d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Xtienda\\smarty\\productos.tpl',
      1 => 1494265644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:smarty/cesta.tpl' => 1,
    'file:smarty/listaProducto.tpl' => 1,
  ),
),false)) {
function content_591883fc5c9199_85665500 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
              <h1>Listado de productos</h1>
            </div>
 
            <div id='cesta'>
                <?php $_smarty_tpl->_subTemplateRender("file:smarty/cesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
            <div id='productos'>
                <?php $_smarty_tpl->_subTemplateRender("file:smarty/listaProducto.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
        </div>
    </body>
</html><?php }
}
