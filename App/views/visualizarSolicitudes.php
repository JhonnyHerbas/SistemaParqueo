<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitudes";
include('templates/head.php');
//include('../models/funcionSolicitud.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionSolicitud.php')
        ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h1 class="h1">
                Solicitudes
            </h1>
            <select class="form-select" aria-label="Default select example" id="estado">
                <option selected disabled>ESTADO</option>
                <option value="ACEPTADO">ACEPTADO</option>
                <option value="RECHAZADO">RECHAZADO</option>
                <option value="ESPERA" selected>ESPERA</option>
            </select>
        </div>

        <div class="data" id="data">

        </div>
    </div>

        <!-- Include de los scripts.php -->
        <?php

        include('templates/scripts.php');

        ?>
    <script src="../../public/js/comboEstadoSolicitud.js"></script>
</body>

</html>