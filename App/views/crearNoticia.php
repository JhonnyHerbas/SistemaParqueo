<!DOCTYPE html>
<html lang="en">

<?php

$title = "Publicar notica";
include('templates/head.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Publicar noticia</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/crearNoticiaAction.php" method="post">

                    <input type="hidden" name="id-user" value="<?php echo $_SESSION['codigo']; ?>">

                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label text">Título:</label>
                        <input type="text" name="titulo" class="form-control text" id="validationCustom03"
                            autocomplete="off" pattern="^(?=.*[a-zA-Z])[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9\s]{3,30}$"
                            spellcheck="false" min="3" max="50" placeholder="Ingrese un título" required>
                        <div id="error-msg" class="invalid-feedback text">
                            Ingrese un título válido sin caracteres especiales.
                        </div>
                    </div>

                    <script>
                        // Obtener referencia al campo de entrada y al mensaje de error
                        const tituloInput = document.getElementById('validationCustom03');
                        const errorMsg = document.getElementById('error-msg');

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
                    </script>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text">Descripción:</label>
                        <textarea class="form-control area text" name="descripcion" id="validationTextarea"
                            minlength="20" maxlength="250" cols="3" autocomplete="off" spellcheck="false"
                            required></textarea>
                        <div id="error-msg" class="invalid-feedback">
                            Solo se acepta un mínimo de 20 caracteres y un máximo de 250 caracteres. Ingresa solo
                            letras, números, espacios y puntos.
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <button class="btn btn-danger text" type="reset">Cancelar</button>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de publicar?
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

    <?php

    include('templates/scripts.php');

    ?>
    <script src="../../public/js/validacion.js"></script>
    <script src="../../public/js/textareaValidation.js"></script>
</body>

</html>