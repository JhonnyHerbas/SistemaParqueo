<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar datos";
include('templates/head.php');
include('../models/funcionAdmin.php')
    ?>

<body>
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] == "Administrador") { 
        $id_doc = $_GET['id_doc'];
        if ($docente_id = visualizar_datos_docente($id_doc)) {
            $docente = $docente_id->fetch_array(MYSQLI_BOTH);
        }?>
        <main>
            <div class="form-containerG">
                <div class="header-containerG">
                    <h2 class="title-form">
                        Editar docente
                    </h2>
                </div>
                <div class="card-body grande">
                    <form id="myForm" class="row g-3 needs-validation" novalidate
                        action="../controllers/editarUserAction.php" method="post">

                        <div class="columnas">
                            <div class="izquierda">
                                <!-- Input del nombre -->
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="validationCustom01"
                                        pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                        placeholder="Ingrese su nombre" required
                                        value="<?php echo $docente["NOMBRE_DOC"]; ?>">
                                    <div class="invalid-feedback">
                                        Ingrese un nombre válido.
                                    </div>
                                </div>
                            </div>
                            <div class="derecha">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Apellido/s:</label>
                                    <input type="text" name="apellido" class="form-control" id="validationCustom02"
                                        pattern="[a-zA-Z\s]{3,90}" autocomplete="off" spellcheck="false" minlength="5"
                                        maxlength="30" placeholder="Ingrese su apellido" required
                                        value="<?php echo $docente["APELLIDO_DOC"]; ?>">
                                    <div class="invalid-feedback">
                                        Ingrese un apellido válido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columnas">
                            <div class="izquierda">
                                <!-- Input del codigoSis -->
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Código SIS:</label>
                                    <input type="text" name="codigo" class="form-control" id="validationCustom03"
                                        pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5"
                                        maxlength="30" placeholder="Ingrese su código" required
                                        value="<?php echo $docente["ID_DOC"]; ?>">
                                    <div class="invalid-feedback">
                                        Ingrese un código válido.
                                    </div>
                                </div>
                            </div>
                            <div class="derecha">
                                <div class="mb-3">
                                    <label for="validationCustom05" class="form-label">Celular:</label>
                                    <input type="text" name="celular" class="form-control" id="validationCustom05"
                                        pattern="^[0-9]{8}$" autocomplete="off" spellcheck="false" minlength="5"
                                        maxlength="30" placeholder="Ingrese su numero" readonly
                                        value="<?php echo $docente["CELULAR_DOC"]; ?>">
                                    <div class="invalid-feedback">
                                        Ingrese un numero válido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columnas">
                            <div class="izquierda">
                                <!-- Input del nombre -->
                                <div class="mb-3">
                                    <label for="validationCustom06" class="form-label">Correo:</label>
                                    <input type="email" name="correo" class="form-control" id="validationCustom06"
                                        autocomplete="off" spellcheck="false" maxlength="50" placeholder="Ingrese su correo"
                                        readonly value="<?php echo $docente["CORREO_DOC"]; ?>">
                                    <div class="invalid-feedback">
                                        Ingrese un correo válido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $docente['ID_DOC']; ?>" name="id_doc" style="display: none;">
                        <!-- CUANDO NO SEA UN ADMINISTRADOR -->
                    <?php } else { 
                                $id_doc = $_SESSION['codigo'];
                                if ($docente_id = visualizar_datos_docente($id_doc)) {
                                    $docente = $docente_id->fetch_array(MYSQLI_BOTH);
                                }
                    ?>
                        <main>
                            <div class="form-containerG">
                                <div class="header-containerG">
                                    <h2 class="title-form">
                                        Editar datos
                                    </h2>
                                </div>
                                <div class="card-body grande">
                                    <form id="myForm" class="row g-3 needs-validation" novalidate
                                        action="../controllers/editarUserAction.php" method="post">

                                        <div class="columnas">
                                            <div class="izquierda">
                                                <!-- Input del nombre -->
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Nombre:</label>
                                                    <input type="text" name="nombre" class="form-control"
                                                        id="validationCustom01" pattern="[a-zA-Z\s]{3,30}"
                                                        autocomplete="off" spellcheck="false"
                                                        placeholder="Ingrese su nombre" readonly
                                                        value="<?php echo $docente["NOMBRE_DOC"]; ?>">
                                                    <div class="invalid-feedback">
                                                        Ingrese un nombre válido.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="derecha">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Apellido/s:</label>
                                                    <input type="text" name="apellido" class="form-control"
                                                        id="validationCustom02" pattern="[a-zA-Z\s]{3,90}"
                                                        autocomplete="off" spellcheck="false" minlength="5" maxlength="30"
                                                        placeholder="Ingrese su apellido" readonly
                                                        value="<?php echo $docente["APELLIDO_DOC"]; ?>">
                                                    <div class="invalid-feedback">
                                                        Ingrese un apellido válido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnas">
                                            <div class="izquierda">
                                                <!-- Input del codigoSis -->
                                                <div class="mb-3">
                                                    <label for="validationCustom03" class="form-label">Código SIS:</label>
                                                    <input type="text" name="codigo" class="form-control"
                                                        id="validationCustom03" pattern="^[0-9]{9}$" autocomplete="off"
                                                        spellcheck="false" minlength="5" maxlength="30"
                                                        placeholder="Ingrese su código" readonly
                                                        value="<?php echo $docente["ID_DOC"]; ?>">
                                                    <div class="invalid-feedback">
                                                        Ingrese un código válido.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="derecha">
                                                <div class="mb-3">
                                                    <label for="validationCustom05" class="form-label">Celular:</label>
                                                    <input type="text" name="celular" class="form-control"
                                                        id="validationCustom05" pattern="^[0-9]{8}$" autocomplete="off"
                                                        spellcheck="false" minlength="5" maxlength="30"
                                                        placeholder="Ingrese su numero" required
                                                        value="<?php echo $docente["CELULAR_DOC"]; ?>">
                                                    <div class="invalid-feedback">
                                                        Ingrese un numero válido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnas">
                                            <div class="izquierda">
                                                <!-- Input del nombre -->
                                                <div class="mb-3">
                                                    <label for="validationCustom06" class="form-label">Correo:</label>
                                                    <input type="email" name="correo" class="form-control"
                                                        id="validationCustom06" autocomplete="off" spellcheck="false"
                                                        maxlength="50" placeholder="Ingrese su correo" required
                                                        value="<?php echo $docente["CORREO_DOC"]; ?>">
                                                    <div class="invalid-feedback">
                                                        Ingrese un correo válido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnas">
                                            <a href="editarContrasena.php">¿Cambiar contraseña?</a>
                                        </div>
                                        <input type="hidden" value="<?php echo $docente['ID_DOC']; ?>" name="id_doc"
                                            style="display: none;">
                                    <?php }
    ?>
    <?php
    
    $success = "Guardar";
    $danger = "Cancelar";
    include('templates/buttonsForms.php');

    $mensaje = "¿Está seguro de guardar los cambios?";
    include('templates/modalForm.php');

    include('templates/finForm.php');
    ?>
    </main>


<?php

include('templates/scripts.php');

?>
<script src="../../public/js/validacion.js"></script>
</body>

</html>