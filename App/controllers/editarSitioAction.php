<?php 
include("../models/funcionSitio.php");
editar_sitio($_POST['id_sit'], $_POST['seccion'], $_POST['name'], 130);
    header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
    exit();
?>