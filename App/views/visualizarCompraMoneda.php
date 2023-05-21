<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitudes";
include('templates/head.php');
//include('../models/funcionSolicitud.php');

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
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                COMPRAS DE MONEDAS
            </h3>
        </div>
        <div class="data">
            <?php 
             $result =visualizar_compra_moneda();
             $i=1;
             if($result){
                while ($row= $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;                                
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo 'Compra moneda '. $i;                                        
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-80">
                                <?php
                                    $docentes = visualizar_docente_id($row['ID_DOC']);
                                    $docente= $docentes->fetch_array(MYSQLI_BOTH);
                                    echo "Codigo SIS: ".$row["ID_DOC"]. '<br>';
                                    echo "Nombre: ".$docente["NOMBRE_DOC"].' '.$docente["APELLIDO_DOC"]. '<br>';
                                    echo "Celular: ".$docente["CELULAR_DOC"]. '<br>';
                                    echo "Correo: ".$docente["CORREO_DOC"]. '<br>';
                                    echo "Monto: ".$row["MONTO_COM"]. '<br>';
                                    echo '<button type="button" class="btn btn-secondary text" data-bs-toggle="modal" data-bs-target="#exampleModal'.$i.'">Ver comprobante</button>';
                                    ?>

                                    <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $i; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-comprobante">
                                                <img src="../controllers/img/<?php echo $row["RUTA_COM"]; ?>" alt="Comprobante" class="comprobante">
                                            </div>
                                        </div>
                                    </div>                                                               
                            </div>
                            <div class="acordion-btn w-50">    
                                <div class="function verde">
                                    <a href="<?php echo 'asignarMoneda.php?id=' . $row['ID_COM'] ?>" class="fa-solid fa-square-check blanco"></a>
                                </div>
                                <div class="function rojo">
                                    <a href="../controllers/rechazarMonedaAction.php?id=<?php echo $row['ID_COM']; ?>" class="fa-solid fa-square-xmark blanco"></a>
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
    <script src="../../public/js/comboEstadoSolicitud.js"></script>
</body>

</html>