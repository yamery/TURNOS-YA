
<?php

include './Datos/UsuarioDao.php';


class UsuarioControlador{

    public static function login($Correo,$Contraseña){
        $obj_usuario= new Usuario();
        $obj_usuario ->setCorreo($Correo);
        $obj_usuario ->setContraseña($Contraseña);
      return UsuarioDao::loginf($obj_usuario);

    }

    public function getUsuario($Correo,$Contraseña){
        $obj_usuario= new Usuario();
        $obj_usuario ->setCorreo($Correo);
        $obj_usuario ->setContraseña($Contraseña);
      return UsuarioDao::getUsuario($obj_usuario);
    }

    public function registrar($Nombre,$Apellido,$Correo,$Telefono,$Contraseña,$Tipo_user){
      $obj_usuario= new Usuario();
      $obj_usuario ->setNombre($Nombre);
     $obj_usuario ->setApellido($Apellido);
      $obj_usuario ->setCorreo($Correo);
$obj_usuario ->setTelefono($Telefono);
      $obj_usuario ->setContraseña($Contraseña);
      $obj_usuario ->setTipo_user($Tipo_user);
    return UsuarioDao::registrar($obj_usuario);
    }
}


