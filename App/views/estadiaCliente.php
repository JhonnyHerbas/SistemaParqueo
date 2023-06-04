<!DOCTYPE html>
<html lang="en">

<?php

$title = "Estadia Clientes";
include('templates/head.php');
include('../models/funcionDocente.php');
include('../models/funcionSitio.php');
include('templates/header.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="container-busqueda">
            <form method="POST">
                <div class="input-container">
                    <div class="container-input-buscar">
                        <input type="text" class="input-buscar" name="fecha" id="fecha" placeholder="AAAA-MM-DD">
                    </div>
                    <div class="container-button-buscar">
                        <input type="submit" value="Buscar" class="button-buscar" id="buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="solicitud-header">
            <h2 class="h2">
                Clientes
            </h2>
        </div>

        <div class="reporte">
            <div class="estadia-cliente" id="data">

            </div>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
    <script src="../../public/js/comboEstadiaCliente.js"></script>
</body>

</html>