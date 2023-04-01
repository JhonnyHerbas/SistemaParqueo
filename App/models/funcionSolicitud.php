<?php
include '../config/conexion.php';

function visualizar_solicitud(){
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_solicitud_vista';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>