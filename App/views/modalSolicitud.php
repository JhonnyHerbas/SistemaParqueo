<?php
$accion=$_GET["accion"];
?>
<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Confirmación";
        include ('templates/head.php');       
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
                    <li><a href=''>Ver solicitudes</a></li>
                </ul>";

    include ('templates/header.php');
    if($accion=='aceptar'){
        $mensaje='La solicitud ha sido aprobada';
    }else{
        $mensaje='la solicitud ha sido rechazada';
    }
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p><?php
                    echo $mensaje;
                    ?></p>
                </div>
                <div class="modal-footer">
                    <a href="visualizarSolicitudes.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php
    include('templates/scripts.php');
    ?>
</body>
</html>