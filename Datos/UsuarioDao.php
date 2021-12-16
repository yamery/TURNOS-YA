
<?php
include 'Conexion.php';
include './entidades/Usuario.php';


class UsuarioDao extends Conexion{
 
protected static $cnx;

private static function getConexion(){ 

self::$cnx=Conexion::conectar(); /** que el cnx se llene de loque contenga la funcion conectar*/

} 
private static function desconectar(){
    self::$cnx=null;
}

/**metodo que sirve para validar Correo */
public static function loginf($usuario){

$query= "SELECT * from usuarios where Correo=:Correo AND Contrasena=:Contrasena";

self::getConexion();

$resultado=self::$cnx->prepare($query);
$user= $usuario->getCorreo();
$pass= $usuario->getContraseña();


$resultado->bindParam(":Correo",$user);
$resultado->bindParam(":Contrasena",$pass);





$resultado->execute();

if($resultado->rowCount()>0){
  $filas=$resultado->fetch(); /**es para que todo lo que traiga de resultado lo pase a un array */
  
  if($filas["Correo"]==$usuario->getCorreo() && $filas["Contrasena"]==$usuario->getContraseña()){
   
 return true;
  }
}
return false;
}

/**metodo que sirve para obtener un usuario */
public static function getUsuario($usuario){

  $query= "SELECT ID_usuario,Nombre,Apellido,Correo,Telefono,Tipo_user from 
  usuarios where Correo=:Correo AND Contrasena=:Contrasena";
  
  self::getConexion();
  
  $resultado=self::$cnx->prepare($query);
  $user= $usuario->getCorreo();
  $pass= $usuario->getContraseña();
  $resultado->bindParam(":Correo",$user);
  $resultado->bindParam(":Contrasena",$pass);
  
  
  
  $resultado->execute();
  $filas=$resultado->fetch(); /**es para que todo lo que traiga de resultado lo pase a un array */
$usuario=new Usuario();

$usuario ->setID_usuario($filas["ID_usuario"]);
$usuario ->setNombre($filas["Nombre"]);
$usuario ->setApellido($filas["Apellido"]);
$usuario ->setCorreo($filas["Correo"]);
$usuario ->setTelefono($filas["Telefono"]);
$usuario ->setTipo_user($filas["Tipo_user"]);



return $usuario;

  }

  /**metodo que sirve para crear Correo */
public static function registrar($usuario){

  $query= "INSERT INTO usuarios
  (Nombre,Apellido,Correo,Contrasena,Telefono,Tipo_user) VALUES
  (:Nombre,:Apellido,:Correo,:Contrasena,:Telefono,:Tipo_user)";
  
  self::getConexion();
  $resultado=self::$cnx->prepare($query);

  $Nombre=$usuario ->getNombre();
  $Apellido=$usuario ->getApellido();
  $Correo=$usuario ->getCorreo();
  $Telefono=$usuario ->getTelefono();
  $Contraseña=$usuario ->getContraseña();
  $Tipo_user=$usuario ->getTipo_user();

  $resultado->bindParam(":Nombre",$Nombre);
  $resultado->bindParam(":Apellido",$Apellido);
  $resultado->bindParam(":Correo",$Correo);
 $resultado->bindParam(":Telefono",$Telefono);
  $resultado->bindParam(":Contrasena",$Contraseña);
  $resultado->bindParam(":Tipo_user",$Tipo_user);
  
if($resultado->execute()){
  return true;
}
return false;

  }


}

