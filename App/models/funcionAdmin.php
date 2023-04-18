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

function visualizar_datos_docente($ID_DOC) {
    $conn = get_connection();
    $query ='CALL DB_SP_DOCENTE_VISTA_EDITAR("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
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

function editar_docente_contrasena($ID_DOC, $CONTRASENA_DOC) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_CAMBIO_CONTRASENA(?,?)");
    $stmt->bind_param("ii",$ID_DOC, $CONTRASENA_DOC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
?>