<?php
include '../models/funcionReclamo.php';

insertar_consulta($_POST['codigo'],$_POST['titulo-reclamo'],$_POST['descripcion'],date('ymd'),'RECLAMO');
header("Location: ../views/visualizarSitio.php");
exit();
?>