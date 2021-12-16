<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);



if(isset($_POST['iduser'])){
    $id_user =$_POST['iduser'];
$query="SELECT * FROM empresas where Usuarios_ID_usuario=$id_user";
$result = mysqli_query($connection,$query);

if(!$result){
    die("consulta fallida". mysqli_error($conecction));
}

$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'id'=> $row['ID_empresa'],
        'nombre_empresa'=> $row['Nombre_empresa'],
        'img'=> base64_encode($row['Logo']),
        'tipo_empresa'=>$row['Tipo_empresa'],
        'Direccion'=>$row['Direccion'],
        
        
    );
   

}
$jsonstring=json_encode($json);
echo $jsonstring;
}

if(isset($_POST['id_taqui'])){
    $id_empre =$_POST['id_taqui'];
$query="SELECT * from turnos join taquillas on taquillas.ID_taquilla=turnos.Taquillas_ID_taquilla WHERE taquillas.Empresas_ID_empresa=$id_empre";
$result = mysqli_query($connection,$query);

if(!$result){
    die("consulta fallida". mysqli_error($conecction));
}

$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'ID_turno'=> $row['ID_turnos'],
        'Nombre_turn'=> $row['Nombre_turno'],
        'Descripcion'=> $row['Descripcion'],
        'Hora_ini'=> $row['Hora_ini'],
        'Hora_fin'=> $row['Hora_fin'],
        'Disponibilidad'=> $row['Disponibilidad']
        
        
        
    );

}
$jsonstring=json_encode($json);
echo $jsonstring;
}

if(isset($_POST['id_taqui_list'])){
    $id_empre =$_POST['id_taqui_list'];
$query="SELECT * from turnos WHERE Taquillas_ID_taquilla=$id_empre";
$result = mysqli_query($connection,$query);

if(!$result){
    die("consulta fallida". mysqli_error($conecction));
}

$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'ID_turno'=> $row['ID_turnos'],
        'Nombre_turn'=> $row['Nombre_turno'],
        'Descripcion'=> $row['Descripcion'],
        'Hora_ini'=> $row['Hora_ini'],
        'Hora_fin'=> $row['Hora_fin'],
        'Disponibilidad'=> $row['Disponibilidad']
        
        
        
    );

}
$jsonstring=json_encode($json);
echo $jsonstring;
}

