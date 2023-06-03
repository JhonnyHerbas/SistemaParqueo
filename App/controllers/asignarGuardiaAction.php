<?php
include('../models/funcionAdmin.php');
asignar_guardia_horario($_POST['id_horario'],$_POST['id_guardia']);
header("Location: ../views/visualizarHorarioTrabajo.php");
exit();
?>