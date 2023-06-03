<!DOCTYPE html>
<html lang="en">

<?php
$title = "Horarios de trabajo";
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
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Horarios de trabajo
            </h3>
        </div>
        <div class="data">
            <?php 
             $result = visualizar_horario();
             $i=1;
             if($result){
                while ($row= $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;                                
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo 'Horario '. $i;                                        
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-100">
                                    <?php
                                        $guardias = visualizar_guardia_id($row['ID_GUA']);
                                        echo "Horario: ".$row["TURNO_HOR"]. '<br>';
                                        if($guardias){
                                            $guardia= $guardias->fetch_array(MYSQLI_BOTH);
                                            if($guardia["NOMBRE_GUA"] == null){
                                                echo "Guardia: Sin guardia asignado". '<br>';
                                            }else{
                                                echo "Guardia: ".$guardia["NOMBRE_GUA"].' '.$guardia["APELLIDO_GUA"]. '<br>';
                                            }                                          
                                        }
                                        echo "Hora ingreso: ".$row["INGRESO_HOR"]. '<br>';
                                        echo "Hora salida: ".$row["SALIDA_HOR"]. '<br>';
                                        echo "Sueldo mensual: ".$row["SUELDO_HOR"]. '<br>';                                    
                                    ?>
                                </div>
                                <div class="acordion-btn w-50">
                                    <?php if($guardia["NOMBRE_GUA"] == null){ ?>
                                        <div class="function verde">
                                            <a href="#" class="fa-solid fa-id-card-clip blanco"></a>
                                        </div>
                                    <?php } ?>                                    
                                    <div class="function azul">
                                        <a href="#" class="fa-solid fa-xmark blanco"></a>
                                    </div> 
                                </div>                                    
                            </div>
                        </div>
                    </div>                      
            <?php
                $i=$i+1;                        
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