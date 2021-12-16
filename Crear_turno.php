

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
$resulta=array();

      $query = "ALTER TABLE turnos AUTO_INCREMENT = 1";
      mysqli_query($connection, $query);

if($_SERVER["REQUEST_METHOD"]=="POST"){    

    if((isset($_POST["txtNombreturn"]))&&(isset($_POST["txtDescripcion"]))&&(isset($_POST["txtHoraIn"]))&&(isset($_POST["txtHoraFin"]))){

        $NomTurn=validar_campo($_POST["txtNombreturn"]);
        $Desc=validar_campo($_POST["txtDescripcion"]);
        $Horain=validar_campo($_POST["txtHoraIn"]);
        $Horafin=validar_campo($_POST["txtHoraFin"]);
        $Dispo=0;
        $id_taq=validar_campo($_POST["txtTaq"]);
               
       
    $query = " INSERT INTO turnos(Nombre_turno,Descripcion,Hora_ini,Hora_fin,Disponibilidad,Taquillas_ID_taquilla) VALUES ('$NomTurn','$Desc','$Horain','$Horafin','$Dispo','$id_taq')";
            $resultado = mysqli_query($connection, $query);
          
            if(!$resultado){
                die("Query failed");
          }
         
    }
        
       
if((isset($_POST["Up_nombre"]))&&(isset($_POST["Up_descrip"]))&&(isset($_POST["Up_Hini"]))&&(isset($_POST["Up_Hfin"]))&&(isset($_POST["Up_IDturn"]))){

    $NomTurn=validar_campo($_POST["Up_nombre"]);
    $Desc=validar_campo($_POST["Up_descrip"]);
    $Horain=validar_campo($_POST["Up_Hini"]);
    $Horafin=validar_campo($_POST["Up_Hfin"]);
    $idturn=validar_campo($_POST["Up_IDturn"]);

    $query = "UPDATE turnos SET Nombre_turno = '$NomTurn', Descripcion = '$Desc', Hora_ini = '$Horain', Hora_fin = '$Horafin' WHERE turnos.ID_turnos = '$idturn';";
            $resultado = mysqli_query($connection, $query);
          
            if(!$resultado){
                die("Query failed");
          }

          
$resulta=array("estado"=>"true");
    return print(json_encode($resulta));
}

if(isset($_POST["ID_delteturn"])){

    $ID_delteturn=validar_campo($_POST["ID_delteturn"]);
    

    $query = "DELETE FROM turnos WHERE turnos.ID_turnos = '$ID_delteturn';";
            $resultado = mysqli_query($connection, $query);
          
            if(!$resultado){
                die("Query failed");
          }

          
$resulta=array("estado"=>"true");
    return print(json_encode($resulta));
}

else{
    $resulta=array("estado"=>"false");
    return print(json_encode($resulta));
}
          
        
}else{
    
}





?>
