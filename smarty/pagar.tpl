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
            <h1>Resumen de factura del usuario {$usuario}</h1>
            <h4 style="text-align:right">Fecha : {$smarty.now|date_format:"%D"}</h4>
            
             <div class="pago">
                    <table id="tablaPagar" class="pago">
                        <thead>
                            <tr class="pago"><th class="pago">Articulo</th>
                                <th class="pago">Cantidad</th>
                                <th class="pago">Precio Unitario</th></tr>

                        </thead>
            
                        <tbody>
                             {foreach from=$productosCesta item=$producto key=$codigo}
                                <tr class="pago">
                                    <td class="pago">{$codigo|default:"&nbsp;" }</td>
                                    <td class="pago">{$unidadesCesta[$codigo]|default:"&nbsp;"}</td>
                                    <td class="pago">{$producto|default:"&nbsp;"}</td>
                                </tr>
                            {/foreach}
                        </tbody>
                         <table>
                        <thead>
                            <tr class="pago"><th class="pago" colspan=2><strong>RESUMEN DE LA FACTURA</strong></th>
                        </thead>
                        <tr  class="pago">
                            <td class="pago">Total articulos</td>
                            <td class="pago">{$totalUnidades}</td>
                        </tr>
                        <tr>
                            <td class="pago">Precio total Sin iva</td>
                            <td class="pago">{math equation="x/y" x=$total y=1.21 format="%.2f"}</td>
                        </tr>
                        <tr>
                            <td class="pago">IVA</td>
                            <td class="pago">{math equation="x - ( x / y )" x=$total y=1.21 format="%.2f"}</td></td>
                        </tr>
                        <tr>
                            <td class="pago">TOTAL pagar</td>
                            <td class="pago">{$total}</td>
                        </tr>
                    </table>
                </div>


            </div>
                        
            <br class="divisor" />
            
            <div id="pie">
                <form action='logoff.php' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
                </form>        
            </div>
            </div>
        </div>
    </body>
</html>