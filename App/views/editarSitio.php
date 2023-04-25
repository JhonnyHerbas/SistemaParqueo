<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar sitio";
include('templates/head.php');
include('../models/funcionSitio.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionSeccion.php');
    $id_sit = $_GET['id_sit'];
    $sitio = [];
    if ($sitio_id = visualizar_nombre_sitio($id_sit)) {
        $sitio = $sitio_id->fetch_array(MYSQLI_BOTH);
    }
    ?>

        <!-- Aqui vendra toda la interfaz que se necesita para la creacion-->
        <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Editar sitio</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/editarSitioAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Sección:</label>
                    <select class="form-select bg-info" name="seccion" id="validationCustom04" required>
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
                    <div class="invalid-feedback">
                        Por favor seleccione una sección
                    </div>
                </div>
                <div> 
                    <input type="hidden" value="<?php echo $sitio['ID_SIT'];?>" name="id_sit" style="display: none;">
                    <input type="hidden" value="<?php echo $sitio['NOMBRE_SIT'];?>" name="name" style="display: none;">
                </div>
                <div class="col-12 button">
                    <button class="btn btn-success" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                    <a href="visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>

        <!-- Modal -->
                <div class="container-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de editar este sitio?
                            </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success" id="confirmButton">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"id="cancelButton" >Cancelar</button>
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