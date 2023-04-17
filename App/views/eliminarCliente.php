<!DOCTYPE html>
    <html lang="en">

    <?php
        $title = "Eliminar cliente";
        include ('templates/head.php');       
    ?>       
    <body>
    <!-- Include del header.php -->
    <?php 
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    
    $id_doc = $_GET['id_doc'];
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar el cliente?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="../controllers/eliminarClienteAction.php? id_do=<?php echo $id_doc?>" rel="noopener noreferrer"><button id="confirmar-btn" type="summit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button></a>
                    <a href="../views/visualizarCliente.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>
            </div>
        </div>
        <div> 
            
        </div>
    </div>
   

    <!-- Include de los scripts.php -->
    <?php
    include('templates/scripts.php');
    ?>
</body>
</html>