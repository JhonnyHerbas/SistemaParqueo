<!DOCTYPE html>
<html lang="en">

<?php

$title = "Iniciar sesión";
include('templates/head.php');
include('../models/funcionSolicitud.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    ?>
    <main>
        <div class="form-container">
            <div class="header-container">
                <h2 class="title-form">
                    Iniciar sesión
                </h2>
            </div>
            <div class="card-body">
                <form id="login" class="row g-3 needs-validation" novalidate action="../controllers/iniciarSesionActionDocente.php"
                    method="post">

                    <h1>DOCENTE</h1>

                    <!-- Aqui viene toda la interfaz de visualizacion -->
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Código SIS:</label>
                        <input type="text" name="codigo" class="form-control" id="validationCustom01"
                            pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" placeholder="Ingrese su código"
                            required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un código válido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="validationCustom02"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un nombre válido.
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-success" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Iniciar
                            sesión</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center h5">
                        <a href="#">¿Olvidaste tu contraseña?</a>
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