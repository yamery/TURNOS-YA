<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

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
