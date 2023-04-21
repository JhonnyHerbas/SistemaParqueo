<?php 
include("../models/funcionSitio.php");
editar_sitio($_POST['id_sit'], $_POST['seccion'], $_POST['name'], $_POST['precio']);
    header("Location: /SistemaParqueo/App/views/modalConf.php");
    exit();
?>
