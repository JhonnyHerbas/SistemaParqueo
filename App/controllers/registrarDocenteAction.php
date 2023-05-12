<?php
include '../models/funcionAdmin.php';

//Cuando haya las secciones se pondra el id del docente
$contrasenia = $_POST['pass'];
$verContrasenia = $_POST['verPass'];
if ($contrasenia == $verContrasenia) {
    $hash = md5($contrasenia);
    insertar_docente($_POST['codigo'], $_POST['nombre'], $_POST['apellido'], $_POST['celular'], $_POST['correo'], $hash);
    header("Location: ../views/visualizarDocente.php");
    exit();
}
?>