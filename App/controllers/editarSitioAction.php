<?php 
include("../models/funcionSitio.php");

$result = visualizar_sitio();
$nombre = $_POST['name'];
$id_sit = $_POST['id_sit'];
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
                    <a href="../views/editarSitio.php?id_sit=<?php echo $id_sit;?>" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
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
    editar_sitio($_POST['id_sit'], $_POST['id_sec'], $_POST['name'], $_POST['precio']);
    header("Location: /SistemaParqueo/App/views/visualizarSitio.php");
    exit();
}
?>