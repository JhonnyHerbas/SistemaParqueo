<!DOCTYPE html>
<html lang="en">

<?php

$title = "Responder consulta";
include('templates/head.php');
include('../models/funcionReclamo.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $cod = $_GET['consulta'];
    $consultas = visualizar_reclamo($cod);
    $consulta= $consultas->fetch_array(MYSQLI_BOTH);
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Responder consulta</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/responderConsultaAction.php" method="post">

                    <input type="hidden" value="<?php echo $consulta['ID_REC']; ?>" name="id_rec"
                            style="display: none;">
                    <input type="hidden" value="<?php echo $consulta['ID_DOC']; ?>" name="id_doc"
                    style="display: none;">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Título de la consulta:</label>
                        <input type="text" name="nombre-seccion" class="form-control text" id="validationCustom01"
                         value="<?= $consulta['TITULO_REC'] ?>"  readonly>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text">Descripción de la consulta:</label>
                        <textarea class="form-control area text" name="descripcion" id="validationTextarea" readonly><?= $consulta['DESCRIPCION_REC'] ?></textarea>                      
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text">Respuesta:</label>
                        <textarea class="form-control area text" name="respuesta" id="validationTextarea" minlength="10"
                            maxlength="200" cols="3" autocomplete="off" spellcheck="false" required></textarea>
                        <div class="invalid-feedback text">
                            Solo se acepta un mínimo de 10 y máximo de 200 caracteres.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a class="btn btn-danger text" href="visualizarConsulta.php">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de responder esta consulta?
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


    <script src="../../public/js/validacion.js"></script>
</body>

</html>