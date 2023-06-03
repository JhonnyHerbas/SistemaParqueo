<!DOCTYPE html>
<html lang="en">

<?php

$title = "Asignar guardia";
include('templates/head.php');
include('../models/funcionAdmin.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $cod = $_GET['id'];
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Asignar guardia</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/asignarGuardiaAction.php" method="post">

                    <input type="hidden" value="<?= $cod; ?>" name="id_horario"
                            style="display: none;">

                    <div class="mb-3">
                    <label for="validationCustom02" class="form-label text">Guardia:</label>
                    <select class="form-select bg-info text" name="id_guardia" id="validationCustom04" required>
                    <option selected disabled value="">Elige...</option>
                        <?php
                        $result = visualizar_guardia();
                        if($result){
                            while($row = $result->fetch_array(MYSQLI_BOTH)){
                                $id = $row['ID_GUA'];
                                $nombre = $row['NOMBRE_GUA']. ' '. $row['APELLIDO_GUA'];
                                echo "<option value='$id'>$nombre</option>";
                            }
                        } 
                        ?>
                    </select>
                    <div class="invalid-feedback text">
                        Por favor seleccione una sección
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
    <script src="../../public/js/validacion.js"></script>
</body>

</html>