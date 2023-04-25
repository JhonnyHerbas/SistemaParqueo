<?php

if (isset($_SESSION['codigo'])) {
    header('Location: visualizarSitio.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php

$title = "Iniciar sesión";
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
        if (!empty($mensaje)) {
            if ($mensaje == "correcto") {
                $notificacion = "Se edito correctamente.";
                $href = "visualizarDocente.php";
            }

        }
        include('templates/notificacion.php');
        ?>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>