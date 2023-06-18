<?php 

require_once('../config/conexion.php');

function visualizar_sitio() {
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_SITIO_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function insertar_sitio($ID_SEC, $NOMBRE_SIT, $DISPONIBLE_SIT, $PRECIO_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_INSERTAR(?,?,?,?)");
    $stmt->bind_param("isii",$ID_SEC, $NOMBRE_SIT, $DISPONIBLE_SIT, $PRECIO_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function editar_sitio($ID_SIT, $ID_SEC,$NOMBRE_SIT, $PRECIO_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_ACTUALIZAR(?,?,?,?)");
    $stmt->bind_param("iisi",$ID_SIT, $ID_SEC, $NOMBRE_SIT, $PRECIO_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_nombre_sitio($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_VISTA_EDITAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function buscar_sitio($nombre) {
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_SITIO_BUSCAR($nombre)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}

function eliminar_sitio($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_ELIMINAR("'.$ID_SIT.'")';
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function inhabilitar_sitio($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_INHABILITAR("'.$ID_SIT.'")';
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function buscar_sitioSP06($NOMBRE_SIT) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_SITIO_BUSCAR(?)");
    $stmt->bind_param("s",$NOMBRE_SIT);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function liberar_sitio($id_sit)
{
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL	DB_SP_SITIO_LIBERAR($id_sit)");

    if (mysqli_affected_rows($conn) > 0) {
        return $result;
    } else {
        return null;
    }
}
function sitio_compartir($ID_DOC) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_COMPARTIDO("'.$ID_DOC.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_sitio_id($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_VISTA_EDITAR("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_sitio_docente($ID_SIT) {
    $conn = get_connection();
    $query ='CALL DB_SP_SITIO_VISTA_DOCENTE("'.$ID_SIT.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
function visualizar_sitio_compartido_true($id)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_COMPARTIDO_SITIO_TRUE("' . $id . '")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>