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
function insertar_solicitud($ID_DOC,$ID_SIT,$TITULO_SOL,$FECHA_SOL,$DESCRIPCION_SOL,$ESTADO_SOL){
    $conn = get_connection();
    $sitio = obtener_sitio_solicitado($ID_SIT);
    $stmt = $conn->prepare("CALL DB_SP_SOLICITUD_INSERTAR(?,?,?,?,?,?,?)");
    $stmt->bind_param("iissssi", $ID_DOC,$ID_SIT,$sitio,$TITULO_SOL,$FECHA_SOL,$DESCRIPCION_SOL,$ESTADO_SOL);
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

function solicitud($ID_SOL,$ACCION){
    $conn = get_connection();
    if($ACCION=='aceptar'){
        $result = mysqli_query($conn, "CALL DB_SP_SOLICITUD_ACEPTAR($ID_SOL)");
    }else{
        $result = mysqli_query($conn, "CALL DB_SP_SOLICITUD_RECHAZAR($ID_SOL)");
    }
   /* if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }*/

}
?>