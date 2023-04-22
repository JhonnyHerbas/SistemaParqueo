<?php

require_once('../config/conexion.php');

function recuperar_correo($correo) {
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_VERIFICAR_CORREO(?)");
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function cambiar_contrasena($id, $contrasena) {
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_CAMBIAR_CONTRASENA(?,?)");
    mysqli_stmt_bind_param($stmt, "is", $id, $contrasena);
    $success = mysqli_stmt_execute($stmt);

    return $success;
}
?>