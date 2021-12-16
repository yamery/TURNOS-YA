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

    if((isset($_POST["Form_upnamme"]))&&(isset($_POST["Form_upnapellido"]))&&(isset($_POST["Form_uptel"]))&&(isset($_POST["up_id"]))){

         $new_name=$_POST["Form_upnamme"];
         $new_apellido=$_POST["Form_upnapellido"];         
         $new_tel=$_POST["Form_uptel"];
         $up_id=$_POST["up_id"];
    
         $query = " UPDATE usuarios SET Nombre = '$new_name', Apellido='$new_apellido',Telefono='$new_tel' WHERE ID_usuario = '$up_id' ";
         
                 $resultado = mysqli_query($connection, $query);
                 
              
                 if(!$resultado){
                     die("Query1 failed");
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


    
        
        $resulta=array("estado"=>"true");
    return print(json_encode($resulta));
        
        


    }

}
