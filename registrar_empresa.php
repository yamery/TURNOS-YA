<?php

include 'Controladores/UsuarioControlador.php';
include './helps/Helps.php';

session_start();



$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

header('Content-type: application/json');

$query = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
      mysqli_query($connection, $query);
$query = "ALTER TABLE empresas AUTO_INCREMENT = 1";
      mysqli_query($connection, $query);

      $resulta=array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["txtNombreR"])&& isset($_POST["txtApellidoR"]) && isset($_POST["txtCorreoR"])&& isset($_POST["txtTelefonoR"])&& isset($_POST["txtContraseñaR"])){

        if(Correo($_POST["txtCorreoR"])){

            $txtNombre=validar_campo($_POST["txtNombreR"]);
        $txtApellido=validar_campo($_POST["txtApellidoR"]);
        $txtCorreo=validar_campo($_POST["txtCorreoR"]);
        $txtTelefono=validar_campo($_POST["txtTelefonoR"]);
        $txtContraseña=validar_campo($_POST["txtContraseñaR"]);
        $nombre =validar_campo ($_POST['txtNEmp']);
        $TipEmp=validar_campo($_POST["txtTipEmp"]);
        $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
        $Direc_emp=validar_campo($_POST["Direc_emp"]);
        $txtTipoUser=2;
        
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

        $query = " SELECT MAX(ID_usuario) FROM usuarios";
        $result = mysqli_query($connection, $query);
        $id_emp="";
        
        while ($fila = mysqli_fetch_array($result)) {
            $id_emp= $fila['MAX(ID_usuario)'];
        }
    $query = " INSERT INTO empresas(Logo,Nombre_empresa,Tipo_empresa,Usuarios_ID_usuario,Direccion) VALUES ('$logo','$nombre','$TipEmp','$id_emp','$Direc_emp' )";
            $resultado = mysqli_query($connection, $query);
            if(!$resultado){
                die("Query failed");
          }
          empresa($id_emp);
        
          
          return print(json_encode($resulta));
        
        }

        else{
            $resulta=array("estado"=>"existe");
             return print(json_encode($resulta));
        }



      
    }
}else{
    $resulta=array("estado"=>"false");
    return print(json_encode($resulta));
}





// if(isset($_POST['regisEMPRE'])){
//     $nombre = $_POST['nombre'];
//     $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
 
//     $query = " INSERT INTO empresa(nombre_empresa, logo) VALUES ('$nombre', '$logo')";
//     $result = mysqli_query($connection, $query);
//     if(!$result){
//         die("Query failed");
//     }
 

   
// }

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

