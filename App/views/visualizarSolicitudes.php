<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitudes";
include('head.php');
    
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";
    $lista =    "<ul>
                    <li><a href=''>Inicio</a></li>
                    <li><a href=''>Visualizar</a></li>
                    <li><a href=''>Configurar horario</a></li>
                    <li><a href='./visualizarSolicitudes.php'>Ver solicitudes</a></li>
                </ul>";

    include('header.php');
    include('../models/funcionSolicitud.php')
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <h1 class="h1">
                Solicitudes
        </h1>
        <?php 
            $i= 1;  
            $result = visualizar_solicitud();
            if($result){
                while($row = $result->fetch_array(MYSQLI_BOTH)){
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo "Solicitud ".$i;
                                    $i=$i+1;
                                ?>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <?php 
                                    echo "Titulo: ".$row["TITULO_SOL"].'<br>';
                                    echo "Nombre: ".$row["NOMBRE_DOC"]." ".$row["APELLIDO_DOC"].'<br>';                    
                                    echo "Celular: ".$row["CELULAR_DOC"].'<br>';
                                    echo "Correo: ".$row["CORREO_DOC"].'<br>';
                                    echo "Descripción: ".$row["DESCRIPCION_SOL"].'<br>';
                                    echo "Sitio: #".$row["SITIO_SOL"].'<br>';

                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }    
            }
            ?>    

    <!-- Include de los scripts.php -->
    <?php
    
    include('scripts.php');

    ?>

</body>
</html>