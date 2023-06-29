<?php 
require_once('../config/conexion.php');
require_once('../models/funcionDocente.php');
function visualizar_compartido($estado)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_COMPARTIDO_VISTA_ESTADO("'.$estado.'")';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $docentes =visualizar_docente_id($row['ID_SUPLENTE_COMP']);
        $docente = $docentes->fetch_array(MYSQLI_BOTH);
        $json[] = array(
            'NOMBRE_DOC' => $row['NOMBRE_DOC'],
            'APELLIDO_DOC' => $row['APELLIDO_DOC'],
            'CORREO_DOC' => $row['CORREO_DOC'],
            'NOMBRE_DOC2' => $docente['NOMBRE_DOC'],
            'APELLIDO_DOC2' => $docente['APELLIDO_DOC'],
            'CORREO_DOC2' => $docente['CORREO_DOC'],
            'NOMBRE_SIT' => $row['NOMBRE_SIT'],
            'ID_COMP' => $row['ID_COMP'],
            'ESTADO_COMP' => $row['ESTADO_COMP']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
$estado = $_POST['ESTADO'];
visualizar_compartido($estado);
?>