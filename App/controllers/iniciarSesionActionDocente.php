<?php

require_once('../models/funcionDocente.php');

$codigo = $_POST["codigo"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = iniciar_sesion($codigo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_DOC'];
    if ($hash == $password) {
        session_start();
        $_SESSION['codigo'] = $codigo;
        $_SESSION['nombre'] = $fila['NOMBRE_DOC'] . " " . $fila['APELLIDO_DOC'];
        header("Location: ../views/visualizarSitio.php");
    } else {
        echo "Algo salio mal";
    }

} else {
    echo "No existe el docente";
}
?>