<?php

include './Controladores/UsuarioControlador.php';
include './helps/Helps.php';

session_start();
$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);
$query = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
$query2 = "ALTER TABLE reservaciones AUTO_INCREMENT = 1";
      mysqli_query($connection, $query);
      mysqli_query($connection, $query2);

      header('Content-type: application/json');
  $resulta=array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["txtNombre"])&& isset($_POST["txtApellido"]) && isset($_POST["txtCorreo"])&& isset($_POST["txtTelefono"])&& isset($_POST["txtContraseña"])){

        if(Correo($_POST["txtCorreo"])){

            $txtNombre=validar_campo($_POST["txtNombre"]);
        $txtApellido=validar_campo($_POST["txtApellido"]);
        $txtCorreo=validar_campo($_POST["txtCorreo"]);
        $txtTelefono=validar_campo($_POST["txtTelefono"]);
        $txtContraseña=validar_campo($_POST["txtContraseña"]);
        $txtTipoUser=1;
        
        $resulta=array("estado"=>"true");
        
    
        if(UsuarioControlador::registrar($txtNombre,$txtApellido,$txtCorreo,$txtTelefono,$txtContraseña,$txtTipoUser)){
      
            $usuario=UsuarioControlador::getUsuario($txtCorreo,$txtContraseña);
            $_SESSION["usuario"]=array(
                "ID_usuario"=>$usuario->getID_usuario (),
                "Nombre"=>$usuario->getNombre(),
                "Apellido"=>$usuario->getApellido(),
                "Correo"=>$usuario->getCorreo(),
                "Telefono"=>$usuario->getTelefono(),
                "Tipo_user"=>$usuario->getTipo_user()
                //"fecha_registro"=>$usuario->getNombre(),
            );
            
                       
            

        }
        
                
        if(($_POST["turno"]!="")){
            $ID_USER=id_user();
            $ID_turno=$_POST["turno"];
            $query="INSERT INTO reservaciones(Usuarios_ID_usuario,Turnos_ID_turnos) VALUES ('$ID_USER', '$ID_turno')";
            $apartar="UPDATE turnos SET Disponibilidad = '1' WHERE turnos.ID_turnos = ' $ID_turno'";
            
            $resultado = mysqli_query($connection, $query);
            $resultado2 = mysqli_query($connection, $apartar);
            if(!($resultado)||!($resultado2)){
                die("Query failed");
          }
          $resulta=array("estado"=>"Apartado");
        }

        return print(json_encode($resulta));

        }else{
    $resulta=array("estado"=>"existe");
    return print(json_encode($resulta));
}

        
    }
}else{
    $resulta=array("estado"=>"false");
    return print(json_encode($resulta));
}


function Correo($correo){
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );

    $query="SELECT * FROM usuarios where Correo='$correo'";
    $result = mysqli_query($connectio,$query);
    $filas=mysqli_num_rows($result);
    if($filas == 0){
        return true;
    }else{
        return false;
    }
}

function id_user(){
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );
    $query = " SELECT MAX(ID_usuario) FROM usuarios";
        $result = mysqli_query($connectio, $query);
        $id_user="";
        
        while ($fila = mysqli_fetch_array($result)) {
            $id_user= $fila['MAX(ID_usuario)'];            
        }
        return $id_user;
}