<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitudes";
include('templates/head.php');
    
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    include('../models/funcionCliente.php');
   // include('../models/funcionSolicitud.php');
    
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <h1 class="h1">
                Clientes
        </h1>
        <?php 
            $i= 1;  
            $result = visualizar_cliente();
            if($result){
                while($row = $result->fetch_array(MYSQLI_BOTH)){
                    $collapse = "flush-collapse".$i;
                    $modal_id = "exampleModal".$i;
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo $row["NOMBRE_DOC"];
                                    
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                           
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        <?php 
                                        
                                        echo "Nombre: ".$row["NOMBRE_DOC"]." ".$row["APELLIDO_DOC"].'<br>';                    
                                        echo "Celular: ".$row["CELULAR_DOC"].'<br>';
                                        echo "Correo: ".$row["CORREO_DOC"].'<br>';
                                        
                                        $i=$i+1;
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">    
                                    <div class="function azul">
                                                <a href="editarCliente.php? id_doc=<?php echo $row['ID_DOC'] ?>"
                                                    class="fa-solid fa-pencil blanco"></a>
                                            </div>
                                            <div class="function rojo">
                                            <a href=""data-toggle="modal" data-target="#<?php echo $modal_id ?>" class="fa-solid fa-trash blanco"></a>
                                            </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                   <!-- Modal -->
                <div class="container-modal">
                <div class="modal fade" id="<?php echo $modal_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de que desea guardar este horario?
                            </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-success" id="confirmButton">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"id="cancelButton" >Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                }    
            }
            ?>    

    <!-- Include de los scripts.php -->
    <?php
    
    include('templates/scripts.php');
    
    
    ?>
<script>
        
      
</script>
</body>
</html>