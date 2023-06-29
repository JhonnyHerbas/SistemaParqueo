<?php
include '../models/funcionDocente.php';

//Cuando haya las secciones se pondra el id del docente
$id_doc = $_POST['id-user'];
$placa = $_POST['placa'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
registrar_vehiculo($id_doc, $placa, $color, $tipo);
header("Location: ../views/verVehiculos.php");
exit();

?>