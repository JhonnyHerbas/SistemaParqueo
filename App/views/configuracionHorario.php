<!DOCTYPE html>
<html lang="en">

<?php

$title = "Configurar horario";
include('templates/head.php');

include('../models/funcionConfiguracionHorario.php')
    ?>

<body>
    <!-- Include del header.php -->
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
                <h3 class="font-weight-bold">Registrar nuevo horario</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/configuracionHorarioAction.php" method="post" novalidate>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Horario de apertura:</label>
                        <input type="text" name="hora-apertura" class="form-control text" id="validationCustom01"
                            pattern="^(0[6-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" autocomplete="off"
                            spellcheck="false" minlength="8" maxlength="8" placeholder="HH:MM:SS" required>
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Horario de cierre:</label>
                        <input type="text" name="hora-cierre" class="form-control text" id="validationCustom01"
                            pattern="^(0?[0-9]|1[0-9]|2[0-2]):[0-5][0-9]:[0-5][0-9]$" autocomplete="off"
                            spellcheck="false" minlength="8" maxlength="8" placeholder="HH:MM:SS" required>

                        <div class="invalid-feedback text" id="ci">Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Día:</label>
                        <select class="form-select text" name="dia" id="validationCustom04" required>
                            <option selected disabled value="">Seleccione un día</option>
                            <option class='form-control text' id='validationCustom02' value="LUNES">Lunes</option>
                            <option class='form-control text' id='validationCustom02' value="MARTES">Martes</option>
                            <option class='form-control text' id='validationCustom02' value="MIERCOLES">Miercoles
                            </option>
                            <option class='form-control text' id='validationCustom02' value="JUEVES">Jueves</option>
                            <option class='form-control text' id='validationCustom02' value="VIERNES">Viernes</option>
                            <option class='form-control text' id='validationCustom02' value="SABADO">Sabado</option>
                            <option class='form-control text' id='validationCustom02' value="DOMINGO">Domingo</option>
                        </select>
                        <div class="invalid-feedback text">
                            Por favor seleccione un dia
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a href="./visualizarSitio.php" class="btn btn-danger text">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de que desea guardar este horario?
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

    <script>
        function validarHorario() {
            // Obtener los valores de ambos campos de entrada y convertirlos en objetos de fecha
            const horaApertura = document.getElementsByName("hora-apertura")[0];
            const horaCierre = document.getElementsByName("hora-cierre")[0];

            const apertura = new Date("2000-01-01T" + horaApertura.value + "Z");
            const cierre = new Date("2000-01-01T" + horaCierre.value + "Z");

            // Validar que el horario de apertura sea anterior al de cierre
            if (apertura >= cierre) {
                var miv = "Error la hora de apertura debe ser mayor a la hora de cierre";
                horaCierre.setCustomValidity("errorr");
                document.getElementById("ci").innerHTML = miv;

            } else {
                if (cierre.getTime() - apertura.getTime() < 3 * 60 * 60 * 1000) {
                    var miv = "Error el tiempo de funcionamiento del parqueo es de 3 horas.";
                    horaCierre.setCustomValidity("errorr");
                    document.getElementById("ci").innerHTML = miv;
                } else {
                    horaCierre.setCustomValidity("");
                }
            }
        }
    </script>
    <script>
        const myForm = document.getElementById("myForm");
        myForm.addEventListener("submit", function (event) {
            event.preventDefault();
            validarHorario();
        });

    </script>







    <script src="../../public/js/validacion.js"></script>
</body>

</html>