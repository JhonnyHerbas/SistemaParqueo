<?php
require_once('../config/conexion.php');

function visualizar_reporte($fecha){
	$conn = get_connection();
	$query = 'CALL DB_SP_VISTA_ESTADIA("'.$fecha.'")';
	$result = $conn->query($query);
	$json = array();

	while($row = $result->fetch_array(MYSQLI_BOTH)){
		$json[] = array(
			'NOMBRE_DOC' => $row['NOMBRE_DOC'],
			'APELLIDO_DOC' => $row['APELLIDO_DOC'],
			'FECHA_INGRESO_ACT' => $row['FECHA_INGRESO_ACT'],
			'FECHA_SALIDA_ACT' => $row['FECHA_SALIDA_ACT'],
			'TIEMPO_TRANSCURRIDO' => $row['TIEMPO_TRANSCURRIDO']
		);
	}
	
	$jsonString = json_encode($json);
	echo $jsonString;
}

$fecha = $_POST['fecha'];
visualizar_reporte($fecha);
?>