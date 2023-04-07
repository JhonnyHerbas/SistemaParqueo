<?php

require_once('../config/conexion.php');

function visualizar_sitio()
{
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_sitio_vista';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function buscar_sitio($nombre) {
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_SITIO_BUSCAR($nombre)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function liberar_sitio($id_sit)
{
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL	DB_SP_SITIO_LIBERAR($id_sit)");

    if (mysqli_affected_rows($conn) > 0) {
        return $result;
    } else {
        return null;
    }
}

?>