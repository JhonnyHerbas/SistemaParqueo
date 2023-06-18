<?php
include '../models/funcionAdmin.php';

//Cuando haya las secciones se pondra el id del docente
$id_not = $_POST['id-not'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$result = editar_noticia($id_not, $titulo, $descripcion);

if ($result) {
    header('Location: ../views/verNoticias.php');
} else {
    header('Location: ../views/verNoticias.php');
}

?>