<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitud sitios compartidos";
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
    include('../models/funcionSitio.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Solicitudes de sitio compartido
            </h3>
        </div>
        <div class="data">
            <?php 
             $result = visualizar_sitio_compartido();
             $i=1;
             if($result){
                while ($row= $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;                                
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo 'Solicitud '. $i;                                        
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-80">
                                <?php
                                    $titulares = visualizar_docente_id($row['ID_TITULAR_COMP']);
                                    $titular= $titulares->fetch_array(MYSQLI_BOTH);
                                    $suplentes = visualizar_docente_id($row['ID_SUPLENTE_COMP']);
                                    $suplente= $suplentes->fetch_array(MYSQLI_BOTH);
                                    $sitios = visualizar_sitio_id($row['ID_SIT']);
                                    $sitio = $sitios->fetch_array(MYSQLI_BOTH);
                                    echo "Docente titular: ".$titular["NOMBRE_DOC"].' '.$titular["APELLIDO_DOC"]. '<br>';
                                    echo "Correo del titular: ".$titular["CORREO_DOC"]. '<br>';
                                    echo "Docente a compartir: ".$suplente["NOMBRE_DOC"].' '.$suplente["APELLIDO_DOC"]. '<br>';
                                    echo "Correo del suplente: ".$suplente["CORREO_DOC"]. '<br>';
                                    echo "Sitio: ".$sitio["NOMBRE_SIT"]. '<br>';                                    
                                ?>
                                </div>
                                <div class="acordion-btn w-50">
                                    <div class="function verde">
                                        <a href="../controllers/aceptarSitioCompartido.php?codigo=<?php echo $row['ID_COMP']; ?>" class="fa-solid fa-circle-check blanco"></a>
                                    </div>
                                    <div class="function verde">
                                        <a href="../controllers/rechazarSitioCompartido.php?codigo=<?php echo $row['ID_COMP']; ?>" class="fa-solid fa-xmark blanco"></a>
                                    </div> 
                                </div>                                    
                            </div>
                        </div>
                    </div>                      
            <?php
                $i=$i+1;                        
                }
            } else {
                echo "<h1>No existen solicitudes</h1>";
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