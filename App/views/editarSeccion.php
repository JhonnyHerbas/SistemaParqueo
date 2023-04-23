<!DOCTYPE html>
<html lang="en">

<?php

if (session_status() != PHP_SESSION_NONE) {
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
}
$title = "Editar sección";
include('templates/head.php');
include('../models/funcionSeccion.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    //$id_s es la id dela seccion
    $id_sec = $_GET['id_sec'];
    $seccion = [];
    if ($seccion_id = visualizar_seccion_editar($id_sec)) {
        $seccion = $seccion_id->fetch_array(MYSQLI_BOTH);
    }

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">Editar sección</h2>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/actualizarSeccionAction.php" method="post">
                    <div>
                        <input type="hidden" value="<?php echo $seccion['ID_ADM']; ?>" name="id-adm"
                            style="display: none;">
                        <input type="hidden" value="<?php echo $seccion['ID_SEC']; ?>" name="id-sec"
                            style="display: none;">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Nombre de sección:</label>
                        <input type="text" name="nombre-seccion" class="form-control" id="validationCustom01"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" value="<?php echo $seccion['NOMBRE_SEC']; ?>" readonly required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Descripción:</label>
                        <textarea class="form-control area" name="descripcion" id="validationTextarea" minlength="20"
                            maxlength="200" cols="3" autocomplete="off" spellcheck="false"
                            required><?php echo $seccion['DESCRIPCION_SEC']; ?></textarea>
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
                                        ¿Está seguro de guardar los cambios?
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