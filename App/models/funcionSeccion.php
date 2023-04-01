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


?>