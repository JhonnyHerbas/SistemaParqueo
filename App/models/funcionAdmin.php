<?php

require_once('../config/conexion.php') ;

function iniciar_sesion($user){
    $conn = get_connection();
    $stmt = mysqli_prepare($conn, "CALL DB_SP_ADMINISTRADOR_CONTRASENA(?)");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}
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
    $query = 'SELECT * FROM DB_VIEW_DOCENTE_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_datos_docente($ID_DOC) {
    $conn = get_connection();
    $query ='CALL DB_SP_DOCENTE_VISTA_EDITAR("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function editar_docente_contrasena($ID_DOC, $CONTRASENA_DOC) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_CAMBIO_CONTRASENA(?,?)");
    $stmt->bind_param("is",$ID_DOC, $CONTRASENA_DOC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function editar_docente($ID_DOC, $ID_DOC_NUE,$NOMBRE_DOC, $APELLIDO_DOC, $CELULAR_DOC, $CORREO_DOC) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_ACTUALIZAR(?,?,?,?,?,?)");
    $stmt->bind_param("iissis",$ID_DOC, $ID_DOC_NUE,$NOMBRE_DOC, $APELLIDO_DOC, $CELULAR_DOC, $CORREO_DOC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function ver_contrasena($ID_DOC){
    $conn = get_connection();
    $query ='CALL DB_SP_DOCENTE_CONTRASENA("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function obtener_reporte_mensual_pdf($mes,$anio){
    $conn = get_connection();
    $query ='CALL DB_SP_REPORTE_MENSUAL_PDF("'.$mes.'","'.$anio.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function obtener_reporte_semanal_pdf($semana,$anio){
    $conn = get_connection();
    $query ='CALL DB_SP_REPORTE_SEMANAL_PDF("'.$semana.'","'.$anio.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>