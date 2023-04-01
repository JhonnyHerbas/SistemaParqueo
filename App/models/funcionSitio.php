<?php 

require_once ('../config/conexion.php');

function visualizar_sitio($cod) {
    $conn = get_connection();
    //$query = 'CALL DB_SP_SITIO_VISTA_ID_SEC("'.$cod.'")';

    $query = "Select * from SITIO where ID_SEC = $cod";

    $result = $conn->query($query);
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

?>