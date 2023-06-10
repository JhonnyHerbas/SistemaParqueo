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
            <h2 >Sistema de parqueo FCYT</h2>
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
                <li>
                    <p>
                        <a class='btn' href='iniciarSesionGuardia.php'>
                            Iniciar sesión guardia
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
        <div class="container-login">
            <div class="header-container-login">
                <h3 class="title-form">
                    Iniciar sesión
                </h3>
            </div>
            <div class="card-body">
                <form id="login" class="row g-3 needs-validation" novalidate
                    action="../controllers/iniciarSesionActionAdmin.php" method="post">

                    <h4 class="font-weight-bold">ADMINISTRADOR</h4>
                    <?php
                    // Obtener el parámetro "nombre" de la URL usando el operador ternario
                    $mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : "";

                    // Verificar si el parámetro "nombre" está presente y no está vacío
                    if (isset($_GET['error']) && $_GET['error'] == 'contrasena_incorrecta') {
                        echo "<p>Contraseña incorrecta. Intente de nuevo.</p>";
                    } else {
                        if (isset($_GET['error']) && $_GET['error'] == 'usuario_inexistente') {
                            echo "<p>Usuario incorrecto. Intente de nuevo.</p>";
                        }
                    }
                    ?>
                    <!-- Aqui viene toda la interfaz de visualizacion -->
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label login-label">Nombre de usuario:</label>
                        <input type="text" name="user" class="form-control text" id="validationCustom01" pattern=".{4,30}$"
                            autocomplete="off" spellcheck="false" placeholder="Ingrese su código" required>
                        <div class="invalid-feedback text">
                            Por favor, ingrese un código válido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label login-label">Contraseña</label>
                        <input type="password" name="pass" class="form-control text" id="validationCustom02"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback text">
                            Por favor, ingrese una contraseña válida.
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Iniciar
                            sesión</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center h5">
                        <a class="text" href="recuperarContrasena.php">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>