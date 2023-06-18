<?php 

require_once ('../models/funcionGuardia.php');

$id_doc = $_GET['id_doc'];

$result = registrar_ingreso($id_doc);

if ($result) {
    header('Location: ../views/registroIngreso.php');
} else {
    header('Location: ../views/registroIngreso.php');
}

?>