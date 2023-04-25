<?php 

include("../models/funcionAdmin.php");

$nombre = $_POST['name'];
$apellido = $_POST['apellido'];
$id_doc = $_POST['codigo'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

editar_docente($_POST['id_doc'], $_POST['codigo'], $_POST['nombre'], $_POST['apellido'],$_POST['celular'],$_POST['correo']);
header("Location: ../views/notificacion.php?mensaje=correcto");
exit();
?>