<?php
require_once ('../config/conexion.php');
function registrar_horario($id,$fecha,$horA,$horaC,$dia)
{
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_CONFIGURACION_INSERTAR(?,?,?,?,?)");
    $stmt->bind_param("issss",$id,$fecha,$horA,$horaC,$dia);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function visualizar_horario(){
    $conn = get_connection();
    $query = 'SELECT * FROM DB_VIEW_CONFIGURACION_VISTA';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

?>