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
        <div class="form-containerG">
            <div class="header-containerG">
                <h2 class="title-form">
                    Registrar docente
                </h2>
            </div>
            <div class="card-body grande">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/registrarDocenteAction.php" method="post">

                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" id="validationCustom01"
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su nombre" required>
                                <div class="invalid-feedback">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Apellido/s:</label>
                                <input type="text" name="apellido" class="form-control" id="validationCustom02"
                                    pattern="[a-zA-Z\s]{3,90}" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su apellido" required>
                                <div class="invalid-feedback">
                                    Ingrese un apellido válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del codigoSis -->
                            <div class="mb-3">
                                <label for="validationCustom03" class="form-label">Código SIS:</label>
                                <input type="text" name="codigo" class="form-control" id="validationCustom03"
                                    pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su código" required>
                                <div class="invalid-feedback">
                                    Ingrese un código válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom05" class="form-label">Celular:</label>
                                <input type="text" name="celular" class="form-control" id="validationCustom05"
                                    pattern="^[0-9]{8}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su numero" required>
                                <div class="invalid-feedback">
                                    Ingrese un numero válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control" id="validationCustom06"
                                    autocomplete="off" spellcheck="false" maxlength="50" placeholder="Ingrese su correo"
                                    required>
                                <div class="invalid-feedback">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom07" class="form-label">Contraseña:</label>
                                <input type="password" name="pass" class="form-control" id="validationCustom07"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña válida.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input de verificar contraseña -->
                            <div class="mb-3">
                                <label for="validationCustom08" class="form-label">Verificar contraseña:</label>
                                <input type="password" name="verPass" class="form-control" id="validationCustom08"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña válida.
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    $success = "Guardar";
                    $danger = "Cancelar";
                    include ('templates/buttonsForms.php');

                    $mensaje = "¿Está seguro de que desea registrar este docente?";
                    include ('templates/modalForm.php');

                    include ('templates/finForm.php');
                    ?>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>