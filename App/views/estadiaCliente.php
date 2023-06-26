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
        <div class="solicitud-header">
            <h2 class="h2 h2estadia">
                Estadia de docentes
            </h2>
            <div class="container-busqueda">
            <form method="POST">
                <div class="input-container estadia">
                    <div class="container-input-buscar ">
                        <input type="text" class="input-buscar buscar-estadia" name="fecha" id="fecha" placeholder="AAAA-MM-DD" pattern="^\d{4}-\d{2}-\d{2}$" minlength="10" maxlength="10" required>
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
                    <p>Por favor, realice una búsqueda en el buscador utilizando el formato Año-Mes-Día (por ejemplo, 2023-06-26) para obtener información sobre la fecha exacta en la que ciertos docentes ingresaron.</p>
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