<!DOCTYPE html>
{*Platilla para visualizar los productos, se invoca desde productos.php*}
<html>
    <head>
        <title>práctica de tienda página de productos </title>
        <meta charset="UTF-8">
        <link href="estilos/tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id='contenedor'>
          
           
            <div id='productos'>
              <!--  <table >
                    <thead>
                        <tr>
                            <th></th>
                            <th>Código</th>
                            <th>Nombre</th>
                          <th>Descripción</th> 
                            <th>Precio</th>

                        </tr>
                    </thead>
                    <tbody> -->
                {foreach from=$listaProductos item=producto}
                <p>
                    <form name='listado' action="productos.php" method="post">
                             <td><input type="hidden" name='cod' value='{$producto->cod}' />
                                 <input type="hidden" name='PVP' value='{$producto->PVP}' />
                                 <input type="submit" name="enviar" value="Añadir"/></td>
                                 <input type="button" value="X-Enviar" onclick="xajax_actualiza(xajax.getFormValues('listado'))" />
                                {$producto->nombre_corto}: {$producto->PVP}
                        </form>
                </p>
                   <!-- <tr>
                         <form action="productos.php" method="post">
                             <td><input type="hidden" name='cod' value='{$producto->cod}' />
                                 <input type="hidden" name='PVP' value='{$producto->PVP}' />
                                 <input type="submit" name="enviar" value="Añadir"/></td>
                             <td>{$producto->cod}</td> 
                             <td>{$producto->nombre_corto}</td>
                             <td>{$producto->descripcion}</td>
                             <td>{$producto->PVP}</td>
                        </form>
                    </tr> -->
                    {/foreach}
                <!--    </tbody>
                </table>-->
            </div>
             <br class="divisor" />
              <div id="pie">
              <form action='logoff.php' method='post'>
                  <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
              </form>        
            </div>
        </div>
    </body>
</html>