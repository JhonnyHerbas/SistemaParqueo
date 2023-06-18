<?php

require_once('../models/funcionRecovery.php');

$codigo = $_POST['codigo'];
$pass = $_POST['nuevoPass'];
$confirmacion = $_POST['nuevoPassConf'];
$token = $_POST['token'];
$hash = md5($pass);

if ($pass == $confirmacion) {
    $result = cambiar_contrasena($codigo, $hash, $token);
    if ($result == true) {
        header("Location: ../views/notificacionCorreo.php?cambio=correcto");
    } else {
        header("Location: ../views/notificacionCorreo.php?cambio=incorrecto");
    }
}
?>