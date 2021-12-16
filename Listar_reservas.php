<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

$search = $_POST['user_id'];

if (!empty($search)) {
    $query = "SELECT ID_reserva,Nombre_turno,Hora_ini,Hora_fin,Nombre_empresa,Descripcion,Telefono,empresas.ID_empresa,empresas.Direccion from turnos join reservaciones on reservaciones.Turnos_ID_turnos=turnos.ID_turnos join taquillas on
     turnos.Taquillas_ID_taquilla=taquillas.ID_taquilla join empresas on taquillas.Empresas_ID_empresa=empresas.ID_empresa join usuarios on reservaciones.Usuarios_ID_usuario=usuarios.ID_usuario where usuarios.ID_usuario='$search'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query error' . mysqli_error($connection));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'ID_reserva' => $row['ID_reserva'],
            'Nombre_turno' => $row['Nombre_turno'],
            'Hora_ini' => $row['Hora_ini'],
            'Hora_fin' => $row['Hora_fin'],
            'Descripcion' => $row['Descripcion'],
            'Nombre_empresa'=>  $row['Nombre_empresa'],
            'ID_empresa'=>  $row['ID_empresa'],
            'Direccion'=>  $row['Direccion'],
            'Telefono'=> empresa($row['ID_empresa'])
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

function empresa($id_user){
    
    $connectio = mysqli_connect(
        'localhost',
        'root',
        '',
        'turnos-ya'
    );

    $query="select usuarios.telefono from usuarios join empresas on usuarios.ID_usuario=empresas.Usuarios_ID_usuario where empresas.ID_empresa='$id_user'";
    $result = mysqli_query($connectio,$query);
    
    if(!$result){
        die("consulta fallida". mysqli_error($connectio));
    }
    
    
    while($row=mysqli_fetch_array($result)){
        
                $tel=$row['telefono'];
      
        return $tel;
    
    }
   
    
}