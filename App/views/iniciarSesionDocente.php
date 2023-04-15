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
        <?php

        $title = "Iniciar sesión";
        $action = "";
        $metodo = "POST";
        include('templates/iniForm.php');
        ?>

        <h1>DOCENTE</h1>

        <!-- Aqui viene toda la interfaz de visualizacion -->
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Código SIS:</label>
            <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom01" pattern="^[0-9]{9}$"
                autocomplete="off" spellcheck="false" placeholder="Ingrese su código" required>
            <div class="invalid-feedback">
                Por favor, ingrese un código válido.
            </div>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Contraseña</label>
            <input type="password" name="titulo-solicitud" class="form-control" id="validationCustom02"
                pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false" placeholder="Ingrese su contraseña"
                required>
            <div class="invalid-feedback">
                Por favor, ingrese un nombre válido.
            </div>
        </div>
        <div class="button-container">
            <button class="btn btn-success" id="submitButton" data-toggle="modal" data-target="#exampleModal">Iniciar
                sesión</button>
        </div>
        <div class="d-flex align-items-center justify-content-center h5">
            <a href="#">¿Olvidaste tu contraseña?</a>
        </div>

        <?php

        include('templates/finForm.php');
        ?>

    </main>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>