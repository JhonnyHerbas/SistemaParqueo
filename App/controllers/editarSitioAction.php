<?php 
include("../models/funcionSitio.php");
editar_sitio($_POST['id_sit'], $_POST['seccion'], $_POST['name'], 130);
    header("Location: ../views/visualizarSitio.php");
    exit();
?>