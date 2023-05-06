<?php
require_once('../config/conexion.php');

function visualizar_reporte($anio){
	$conn = get_connection();
	$query = 'CALL DB_SP_VISTA_REPORTES_SEMANAL("'.$anio.'")';
	$result = $conn->query($query);
	$json = array();
	while($row= $result->fetch_array(MYSQLI_BOTH)){
		$semana =$row['SEMANA'];
		$mes = substr($semana,0,strpos($semana, ' '));
		$json[] = array(
			'SEMANA_ANIO' => $row['SEMANA_ANIO'],
			'SEMANA' => ucfirst(strtolower($mes)), 
            'NUM_SEMANA' => $row['NUM_SEMANA']+1,
			'NUM_SEMANA_PDF' => $row['NUM_SEMANA'],
			'ANIO' => $row['ANIO'],
			'TOTAL_FACTURA' => $row['TOTAL_FACTURA'],
			'TOTAL_SITIOS' => $row['TOTAL_SITIOS'],
			'NUEVOS_SITIOS' => $row['NUEVOS_SITIOS'],
            'MES' => $row['MES'],
		);
	}
	$jsonString = json_encode($json);
	echo $jsonString;
}
$anio = $_POST['ANIO'];
visualizar_reporte($anio);
?>