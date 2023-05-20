<?php
include '../models/funcionReclamo.php';

insertar_consulta($_POST['codigo'],$_POST['titulo-consulta'],$_POST['descripcion'],date('ymd'),'CONSULTA');
header("Location: ../views/visualizarSitio.php");
exit();
?>