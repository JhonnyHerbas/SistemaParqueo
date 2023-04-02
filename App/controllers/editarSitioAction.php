<?php 
include("../models/funcionSitio.php");

editar_sitio($_POST[''], $_POST[''], $_POST['name'], $_POST['precio']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>