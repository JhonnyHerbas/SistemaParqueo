<!DOCTYPE html>
<html lang="en">

<?php

$title = "Registrar ingreso";
include('templates/head.php');
include('../models/funcionDocente.php');
?>

<body>
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Guardia") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Registrar ingreso</h3>
            </div>
            <div class="card-body">
                <form id="login" class="row g-3 needs-validation" novalidate action="../controllers/ingresoAction.php" method="post">

                    <input type="hidden" name="id-user" value="<?php echo $_GET['id_doc']; ?>">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Vehículo:</label>
                        <select class="form-select bg-info text" name="id-vehiculo" id="validationCustom01" required>
                            <option selected value="">Por favor elija el un numero de placa</option>
                            <?php 
                            $vehiculos = visualizar_vehiculos($_GET['id_doc']);
                            if ($vehiculos) {
                                while ($fila = mysqli_fetch_array($vehiculos)) {
                                    echo "<option value='{$fila['ID_VEH']}'>Placa: {$fila['PLACA_VEH']}</option>";
                                }
                            }
                            ?>
                        </select>
                        <div id="error-msg1" class="invalid-feedback text">
                            Por favor seleccione un vehiculo.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" type="submit">Guardar</button>
                        <a href="registroIngreso.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary btn-danger text" data-bs-dismiss="modal">Cancelar</button></a>
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