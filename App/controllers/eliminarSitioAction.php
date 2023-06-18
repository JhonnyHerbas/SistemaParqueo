<?php 
include("../models/funcionSitio.php");
inhabilitar_sitio($_POST['id_sit']);
header("Location: ../views/visualizarSitio.php");
exit();
?>