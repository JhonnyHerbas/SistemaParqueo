<?php
/*$titulo = $_POST['titulo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];
$sitio = $_POST['sitio'];*/
$action=$_POST['action'];

if($action=='aceptar'){
    header("Location: /SistemaParqueo/App/views/modalConf.php");
}else{
    header("Location: /SistemaParqueo/App/views/modalCancel.php");
}

?>