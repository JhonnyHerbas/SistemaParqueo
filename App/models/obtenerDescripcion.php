<?php

require_once('../config/conexion.php');

$conn = get_connection();
$id_sec = $_POST['seccion'];
$result = mysqli_query($conn, "CALL DB_SP_SECCION_VISTA_EDITAR($id_sec)");
try {
    $row = mysqli_fetch_assoc($result);
} catch (Exception $e) {

}

echo "<p>" . $row['PARQUEO_SEC'] . "<br>" . $row['DESCRIPCION_SEC'] . "</p>";
?>