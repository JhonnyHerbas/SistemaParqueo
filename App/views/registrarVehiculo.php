<!DOCTYPE html>
<html lang="en">

<?php

$title = "Registrar Vehiculo";
include('templates/head.php');
?>

<body>
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Docente") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Registrar vehículo</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate action="../controllers/registrarVehiculo.php" method="post">

                    <input type="hidden" name="id-user" value="<?php echo $_SESSION['codigo']; ?>">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Placa:</label>
                        <input type="text" name="placa" class="form-control text" id="validationCustom01"
                            autocomplete="off" pattern="^(?=.*[A-Z])[A-Z0-9\s]{3,10}$" spellcheck="false"
                            placeholder="Ingrese el numero de placa de su vehiculo" required>
                        <div id="error-msg1" class="invalid-feedback text">
                            Por favor, ingrese correctamente el numero de su placa y en mayusculas.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Color:</label>
                        <input type="text" name="color" class="form-control text" id="validationCustom02"
                            autocomplete="off" pattern="^(?=.*[a-zA-Z])[a-zA-Z\s]{3,20}$" spellcheck="false"
                            placeholder="Ingrese el numero de placa de su vehiculo" required>
                        <div id="error-msg2" class="invalid-feedback text">
                            Por favor, ingrese un color solo con letras.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label text">Tipo de vehículo:</label>
                        <select class="form-select bg-info text" name="tipo" id="validationCustom03" required>
                            <option selected value="">Por favor elija una opción</option>
                            <option value="Taxi">Taxi</option>
                            <option value="Camioneta">Camioneta</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Todoterreno">Todoterreno</option>
                            <option value="Trufi">Trufi</option>
                        </select>
                        <div id="error-msg3" class="invalid-feedback text">
                            Por favor seleccione un tipo de vehículo
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
                                        ¿Está seguro de publicar?
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
    <script>
        const tituloInput = document.getElementById('validationCustom01');
        const errorMsg = document.getElementById('error-msg1');

        tituloInput.addEventListener('input', function () {
            if (tituloInput.checkValidity()) {
                errorMsg.style.display = 'none';
            } else {
                errorMsg.style.display = 'block';
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
    </script>
</body>

</html>