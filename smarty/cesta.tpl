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
        <script type="txt/javascript" src="js/fcesta.js"></script>
        
    </head>
    <body>
        <div id="contenedor">
            <div id='cesta'>
                <h3><img src="imagenes/cesta.png" alt='Cesta' width='24' heigth='21' /> Cesta</h3>
                    <hr />
                <div id='pagcesta'>

                    {if !empty($productosCesta)}
                    {foreach from=$productosCesta item=$producto key=$codigo}
                        <p>
                            <span class='cantidad'>{$unidadesCesta[$codigo]|default:"&nbsp;"}</span>
                            <span class='codigo'>{$codigo|default:"&nbsp;" }</span>
                            <span class='precio'>{$producto|default:"&nbsp;"}</span><br />
                        <form id="compra" action='javascript:void(null)'  method='post' onsubmit='borrarProducto()'>
                            <input type="hidden" name='codigo' value='{$codigo}' />
                            <input class="borrar" type="submit" name="borrar" value="X" />
                        </form>
                        </p>
                        <hr />
                   
                    {/foreach} 
                        
                        <span class="coste">Total: {$total|default:"&nbsp;"} € </span>
                        
                    <hr /><form action='productos.php' method ='post'>
                        <button class="cestaAccion" name="cestaAccion" type="submit" value='pagar'>Pagar</button> 
                          </form>
                                                   
                            <button class="cestaAccion" name="vaciar" onclick="javascript:vaciarCesta()" >Vaciar</button>                        
                    {else}
                        <p>Cesta vacia</p>
                        <hr />
                        <form action='productos.php' method ='post'>
                           <input class='cestaAccion' type='submit' {$activarBoton} name='cestaAccion' value='pagar'>
                           <input class='cestaAccion' type='submit' {$activarBoton} name='cestaAccion' value='vaciar'>
                       </form> 
                    {/if}
                    
                </div> 
                
            </div>
        </div>
    </body>
</html>