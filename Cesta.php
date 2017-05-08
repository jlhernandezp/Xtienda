<?php
 require_once('BD.php');
 
 
class Cesta {
    //atributo privado de conexión
    protected $unidades=[];
    protected $productos=[];
 
   
    
    // Introduce un nuevo artículo en la cesta de la compra
   public function nuevo_articulo($codigo) {
       $this->carga_cesta();
       if (isset($this->unidades[$codigo])){
            if ($this->unidades[$codigo] > 0) {
                $this->unidades[$codigo] ++;
            } 
       }else {
                $producto = BD::obtieneProducto($codigo);
                $this->productos[$codigo]=$producto['PVP'];
                $this->unidades[$codigo]= 1;
                
                
        }
        
        $this->guarda_cesta();
   }
   
   public function get_productos() {
       
       return $this->productos;
   }
   
   public function coste() {
     
         $total=0.0;
       
       foreach ($this->productos as $clave => $valor) 
            $total+=(floatval ($valor)*floatval ($this->unidades[$clave]));
          
       
       $_SESSION['total']=$total;
       return $total;
   }
   
   public function vacia() {
       unset($_SESSION['productosCesta']);
       unset($_SESSION['unidadesCesta']);
       unset($_SESSION['total']);
       
   }
   
   public function guarda_cesta() {
        $_SESSION['productosCesta']= $this->productos;
        $_SESSION['unidadesCesta']= $this->unidades;
       return null;
   }
   
   public function carga_cesta() {
    if (isset($_SESSION['productosCesta'])) {
        $this->productos=$_SESSION['productosCesta'];
        $this->unidades=$_SESSION['unidadesCesta'];        
    } else {
        $_SESSION['productosCesta']="";
        $_SESSION['unidadesCesta']="";
    }
   }
}