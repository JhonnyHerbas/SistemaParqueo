<!DOCTYPE html>
<html lang="en">

<?php

$title = "Ver sitios";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    include('../models/funcionSeccion.php');
    include('../models/funcionSitio.php');
    include('../models/funcionConfiguracionHorario.php');

    $configuraciones = visualizar_horario();
    $configuracion= $configuraciones->fetch_array(MYSQLI_BOTH);
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="horario">
        <span><?= $configuracion['DIA_CON']; ?></span>
        <span>Apertura: <?= $configuracion['HORA_APERTURA_CON']; ?></span>
        <span>Cierre: <?= $configuracion['HORA_CIERRE_CON']; ?></span>
    </div>
    <main>
        <h1> ESTE ES EL INICIO DE GUARDIAS</h1>
    </main>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>

</body>

</html>