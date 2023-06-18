<!DOCTYPE html>
<html lang="en">

<?php

$title = "Clientes en mora";
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
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Docentes en mora
            </h3>
        </div>
        <div class="data">
            <?php 
             $result = visualizar_docente_asignados();
             $i=1;
             if($result){
                while ($row= $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;

                    $id_docente = $row['ID_DOC'];
                    $result1 = visualizar_pagos($id_docente);
                    $row1= $result1->fetch_array(MYSQLI_BOTH);

                    $fecha =new DateTime($row1['FECHA_INICIO_ASI']);
                    $fecha_actual = new DateTime($row1['FECHA_ACTUAL']);
                    $can = $row1['CANT'];

                    $interval = $fecha->diff($fecha_actual);
                    $meses = $interval->format('%m');
                    
                    $resta = $meses +1 - $can;

                    if ($resta > 0 ){                                     
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <?php 
                                        echo $row['NOMBRE_DOC']. ' ' . $row['APELLIDO_DOC'];                                        
                                    ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                    <?php                                         
                                        echo "Código SIS: ".$row["ID_DOC"]. '<br>';
                                        echo "Celular: ".$row["CELULAR_DOC"]. '<br>';
                                        echo "Correo: ".$row["CORREO_DOC"]. '<br>';
                                        echo "Sitio asignado  : #".$row["NOMBRE_SIT"]. '<br>';
                                        echo "Meses en mora: ". $resta . ' meses'. '<br>';
                                        
                                    ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function verde">
                                        <a href="../controllers/notificarMoraAction.php?codigo=<?php echo $row['ID_DOC']; ?>&correo=<?php echo $row['CORREO_DOC']; ?>&tiempo=<?php echo $resta; ?>" class="fa-solid fa-envelope blanco"></a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>                      
            <?php
            $i=$i+1;
                    }     
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