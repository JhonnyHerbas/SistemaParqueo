<?php
include('../models/funcionAdmin.php');
$horaApertura = $_POST['hora-apertura'];
$horaAperturaFormateada = date('H:i:s', strtotime($horaApertura));

$horaCierre = $_POST['hora-cierre'];
$horaCierreFormateada = date('H:i:s', strtotime($horaCierre));

actualizar_horario_atencion($_POST['id'], $horaAperturaFormateada, $horaCierreFormateada);
header("Location: ../views/notificacion.php?mensaje=6");
exit();
?>