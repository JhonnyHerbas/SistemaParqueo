<?php
include '../config/conexion.php';
function insertar_seccion($ID_ADM,$NOMBRE_SEC,$DESCRIPCION_SEC){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SECCION_INSERTAR(?,?,?)");
    $stmt->bind_param("iss", $ID_ADM,$NOMBRE_SEC,$DESCRIPCION_SEC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function visualizar_seccion(){
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_seccion_vista';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_seccion_editar($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SECCION_VISTA_EDITAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function actualizar_seccion($ID_ADM,$ID_SEC,$NOMBRE_SEC,$DESCRIPCION_SEC){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SECCION_ACTUALIZAR(?,?,?,?)");
    $stmt->bind_param("iiss",$ID_ADM,$ID_SEC,$NOMBRE_SEC,$DESCRIPCION_SEC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
} 
function eliminar_seccion($ID_SEC) {
    $conn = get_connection();
    $query ='CALL DB_SP_SECCION_ELIMINAR("'.$ID_SEC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>