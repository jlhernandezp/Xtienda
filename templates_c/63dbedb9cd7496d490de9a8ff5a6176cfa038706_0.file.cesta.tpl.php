<?php
/* Smarty version 3.1.30, created on 2017-05-08 22:03:31
  from "C:\xampp\htdocs\Xtienda\smarty\cesta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5910cf13cf07d7_99309157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63dbedb9cd7496d490de9a8ff5a6176cfa038706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Xtienda\\smarty\\cesta.tpl',
      1 => 1494273802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5910cf13cf07d7_99309157 (Smarty_Internal_Template $_smarty_tpl) {
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
                    
                    <?php if (!empty($_smarty_tpl->tpl_vars['productosCesta']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productosCesta']->value, 'producto', false, 'codigo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['codigo']->value => $_smarty_tpl->tpl_vars['producto']->value) {
?>
                        <p>
                            <span class='cantidad'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['unidadesCesta']->value[$_smarty_tpl->tpl_vars['codigo']->value])===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</span>
                            <span class='codigo'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['codigo']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</span>
                            <span class='precio'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['producto']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</span><br />
                        <form name="compra"action="productos.php" method="post">
                            <input type="hidden" name='codigo' value='<?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
' />
                            <input class="borrar" type="submit" name="borrar" value="" />
                        </form>
                        </p>
                        <hr />
                   
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
                        
                        <span class="coste">Total: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
 € </span>
                      
                    
                    <?php } else { ?>
                        <p>Cesta vacia</p>
                        
                    <?php }?>
                    <hr />
                     <form action='productos.php' method ='post'>
                        <input class='cestaAccion' type='submit' <?php echo $_smarty_tpl->tpl_vars['activarBoton']->value;?>
 name='cestaAccion' value='pagar'>
                        <input class='cestaAccion' type='submit' <?php echo $_smarty_tpl->tpl_vars['activarBoton']->value;?>
 name='cestaAccion' value='vaciar'>
                    </form>
                    
                </div>    
            </div>
        </div>
    </body>
</html><?php }
}