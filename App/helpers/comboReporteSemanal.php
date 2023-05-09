<?php
require_once('../config/conexion.php');

function visualizar_reporte($anio){
	$conn = get_connection();
	$query = 'CALL DB_SP_VISTA_REPORTES_SEMANAL("'.$anio.'")';
	$result = $conn->query($query);
	$json = array();
	$mesAnterior=null;
	while($row= $result->fetch_array(MYSQLI_BOTH)){
		$semana =$row['SEMANA'];
		$mes = substr($semana,0,strpos($semana, ' '));
	
		if ($mes !== $mesAnterior) {
			$j = 1; // Reiniciar la variable $j a cero cuando cambia el valor de SEMANA
			$mesAnterior = $mes; // Actualizar el valor anterior de SEMANA
		}
		$json[] = array(
			
			'SEMANA_ANIO' => $row['SEMANA_ANIO'],
			'SEMANA' => ucfirst(strtolower($mes)).' Semana '.$j , 
            'NUM_SEMANA' => $row['NUM_SEMANA']+1,
			'NUM_SEMANA_PDF' => $row['NUM_SEMANA'],
			'ANIO' => $row['ANIO'],
			'TOTAL_FACTURA' => $row['TOTAL_FACTURA'],
			'TOTAL_SITIOS' => $row['TOTAL_SITIOS'],
			'NUEVOS_SITIOS' => $row['NUEVOS_SITIOS'],
           
		);
		$j++;
	}
	$jsonString = json_encode($json);
	echo $jsonString;
}
$anio = $_POST['ANIO'];
visualizar_reporte($anio);
?>