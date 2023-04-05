<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Eliminar sitio";
    include '../views/head.php';      
    include('head.php');
    include('../models/funcionSeccion.php') ;
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

    include('../views/header.php');
    $id_sec = 9;
    //$id_sec = $_GET['id_sec'];
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <div class="modal eliminar" tabindex="-1" action="/SistemaParqueo/App/controllers/eliminarSeccionAction.php" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro de eliminar?</p>
                </div>
                <div class="modal-footer">
                    <a href="visualizarSitio.php" rel="noopener noreferrer"><button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Confirmar</button></a>
                    <a href="visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php
    include('../views/scripts.php');
    ?>
</body>
</html>
    
    <?php
?>