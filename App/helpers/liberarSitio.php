<?php
require_once('../config/conexion.php');

function visualizar_compartido()
{
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_SITIO_LIBERAR';
    $result = $conn->query($query);
    $json = array();
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        $json[] = array(
            'DISPONIBLE_SIT' => $row['DISPONIBLE_SIT'],
            'NOMBRE_SIT' => $row['NOMBRE_SIT'],
            'LIBERAR_SIT' => $row['LIBERAR_SIT'],
            'ID_SIT' => $row['ID_SIT'],
            'ID_DOC' => $row['ID_DOC'],
            'NOMBRE_DOC' => $row['NOMBRE_DOC'],
            'APELLIDO_DOC' => $row['APELLIDO_DOC'],
            'CELULAR_DOC' => $row['CELULAR_DOC'],
            'CORREO_DOC' => $row['CORREO_DOC']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
visualizar_compartido();
