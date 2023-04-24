<?php
include '../config/conexion.php';

function visualizar_solicitud(){
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_solicitud_vista';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_sitios(){
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_sitio_disponible';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function insertar_solicitud($ID_DOC,$ID_SIT,$NOMBRE_SIT,$TITULO_SOL,$FECHA_SOL,$DESCRIPCION_SOL,$ESTADO_SOL){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SOLICITUD_INSERTAR(?,?,?,?,?,?,?)");
    $stmt->bind_param("iisssss", $ID_DOC,$ID_SIT,$NOMBRE_SIT,$TITULO_SOL,$FECHA_SOL,$DESCRIPCION_SOL,$ESTADO_SOL);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }


}
function obtener_sitio_solicitado($ID_DOC){
    $conn = get_connection();
    $query = 'CALl DB_SP_SITIO_VISTA_EDITAR("'.$ID_DOC.'")';
    $result = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_BOTH);
    $sitio_solicitado = $row['NOMBRE_SIT'];
    return $sitio_solicitado;
}

?>