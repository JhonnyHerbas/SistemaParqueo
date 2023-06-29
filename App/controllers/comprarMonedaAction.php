<?php 

include '../models/funcionDocente.php';

$ruta = "img/";
$nombre_original = $_FILES['img']['name'];
$nombre_final = mb_ereg_replace(" ", "", $nombre_original);
$upload = $ruta . $nombre_final;

// Verificar si el archivo ya existe en la ruta
if (file_exists($upload)) {
    // Obtener la extensión del archivo
    $extension = pathinfo($nombre_final, PATHINFO_EXTENSION);

    // Generar un sufijo único usando la función uniqid()
    $sufijo = uniqid();

    // Construir un nuevo nombre de archivo con el sufijo único
    $nombre_final = str_replace("." . $extension, "_" . $sufijo . "." . $extension, $nombre_final);
    $upload = $ruta . $nombre_final;
}

if (move_uploaded_file($_FILES['img']['tmp_name'], $upload)) {
    $cod = $_POST['codigo'];
    $cant = $_POST['cantidad'];
    comprar_moneda($cod, $nombre_final, $_FILES['img']['type'], $cant);
}

header("Location: ../views/notificacion.php?mensaje=7");
exit();
?>