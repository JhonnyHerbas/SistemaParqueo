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
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su nombre" required>
                                <div class="invalid-feedback text">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label text">Apellido/s:</label>
                                <input type="text" name="apellido" class="form-control text" id="validationCustom02"
                                    pattern="[a-zA-Z\s]{3,90}" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su apellido" required>
                                <div class="invalid-feedback text">
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
                                <div class="invalid-feedback text">
                                    Ingrese un código válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom05" class="form-label text">Celular:</label>
                                <input type="text" name="celular" class="form-control text" id="validationCustom05"
                                    pattern="^[0-9]{8}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su numero" required>
                                <div class="invalid-feedback text">
                                    Ingrese un numero válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label text">Correo:</label>
                                <input type="email" name="correo" class="form-control text" id="validationCustom06"
                                    autocomplete="off" spellcheck="false" maxlength="50" placeholder="Ingrese su correo"
                                    required>
                                <div class="invalid-feedback text">
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
                                <div class="invalid-feedback text">
                                    Ingrese una contraseña válida.
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
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback text">
                                    Ingrese una contraseña válida.
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            id="cancelButton">Cancelar</button>
                                        <button type="submit" class="btn btn-primary"
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
</body>

</html>