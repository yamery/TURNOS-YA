<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

$query="SELECT * FROM empresas";
$result = mysqli_query($connection,$query);

if(!$result){
    die("consulta fallida". mysqli_error($conecction));
}

$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'id'=> $row['ID_empresa'],
        'nombre_empresa'=> $row['Nombre_empresa'],
        'img'=> base64_encode($row['Logo'])
        
        
    );

}
$jsonstring=json_encode($json);
echo $jsonstring;
