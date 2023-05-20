<!DOCTYPE html>
<html lang="en">

<?php

$title = "Comprar moneda";
include('templates/head.php');
include('../models/funcionSeccion.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $cod = $_SESSION['codigo']
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Comprar moneda</h3>
            </div>
            <div class="compra-moneda">
                <div class="container-imagen">
                    <img src="../../public/img/qr.jpeg" alt="imagen qr" class="qr">
                </div>
                <div class="container-formulario">
                    <form id="myForm" class="row g-3 needs-validation" novalidate
                        action="../controllers/realizarConsultaAction.php" method="post">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label text">Codigos SIS:</label>
                            <input type="number" name="codigo" class="form-control text" id="validationCustom01"
                                required readonly value="<?php echo $cod; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label text">Cantidad:</label>
                            <input type="number" name="cantidad" class="form-control text" id="validationCustom01"
                                autocomplete="off" spellcheck="false" min="1" required>
                            <div class="invalid-feedback text">
                                Por favor, ingrese un valor válido para este campo.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="comprobante" class="form-label text">Comprobante:</label>
                            <input type="file" title="Elegir" class="form-control text text" aria-label="file example" id="comprobante" accept=".jpeg,.jpg,.png" required>
                            <div class="invalid-feedback text">Seleccione un formato jpeg, jpg, png.</div>
                            <script>
                                var input = document.getElementById('comprobante');
                                input.addEventListener('change', function() {
                                var file = this.files[0];
                                if (!/^image\/(jpeg|jpg|png)$/.test(file.type)) {
                                    input.setCustomValidity('Seleccione un formato jpeg, jpg, png.');
                                } else {
                                    input.setCustomValidity('');
                                }
                                });
                            </script>
                            
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
                                            ¿Está seguro de realizar esta compra?
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
        </div>
    </section>


</body>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>