<?php 

require_once('../config/conexion.php') ;

function visualizar_seccion() {
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_seccion_vista';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function obtener_seccion ($id_sec) {
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_SITIO_BUSCAR($id_sec)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

?>