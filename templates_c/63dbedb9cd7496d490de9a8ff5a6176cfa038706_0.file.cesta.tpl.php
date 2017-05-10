<?php
/* Smarty version 3.1.30, created on 2017-05-10 13:15:28
  from "C:\xampp\htdocs\Xtienda\smarty\cesta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5912f650d9cd46_14232185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63dbedb9cd7496d490de9a8ff5a6176cfa038706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Xtienda\\smarty\\cesta.tpl',
      1 => 1494414922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5912f650d9cd46_14232185 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Cesta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo '<script'; ?>
 src="js/fcesta.js" type='text/javascript'><?php echo '</script'; ?>
>
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
         
    </head>
    <body>
        <div id="contenedor">
            <div id='cesta'>
                <div id='pagcesta'>

                    <h3><img src="imagenes/cesta.png" alt='Cesta' width='24' heigth='21' /> Cesta</h3>
                    <hr />
                    <div id='pcesta'></div>
                   <hr />
                     <form id='lista' >
                        
                         <input class='cestaAccion' type='submit' <?php echo $_smarty_tpl->tpl_vars['activarBoton']->value;?>
 name='cestaAccion' value='pagar'  />
                         
                        <input class='cestaAccion' type='submit' <?php echo $_smarty_tpl->tpl_vars['activarBoton']->value;?>
 name='cestaAccion' value='vaciar' />
                            
                       
                    </form>
                    
                </div>    
            </div>
        </div>
    </body>
</html><?php }
}
