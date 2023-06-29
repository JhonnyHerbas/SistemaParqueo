<!DOCTYPE html>
<html lang="en">

<?php
$title = $titulo;

include('templates/head.php');
include('templates/header.php')
?>

<body>
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
                    <a href="../views/<?= $link; ?>" rel="noopener noreferrer"><button type="button" class="btn <?= $boton; ?> data-bs-dismiss=" modal">Cerrar</button></a>
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