<?php
/* Smarty version 3.1.30, created on 2017-05-22 19:04:50
  from "C:\xampp\htdocs\Xtienda\smarty\listaProducto.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59231a32198b37_83964226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c14c1a7184075c6c42f5ac6831d3ceb44d6a6e4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Xtienda\\smarty\\listaProducto.tpl',
      1 => 1494781090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59231a32198b37_83964226 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html>
    <head>
        <title>práctica de tienda página de productos </title>
        <meta charset="UTF-8">
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
       <?php echo '<script'; ?>
 type='text/javascript' src="js/fcesta.js"><?php echo '</script'; ?>
> 
        
        
    </head>
    <body>
        <div id='contenedor'>
          
           
            <div id='productos'>
             
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaProductos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
                <p>
                    <form id='listado<?php echo $_smarty_tpl->tpl_vars['producto']->value->cod;?>
' action="javascript:void(null);" onsubmit="xajax_actualiza(xajax.getFormValues('listado<?php echo $_smarty_tpl->tpl_vars['producto']->value->cod;?>
'));">
                                 <input type="hidden" name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->cod;?>
' />
                                 <input type="hidden" name='PVP' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->PVP;?>
' />
                                 <input type="submit" name="enviar" value="X-añadir"/>                                 
                                <?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre_corto;?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->PVP;?>

                        </form>
                </p>
             
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

             
            </div>
                    
             <br class="divisor" />
              <div id="pie">
              <form action='logoff.php' method='post'>
                  <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
              </form>        
            </div>
        </div>
    </body>
</html><?php }
}
