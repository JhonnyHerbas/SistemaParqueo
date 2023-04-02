<?php 

require_once('../config/conexion.php') ;

function visualizar_sitio() {
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_sitio_vista';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function insertar_sitio($ID_SEC,$NOMBRE_SIT, $DISPONIBLE_SIT, $PRECIO_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_INSERTAR(?,?,?,?)");
    $stmt->bind_param("isii",$ID_SEC, $NOMBRE_SIT, $DISPONIBLE_SIT, $PRECIO_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}


?>