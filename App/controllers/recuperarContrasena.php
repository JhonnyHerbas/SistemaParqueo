<?php 

require_once ('../models/funcionRecovery.php');

$codigo = $_POST['codigo'];
$pass = $_POST['nuevoPass'];
$hash = md5($pass);

$result = cambiar_contrasena($codigo, $hash);
if ($result) {
    echo "Contraseña cambiada";
} else {
    echo "Error al cambio de contraseña";
}
?>