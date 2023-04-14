<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar solicitud";
include('templates/head.php');
include('../models/funcionSolicitud.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <main>
        <?php

        $title = "Registrar docente";
        $action = "";
        $metodo = "POST";
        include('templates/iniForm.php');
        ?>

        <div class="overflow-registro">
            <div class="columnas">
                <div class="izquierda">
                    <!-- Input del nombre -->
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Nombre:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom01"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un nombre válido.
                        </div>
                    </div>
                </div>
                <div class="derecha">
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Apellido/s:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom02"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un apellido válido.
                        </div>
                    </div>
                </div>
            </div>
            <div class="columnas">
                <div class="izquierda">
                    <!-- Input del nombre -->
                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label">Codigo SIS:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom03"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un codigo válido.
                        </div>
                    </div>
                </div>
                <div class="derecha">
                    <div class="mb-3">
                        <label for="validationCustom04" class="form-label">Celular:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom04"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un numero válido.
                        </div>
                    </div>
                </div>
            </div>
            <div class="columnas">
                <div class="izquierda">
                    <!-- Input del nombre -->
                    <div class="mb-3">
                        <label for="validationCustom05" class="form-label">Correo:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom05"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un correo válido.
                        </div>
                    </div>
                </div>
                <div class="derecha">
                    <div class="mb-3">
                        <label for="validationCustom06" class="form-label">Contraseña:</label>
                        <input type="password" name="titulo-solicitud" class="form-control" id="validationCustom06"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese una contraseña válida.
                        </div>
                    </div>
                </div>
            </div>
            <div class="columnas">
                <div class="izquierda">
                    <!-- Input de verificar contraseña -->
                    <div class="mb-3">
                        <label for="validationCustom07" class="form-label">Verificar contraseña:</label>
                        <input type="password" name="titulo-solicitud" class="form-control" id="validationCustom07"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" placeholder="Ingrese su nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese una contraseña válida.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $success = "Guardar";
        $danger = "Cancelar";
        include('templates/buttonsForms.php');

        include('templates/finForm.php');
        ?>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>