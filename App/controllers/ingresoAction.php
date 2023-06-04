<?php 

require_once ('../models/funcionGuardia.php');

$id_doc = $_GET['id_doc'];

$result = registrar_ingreso($id_doc);

if ($result) {
    header('Location: ../views/RegistroIngreso.php?mensaje=exitoso');
} else {
    header('Location: ../views/RegistroIngreso.php?mensaje=fallido');
}

?>