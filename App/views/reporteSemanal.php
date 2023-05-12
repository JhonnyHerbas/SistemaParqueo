<!DOCTYPE html>
<html lang="en">

<?php

$title = "Reporte Semanal";
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
            <h2 class="h2">
                Generar reporte semanal
            </h2>
            <select class="form-select" aria-label="Default select example" id="estado">
                <option selected disabled>AÑO</option>
                <?php 
                    $anio_inicio = 2022;
                    $anio_actual = date("Y");                    
                    while($anio_inicio <= $anio_actual){
                        if($anio_actual == $anio_inicio){
                            echo '<option value="'. $anio_inicio .'" selected>'. $anio_inicio .'</option>';
                        } else {
                            echo '<option value="'. $anio_inicio .'">'. $anio_inicio .'</option>';
                        }
                        $anio_inicio = $anio_inicio + 1;                       
                    }                
                ?>
            </select>
        </div>
    </div>

    <div class="reporte">
        <div class="data" id="data">

        </div>
    </div>
        
        <!-- Include de los scripts.php -->
        <?php

        include('templates/scripts.php');

        ?>
    <script src="../../public/js/comboReporteSemanal.js"></script>
</body>

</html>