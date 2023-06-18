<?php

require_once('../config/conexion.php');
function iniciar_sesion_guardia($codigo){
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_GUARDIA_CONTRASENA(?)");
    mysqli_stmt_bind_param($stmt, "i", $codigo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function buscar_docente($cadena){
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_BUSCAR_DOCENTE(?)");
    mysqli_stmt_bind_param($stmt, "s", $cadena);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_salida() {
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_ESTADIA_SALIDA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function registrar_ingreso($id_doc) {
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_INGRESO_DOCENTE(?)");
    mysqli_stmt_bind_param($stmt, "i", $id_doc);
    mysqli_stmt_execute($stmt);

    $rows_affected = mysqli_affected_rows($conn);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $rows_affected > 0;
}

function registrar_salida($id_act) {
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_SALIDA_DOCENTE(?)");
    mysqli_stmt_bind_param($stmt, "i", $id_act);
    mysqli_stmt_execute($stmt);

    $rows_affected = mysqli_affected_rows($conn);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $rows_affected > 0;
}

?>