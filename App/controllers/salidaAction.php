<?php 

require_once ('../models/funcionGuardia.php');

$id_act = $_GET['id_act'];

$result = registrar_salida($id_act);

if ($result) {
    header('Location: ../views/registroSalida.php');
} else {
    header('Location: ../views/registroSalida.php');
}

?>