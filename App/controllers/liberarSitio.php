<?php 

require_once('../config/conexion.php');

$id_sit = $_GET['id_sit'];

$conn = get_connection();
$result = mysqli_query($conn, "UPDATE SITIO SET DISPONIBLE_SIT = 0 WHERE ID_SIT = $id_sit");
//No funciona con el procedimiento almacenado que esta en la base de datos.

if (mysqli_affected_rows($conn) > 0){
    header("Location: ../views/visualizarSitio.php");
    exit();
} else {
    echo "No se modifico el sitio";
}
?>