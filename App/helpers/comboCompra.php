<?php 
require_once('../config/conexion.php');
function visualizar_compra($estado)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_COMPRA_VISTA_ESTADO("'.$estado.'")';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $json[] = array(
            'ID_COM' => $row['ID_COM'],
            'RUTA_COM' => $row['RUTA_COM'],
            'MONTO_COM' => $row['MONTO_COM'],
            'ESTADO_COM' => $row['ESTADO_COM'],
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
visualizar_compra($estado);
?>