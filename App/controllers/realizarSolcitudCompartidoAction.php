<?php
include '../models/funcionAdmin.php';

insertar_sitio_compartido($_POST['id_sit'],$_POST['titular'],$_POST['suplente']);
header("Location: ../views/visualizarSitio.php");
exit();
?>