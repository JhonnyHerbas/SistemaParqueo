<!DOCTYPE html>
    <html lang="en">

    <?php
        $title = "Eliminar sitio";
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
    $id_sit = $_GET['id_sit'];
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <form action="/SistemaParqueo/App/controllers/eliminarSitioAction.php" method="post">
    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar este sitio?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="../controllers/eliminarSitioAction.php?id_sit=<?php echo $id_sit;?>" rel="noopener noreferrer"><button type="summit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button></a>
                    <a href="../views/visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>
            </div>
        </div>
        <div> 
            <input type="hidden" value="<?php echo $id_sit;?>" name="id_sit" style="display: none;">
        </div>
    </div>
    </form>

    <!-- Include de los scripts.php -->
    <?php
    include('../views/scripts.php');
    ?>
</body>
</html>