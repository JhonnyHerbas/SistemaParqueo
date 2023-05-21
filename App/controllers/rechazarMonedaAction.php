<?php
include('../models/funcionAdmin.php');
rechazar_moneda($_GET['id']);
header("Location: ../views/visualizarCompraMoneda.php");
exit();
?>