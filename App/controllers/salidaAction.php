<?php 

require_once ('../models/funcionGuardia.php');

$id_act = $_GET['id_act'];

$result = registrar_salida($id_act);

if ($result) {
    header('Location: ../views/RegistroSalida.php?mensaje=exitoso');
} else {
    header('Location: ../views/RegistroSalida.php?mensaje=fallido');
}

?>