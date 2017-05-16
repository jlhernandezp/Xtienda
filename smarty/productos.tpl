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
         <script type="txt/javascript" src="js/fcesta.js"></script>
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
              <h1>Listado de productos</h1>
            </div>
 
            <div id='cesta'>
                {include file="smarty/cesta.tpl"}
            </div>
            <div id='productos'>
                {include file="smarty/listaProducto.tpl"}
            </div>
        </div>
    </body>
</html>