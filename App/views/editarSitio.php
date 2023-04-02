<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar Sitio";
include('head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";
    $lista =    "<ul>
                    <li><a href=''>Inicio</a></li>
                    <li><a href=''>Visualizar</a></li>
                    <li><a href=''>Configurar horario</a></li>
                    <li><a href=''>Ver solicitudes</a></li>
                </ul>";

    include('header.php');
    include('../models/funcionSeccion.php');
    $name = $_GET['nombre'];
    $price = $_GET['precio'];
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Editar sitio</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/realizarSolcitudAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Nombre del sitio:</label>
                    <input type="text" name="name" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" placeholder="<?php echo $name; ?>" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>

                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>

                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Precio: </label>
                  <input type="number" class="form-control bg-info" id="validationCustom02" min="1" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="10" pattern="^[0-9]*$" placeholder="<?php echo $price; ?>"
                  >

                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
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
                                ¿Está seguro de que desea editar este sitio?
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
    
    include('scripts.php');

    ?>
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>  
    
<script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>
</html>