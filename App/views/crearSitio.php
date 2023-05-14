<!DOCTYPE html>
<html lang="en">

<?php

$title = "Crear sitio";
include('templates/head.php');
include('../models/funcionSeccion.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la creacion-->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h3 class="font-weight-bold">Crear sitio</h3>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="../controllers/crearSitioAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label text">Nombre del sitio:</label>
                    <input type="text" name="name" class="form-control bg-info text" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" placeholder="" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback text">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <input name="disponible" class="text" value = "1"  style="display: none;">
                </div>
                <div class="mb-3">
                  <input type="hidden" min="1" autocomplete="off" 
                    name="precio" maxlength="10" pattern="^[0-9]*$" value = "100"  class="text"
                  >
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label text">Sección:</label>
                    <select class="form-select bg-info text" name="seccion" id="validationCustom04" required>
                    <option selected disabled value="">Elige...</option>
                        <?php
                        $result = visualizar_seccion();
                        if($result){
                            while($row = $result->fetch_array(MYSQLI_BOTH)){
                                $id = $row['ID_SEC'];
                                $nombre = $row['NOMBRE_SEC'];
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
                    <button class="btn btn-success text" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                    <a href="visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger text" data-bs-dismiss="modal">Cancelar</button></a>
                </div>

                <!-- Modal -->
                <div class="container-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de crear este sitio?
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