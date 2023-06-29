<?php
include '../models/funcionDocente.php';

solicitar_liberar_sitio($_GET['id_sit']);
$mensaje = "Se ha enviado exitosamente su solicitud de desocupación del sitio.";
$titulo = "Solicitud enviado con exito";
$boton = "btn-success";
$link = "./visualizarSitio.php";
include('../views/modalAceptacion.php');
?>