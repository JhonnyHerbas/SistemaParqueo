<!DOCTYPE html>
<html lang="en">

<?php

if (session_status() != PHP_SESSION_NONE) {
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
}
$title = "Crear sección";
include('templates/head.php');
include('../models/funcionSeccion.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">Crear sección</h2>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/crearSeccionAction.php" method="post">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Nombre de sección:</label>
                        <input type="text" name="nombre-seccion" class="form-control" id="validationCustom01"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom04" class="form-label">Parqueo:</label>
                        <select class="form-select" id="validationCustom04" name="parqueo" required>
                            <option selected disabled value="">Seleccione</option>
                            <option value="Parqueo 1" >Parqueo 1</option>
                            <option value="Parqueo 2">Parqueo 2</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un parqueo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Cantidad de sitios:</label>
                        <input type="number" class="form-control" name="cantidad" id="validationCustom02" min="4" max="20"  required>
                        <div class="invalid-feedback">
                            Ingrese un numero mayor a 4.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Descripción:</label>
                        <textarea class="form-control area" name="descripcion" id="validationTextarea" minlength="20"
                            maxlength="200" cols="3" autocomplete="off" spellcheck="false" required></textarea>
                        <div class="invalid-feedback">
                            Solo se acepta un mínimo de 20 y máximo de 200 caracteres.
                        </div>
                    </div>
                    <div class="col-12 button">
                        <button class="btn btn-success" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de crear esta sección?
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
    </section>




    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>


    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>