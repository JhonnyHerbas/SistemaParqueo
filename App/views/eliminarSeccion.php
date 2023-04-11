<!DOCTYPE html>
    <html lang="en">

    <?php
        $title = "Eliminar sección";
        include ('templates/head.php');       
    ?>       
    <body>
    <!-- Include del header.php -->
    <?php 
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    
    $id_sec = $_GET['id_sec'];
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <form action="/SistemaParqueo/App/controllers/eliminarSeccionAction.php" method="post">
    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar esta sección?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="../controllers/eliminarSitioAction.php?id_sec=<?php echo $id_sec;?>" rel="noopener noreferrer"><button type="summit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button></a>
                    <a href="../views/visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>
            </div>
        </div>
        <div> 
            <input type="hidden" value="<?php echo $id_sec;?>" name="id_sec" style="display: none;">
        </div>
    </div>
    </form>

    <!-- Include de los scripts.php -->
    <?php
    include('templates/scripts.php');
    ?>
</body>
</html>