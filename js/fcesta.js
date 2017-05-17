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


