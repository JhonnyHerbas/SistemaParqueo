<?php 
include("../models/funcionCliente.php");
 $v=$_GET['id_do'];
echo $v;
eliminar_cliente($v);
header("Location: /SistemaParqueo/App/views/visualizarCliente.php");
exit();
?>