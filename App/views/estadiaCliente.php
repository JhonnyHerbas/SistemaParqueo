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
    $fechaActual = date("Y-m-d", strtotime("-1 day"));
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">        
        <div class="solicitud-header">
            <h2 class="h2 h2estadia">
                Estadia de docentes
            </h2>
            <div class="container-busqueda">
            <form method="POST">
                <div class="input-container estadia">
                    <div class="container-input-buscar ">
                        <input type="date" class="input-buscar buscar-estadia" 
                        name="fecha" id="fecha" min="2023-01-01" max="<?= $fechaActual ?>" required>
                    </div>
                    <div class="container-button-buscar">
                        <input type="submit" value="Buscar" class="button-buscar" id="buscar">
                    </div>
                </div>
            </form>
        </div>
        </div>

        <div class="reporte">
            <div class="estadia-cliente" id="data">
                <div id="mensaje-busqueda" class="mensaje">
                    <p>Por favor, realiza una búsqueda de fecha para obtener la información exacta de ingreso de ciertos docentes.</p>
                </div>

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