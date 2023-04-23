<?php

require_once('../config/conexion.php');

function recuperar_correo($correo, $token)
{
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_VERIFICAR_CORREO(?,?, @id_salida, @correo_salida)");
    mysqli_stmt_bind_param($stmt, "si", $correo, $token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $resultado = mysqli_query($conn, "SELECT @id_salida, @correo_salida");
    $fila = mysqli_fetch_assoc($resultado);

    $id_salida = $fila['@id_salida'];
    $correo_salida = $fila['@correo_salida'];

    if (!empty($id_salida)) {
        return array('id' => $id_salida, 'correo' => $correo_salida);
    } else {
        return null;
    }
}

function cambiar_contrasena($id, $contrasena, $token)
{
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_CAMBIAR_CONTRASENA(?,?,?)");
    mysqli_stmt_bind_param($stmt, "isi", $id, $contrasena, $token);
    mysqli_stmt_execute($stmt);
    $filas = mysqli_stmt_affected_rows($stmt);
    return $filas;
}
?>