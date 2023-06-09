<!DOCTYPE html>
<html lang="en">

<?php

$title = "Crear sección";
include('templates/head.php');
include('../models/funcionAdmin.php');
include('../models/funcionDocente.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $cod = $_GET['id'];
    $compras = visualizar_asignacion_moneda($cod);
    $compra= $compras->fetch_array(MYSQLI_BOTH);

    $docentes = visualizar_docente_id($compra['ID_DOC']);
    $docente= $docentes->fetch_array(MYSQLI_BOTH);
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Asignar parkcoins</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/asignarMonedaAction.php" method="post">
                    
                    <input type="hidden" value="<?php echo $compra['ID_COM']; ?>" name="id_com"
                            style="display: none;">

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Docente:</label>
                        <input type="text" name="nombre-docente" class="form-control text" id="validationCustom01"
                            value="<?=  $docente['NOMBRE_DOC'] ." ". $docente['APELLIDO_DOC']  ?>" required readonly>
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Codigo SIS:</label>
                        <input type="number" class="form-control text" name="codigo" id="validationCustom02" value="<?=  $compra['ID_DOC'] ?>" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Cantidad de parkcoins:</label>
                        <input type="number" class="form-control text" name="cantidad" id="validationCustom02" value="<?=  $compra['MONTO_COM'] ?>" required>
                        <div class="invalid-feedback text">
                            Ingrese una cantidad valida
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a  href="visualizarCompraMoneda.php" class="btn btn-danger text" >Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de asignar?
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