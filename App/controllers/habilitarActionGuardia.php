<?php 
include("../models/funcionAdmin.php");
habilitar_guardia($_GET['id_guardia']);
header("Location: ../views/visualizarGuardia.php");
exit();
?>
