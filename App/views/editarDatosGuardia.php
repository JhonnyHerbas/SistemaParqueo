<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar datos guardia";
include('templates/head.php');
include('../models/funcionAdmin.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $cod = $_GET['id_guardia'];
    $result = visualizar_guardia_id($cod);
    $row = $result->fetch_array(MYSQLI_BOTH)
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Editar datos del guardia</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/editarDatosGuardiaAction.php" method="post">
                    <input type="hidden" value="<?= $cod; ?>" name="id_guardia"
                    style="display: none;">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Nombre:</label>
                        <input type="text" name="nombre" class="form-control text" id="validationCustom01"
                            pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required value="<?= $row['NOMBRE_GUA'];?>">
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Apellidos:</label>
                        <input type="text" name="apellido" class="form-control text" id="validationCustom01"
                                pattern = "^[a-zA-Z0-9áéíóúÁÉÍÓÚ\s]*$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required value="<?= $row['APELLIDO_GUA'];?>">
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a class="btn btn-danger text" href="../views/visualizarGuardia.php">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de actualizar?
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
</body>

</html>