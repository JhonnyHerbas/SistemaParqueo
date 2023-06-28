<!DOCTYPE html>
<html lang="en">

<?php

$title = "Registrar guardia";
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
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Registrar guardia</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/registrarGuardiaAction.php" method="post">
                    <input type="hidden" value="<?php echo $_SESSION['codigo']; ?>" name="id_amd"
                    style="display: none;">

                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label text">Cédula de identidad:</label>
                        <input type="text" name="codigo" class="form-control text" id="validationCustom03"
                        autocomplete="off" spellcheck="false" pattern="[0-9]{5,10}" placeholder="Ingrese su cedula" required>
                        <div id="error-msg3" class="invalid-feedback text">
                            Ingrese solo el numero sin complemento de la CI.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Nombre:</label>
                        <input type="text" name="nombre" class="form-control text" id="validationCustom01"
                            pattern="^(?=(.*[a-zA-Z]){3,})[a-zA-ZáéíóúÁÉÍÓÚüÜñ\s]{3,30}$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required placeholder="Ingrese un nombre">
                        <div id="error-msg1" class="invalid-feedback text">
                            Por favor, ingrese el nombre solo con letras.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Apellidos:</label>
                        <input type="text" name="apellido" class="form-control text" id="validationCustom02"
                            pattern = "^(?=(.*[a-zA-Z]){3,})[a-zA-ZáéíóúÁÉÍÓÚüÜñ\s]{3,90}$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="90" required placeholder="Ingrese un apellido">
                        <div id="error-msg2" class="invalid-feedback text">
                            Por favor, ingrese los apellidos solo con letras.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom08" class="form-label text">Contraseña:</label>
                        <input type="password" name="pass" class="form-control text" id="validationCustom08"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required oninput="checkPasswordMatch(this)">
                        <div id="error-msg8" class="invalid-feedback text">
                            Ingrese una contraseña válida.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom07" class="form-label text">Verificar contraseña:</label>
                        <input type="password" name="verPass" class="form-control text" id="validationCustom07"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div id="error-msg7" class="invalid-feedback text">
                            Ingrese una contraseña válida.
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
                                        ¿Está seguro de registrar?
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
    </section>

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

        const tituloInput4 = document.getElementById('validationCustom08');
        const errorMsg4 = document.getElementById('error-msg8');

        tituloInput4.addEventListener('input', function () {
            if (tituloInput4.checkValidity()) {
                errorMsg4.style.display = 'none';
            } else {
                errorMsg4.style.display = 'block';
            }
        });

        const tituloInput5 = document.getElementById('validationCustom07');
        const errorMsg5 = document.getElementById('error-msg7');

        tituloInput5.addEventListener('input', function () {
            if (tituloInput5.checkValidity()) {
                errorMsg5.style.display = 'none';
            } else {
                errorMsg5.style.display = 'block';
            }
        });
    </script>
</body>

</html>