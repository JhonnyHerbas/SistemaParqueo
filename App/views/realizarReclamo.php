<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar reclamo";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionDocente.php');
    $cod = $_SESSION['codigo']
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Realizar reclamo</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/realizarReclamoAction.php" method="post">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Código SIS:</label>
                        <input type="number" name="codigo" class="form-control text" id="validationCustom01"
                            required readonly value="<?php echo $cod; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Motivo del reclamo:</label>
                        <input type="text" name="titulo-reclamo" class="form-control text" id="validationCustom02"
                            pattern="^(?=.*[a-zA-Z])[a-zA-ZáéíóúÁÉÍÓÚüÜñ0-9\s]+$" autocomplete="off" spellcheck="false" minlength="5"
                            maxlength="30" required>
                        <div id="error-msg2" class="invalid-feedback text">
                            Por favor, ingrese solo letras y numeros.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text">Descripción:</label>
                        <textarea class="form-control area text" name="descripcion" id="validationTextarea" minlength="10"
                            maxlength="200" cols="3" autocomplete="off" spellcheck="false" required></textarea>
                        <div class="invalid-feedback text">
                            Solo se acepta un mínimo de 10 y máximo de 200 caracteres.
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
                                        ¿Está seguro de realizar este reclamo?
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
    <script src="../../public/js/textareaValidation.js"></script>
    <script>
        const tituloInput = document.getElementById('validationCustom02');
        const errorMsg = document.getElementById('error-msg2');

        tituloInput.addEventListener('input', function () {
            if (tituloInput.checkValidity()) {
                errorMsg.style.display = 'none';
            } else {
                errorMsg.style.display = 'block';
            }
        });
    </script>
</body>

</html>