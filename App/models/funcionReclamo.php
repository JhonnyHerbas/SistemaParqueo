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
?>