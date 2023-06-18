<?php

require_once('../models/funcionDocente.php');

$codigo = $_POST["codigo"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = iniciar_sesion_docente($codigo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_DOC'];
    if ($hash == $password) {
        session_start();
        $_SESSION['codigo'] = $codigo;
        $_SESSION['nombre'] = $fila['NOMBRE_DOC'] . " " . $fila['APELLIDO_DOC'];
        $_SESSION['celular'] = $fila['CELULAR_DOC'];
        $_SESSION['correo'] = $fila['CORREO_DOC'];
        $_SESSION['rol'] = "Docente";
        header("Location: ../views/visualizarSitio.php");
    } else {
        header("Location: ../views/iniciarSesionDocente.php?error=contrasena_incorrecta");
    }

} else {
    header("Location: ../views/iniciarSesionDocente.php?error=usuario_inexistente");
}
?>