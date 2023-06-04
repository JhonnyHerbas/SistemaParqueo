<!DOCTYPE html>
<html lang="en">

<?php
ob_start();
$title = "Registrar estadia";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');

    if ($_SESSION['rol'] != "Guardia") {
        header('Location: visualizarSitio.php');
        ob_end_flush();
    }

    include('../models/funcionGuardia.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <h1>Esta es la vista del Guardia</h1>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>