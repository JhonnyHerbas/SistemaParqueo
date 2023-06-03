<?php 
require_once ('../config/conexion.php');

function insertar_consulta($cod,$titulo,$descripcion,$fecha,$tipo){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_RECLAMO_INSERTAR(?,?,?,?,?)");
    $stmt->bind_param("issss", $cod,$titulo,$descripcion,$fecha,$tipo);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function visualizar_consulta(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_CONSULTA_VIEW';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_reclamo($ID){
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_VISTA("'.$ID.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function responder_reclamo($ID){
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_RESPUESTA("'.$ID.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_reclamos(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_RECLAMO_VIEW';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_reclamo_id($ID){
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_VISTA_ID("'.$ID.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function atender_reclamo($ID){
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_ATENDER("'.$ID.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function rechazar_reclamo($ID){
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_RECHAZAR("'.$ID.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>