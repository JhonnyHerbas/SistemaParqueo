<?php 

require_once ('../models/funcionRecovery.php');

$codigo = $_POST['codigo'];
$pass = $_POST['nuevoPass'];
$token = $_POST['token'];
$hash = md5($pass);

$result = cambiar_contrasena($codigo, $hash, $token);
if ($result) {
    echo "Contraseña cambiada";
} else {
    echo "Error al cambio de contraseña";
}
?>