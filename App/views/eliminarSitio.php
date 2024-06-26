<!DOCTYPE html>
<html lang="en">

<?php

$title = "Eliminar sitio";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $id_sit = $_GET['id_sit'];
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <form action="../controllers/eliminarSitioAction.php" method="post">
    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Está seguro que desea inhabilitar este sitio?</p>
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
    include('templates/scripts.php');
    ?>
</body>

</html>