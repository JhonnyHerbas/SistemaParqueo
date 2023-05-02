<?php
require_once('../config/conexion.php');
function visualizar_cliente() {
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_docente_vista';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function eliminar_cliente($ID_DOC) {
    $conn = get_connection();
    $query ='CALL 	DB_SP_DOCENTE_ELIMINAR("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>