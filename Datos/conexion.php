
<?php

class Conexion{
/**
 *  Donde se realiza la conexion a la base de datos
 */




 public static function conectar(){
     try {
       $cn=new PDO("mysql:host=localhost;dbname=turnos-ya","root","");
     
      return $cn;
      

     } catch (PDOException $ex) {
         die($ex->getMessage());
     }
 }   

}
Conexion::conectar();
