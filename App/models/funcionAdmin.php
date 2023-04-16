<?php

require_once('../config/conexion.php') ;

function insertar_docente ($codigo, $nombre, $apellido, $celular, $correo, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_INSERTAR(?,?,?,?,?,?)");
    $stmt->bind_param("ississ",$codigo, $nombre, $apellido, $celular, $correo, $pass);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
?>