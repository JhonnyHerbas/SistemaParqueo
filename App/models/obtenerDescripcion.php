<?php 

require_once ('../config/conexion.php');

function obtener_seccion($id_sec)
{
    $conn = get_connection();
    $query = 'CALL DB_SP_SITIO_BUSCAR($id_sec)';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $json[] = array(
            'DESCRIPCION_SEC' => $row['DESCRIPCION_SEC'],
            'ID_SEC' => $row['ID_SEC']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

$id_sec = $_POST['seccion'];
obtener_seccion($id_sec);
?>