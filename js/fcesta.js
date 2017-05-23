/**
 * actualiza la cesta de la compra
 * @return {undefined}
 */
function actualiza(){
      xajax_actualiza(xajax.getFormValues('listado'));
};
/**
 * Vacia la cesta de la compra
 * @return {undefined}
 */
function vaciarCesta(){
   // alert('en fcesta.js vaciando');
    xajax_vaciarCesta();
}

/**
 * Borra un producto de la cesta
 * @param {type} codigo
 * @return {undefined}
 */
function borrarProducto(codigo) {
   // alert("borrando el producto "+codigo+" desde fcesta.js");
    xajax_borrarProducto(codigo);
}
