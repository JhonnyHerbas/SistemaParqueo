<!DOCTYPE html>
<html lang="en">

<?php

$title = "Configurar horario";
include('templates/head.php');
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
    include('../models/funcionAdmin.php');
    $cod = $_GET['codigo'];
    $result = visualizar_horarios_atencion_id($cod);
    $row = $result->fetch_array(MYSQLI_BOTH);

    $horaAperturaCon = $row['HORA_APERTURA_CON'];
    $horaApertura = substr($horaAperturaCon, 0, 5);

    $horaCierreCon = $row['HORA_CIERRE_CON'];
    $horaCierre = substr($horaCierreCon, 0, 5);
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Actualizar horario de <?= $row['DIA_CON']; ?></h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate action="../controllers/actualizarHorarioAction.php" method="post" novalidate>
                    <input type="hidden" value="<?= $cod; ?>" name="id" style="display: none;">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Horario de apertura:</label>
                        <input type="time"  name="hora-apertura" class="form-control text" id="validationCustom01" pattern="(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]" autocomplete="off" spellcheck="false" placeholder="HH:MM" value="<?= $horaApertura  ?>" required>
                        <div id="hora-apertura-feedback" class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo en formato HH:MM.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Horario de cierre:</label>
                        <input type="time"  name="hora-cierre" class="form-control text" id="validationCustom02" pattern="^(0[0-9]|1[0-9]|2[0-2]):[0-5][0-9]$" autocomplete="off" spellcheck="false" placeholder="HH:MM" value="<?= $horaCierre; ?>" required>
                        <div id="hora-cierre-feedback" class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo en formato HH:MM.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                        <a href="./visualizarHorarioAtencion.php" class="btn btn-danger text">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de que desea guardar los cambios?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelButton">Cancelar</button>
                                        <button type="submit" class="btn btn-success" id="confirmButton">Confirmar</button>
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
        var horaAperturaInput = document.getElementById('validationCustom01');
        var horaAperturaFeedback = document.getElementById('hora-apertura-feedback');

        horaAperturaInput.addEventListener('input', function() {
            var horaAperturaValue = horaAperturaInput.value;

            if (!horaAperturaValue.match(/^$|^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/)) {
                horaAperturaFeedback.style.display = 'block';
            } else {
                horaAperturaFeedback.style.display = 'none';
            }
        });
        var horaCierreInput = document.getElementById('validationCustom02');
        var horaCierreFeedback = document.getElementById('hora-cierre-feedback');

        horaCierreInput.addEventListener('input', function() {
            var horaCierreValue = horaCierreInput.value;

            if (!horaCierreValue.match(/^(0?[0-9]|1[0-9]|2[0-2]):[0-5][0-9]$/)) {
                horaCierreFeedback.style.display = 'block';
            } else {
                horaCierreFeedback.style.display = 'none';
            }
            const horaApertura = document.getElementsByName("hora-apertura")[0];
            const horaCierre = document.getElementsByName("hora-cierre")[0];

            const apertura = new Date("2000-01-01T" + horaApertura.value + "Z");
            const cierre = new Date("2000-01-01T" + horaCierre.value + "Z");

            // Validar que el horario de apertura sea anterior al de cierre
            if (apertura >= cierre) {
                var miv = "Error la hora de apertura debe ser mayor a la hora de cierre";
                horaCierre.setCustomValidity("errorr");
                document.getElementById("hora-cierre-feedback").innerHTML = miv;
                horaCierreFeedback.style.display = 'block';

            } else {
                if (cierre.getTime() - apertura.getTime() < 3 * 60 * 60 * 1000) {
                    var miv = "Error el tiempo de funcionamiento del parqueo es de 3 horas.";
                    horaCierre.setCustomValidity("errorr");
                    document.getElementById("hora-cierre-feedback").innerHTML = miv;
                    horaCierreFeedback.style.display = 'block';
                } else {
                    horaCierre.setCustomValidity("");
                }
            }
        });
    </script>
</body>

</html>