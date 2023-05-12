<?php
include '../models/funcionDocente.php';

realizar_pago($_POST['id-asi'],$_POST['precio'],$_POST['nombreDocente'],$_POST['codigo']);
header("Location: ../views/visualizarPagos.php");
exit();
?>