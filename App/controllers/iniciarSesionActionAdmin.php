<?php

require_once('../models/funcionAdmin.php');

$user = $_POST["user"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = iniciar_sesion($user);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_ADM'];
    if ($hash == $password) {
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['codigo'] = $fila['ID_ADM'];
        $_SESSION['nombre'] = $fila['NOMBRE_ADM'] . " " . $fila['APELLIDO_ADM'];
        $_SESSION['rol'] = "Administrador";
        header("Location: ../views/visualizarSitio.php");
    } else {
        header("Location: ../views/iniciarSesionAdmin.php?error=contrasena_incorrecta");
    }

} else {
    header("Location: ../views/iniciarSesionAdmin.php?error=usuario_inexistente");
}
?>