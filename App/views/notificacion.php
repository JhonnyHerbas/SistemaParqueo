<?php

if (isset($_SESSION['codigo'])) {
    header('Location: visualizarSitio.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php

$title = "Mensaje de confirmación";
include('templates/head.php');
include('../models/funcionSolicitud.php');
?>

<body>
    <div id="menu-bars" class="fas fa-bars"></div>
    <?php 
    
    include('templates/header.php');
    ?>
    <main>
    <?php
    $mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : "";
    switch ($mensaje) {
    case 1:
        $notificacion = "Se edito los datos del docente correctamente";
        $href = "visualizarDocente.php";
        break;
    case 2:
        $notificacion = "La contraseña se edito correctamente";
        $href = "editarDatosUser.php";
        break;
    case 3:
        $notificacion = "La sección se edito correctamente";
        $href = "visualizarSitio.php";
        break;
    case 4:
        $notificacion = "El sitio se edito correctamente";
        $href = "visualizarSitio.php";
        break;
    case 5:
        $notificacion = "La noticia se edito correctamente";
        $href = "verNoticias.php";
        break;
    default:
        $notificacion = "Se edito los datos del guardia correctamente";
        $href = "visualizarGuardia.php";
        break;
    }

    ?>
    <div class="container-modal">
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                         <?php echo $notificacion; ?>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo $href; ?>" class="btn btn-success btn-lg">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>