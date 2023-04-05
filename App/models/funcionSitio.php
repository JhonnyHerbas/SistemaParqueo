<?php 

require_once('../config/conexion.php');

function visualizar_sitio(){
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

function editar_sitio($ID_SIT, $ID_SEC,$NOMBRE_SIT, $PRECIO_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_ACTUALIZAR(?,?,?,?)");
    $stmt->bind_param("iisi",$ID_SIT, $ID_SEC, $NOMBRE_SIT, $PRECIO_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_nombre_sitio($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_VISTA_EDITAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function eliminar_sitio($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_ELIMINAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function buscar_sitio($NOMBRE_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_BUSCAR(?)");
    $stmt->bind_param("s",$NOMBRE_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}


?>