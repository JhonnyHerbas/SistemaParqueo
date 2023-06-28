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
                        <label for="validationCustom02" class="form-label">Codigo de seguridad:</label>
                        <input type="input" name="token" class="form-control" id="validationCustom02"
                            pattern="[0-9]{6}" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su token" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un token valido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
                        <label for="validationCustom02" class="form-label">Nueva contraseña:</label>
                        <input type="password" name="nuevoPass" class="form-control" id="validationCustom02"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y un numero.
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
                        <label for="validationCustom02" class="form-label">Confirmar contraseña:</label>
                        <input type="password" name="nuevoPassConf" class="form-control" id="validationCustom02"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">
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
</body>

</html>