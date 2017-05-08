<?php
 
 
class BD {
    //atributo privado de conexión
    private static $conexion;
 
  /*======================conectar()======================================
     conecta con la base de datos, usando PDO
     da valor al atributo privado y estático $conexion de la clase
     En caso de no conectarse aborta la app y muestra un mensaje
   ****************************************************************************************** */
    private static function conectar(){
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=dwes";
        $usuario = 'root';
        $pass = '';
        try{
           $conexion= new PDO($dsn, $usuario, $pass, $opc);
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
             die ('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
         }
         self::$conexion = $conexion;
 
}
 
 
/*======================ejecutaConsulta ($sql,$valores)======================================
    Acción: Ejecuta una consulta preparada con los valores de los parámetros de la consulta preparada
    Parámetros: $sql es la consulta preparada y parametrizada
                $valores es un array asociativo con los valores de los distintos 
                          parámetros de la consulta anterior
    Retorna =La consulta después de ejecutarla, o null si no la ha podido ejecutar
             en caso de no ejecutarla da un mensaje              
 * ***********************************************************************************************/
    protected static function ejecutaConsulta($sql,$valores) {
       if (self::$conexion == null)
            self::conectar();
       $conexion = self::$conexion;
       try{
           $consulta = $conexion->prepare($sql);
           $consulta->execute($valores);
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
       return $consulta;
 
    }
 
 
 /*======================verificaCliente ($nombre,$pass)======================================
    Accion: verifica si un nombre y pass son contenidos en la base de datos
    Parámetros: $nombre es el nombre de usuario
                $pass es la password para ese nombre
    Retorna  true o false según se haya podido o no validar
  * Recordar que la pass está cifrada con md5 en la base de datos      
 * ***********************************************************************************************/   
    public static function verificaCliente($nombre, $pass) {
     // desactivado para pruebas
          $valores = array('usuario'=>$nombre, 'password' =>$pass);
       $sql = <<<FIN
        SELECT usuario FROM usuarios 
        WHERE usuario='{$nombre}'
        AND contrasena='{$pass}'
FIN;
       $resultado = self::ejecutaConsulta ($sql,$valores);
       $verificado = false;
       if ($resultado->fetch())
          $verificado=true;
       return $verificado;
    }
    public static function obtieneProductos() {
        self::conectar();
        try{
            $consulta=self::$conexion->prepare("SELECT * FROM producto");
            $consulta->execute();
            $resultadoConsulta=$consulta->fetchAll(PDO::FETCH_OBJ);
            return $resultadoConsulta;
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
        
    }
    public  function obtieneProducto($codigo){
        self::conectar();
        try{
            $sql="SELECT * FROM producto WHERE cod='$codigo'";
            $consulta=self::ejecutaConsulta($sql,[]);
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);   
           return $resultado[0];
     
            
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
        
        
    }
}//End de la clase DB.php
 
?>
