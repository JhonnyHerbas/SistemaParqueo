<?php 
require_once('../config/conexion.php');

function visualizar_reclamo($estado)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_RECLAMO_VISTA_ESTADO("'.$estado.'")';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $json[] = array(
            'ID_REC' => $row['ID_REC'],
            'TITULO_REC' => $row['TITULO_REC'],
            'DESCRIPCION_REC' => $row['DESCRIPCION_REC'],
            'FECHA_REC' => $row['FECHA_REC'],
            'ESTADO_REC' => $row['ESTADO_REC'],
            'ID_DOC' => $row['ID_DOC'],
            'NOMBRE_DOC' => $row['NOMBRE_DOC'],
            'APELLIDO_DOC' => $row['APELLIDO_DOC'],
            'CELULAR_DOC' => $row['CELULAR_DOC'],
            'CORREO_DOC' => $row['CORREO_DOC']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
$estado = $_POST['ESTADO'];
visualizar_reclamo($estado);
?>