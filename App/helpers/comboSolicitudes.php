<?php 
require_once('../config/conexion.php');

function visualizar_solicitud($estado)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_SOLICITUD_VISTA_ESTADO("'.$estado.'")';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $json[] = array(
            'ID_SOL' => $row['ID_SOL'],
            'ID_DOC' => $row['ID_DOC'],
            'ID_SIT' => $row['ID_SIT'],
            'SITIO_SOL' => $row['SITIO_SOL'],
            'TITULO_SOL' => $row['TITULO_SOL'],
            'FECHA_SOL' => $row['FECHA_SOL'],
            'DESCRIPCION_SOL' => $row['DESCRIPCION_SOL'],
            'ESTADO_SOL' => $row['ESTADO_SOL'],
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
visualizar_solicitud($estado);
?>