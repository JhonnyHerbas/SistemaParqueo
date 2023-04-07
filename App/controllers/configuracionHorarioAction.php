<?php
include('../models/funcionConfiguracionHorario.php');
registrar_horario(1,date("y-m-d"),$_POST['hora-apertura'],$_POST['hora-cierre'],$_POST['dia']);
header("Location: /SistemaParqueo/App/views/configuracionHorario.php");
exit();
?>