<!DOCTYPE html>
<html lang="en">

<?php

$title = "Vehiculos";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    include('../models/funcionDocente.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Vehículos
            </h3>
        </div>
        <div class="data">


            <?php

            $vehiculos = visualizar_vehiculos($_SESSION['codigo']);
            $i = 1;
            if ($vehiculos) {
                while ($fila = mysqli_fetch_array($vehiculos)) {
                    ?>
            <div class="card noticia">
                <div class="card-body card-noticias">
                    <h5 class="card-title title-notice">
                        Vehiculo <?php echo $i; ?>
                    </h5>
                    <div class="body-card">
                        <p class="card-text text-card">
                            Numero de placa: <?php echo $fila['PLACA_VEH']; ?><br>
                            Color: <?php echo $fila['COLOR_VEH']; ?><br>
                            Tipo de Vehiculo: <?php echo $fila['TIPO_VEH']; ?>
                        </p>
                    </div>
                </div>
            </div>
                    <?php
                    $i++;
                }
            }
            ?>

        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>