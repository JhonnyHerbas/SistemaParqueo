<!DOCTYPE html>
<html lang="en">

<?php

$title = "Registrar docente";
include('templates/head.php');
include('../models/funcionSolicitud.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <main>
        <div class="form-containerG">
            <div class="header-containerG">
                <h3 class="font-weight-bold h3">
                    Registrar docente
                </h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/registrarDocenteAction.php" method="post">

                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label text">Nombre:</label>
                                <input type="text" name="nombre" class="form-control text" id="validationCustom01"
                                    pattern="^(?=(.*[a-zA-Z]){3,})[a-zA-ZáéíóúÁÉÍÓÚüÜñ\s]{3,30}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su nombre" required>
                                <div id="error-msg1" class="invalid-feedback text">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label text">Apellido/s:</label>
                                <input type="text" name="apellido" class="form-control text" id="validationCustom02"
                                    pattern="^(?=(.*[a-zA-Z]){3,})[a-zA-ZáéíóúÁÉÍÓÚüÜñ\s]{3,90}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su apellido" required>
                                <div id="error-msg2" class="invalid-feedback text">
                                    Ingrese un apellido válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del codigoSis -->
                            <div class="mb-3">
                                <label for="validationCustom03" class="form-label text">Código SIS:</label>
                                <input type="text" name="codigo" class="form-control text" id="validationCustom03"
                                    pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su código" required>
                                <div id="error-msg3" class="invalid-feedback text">
                                    Ingrese un código válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom04" class="form-label text">Celular:</label>
                                <input type="text" name="celular" class="form-control text" id="validationCustom04"
                                    pattern="^[67][0-9]{7}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su numero" required>
                                <div id="error-msg4" class="invalid-feedback text">
                                    Ingrese un número de celular válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom05" class="form-label text">Correo:</label>
                                <input type="email" name="correo" class="form-control text" id="validationCustom05"
                                    autocomplete="off" spellcheck="false" maxlength="50" placeholder="Ingrese su correo"
                                    required>
                                <div id="error-msg5" class="invalid-feedback text">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom07" class="form-label text">Contraseña:</label>
                                <input type="password" name="pass" class="form-control text" id="validationCustom07"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div id="error-msg7" class="invalid-feedback text">
                                    Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y un numero.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input de verificar contraseña -->
                            <div class="mb-3">
                                <label for="validationCustom08" class="form-label text">Verificar contraseña:</label>
                                <input type="password" name="verPass" class="form-control text" id="validationCustom08"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required oninput="checkPasswordMatch(this)">
                                <div id="error-msg8" class="invalid-feedback text">
                                    Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y un numero.
                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="password-match-msg"></p>
                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <button class="btn btn-danger text" type="reset">Cancelar</button>
                    </div>
                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de realizar este registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                            id="cancelButton">Cancelar</button>
                                        <button type="submit" class="btn btn-success"
                                            id="confirmButton">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="../../public/js/validacion.js"></script>
    <script src="../../public/js/validarPassword.js"></script>
    <script>
        const tituloInput1 = document.getElementById('validationCustom01');
        const errorMsg1 = document.getElementById('error-msg1');

        tituloInput1.addEventListener('input', function () {
            if (tituloInput1.checkValidity()) {
                errorMsg1.style.display = 'none';
            } else {
                errorMsg1.style.display = 'block';
            }
        });

        const tituloInput2 = document.getElementById('validationCustom02');
        const errorMsg2 = document.getElementById('error-msg2');

        tituloInput2.addEventListener('input', function () {
            if (tituloInput2.checkValidity()) {
                errorMsg2.style.display = 'none';
            } else {
                errorMsg2.style.display = 'block';
            }
        });

        const tituloInput3 = document.getElementById('validationCustom03');
        const errorMsg3 = document.getElementById('error-msg3');

        tituloInput3.addEventListener('input', function () {
            if (tituloInput3.checkValidity()) {
                errorMsg3.style.display = 'none';
            } else {
                errorMsg3.style.display = 'block';
            }
        });

        const tituloInput4 = document.getElementById('validationCustom04');
        const errorMsg4 = document.getElementById('error-msg4');

        tituloInput4.addEventListener('input', function () {
            if (tituloInput4.checkValidity()) {
                errorMsg4.style.display = 'none';
            } else {
                errorMsg4.style.display = 'block';
            }
        });

        const tituloInput5 = document.getElementById('validationCustom05');
        const errorMsg5 = document.getElementById('error-msg5');

        tituloInput5.addEventListener('input', function () {
            if (tituloInput5.checkValidity()) {
                errorMsg5.style.display = 'none';
            } else {
                errorMsg5.style.display = 'block';
            }
        });

        const tituloInput6 = document.getElementById('validationCustom08');
        const errorMsg6 = document.getElementById('error-msg8');

        tituloInput6.addEventListener('input', function () {
            if (tituloInput6.checkValidity()) {
                errorMsg6.style.display = 'none';
            } else {
                errorMsg6.style.display = 'block';
            }
        });

        const tituloInput7 = document.getElementById('validationCustom07');
        const errorMsg7 = document.getElementById('error-msg7');

        tituloInput7.addEventListener('input', function () {
            if (tituloInput7.checkValidity()) {
                errorMsg7.style.display = 'none';
            } else {
                errorMsg7.style.display = 'block';
            }
        });
    </script>
</body>

</html>