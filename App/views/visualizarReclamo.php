<!DOCTYPE html>
<html lang="en">

<?php

$title = "Reclamos";
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
    include('../models/funcionReclamo.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Reclamos
            </h3>
        </div>
        <div class="data">
            <?php 
             $result = visualizar_reclamos();
             $i=1;
             if($result){
                while ($row= $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;                                
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo 'Reclamo '. $i;                                        
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-80">
                                <?php
                                    $docentes = visualizar_docente_id($row['ID_DOC']);
                                    $docente= $docentes->fetch_array(MYSQLI_BOTH);
                                    echo "Titulo: ".$row["TITULO_REC"]. '<br>';
                                    echo "Nombre: ".$docente["NOMBRE_DOC"].' '.$docente["APELLIDO_DOC"]. '<br>';
                                    echo "Celular: ".$docente["CELULAR_DOC"]. '<br>';
                                    echo "Correo: ".$docente["CORREO_DOC"]. '<br>';
                                    echo "Descripción: ".$row["DESCRIPCION_REC"]. '<br>';
                                    echo "Fecha: ".$row["FECHA_REC"]. '<br>';
                                    
                                ?>
                                </div>
                                <div class="acordion-btn w-50">
                                    <div class="function verde">
                                        <a href="../controllers/atenderReclamoAction.php?codigo=<?php echo $row['ID_REC']; ?>" class="fa-solid fa-circle-check blanco"></a>
                                    </div>
                                    <div class="function verde">
                                        <a href="../controllers/rechazarReclamoAction.php?codigo=<?php echo $row['ID_REC']; ?>" class="fa-solid fa-xmark blanco"></a>
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