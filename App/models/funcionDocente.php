<?php 

require_once ('../config/conexion.php');
function iniciar_sesion_docente($codigo){
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_DOCENTE_CONTRASENA($codigo)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_pagos($ID_DOC){
    $conn = get_connection();
    $query = 'CALL DB_SP_DOCENTE_PAGO_VISTA("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_docente_id($ID_DOC){
    $conn = get_connection();
    $query = 'CALL DB_SP_DOCENTE_VISTA_ID("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_pago_solicitado($ID_SOl){
    $conn = get_connection();
    $query = 'CALL DB_SP_PAGO_VISTA("'.$ID_SOl.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function realizar_pago($ID_ASI,$MONTO,$DOCENTE,$ID_DOC){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_PAGAR(?,?,?,?)");
    $stmt->bind_param("iisi", $ID_ASI,$MONTO,$DOCENTE,$ID_DOC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

?>