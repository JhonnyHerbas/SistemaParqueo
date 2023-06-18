<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar sitio compartido";
include('templates/head.php');
include('../models/funcionDocente.php');
include('../models/funcionAdmin.php');
include('../models/funcionSitio.php');
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <?php
    $cod = $_SESSION['codigo']; 
    $docentes = visualizar_docente_id($cod);
    $docente = $docentes->fetch_array(MYSQLI_BOTH);
    $sitios = sitio_compartir($cod);
    $sitio = $sitios->fetch_array(MYSQLI_BOTH);
    ?>
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Solicitar sitio compartido</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/realizarSolcitudCompartidoAction.php" method="post">
                    <div>
                        <input type="hidden" value="<?php echo $sitio['ID_SIT'] ?>" name="id_sit"
                            style="display: none;">
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Docente titular:</label>
                        <select class="form-select bg-info text" name="titular" id="validationCustom04" required>
                        <option selected value="<?= $cod ?>"><?= $docente['NOMBRE_DOC'].' '. $docente['APELLIDO_DOC'];?></option>
                        </select>
                        <div class="invalid-feedback text">
                            Por favor seleccione un docente
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label text">Docente a compartir:</label>
                        <select class="form-select bg-info text" name="suplente" id="validationCustom04" required>
                            <option selected disabled value="">Elige...</option>
                            <?php
                            $result = visualizar_docente_id_distinto($cod);
                            if($result){
                                while($row = $result->fetch_array(MYSQLI_BOTH)){
                                    $id = $row['ID_DOC'];
                                    $nombre = $row['NOMBRE_DOC'] . ' '. $row['APELLIDO_DOC'];
                                    echo "<option value='$id'>$nombre</option>";
                                }
                            } 
                            ?>
                        </select>
                        <div class="invalid-feedback text">
                            Por favor seleccione un docente
                        </div>
                    </div>
                    
                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a href="visualizarSitio.php" class="btn btn-danger text">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de que desea guardar esta solicitud?
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