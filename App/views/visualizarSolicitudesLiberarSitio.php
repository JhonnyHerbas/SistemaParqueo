<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitud de desocupacion de sitios";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionAdmin.php');
    include('../models/funcionDocente.php');
    include('../models/funcionSitio.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Solicitudes de desocupación
            </h3>
        </div>

        <div class="data" id="data">

        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
    <script src="../../public/js/desocuparSitio.js"></script>
</body>

</html>