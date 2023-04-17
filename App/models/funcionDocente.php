<?php 

require_once ('../config/conexion.php');
function iniciar_sesion($codigo){
    $conn = get_connection();
    $result = mysqli_query($conn, "CALL DB_SP_DOCENTE_CONTRASENA($codigo)");

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return null;
    }
}
?>