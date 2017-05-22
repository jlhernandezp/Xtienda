function actualiza(){
      xajax_actualiza(xajax.getFormValues('listado'));
};
function vaciarCesta(){
   // alert('en fcesta.js vaciando');
    xajax_vaciarCesta();
}


function borrarProducto(codigo) {
    alert("borrando el producto "+codigo+" desde fcesta.js");
    xajax_borrarProducto(codigo);
}
