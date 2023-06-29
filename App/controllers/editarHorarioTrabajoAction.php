<?php 
include("../models/funcionAdmin.php");
editar_horario($_POST['id_horario'],$_POST['hora-apertura'],$_POST['hora-cierre'],$_POST['turno'],$_POST['sueldo']);
    header("Location: ../views/notificacion.php?mensaje=4");
    exit();
?>