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
                        <div class="invalid-feedback text">
                            Ingrese una cédula de identidad válido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Nombre:</label>
                        <input type="text" name="nombre" class="form-control text" id="validationCustom01"
                            pattern="^(?=(.*[a-zA-Z]){3,})[a-zA-Z\s]{3,30}$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required placeholder="Ingrese un nombre">
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Apellidos:</label>
                        <input type="text" name="apellido" class="form-control text" id="validationCustom01"
                            pattern = "^(?=(.*[a-zA-Z]){3,})[a-zA-Z\s]{3,90}$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="90" required placeholder="Ingrese un apellido">
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom07" class="form-label text">Contraseña:</label>
                        <input type="password" name="pass" class="form-control text" id="validationCustom07"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback text">
                            Ingrese una contraseña válida.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom08" class="form-label text">Verificar contraseña:</label>
                        <input type="password" name="verPass" class="form-control text" id="validationCustom08"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback text">
                            Ingrese una contraseña válida.
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
</body>

</html>