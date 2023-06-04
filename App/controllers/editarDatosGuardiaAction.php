<?php 
include("../models/funcionAdmin.php");
editar_guardia($_POST['id_guardia'],$_POST['nombre'],$_POST['apellido']);
    header("Location: ../views/visualizarGuardia.php");
    exit();
?>