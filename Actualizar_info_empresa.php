<?php



include './helps/Helps.php';

session_start();



 $connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

 header('Content-type: application/json');
$resulta=array();

 // --------------------------------------------------------  ACTUALIZAR INFO -------------------------------------

if($_SERVER["REQUEST_METHOD"]=="POST"){ 

    if((isset($_POST["Form_upnamme"]))&&(isset($_POST["Form_upnapellido"]))&&(isset($_POST["Form_upnameempre"]))&&(isset($_POST["Form_uptel"]))&&(isset($_POST["Form_updirect"]))&&(isset($_POST["up_id"]))){

         $new_name=$_POST["Form_upnamme"];
         $new_apellido=$_POST["Form_upnapellido"];
         $new_name_empre=$_POST["Form_upnameempre"];
         $new_tel=$_POST["Form_uptel"];
         $new_direc=$_POST["Form_updirect"];
         $up_id=$_POST["up_id"];
    
         $query = " UPDATE usuarios SET Nombre = '$new_name', Apellido='$new_apellido',Telefono='$new_tel' WHERE ID_usuario = '$up_id' ";
         $query2 = " UPDATE empresas SET Nombre_empresa = '$new_name_empre', Direccion='$new_direc' WHERE Usuarios_ID_usuario = '$up_id' ";
                 $resultado = mysqli_query($connection, $query);
                 $resultado2 = mysqli_query($connection, $query2);
              
                 if(!$resultado){
                     die("Query1 failed");
               }
               if(!$resultado2){
                die("Query2 failed");
          }

          $query="SELECT * FROM usuarios where ID_usuario=$up_id";
            $result = mysqli_query($connection,$query);

            if(!$result){
                  die("consulta fallida". mysqli_error($conecction));
                }


while($row=mysqli_fetch_array($result)){

    
    $_SESSION["usuario"]=array(
        "ID_usuario"=>$row['ID_usuario'],
        "Nombre"=>$row['Nombre'],
        "Apellido"=>$row['Apellido'],
        "Correo"=>$row['Correo'],
        "Telefono"=>$row['Telefono'],
        "Tipo_user"=>$row['Tipo_user']
        
    );
   

}

empresa($up_id);
    
        
        $resulta=array("estado"=>"true");
    return print(json_encode($resulta));
        
        


    }

// --------------------------------------------------------  CAMBIAR CONTRASEÑA-------------------------------------
 if((isset($_POST["actu_pass"]))&&(isset($_POST["new_pass"]))&&(isset($_POST["pass_id"]))){

    $ID_user=$_POST["pass_id"];
    $actu_pass=$_POST["actu_pass"];
    $new_pass=$_POST["new_pass"];

    if(Correo($ID_user,$actu_pass)){

        $actu = " UPDATE usuarios SET Contrasena = '$new_pass' WHERE ID_usuario = '$ID_user' ";
        
        $Finalizacion = mysqli_query($connection, $actu);
              
        if(!$Finalizacion){
            die("Query1 failed");
      }

        $resulta=array("estado"=>"true");
        return print(json_encode($resulta));
    }else{
        $resulta=array("estado"=>"false");
    return print(json_encode($resulta));
    }


    
 }


}

// -----------------------------------------  CARGAR INFORMACION USUARIO -------------------------------------------------

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

//-------------------------------------  ---------------------------------------------------------

function Correo($ID_user,$actu_pass){
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );

    $query="SELECT * FROM usuarios where ID_usuario='$ID_user' AND Contrasena='$actu_pass'";
    $result = mysqli_query($connectio,$query);
    $filas=mysqli_num_rows($result);
    if($filas == 0){
        return false;
    }else{
        return true;
    }
}