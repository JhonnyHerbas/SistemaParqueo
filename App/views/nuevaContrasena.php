<?php

session_start();
if (isset($_SESSION['codigo'])) {
    header('Location: visualizarSitio.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php

$title = "Nueva contraseña";
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
                    Nueva contraseña
                </h2>
            </div>
            <div class="card-body">
                <form id="login" class="row g-3 needs-validation" novalidate action="../controllers/recuperarContrasena.php" method="post">
                    <?php
                    // Obtener el parámetro "nombre" de la URL usando el operador ternario
                    $codigo = $_GET["id"];
                    ?>
                    <!-- Aqui viene toda la interfaz de visualizacion -->
                    
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
                        <label for="validationCustom01" class="form-label">Codigo de seguridad:</label>
                        <input type="input" name="token" class="form-control" id="validationCustom01"
                            pattern="[0-9]{6}" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su token" required>
                        <div id="error-msg1" class="invalid-feedback">
                            Por favor, ingrese un token el token valido que le llego a su correo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
                        <label for="validationCustom02" class="form-label">Nueva contraseña:</label>
                        <input type="password" name="nuevoPass" class="form-control" id="validationCustom02"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div id="error-msg2" class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y un numero.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
                        <label for="validationCustom03" class="form-label">Confirmar contraseña:</label>
                        <input type="password" name="nuevoPassConf" class="form-control" id="validationCustom03"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div id="error-msg3" class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y un numero.
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
    <script>
        const tituloInput = document.getElementById('validationCustom01');
        const errorMsg = document.getElementById('error-msg1');

        tituloInput.addEventListener('input', function () {
            if (tituloInput.checkValidity()) {
                errorMsg.style.display = 'none';
            } else {
                errorMsg.style.display = 'block';
            }
        });

        const tituloInput = document.getElementById('validationCustom02');
        const errorMsg = document.getElementById('error-msg2');

        tituloInput.addEventListener('input', function () {
            if (tituloInput.checkValidity()) {
                errorMsg.style.display = 'none';
            } else {
                errorMsg.style.display = 'block';
            }
        });

        const tituloInput = document.getElementById('validationCustom03');
        const errorMsg = document.getElementById('error-msg3');

        tituloInput.addEventListener('input', function () {
            if (tituloInput.checkValidity()) {
                errorMsg.style.display = 'none';
            } else {
                errorMsg.style.display = 'block';
            }
        });
    </script>
</body>

</html>