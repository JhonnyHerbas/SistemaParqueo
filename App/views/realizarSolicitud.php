<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar solicitud";
include('templates/head.php');
include('../models/funcionSolicitud.php')
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Solicitar sitio</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/realizarSolcitudAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Titulo de solicitud:</label>
                    <input type="text" name="titulo-solicitud" class="form-control" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" placeholder="Solicito el sitio X" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Sitios disponibles:</label>
                    <select class="form-select" name="id-sitio" id="validationCustom04" required>
                    <option selected disabled value="">Seleccione un sitio</option>
                    <?php 
                    $result = visualizar_sitios();
                    if($result){
                    while($row = $result->fetch_array(MYSQLI_BOTH)){
                        echo "<option class='form-control' id='validationCustom02' value='" . $row['ID_SIT'] . "'>" . $row['NOMBRE_SIT'] . "</option>";
                    }
                    } 
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un sitio
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationTextarea" class="form-label">Descripción:</label>
                    <textarea class="form-control area" name="descripcion" id="validationTextarea" maxlength="200" cols="3" autocomplete="off" spellcheck="false" required></textarea>
                    <div class="invalid-feedback">
                        Solo se acepta un máximo de 200 caracteres.
                    </div>
                </div>
                <div class="col-12 button">
                    <button class="btn btn-success" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>

        <!-- Modal -->
                <div class="container-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de que desea guardar esta solicitud?
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"id="cancelButton" >Cancelar</button>
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
    
    
<script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>
</html>