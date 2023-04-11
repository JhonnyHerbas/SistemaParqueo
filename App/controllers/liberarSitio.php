<?php 

require_once('../models/funcionSitio.php');

$result = liberar_sitio($_GET['id_sit']);

if ($result) {
    header("Location: ../views/templates/visualizarSitio.php");
}
?>