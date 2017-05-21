function actualiza(){
      xajax_actualiza(xajax.getFormValues('listado'));
};
function vaciarCesta(){
   // alert('en fcesta.js vaciando');
    xajax_vaciarCesta();
}
function borrarProducto(){
    
    alert('borrando producto');
    xajax_borrarProducto(xajax.getFormValues('compra'));
}


function borrarProducto(codigo) {
    alert("borrando el producto "+codigo+" desde fcesta.js");
    xaja_borrarProducto(codigo);
}
