<?php
include '../models/funcionAdmin.php';

//Cuando haya las secciones se pondra el id del docente
$id_not = $_GET['id_not'];

$result = eliminar_noticia($id_not);

if ($result) {
    header('Location: ../views/verNoticias.php');
} else {
    header('Location: ../views/verNoticias.php');
}

?>