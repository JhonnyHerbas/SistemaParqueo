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
            <a href="/SistemaParqueo/App/views/visualizarSitio.php" class="logo">
                <img src="/SistemaParqueo/public/img/FCYT.png" alt="logo" class="logo">
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
                <li>
                    <p>
                        <a class='btn' href='iniciarSesionAdmin.php'>
                            Iniciar sesión administrador
                        </a>
                    </p>
                </li>
                <li>
            </ul>
        </nav>

        <div class="redes_sociales">
            <a href="https://www.facebook.com/fcytumssOficial" target="_blank" class="fab fa-facebook-f"></a>
            <a href="http://abcd.fcyt.umss.edu.bo/cgi-bin//wxis/iah/scripts/?IsisScript=iah.xis&lang=es&base=TECLI"
                target="_blank" class="fa-solid fa-book"></a>
        </div>
    </header>
    <main>
        <div class="form-container">
            <div class="header-container">
                <h2 class="title-form">
                    Recuperar contraseña
                </h2>
            </div>
            <div class="card-body">
                <form id="login" class="row g-3 needs-validation" novalidate
                    action="../controllers/recovery.php" method="post">
                    <?php
                    // Obtener el parámetro "nombre" de la URL usando el operador ternario
                    $mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : "";

                    // Verificar si el parámetro "nombre" está presente y no está vacío
                    if (isset($_GET['error']) && $_GET['error'] == 'correo_inexistente') {
                        echo "<p>Correo inexistente. Intente de nuevo.</p>";
                    }
                    ?>
                    <!-- Aqui viene toda la interfaz de visualizacion -->
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="validationCustom01"
                            autocomplete="off" spellcheck="false" placeholder="Ingrese su correo electronico" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un código válido.
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-success" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Restablecer</button>
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