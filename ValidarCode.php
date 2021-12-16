
<?php

include './Controladores/UsuarioControlador.php';
include './helps/Helps.php';
session_start();

header('Content-type: application/json');

$resulta=array();

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

$query2 = "ALTER TABLE reservaciones AUTO_INCREMENT = 1";
      
      mysqli_query($connection, $query2);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if((isset($_POST["txtCorreo2"])&& isset($_POST["txtContraseña2"]))or(isset($_POST["txtCorreo"])&& isset($_POST["txtContraseña"])) ){

        if(isset($_POST["txtCorreo2"])&& isset($_POST["txtContraseña2"])){
            $txtCorreo=validar_campo($_POST["txtCorreo2"]);
            $txtContraseña=validar_campo($_POST["txtContraseña2"]);
        }else if(isset($_POST["txtCorreo"])&& isset($_POST["txtContraseña"])){
            $txtCorreo=validar_campo($_POST["txtCorreo"]);
            $txtContraseña=validar_campo($_POST["txtContraseña"]);
        }
        

        $ID_USER="";
        
        $resulta=array("estado"=>"true");
        
        if(UsuarioControlador::login($txtCorreo,$txtContraseña)){
      
            $usuario=UsuarioControlador::getUsuario($txtCorreo,$txtContraseña);
            $_SESSION["usuario"]=array(
                "ID_usuario"=>$usuario->getID_usuario (),
                "Nombre"=>$usuario->getNombre(),
                "Apellido"=>$usuario->getApellido(),
                "Correo"=>$usuario->getCorreo(),
                "Telefono"=>$usuario->getTelefono(),
                "Tipo_user"=>$usuario->getTipo_user()
                
            );
            if($usuario->getTipo_user()==2){
                empresa($usuario->getID_usuario ());
            }
            $ID_USER=$usuario->getID_usuario ();   

        }else{
            
        $resulta=array("estado"=>"false");

        }

        if((isset($_POST["turno"]))&&($_POST["turno"]!="")){

            
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
    }
}


$resulta=array("estado"=>"false");
return print(json_encode($resulta));


function empresa($id_user){
    
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );

    $query="SELECT * FROM empresas where Usuarios_ID_usuario=$id_user";
    $result = mysqli_query($connectio,$query);
    
    if(!$result){
        die("consulta fallida". mysqli_error($connectio));
    }
    
    
    while($row=mysqli_fetch_array($result)){
        
                    
      
        $_SESSION["empresa"]=array(
            'id'=> $row['ID_empresa'],
            'nombre_empresa'=> $row['Nombre_empresa'],
            'img'=> base64_encode($row['Logo']),
            'tipo_empresa'=>$row['Tipo_empresa'],
            'Direccion'=>$row['Direccion'],
            
            
        );
       
    
    }
   
    
}