<?php 
include("../models/funcionSitio.php");
eliminar_sitio($_POST['id_sit']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>