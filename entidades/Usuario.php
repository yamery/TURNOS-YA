<?php

class Usuario{
/** 
    *lo que hacemos aca es el encapsulamiento de las variables, 
    *para que solo se pueda hacer acceso de ella por medio de las funciones setter a getter
    */
    private $ID_usuario; 
    private $Nombre;
    private $Apellido;
    private $Correo;
    private $Telefono;
    private $Contraseña;
    private $Tipo_user;

    
    public function getID_usuario(){
        return $this-> ID_usuario;
    }

    public function setID_usuario($ID_usuario){
        $this->ID_usuario = $ID_usuario;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function getApellido(){
        return $this->Apellido;
    }

    public function setApellido ($Apellido){
        $this-> Apellido = $Apellido;
    }

    public function getCorreo(){
        return $this->Correo;
    }

    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    public function getContraseña(){
        return $this->Contraseña;
    }

    public function setContraseña ($Contraseña){
        $this->Contraseña = $Contraseña;
    }

    public function getTipo_user(){
        return $this->Tipo_user;
    }

    public function setTipo_user ($Tipo_user){
        $this-> Tipo_user = $Tipo_user;
    }

    public function getTelefono(){
        return $this->Telefono;
    }

    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

}