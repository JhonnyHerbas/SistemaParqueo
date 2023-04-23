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
    include('../models/funcionSolicitud.php');
    
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
                    $collapse = "flush-collapse".$i;
                    if($row["ESTADO_SOL"]=="ESPERA"){
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php 
                                    echo "Solicitud ".$i;
                                    
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                           
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        <?php 
                                        echo "Titulo: ".$row["TITULO_SOL"].'<br>';
                                        echo "Nombre: ".$row["NOMBRE_DOC"]." ".$row["APELLIDO_DOC"].'<br>';                    
                                        echo "Celular: ".$row["CELULAR_DOC"].'<br>';
                                        echo "Correo: ".$row["CORREO_DOC"].'<br>';
                                        echo "Descripción: ".$row["DESCRIPCION_SOL"].'<br>';
                                        echo "Sitio: #".$row["SITIO_SOL"].'<br>';
                                        $i=$i+1;
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">    
                                        <div class="function verde">
                                            <a href="../controllers/aceptarSolicitudAction.php?nombre=<?php echo $row["NOMBRE_DOC"] ?>&apellido=<?php echo $row["APELLIDO_DOC"] ?>&sitio=<?php echo $row["SITIO_SOL"] ?>&id=<?php echo $row["ID_SOL"]?>&correo=<?php echo $row["CORREO_DOC"] ?>&accion=aceptar" class="fa-solid fa-square-check blanco"
                                                class="fa-solid fa-square-check blanco"></a>
                                                </div>
                                        <div class="function rojo">
                                            <a href="../controllers/aceptarSolicitudAction.php?nombre=<?php echo $row["NOMBRE_DOC"] ?>&apellido=<?php echo $row["APELLIDO_DOC"] ?>&sitio=<?php echo $row["SITIO_SOL"] ?>&id=<?php echo $row["ID_SOL"]?>&correo=<?php echo $row["CORREO_DOC"] ?>&accion=rechazar" target="_self" 
                                            class="fa-solid fa-square-xmark blanco"></a>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <?php
            }}    
            }
            ?>    

    <!-- Include de los scripts.php -->
    <?php
    
    include('templates/scripts.php');
    
    
    ?>
<script>
        function submitForm(action) {
        //Obtener valores de los campos
        
        // Crear objeto FormData y agregar valores
        var formData = new FormData();
        formData.append("action", action);
    
        // Enviar formulario
        var xhr = new XMLHttpRequest();
        xhr.open("POST","/SistemaParqueo/App/controllers/aceptarSolicitudAction.php");
        xhr.send(formData);
      }
</script>
</body>
</html>