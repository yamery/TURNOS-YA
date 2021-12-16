<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'turnos-ya'
);

$search = $_POST['idsearch'];

if (!empty($search)) {
    $query = "SELECT * FROM turnos WHERE Taquillas_ID_taquilla=$search";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query error' . mysqli_error($connection));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['ID_turnos'],
            'titulo' => $row['Nombre_turno'],
            'taquilla_id' => $row['Taquillas_ID_taquilla'],
            'descripcion' => $row['Descripcion'],
            'hora_ini'=>  $row['Hora_ini'],
            'hora_fin'=>  $row['Hora_fin'],
            'dispo'=>$row['Disponibilidad']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}


