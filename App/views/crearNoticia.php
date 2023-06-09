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
                        <label for="validationCustom03" class="form-label text">Titulo:</label>
                        <input type="text" name="titulo" class="form-control text" id="validationCustom03"
                            autocomplete="off" spellcheck="false" min="3" max="50" placeholder="Ingrese un titulo"
                            required>
                        <div class="invalid-feedback text">
                            Ingrese un titulo válido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text">Descripción:</label>
                        <textarea class="form-control area text" name="descripcion" id="validationTextarea"
                            maxlength="250" cols="3" autocomplete="off" spellcheck="false"></textarea>
                        <div class="invalid-feedback">
                            Solo se acepta un máximo de 250 caracteres.
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
</body>

</html>