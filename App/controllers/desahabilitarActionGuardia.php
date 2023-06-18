<?php 
include("../models/funcionAdmin.php");
deshabilitar_guardia($_GET['id_guardia']);
header("Location: ../views/visualizarGuardia.php");
exit();
?>