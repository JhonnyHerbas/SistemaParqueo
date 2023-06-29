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
        $notificacion = "Los datos del docente se editaron correctamente";
        $href = "visualizarDocente.php";
        break;
    case 2:
        $notificacion = "La contraseña se cambió correctamente";
        $href = "editarDatosUser.php";
        break;
    case 3:
        $notificacion = "La sección se editó correctamente";
        $href = "visualizarSitio.php";
        break;
    case 4:
        $notificacion = "El horario se editó correctamente";
        $href = "visualizarHorarioTrabajo.php";
        break;
    case 5:
        $notificacion = "La noticia se editó correctamente";
        $href = "verNoticias.php";
        break;
    case 6:
        $notificacion = "El horario se editó correctamente";
        $href = "visualizarHorarioAtencion.php";
        break;
    case 7:
        $notificacion = "La solicitud de compra de parckoins se envió correctamente, por favor espere el correo de confirmación";
        $href = "visualizarSitio.php";
        break;
    case 8:
        $notificacion = "La compra de parckoins se realizó correctamente";
        $href = "visualizarCompraMoneda.php";
        break;
    default:
        $notificacion = "Los datos del guardia se editaron correctamente";
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