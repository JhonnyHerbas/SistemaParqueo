<?php 
include("../models/funcionSitio.php");
/*Se debe obtener el id_sit y el id_sec*/
eliminar_sitio($_POST['name']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>