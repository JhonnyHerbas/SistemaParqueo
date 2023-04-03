<?php 
include("../models/funcionSitio.php");
$verificar_nombre = buscar_sitio($POST['name']);
$row_cont = $verificar_nombre->num_rows;
if($row_cont> 0){
    echo "Ya existe un sitio con este nombre";
}else{
   insertar_sitio($_POST['seccion'], $_POST['name'], $_POST['disponible'], $_POST['precio']); 
   echo "Sitio creado correctamente";
}
header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
exit();
?>