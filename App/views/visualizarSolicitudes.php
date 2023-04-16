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
                           
                                <div class="accordion-body">
                                    <?php 
                                    echo "Titulo: ".$row["TITULO_SOL"].'<br>';
                                    echo "Nombre: ".$row["NOMBRE_DOC"]." ".$row["APELLIDO_DOC"].'<br>';                    
                                    echo "Celular: ".$row["CELULAR_DOC"].'<br>';
                                    echo "Correo: ".$row["CORREO_DOC"].'<br>';
                                    echo "Descripción: ".$row["DESCRIPCION_SOL"].'<br>';
                                    echo "Sitio: #".$row["SITIO_SOL"].'<br>';
                                    $i=$i+1;
                                    ?>
                                    
                                    <div class="function azul">
                                        <a href="../controllers/aceptarSolicitudAction.php?nombre=<?php echo $row["NOMBRE_DOC"] ?>&apellido=<?php echo $row["APELLIDO_DOC"] ?>&sitio=<?php echo $row["SITIO_SOL"] ?>&correo=<?php echo $row["CORREO_DOC"] ?>&accion=aceptar" class="fa-solid fa-square-check blanco"
                                            class="fa-solid fa-square-check blanco"></a>
                                            </div>
                                    <div class="function rojo">
                                        <a href="crearSitio.php" target="_self" class="fa-solid fa-square-xmark blanco"></a>
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
        function submitForm(action) {
        //Obtener valores de los campos
        //var titulo = document.getElementById("titulo").value;
        //var nombre = document.getElementById("nombre").value;
        //var apellido = document.getElementById("apellido").value;
        //var celular = document.getElementById("celular").value;
        //var correo = document.getElementById("correo").value;
        //var descripcion = document.getElementById("descripcion").value;
        //var sitio = document.getElementById("sitio").value;
    
        // Crear objeto FormData y agregar valores
        var formData = new FormData();
        /*formData.append("titulo", titulo);
        formData.append("nombre", nombre);
        formData.append("apellido", apellido);
        formData.append("celular", celular);
        formData.append("correo", correo);
        formData.append("descripcion", descripcion);
        <i class="fa-solid fa-square-check" style="color: #23a40a;"></i>
        <i class="fa-solid fa-square-xmark" style="color: #f90101;"></i>
        formData.append("sitio", sitio);*/
        formData.append("action", action);
    
        // Enviar formulario
        var xhr = new XMLHttpRequest();
        xhr.open("POST","/SistemaParqueo/App/controllers/aceptarSolicitudAction.php");
        xhr.send(formData);
      }
</script>
</body>
</html>