<!DOCTYPE html>
<html lang="en">

<?php

$title = "Ver pagos";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionDocente.php');
    include('../models/funcionSitio.php');
        ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Pagos pendientes
            </h3>
        </div>
        <div class="data">
        <?php 
            $cod = $_SESSION['codigo'];
            $result = visualizar_pagos($cod);
            
            if($result){
                $row = $result->fetch_array(MYSQLI_BOTH);
                if (empty($row['FECHA_INICIO_ASI'])) {
                    echo '  <div class="mb-3">
                                <h2 class="accordion-header">
                                    <p class="accordion-button">
                                    No tiene pagos pendientes
                                    </p>
                                </h2>
                            </div>';
                }else{
                    $fecha =new DateTime($row['FECHA_INICIO_ASI']);
                    $fecha_actual = new DateTime($row['FECHA_ACTUAL']);
                    $can = $row['CANT'];

                    $interval = $fecha->diff($fecha_actual);
                    $meses = $interval->format('%m');
                    $i=1;
                    
                    $resta = $meses +1 - $can;

                    $fecha->add(new DateInterval('P' . $can . 'M'));                    
                    $fecha_siguiente = $fecha;

                    while ( $i <= $resta){
                        $collapse = "flush-collapse".$i;
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <?php 
                                        echo "Factura de ".$fecha_siguiente->format('Y-m-d');                                        
                                    ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                    <?php 
                                        $result1 = visualizar_docente_id($cod);
                                        $row1 = $result1->fetch_array(MYSQLI_BOTH);
                                        $result2 = visualizar_nombre_sitio($row['ID_SIT']);
                                        $row2 = $result2->fetch_array(MYSQLI_BOTH);
                                        echo "Nombre: ".$row1["NOMBRE_DOC"]. $row1["APELLIDO_DOC"].'<br>';
                                        echo "Correo: ".$row1["CORREO_DOC"].'<br>';
                                        echo "Billetera virual: ".$row1["PARK_COIN_DOC"]. " PARKC". '<br>';
                                        echo "Sitio: #".$row2["NOMBRE_SIT"]. '<br>';
                                        echo "Monto a cancelar: #".$row2["PRECIO_SIT"]. ' PARKC'. '<br>';
                                        
                                    ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function verde">
                                            <a href="<?php echo 'realizarPago.php?id_sol=' . $row['ID_SOL'].'&fecha='.$fecha_siguiente->format('Y-m-d') ;?>" target="_self" class="fa-solid fa-money-check-dollar blanco"></a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        
                    <?php
                    $fecha_siguiente = $fecha->modify('+1 month');
                    $i=$i+1;
                    }
                }
            }

        ?>
        </div>
        
        <!-- Include de los scripts.php -->
        <?php

        include('templates/scripts.php');

        ?>
</body>

</html>