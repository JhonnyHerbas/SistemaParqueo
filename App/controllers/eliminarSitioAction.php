<?php 
include("../models/funcionSitio.php");
/*Se debe obtener el id_sit y el id_sec*/
editar_sitio($_POST['name'], $_POST['name'], $_POST['name'], $_POST['precio']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>