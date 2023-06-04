<?php 
include("../models/funcionAdmin.php");
eliminar_horario($_GET['id_horario']);
header("Location: ../views/visualizarHorarioTrabajo.php");
exit();
?>