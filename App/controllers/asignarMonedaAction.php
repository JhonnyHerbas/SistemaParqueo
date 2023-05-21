<?php
include('../models/funcionAdmin.php');
asignar_moneda($_POST['codigo'],$_POST['cantidad'],$_POST['id_com']);
header("Location: ../views/visualizarCompraMoneda.php");
exit();
?>