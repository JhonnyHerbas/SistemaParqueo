<?php

require_once('../models/funcionGuardia.php');

$ci = $_POST['codigo'];
$pass = $_POST['pass'];
$hash = md5($pass);

$result = iniciar_sesion_guardia($ci);
// echo $result;
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_GUA'];
    if ($password == $hash) {
        session_start();
        $_SESSION['codigo'] = $fila['ID_GUA'];
        $_SESSION['nombre'] = $fila['NOMBRE_GUA'] . " " . $fila['APELLIDO_GUA'];
        $_SESSION['rol'] = "Guardia";
        header("Location: ../views/verNoticias.php");
    } else {
        header("Location: ../views/iniciarSesionGuardia.php?error=contrasena_incorrecta");
    }
} else {
    header("Location: ../views/iniciarSesionGuardia.php?error=usuario_inexistente");
}

?>