<?php 
include("../models/funcionSitio.php");
/*Se debe obtener el id_sit y el id_sec*/

editar_sitio($_POST['id_sit'], $_POST['id_sec'], $_POST['name'], $_POST['precio']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>