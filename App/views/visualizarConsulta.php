<!DOCTYPE html>
<html lang="en">

<?php

$title = "Consultas";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Consultas
            </h3>
            <select class="form-select text" aria-label="Default select example" id="estado">
                <option selected disabled>ESTADO</option>
                <option value="SOLUCIONADO">SOLUCIONADO</option>
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
    <script src="../../public/js/comboEstadoConsulta.js"></script>
</body>

</html>