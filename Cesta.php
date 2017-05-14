<?php
 require_once('BD.php');
 
 
class Cesta {
    //atributo privado de conexión
    protected static $unidades=[];
    protected static $productos=[];
 
   
    
    // Introduce un nuevo artículo en la cesta de la compra
   public static function nuevo_articulo($codigo) {
       self::carga_cesta();
       if (isset(self::$unidades[$codigo])){
            if (self::$unidades[$codigo] > 0) {
                self::$unidades[$codigo] ++;
            } 
       }else {
                $producto = BD::obtieneProducto($codigo);
                self::$productos[$codigo]=$producto['PVP'];
                self::$unidades[$codigo]= 1;
                
                
        }
        
       self::guarda_cesta();
   }
   
   public static function get_productos() {
       
       return self::$productos;
   }
   
   public static function coste() {
       self::carga_cesta();
         $total=0.0;
       
       foreach (self::$productos as $clave => $valor) 
            $total+=(floatval ($valor)*floatval (self::$unidades[$clave]));
          
       
       $_SESSION['total']=$total;
       return $total;
   }
   
   public static function vacia() {
       unset($_SESSION['productosCesta']);
       unset($_SESSION['unidadesCesta']);
       unset($_SESSION['total']);
       
   }
   
   public static function guarda_cesta() {
        $_SESSION['productosCesta']= self::$productos;
        $_SESSION['unidadesCesta']= self::$unidades;
       return null;
   }
   
   public static function carga_cesta() {
    if (isset($_SESSION['productosCesta'])) {
        self::$productos = $_SESSION['productosCesta'];
        self::$unidades=$_SESSION['unidadesCesta'];        
    } else {
        $_SESSION['productosCesta']="";
        $_SESSION['unidadesCesta']="";
    }
   }
}