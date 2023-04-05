<?php 
include("../models/funcionSitio.php");

$result = visualizar_sitio();
$nombre = $_POST['name'];
$existe = false;
if($result){
    while($row = $result->fetch_array(MYSQLI_BOTH)){
        if($row['NOMBRE_SIT'] == $nombre ){ 
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
                    <p>El sitio ya existe. Por favor, ingrese un nombre de sitio diferente.</p>
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
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
        $title = "Crear sitio";
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
    <!-- Aqui vendra toda la interfaz que se necesita para la creacion -->

    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro que desea crear este sitio?</p>
                </div>
                <div class="modal-footer">
                <a href="../views/visualizarSitio.php" rel="noopener noreferrer"><button type="summit" class="btn btn-secondary" data-bs-dismiss="modal">Confirmar</button></a>
                    <a href="../views/crearSeccion.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php
    include('../views/scripts.php');
    insertar_sitio($_POST['seccion'], $_POST['name'], $_POST['disponible'], $_POST['precio']);
    header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
    exit();
    }
    ?>  
</body>
</html>
    
