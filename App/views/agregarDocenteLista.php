<!DOCTYPE html>
<html lang="en">

<?php

$title = "Cargar docentes";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Cargar docentes</h3>
            </div>
            <div class="card-body">
                <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
                    <div class="mb-3 nota">
                        El archivo CSV debe seguir el siguiente formato:
                        <b>CODIGO SIS, NOMBRE, APELLIDOS, CELULAR, CORREO</b>, sin incluir encabezados.
                    </div>

                    <div class="mb-3">
                        <label for="comprobante" class="form-label text">Archivo:</label>
                        <input type="file" class="form-control text text" aria-label="file example" id="comprobante" accept=".csv" required name="fileContacts">
                        <div id="message"></div>
                        <script>
                            var input = document.getElementById('comprobante');
                            input.addEventListener('change', function() {
                                var file = this.files[0];
                                if (file.type !== 'text/csv') {
                                    input.setCustomValidity('Seleccione un formato csv');
                                } else {
                                    input.setCustomValidity('');
                                }
                            });
                        </script>
                    </div>


                    <div class="col-12 button">
                        <button type="button" id="submitButton" onclick="uploadContacts()" class="btn btn-success text">Guardar</button>
                        <a class="btn btn-danger text" href="visualizarDocente.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>




    <!-- Include de los scripts.php -->


    <script type="text/javascript">
        function uploadContacts() {
            var inputFile = document.getElementById('comprobante');
            if (inputFile.files.length === 0) {
                var messageElement = document.getElementById('message');
                messageElement.textContent = 'Seleccione un archivo antes de continuar.';
                return;
            }
            var file = inputFile.files[0];
            if (file.type !== 'text/csv') {
                var messageElement = document.getElementById('message');
                messageElement.textContent = 'Seleccione un archivo en formato CSV.';
                return;
            }

            var Form = new FormData($('#filesForm')[0]);
            $.ajax({
                url: "../helpers/import.php",
                type: "post",
                data: Form,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log('Registros Agregados!');
                    window.location.href = "./visualizarDocente.php";
                }
            });
        }
    </script>
    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>