<!DOCTYPE html>
<html lang="en">

<?php

$title = "Configurar horario";
include('templates/head.php');
include('../models/funcionConfiguracionHorario.php')
?>

<body>
    <!-- Include del header.php -->
    <?php 

    include('templates/header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Registrar nuevo horario</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/configuracionHorarioAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Horario de apertura:</label>
                    <input type="text" name="hora-apertura" class="form-control" id="validationCustom01" pattern="^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" autocomplete="off" spellcheck="false" 
                    minlength="8" maxlength="8" placeholder="HH:MM:SS" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Horario de cierre:</label>
                    <input type="text" name="hora-cierre" class="form-control" id="validationCustom01" pattern="^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" autocomplete="off" spellcheck="false" 
                    minlength="8" maxlength="8" placeholder="HH:MM:SS" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Dia:</label>
                    <select class="form-select" name="dia" id="validationCustom04" required>
                    <option selected disabled value="">Seleccione un dia</option>
                    <option class='form-control' id='validationCustom02' value="LUNES">Lunes</option>
                    <option class='form-control' id='validationCustom02' value="MARTES">Martes</option>
                    <option class='form-control' id='validationCustom02' value="MIERCOLES">Miercoles</option>
                    <option class='form-control' id='validationCustom02' value="JUEVES">Jueves</option>
                    <option class='form-control' id='validationCustom02' value="VIERNES">Viernes</option>
                    <option class='form-control' id='validationCustom02' value="SABADO">Sabado</option>
                    <option class='form-control' id='validationCustom02' value="DOMINGO">Domingo</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un sitio
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
                                ¿Está seguro de que desea guardar este horario?
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"id="cancelButton" >Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="confirmButton">Confirmar</button>
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