<!DOCTYPE html>
<html lang="en">

<?php

$title = "Buscar sitio";
include('head.php');
    
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

    include('header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    
    <!-- Include de los scripts.php -->
    <?php
    
    include('scripts.php');

    ?>

</body>
</html>