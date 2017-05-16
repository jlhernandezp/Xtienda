<?php
/* Smarty version 3.1.30, created on 2017-05-16 11:40:20
  from "C:\xampp\htdocs\Xtienda\smarty\pagar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591ac90492ac07_36720714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9ff7e80bf862da465aa83dfe5bbd8f59ca4ff3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Xtienda\\smarty\\pagar.tpl',
      1 => 1494316453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591ac90492ac07_36720714 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\smarty-3.1.30\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_math')) require_once 'C:\\xampp\\smarty-3.1.30\\libs\\plugins\\function.math.php';
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
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <h1>Resumen de factura del usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</h1>
            <h4 style="text-align:right">Fecha : <?php echo smarty_modifier_date_format(time(),"%D");?>
</h4>
            
             <div class="pago">
                    <table id="tablaPagar" class="pago">
                        <thead>
                            <tr class="pago"><th class="pago">Articulo</th>
                                <th class="pago">Cantidad</th>
                                <th class="pago">Precio Unitario</th></tr>

                        </thead>
            
                        <tbody>
                             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productosCesta']->value, 'producto', false, 'codigo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['codigo']->value => $_smarty_tpl->tpl_vars['producto']->value) {
?>
                                <tr class="pago">
                                    <td class="pago"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['codigo']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</td>
                                    <td class="pago"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['unidadesCesta']->value[$_smarty_tpl->tpl_vars['codigo']->value])===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</td>
                                    <td class="pago"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['producto']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </tbody>
                         <table>
                        <thead>
                            <tr class="pago"><th class="pago" colspan=2><strong>RESUMEN DE LA FACTURA</strong></th>
                        </thead>
                        <tr  class="pago">
                            <td class="pago">Total articulos</td>
                            <td class="pago"><?php echo $_smarty_tpl->tpl_vars['totalUnidades']->value;?>
</td>
                        </tr>
                        <tr>
                            <td class="pago">Precio total Sin iva</td>
                            <td class="pago"><?php echo smarty_function_math(array('equation'=>"x/y",'x'=>$_smarty_tpl->tpl_vars['total']->value,'y'=>1.21,'format'=>"%.2f"),$_smarty_tpl);?>
</td>
                        </tr>
                        <tr>
                            <td class="pago">IVA</td>
                            <td class="pago"><?php echo smarty_function_math(array('equation'=>"x - ( x / y )",'x'=>$_smarty_tpl->tpl_vars['total']->value,'y'=>1.21,'format'=>"%.2f"),$_smarty_tpl);?>
</td></td>
                        </tr>
                        <tr>
                            <td class="pago">TOTAL pagar</td>
                            <td class="pago"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
                        </tr>
                    </table>
                </div>


            </div>
                        
            <br class="divisor" />
            
            <div id="pie">
                <form action='logoff.php' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
                </form>        
            </div>
            </div>
        </div>
    </body>
</html><?php }
}
