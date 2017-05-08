<?php
/* Smarty version 3.1.30, created on 2017-05-05 22:46:06
  from "C:\xampp\htdocs\tiendav1\smarty\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590ce48eae0350_40560861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f596f5b1d1fd63652843a4ec4e9fe1cda7c4fa43' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tiendav1\\smarty\\login.tpl',
      1 => 1494017164,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590ce48eae0350_40560861 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Login Tienda Web con Plantillas</title>
  <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        
        <div><span class='error'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
 
        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html><?php }
}
