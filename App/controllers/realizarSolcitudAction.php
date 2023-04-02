<?php
include '../models/funcionSolicitud.php';

//Cuando haya las secciones se pondra el id del docente
insertar_solicitud(1,$_POST['id-sitio'],$_POST['titulo-solicitud'],date("Y-m-d"),$_POST['descripcion'],0);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>