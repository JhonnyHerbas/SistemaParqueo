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
?>