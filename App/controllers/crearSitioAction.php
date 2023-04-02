<?php 
include("../models/funcionSitio.php");

insertar_sitio($_POST['seccion'], $_POST['name'], $_POST['disponible'], $_POST['precio']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>