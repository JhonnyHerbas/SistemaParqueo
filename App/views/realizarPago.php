<!DOCTYPE html>
<html lang="en">

<?php

$title = "Solicitudes";
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
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <?php
        $cod = $_GET['id_sol'];
        $result = visualizar_pago_solicitado($cod);
        $pago = $result->fetch_array(MYSQLI_BOTH);
        ?>
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">Realizar pago</h2>
            </div>
            <div class="card-body pago">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/realizarPagoAction.php" method="post">
                    <div>
                        <input type="hidden" value="<?php echo $pago['ID_ASI']; ?>" name="id-asi"
                            style="display: none;">
                    </div>
                    <div class="fila">
                        <div class="mb-3 ">
                            <label for="validationCustom01" class="form-label">Nombre del sitio:</label>
                            <input type="text" name="nombreSitio" class="form-control bg-info" id="validationCustom01"
                                pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                value="<?php echo $pago['NOMBRE_SIT']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un nombre válido.
                            </div>
                        </div>

                        <div class="mb-3 inpu">
                            <label for="validationCustom03" class="form-label">Precio:</label>
                            <input type="text" name="precio" class="form-control bg-info" id="validationCustom03"
                                pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5" maxlength="30"
                                value="<?php echo $pago['PRECIO_SIT']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un código válido.
                            </div>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Nombre del docente:</label>
                            <input type="text" name="nombreDocente" class="form-control bg-info" id="validationCustom01"
                                pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                value="<?php echo $pago['NOMBRE_DOC']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un nombre válido.
                            </div>
                        </div>

                        <div class="mb-3 inpu">
                            <label for="validationCustom05" class="form-label">Correo:</label>
                            <input type="email" name="correo" class="form-control bg-info" id="validationCustom05"
                                autocomplete="off" spellcheck="false" maxlength="50"
                                value="<?php echo $pago['CORREO_DOC']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un correo válido.
                            </div>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Código SIS:</label>
                            <input type="text" name="codigo" class="form-control bg-info" id="validationCustom01"
                                autocomplete="off" spellcheck="false" maxlength="50"
                                value="<?= $pago['ID_DOC']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un correo válido.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Fecha fin</label>
                            <input type="text" name="fecha" class="form-control bg-info" id="validationCustom01"
                                autocomplete="off" spellcheck="false" maxlength="50"
                                value="<?php echo $_GET['fecha']; ?>" readonly>
                            <div class="invalid-feedback">
                                Ingrese un correo válido.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 button">
                        <button class="btn btn-success" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Aceptar</button>
                        <a href="visualizarPagos.php" class="btn btn-danger">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de crear esta sección?
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
</body>

</html>