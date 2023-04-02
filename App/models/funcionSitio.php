<?php 

require_once ('../config/conexion.php');

function visualizar_sitio($cod) {
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_SITIO_VISTA_ID_SEC($cod)");

    if (mysqli_num_rows($result) > 0) {
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

?>