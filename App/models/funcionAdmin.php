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

function visualizar_docente(){
    $conn = get_connection();
    $query = 'SELECT * FROM db_view_docente_vista';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>