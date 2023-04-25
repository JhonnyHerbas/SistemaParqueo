<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar solicitud";
include('templates/head.php');
include('../models/funcionSolicitud.php');
include('../models/funcionSeccion.php');
include('../models/funcionSitio.php');
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <?php 
    $result = visualizar_seccion_editar($_GET['id_sec']);
    $seccion = $result->fetch_array(MYSQLI_BOTH);
    $result1 = visualizar_nombre_sitio($_GET['id_sit']);
    $sitio = $result1->fetch_array(MYSQLI_BOTH);
    $cod = $_SESSION['codigo']
    ?>
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">Solicitar sitio</h2>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/realizarSolcitudAction.php" method="post">
                    <div>
                        <input type="hidden" value="<?php echo $cod; ?>" name="id_doc"
                            style="display: none;">
                        <input type="hidden" value="<?php echo $_GET['id_sit'] ?>" name="id_sit"
                            style="display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Titulo de solicitud:</label>
                        <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom01"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" value="Solicitud de sitio" readonly>
                        <div class="invalid-feedback">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Sección:</label>
                        <input type="text" name="seccion" class="form-control" id="validationCustom01"
                            pattern="" autocomplete="off" spellcheck="false"
                            maxlength="30" value="<?php echo $seccion["NOMBRE_SEC"]; ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese una seccion
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Sitio:</label>
                        <input type="text" name="sitio" class="form-control" id="validationCustom01"
                            pattern="" autocomplete="off" spellcheck="false"
                            maxlength="30" value="<?php echo $sitio["NOMBRE_SIT"]; ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese un sitio
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Descripción:</label>
                        <textarea class="form-control area" name="descripcion" id="validationTextarea" maxlength="200"
                            cols="3" autocomplete="off" spellcheck="false" ></textarea>
                        <div class="invalid-feedback">
                            Solo se acepta un máximo de 200 caracteres.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a href="visualizarSitio.php" class="btn btn-danger">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de que desea guardar esta solicitud?
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




    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>


    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>