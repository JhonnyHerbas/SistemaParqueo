<?php

require_once('../models/funcionGuardia.php');

$id_doc = $_POST['id-user'];
$id_vehiculo = $_POST['id-vehiculo'];

registrar_ingreso($id_doc, $id_vehiculo);
header('Location: ../views/registroIngreso.php');

?>