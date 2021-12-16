<?php

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
    if((isset($_POST["id_user"]))&& (isset($_POST["id_turn"]))){


        $ID_turno=$_POST["id_turn"];
        $ID_user=$_POST["id_user"];
            $query="INSERT INTO reservaciones(Usuarios_ID_usuario,Turnos_ID_turnos) VALUES ('$ID_user', '$ID_turno')";
            $apartar="UPDATE turnos SET Disponibilidad = '1' WHERE turnos.ID_turnos = ' $ID_turno'";
            
            $resultado = mysqli_query($connection, $query);
            $resultado2 = mysqli_query($connection, $apartar);
            if(!($resultado)||!($resultado2)){
                die("Query failed");
          }
          $resulta=array("estado"=>"true");
          return print(json_encode($resulta));

    }
}else{
    $resulta=array("estado"=>"false");
          return print(json_encode($resulta));
}
