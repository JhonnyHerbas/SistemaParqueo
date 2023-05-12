<?php

session_start();
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
    <header>
        <div class="container-logo">
            <a href="visualizarSitio.php" class="logo">
                <img src="../../public/img/FCYT.png" alt="logo" class="logo">
            </a>
            <h2>Sistema de parqueo FCYT</h2>
        </div>
        <div class="line"></div>
        <nav class="navbar">
            <ul>
                <li>
                    <p>
                        <a class='btn' href='iniciarSesionDocente.php'>
                            Iniciar sesión docente
                        </a>
                    </p>
                </li>
            </ul>
        </nav>

        <div class="redes_sociales">
            <a href="https://www.facebook.com/fcytumssOficial" target="_blank" class="fab fa-facebook-f"></a>
            <a href="http://abcd.fcyt.umss.edu.bo/cgi-bin//wxis/iah/scripts/?IsisScript=iah.xis&lang=es&base=TECLI"
                target="_blank" class="fa-solid fa-book"></a>
        </div>
    </header>
    <main>
        <?php

        $cambio = isset($_GET["cambio"]) ? $_GET["cambio"] : "";
        if (empty($cambio)) {
            $notificacion = "Siga los pasos que se envió a su correo electrónico";
            $href = "iniciarSesionDocente.php";
        } else {
            if ($cambio == "correcto") {
                $notificacion = "! Su contraseña se cambió exitosamente! Por favor inicie sesión de nuevo";
                $href = "iniciarSesionDocente.php";
            } else {
                $notificacion = "! Su contraseña no se cambió! Por favor intente de nuevo";
                $href = "recuperarContrasena.php";
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