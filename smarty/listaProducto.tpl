<!DOCTYPE html>
{*Platilla para visualizar los productos, se invoca desde productos.php*}
<html>
    <head>
        <title>práctica de tienda página de productos </title>
        <meta charset="UTF-8">
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
        <script src="js/fcesta.js"></script>
    </head>
    <body>
        <div id='contenedor'>
          
           
            <div id='productos'>
             
                {foreach from=$listaProductos item=producto}
                <p>
                    <form id='listado' action="javascript:void(null);" onsubmit="actualiza();">
                                 <input type="hidden" name='cod' value='{$producto->cod}' />
                                 <input type="hidden" name='PVP' value='{$producto->PVP}' />
                                 <input type="submit" name="enviar" value="X-añadir"/></td>
                                 
                                {$producto->nombre_corto}: {$producto->PVP}
                        </form>
                </p>
             
                    {/foreach}
             
            </div>
                    <div id='pcesta'></div>
             <br class="divisor" />
              <div id="pie">
              <form action='logoff.php' method='post'>
                  <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
              </form>        
            </div>
        </div>
    </body>
</html>