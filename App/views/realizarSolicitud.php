<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar solicitud";
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
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">Solicitar sitio</h2>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Titulo de solicitud:</label>
                        <input type="text" class="form-control" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Numero sitio:</label>
                        <input type="number" class="form-control" id="validationCustom02" min="1" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Descripción:</label>
                        <textarea class="form-control area" id="validationTextarea" maxlength="200" cols="3" autocomplete="off" spellcheck="false" required></textarea>
                        <div class="invalid-feedback">
                            Solo se acepta un máximo de 200 caracteres.
                        </div>
                    </div>
                    <div class="col-12 button">
                        <button class="btn btn-success" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
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
</body>
</html>