<!DOCTYPE html>
<html lang="en">

<?php

if (session_status() != PHP_SESSION_NONE) {
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
}
$title = "Editar contrasena";
include('templates/head.php');
include('../models/funcionAdmin.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    $id_doc = $_SESSION['codigo'];
    if ($docente_id = visualizar_datos_docente($id_doc)) {
        $docente = $docente_id->fetch_array(MYSQLI_BOTH);
    }
    ?>
    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">
                    Editar contraseña
                </h2>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/editarContrasenaAction.php" method="post">
                    <!-- Input de la contraseña actual-->
                    <div class="mb-3">
                        <label for="validationCustom07" class="form-label">Contraseña actual:</label>
                        <input type="password" name="pass" class="form-control" id="validationCustom07"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su contraseña" required>
                        <div id="error-msg7" class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y
                            un numero.
                        </div>
                    </div>
                    <!-- Input de la contraseña -->
                    <div class="mb-3">
                        <label for="validationCustom08" class="form-label">Contraseña nueva:</label>
                        <input type="password" name="passNuevo" class="form-control" id="validationCustom08"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Ingrese su nueva contraseña" required>
                        <div id="error-msg8" class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y
                            un numero.
                        </div>
                    </div>
                    <!-- Input de verificar contraseña -->
                    <div class="mb-3">
                        <label for="validationCustom09" class="form-label">Verificar contraseña:</label>
                        <input type="password" name="verPassNuevo" class="form-control" id="validationCustom09"
                            pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                            placeholder="Verifique su nueva contraseña" required>
                        <div id="error-msg9" class="invalid-feedback">
                            Ingrese una contraseña válida entre 8 y 20 caracteres que contenga mayusculas, minusculas y
                            un numero.
                        </div>
                    </div>
                    <div>
                        <input type="hidden" value="<?php echo $docente['ID_DOC']; ?>" name="id_doc"
                            style="display: none;">
                    </div>


                    <?php

                    $success = "Guardar";
                    $danger = "Cancelar";
                    include('templates/buttonsForms.php');

                    $mensaje = "¿Está seguro de que desea cambiar la contraseña?";
                    include('templates/modalForm.php');

                    include('templates/finForm.php');
                    ?>
    </section>



    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
    <script>
        // Obtener referencia al campo de entrada y al mensaje de error
        const tituloInput = document.getElementById('validationCustom07');
        const errorMsg = document.getElementById('error-msg7');

        // Agregar un event listener para el evento input
        tituloInput.addEventListener('input', function () {
            // Verificar si el valor del campo de entrada es válido utilizando checkValidity()
            if (tituloInput.checkValidity()) {
                // Si es válido, ocultar el mensaje de error
                errorMsg.style.display = 'none';
            } else {
                // Si no es válido, mostrar el mensaje de error
                errorMsg.style.display = 'block';
            }
        });

        const tituloInput1 = document.getElementById('validationCustom08');
        const errorMsg1 = document.getElementById('error-msg8');

        // Agregar un event listener para el evento input
        tituloInput1.addEventListener('input', function () {
            // Verificar si el valor del campo de entrada es válido utilizando checkValidity()
            if (tituloInput1.checkValidity()) {
                // Si es válido, ocultar el mensaje de error
                errorMsg1.style.display = 'none';
            } else {
                // Si no es válido, mostrar el mensaje de error
                errorMsg1.style.display = 'block';
            }
        });

        const tituloInput2 = document.getElementById('validationCustom09');
        const errorMsg2 = document.getElementById('error-msg9');

        // Agregar un event listener para el evento input
        tituloInput2.addEventListener('input', function () {
            // Verificar si el valor del campo de entrada es válido utilizando checkValidity()
            if (tituloInput2.checkValidity()) {
                // Si es válido, ocultar el mensaje de error
                errorMsg2.style.display = 'none';
            } else {
                // Si no es válido, mostrar el mensaje de error
                errorMsg2.style.display = 'block';
            }
        });
    </script>
</body>

</html>