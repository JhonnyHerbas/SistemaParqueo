<?php 
include("../models/funcionSitio.php");
/*Se debe obtener el id_sit y el id_sec*/
eliminar_seccion($_POST['id_sec']);
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>