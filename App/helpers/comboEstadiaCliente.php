<?php
require_once('../config/conexion.php');

function visualizar_reporte($fecha){
	$conn = get_connection();
	$query = 'CALL DB_SP_VISTA_ESTADIA("'.$fecha.'")';
	$result = $conn->query($query);
	$json = array();

	while($row = $result->fetch_array(MYSQLI_BOTH)){
		$fechaIngreso = substr($row['FECHA_INGRESO_ACT'], 11, 8); // Extraer solo la hora y los minutos
		$fechaSalida = substr($row['FECHA_SALIDA_ACT'], 11, 8);
		$json[] = array(
			'NOMBRE_DOC' => $row['NOMBRE_DOC'],
			'APELLIDO_DOC' => $row['APELLIDO_DOC'],
			'FECHA_INGRESO_ACT' => $fechaIngreso, // Usar la hora y los minutos extraídos
			'FECHA_SALIDA_ACT' => $fechaSalida,
			'TIEMPO_TRANSCURRIDO' => $row['TIEMPO_TRANSCURRIDO']
		);
	}
	
	$jsonString = json_encode($json);
	echo $jsonString;
}

$fecha = $_POST['fecha'];
visualizar_reporte($fecha);
?>