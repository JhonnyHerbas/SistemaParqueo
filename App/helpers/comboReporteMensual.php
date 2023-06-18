<?php 
require_once('../config/conexion.php');

function visualizar_reporte($anio){
    $conn = get_connection();
    $query = 'CALL DB_SP_VISTA_REPORTES_MENSUAL("'.$anio.'")';
    $result = $conn->query($query);
    $json = array();
    while($row= $result->fetch_array(MYSQLI_BOTH)){
        $mes = $row['MES'];
        $json[] = array(
            'MES' => ucfirst(strtolower($mes)),
            'TOTAL_FACTURA' => $row['TOTAL_FACTURA'],
            'TOTAL_SITIOS' => $row['TOTAL_SITIOS'],
            'NUEVOS_SITIOS' => $row['NUEVOS_SITIOS'],
            'MES_ANIO' => $row['MES_ANIO'],
            'NUM_MES' => $row['NUM_MES'],
            'ANIO' => $row['ANIO']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
$anio = $_POST['ANIO'];
visualizar_reporte($anio);
?>


