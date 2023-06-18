<?php
include '../models/funcionAdmin.php';

//Cuando haya las secciones se pondra el id del docente
$id_adm = $_POST['id-user'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$result = crear_noticia($id_adm, $titulo, $descripcion);

if ($result) {
    header('Location: ../views/verNoticias.php');
} else {
    header('Location: ../views/verNoticias.php');
}

?>