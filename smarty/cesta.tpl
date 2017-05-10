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
        <script src="js/fcesta.js" type='text/javascript'></script>
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
                        
                         <input class='cestaAccion' type='submit' {$activarBoton} name='cestaAccion' value='pagar'  />
                         
                        <input class='cestaAccion' type='submit' {$activarBoton} name='cestaAccion' value='vaciar' />
                            
                       
                    </form>
                    
                </div>    
            </div>
        </div>
    </body>
</html>