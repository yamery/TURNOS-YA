<?php


include './helps/Helps.php';

session_start();



 $connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

//  header('Content-type: application/json');
$resulta=array();

      $query = "ALTER TABLE taquillas AUTO_INCREMENT = 1";
      mysqli_query($connection, $query);

if($_SERVER["REQUEST_METHOD"]=="POST"){  
 if(isset($_POST["txtNombretaq"])){
    if(isset($_SESSION["usuario"])){  

        
        $NomTaq=validar_campo($_POST["txtNombretaq"]);
        $id_user=$_SESSION["usuario"]["ID_usuario"];

        $query = " SELECT empresas.ID_empresa from empresas WHERE empresas.Usuarios_ID_usuario='$id_user'";
        $resulta = mysqli_query($connection, $query);
        $id_empr="";//tengo que hacer que lo que trae de la consulta lo guarde en esta variable
       while ($fila = mysqli_fetch_array($resulta)) {
            $id_empr= $fila['ID_empresa'];
        }

        
       
    $query = " INSERT INTO taquillas(Nombre_taquilla,Empresas_ID_empresa) VALUES ('$NomTaq','$id_empr')";
            $resultado = mysqli_query($connection, $query);
          
            if(!$resultado){
                die("Query failed");
          }
         
        } 
 }

 //-------------------------------------------------- EDITAR TAQUILLAS ------------------------------------------------------------------

  if(isset($_POST["new_name"])){

    $new_name= $_POST["new_name"];
    $id_taq=$_POST["id"];

    $query2 = " UPDATE `taquillas` SET `Nombre_taquilla` = '$new_name' WHERE `taquillas`.`ID_taquilla` = '$id_taq' ";
            $resultado2 = mysqli_query($connection, $query2);
          
            if(!$resultado2){
                die("Query failed");
          }

 }


//-------------------------------------------------- LISTAR TAQUILLAS ------------------------------------------------------------------

 if(isset($_POST["idsearch"])){

    $search = $_POST['idsearch'];

if (!empty($search)) {
    $query = "SELECT * FROM taquillas WHERE Empresas_ID_empresa=$search";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query error' . mysqli_error($connection));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['ID_taquilla'],
            'titulo' => $row['Nombre_taquilla'],
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

 }

 // ------------------------------------ ELIMINAR TAQUILLA ----------------------------------

 if(isset($_POST["taqui_delete"])){

    $search = $_POST["taqui_delete"];

    
    
    if(BusqTurn($search)){
        $connectio = mysqli_connect(
            'localhost',
            'root',
            '',
            'turnos-ya'
        );
        $query = "DELETE FROM taquillas WHERE taquillas.ID_taquilla = '$search'";
        $result = mysqli_query($connectio, $query);
        if (!$result) {
            die('Query error' . mysqli_error($connectio));
        }   
        $resulta= "true";
        echo $resulta;
        
    }else{
        $resulta= "warm";
        echo $resulta;
    }


 }

 



 
        
}else{
    
}

function BusqTurn($search){
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );
    $query = "SELECT * FROM turnos WHERE Taquillas_ID_taquilla=$search";
    $result = mysqli_query($connectio, $query);
    if (!$result) {
        die('Query error' . mysqli_error($connectio));
    }   
    $filas=mysqli_num_rows($result);
    if($filas == 0){
        return true;
    }else{
        return false;
    }
}

?>