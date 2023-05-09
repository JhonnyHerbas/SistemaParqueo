<?php 

require_once('../config/conexion.php') ;

function insertar_seccion($ID_ADM,$NOMBRE_SEC,$DESCRIPCION_SEC,$PARQUEO,$CANTIDAD,$PRECIO){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SECCION_INSERTAR(?,?,?,?,?,?)");
    $stmt->bind_param("issssi", $ID_ADM,$NOMBRE_SEC,$DESCRIPCION_SEC,$PARQUEO,$CANTIDAD,$PRECIO);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_seccion() {
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_SECCION_VISTA';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_seccion_editar($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SECCION_VISTA_EDITAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function actualizar_seccion($ID_ADM,$ID_SEC,$NOMBRE_SEC,$DESCRIPCION_SEC){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SECCION_ACTUALIZAR(?,?,?,?)");
    $stmt->bind_param("iiss",$ID_ADM,$ID_SEC,$NOMBRE_SEC,$DESCRIPCION_SEC);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
} 

function obtener_seccion ($id_sec) {
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_SITIO_BUSCAR($id_sec)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}
?>