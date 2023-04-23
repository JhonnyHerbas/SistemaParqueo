<?php
include '../models/funcionSolicitud.php';

insertar_solicitud($_POST['id_doc'],$_POST['id_sit'],$_POST['sitio'],$_POST['titulo-solicitud'],date("Y-m-d"),$_POST['descripcion'],"ESPERA");
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>