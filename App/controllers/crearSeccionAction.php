<?php
include '../models/funcionSeccion.php';

$result = visualizar_seccion();
$nombre = $_POST['nombre-seccion'];
$existe = false;
if($result){
    while($row = $result->fetch_array(MYSQLI_BOTH)){
        if($row['NOMBRE_SEC'] == $nombre ){ 
            $existe = true;
        }
    }
}
if($existe){
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
        $title = "Error";
        include '../views/head.php';       
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
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>La sección ya existe. Por favor, ingrese un nombre de sección diferente.</p>
                </div>
                <div class="modal-footer">
                    <a href="../views/crearSeccion.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></a>
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
}else{
    //Cuando haya las secciones se pondra el id del administrador
    insertar_seccion(1,$_POST['nombre-seccion'],$_POST['descripcion']);
    header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
    exit();
}
?>