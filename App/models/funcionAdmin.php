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

function visualizar_compra_moneda(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_COMPRA_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_asignacion_moneda($ID_COM){
    $conn = get_connection();
    $query ='CALL DB_SP_COMPRA_VISTA("'.$ID_COM.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function asignar_moneda($ID_DOC,$CANT,$ID_COM){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_COMPRA_ASIGNAR_MONEDA(?,?,?)");
    $stmt->bind_param("iii",$ID_DOC,$CANT,$ID_COM);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function rechazar_moneda($ID_COM){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_COMPRA_RECHAZAR_MONEDA(?)");
    $stmt->bind_param("i",$ID_COM);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function insertar_guardia($ci,$cod, $nombre, $apellido, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_GUARDIA_INSERTAR(?,?,?,?,?)");
    $stmt->bind_param("iisss",$ci,$cod,$nombre, $apellido, $pass);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_guardia(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_GUARDIA_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_guardia_activo(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_GUARDIA_ACTIVO_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_guardia_id($id){
    $conn = get_connection();
    $query ='CALL DB_SP_GUARDIA_VISTA_ID("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function habilitar_guardia($id){
    $conn = get_connection();
    $query ='CALL DB_SP_GUARDIA_HABLITAR("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function deshabilitar_guardia($id){
    $conn = get_connection();
    $query ='CALL DB_SP_GUARDIA_DESHABLITAR("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_horario(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_HORARIO_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function asignar_guardia_horario($id_horario,$id_guardia){
    $conn = get_connection();
    $query ='CALL DB_SP_HORARIO_GUARDIA_ASIGNAR("'.$id_horario.'","'.$id_guardia.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function insertar_horario($ingreso,$salida, $turno, $sueldo) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_HORARIO_INSERTAR(?,?,?,?)");
    $stmt->bind_param("sssi",$ingreso,$salida,$turno, $sueldo);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_horario_id($id){
    $conn = get_connection();
    $query ='CALL DB_SP_HORARIO_VISTA_ID("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function editar_horario($id,$ingreso, $salida, $turno, $sueldo) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_HORARIO_UPDATE(?,?,?,?,?)");
    $stmt->bind_param("isssi",$id,$ingreso,$salida,$turno,$sueldo);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function eliminar_horario($id){
    $conn = get_connection();
    $query ='CALL DB_SP_HORARIO_ELIMINAR("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function editar_guardia($id,$nombre, $apellido) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_GUARDIA_UPDATE(?,?,?)");
    $stmt->bind_param("iss",$id,$nombre,$apellido);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function insertar_sitio_compartido($id,$titular, $suplente) {
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_COMPARTIDO_INSERT(?,?,?)");
    $stmt->bind_param("iii",$id,$titular,$suplente);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function visualizar_sitio_compartido(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_COMPARTIDO_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function crear_noticia($id, $titulo, $descripcion){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_NOTICIA_CREAR(?,?,?)");
    $stmt->bind_param("iss",$id, $titulo, $descripcion);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function editar_noticia($id, $titulo, $descripcion){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_NOTICIA_EDITAR(?,?,?)");
    $stmt->bind_param("iss",$id, $titulo, $descripcion);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function eliminar_noticia($id){
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_NOTICIA_ELIMINAR(?)");
    $stmt->bind_param("i",$id);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function ver_noticia($id){
    $conn = get_connection();
    $query ='CALL DB_SP_NOTICIA_VER("'.$id.'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

function visualizar_noticias(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_NOTICIAS_VISTA';

    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}
?>