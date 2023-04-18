<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar datos";
include('templates/head.php');
include('../models/funcionAdmin.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    $id_doc = $_GET['id_doc'];
    $docente = [];
    if ($docente_id = visualizar_datos_docente($id_doc)) {
        $docente = $docente_id->fetch_array(MYSQLI_BOTH);
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <main>
        <div class="form-containerG">
            <div class="header-containerG">
                <h2 class="title-form">
                    Editar datos
                </h2>
            </div>
            <div class="card-body grande">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/editarUsuarioAction.php" method="post">

                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" id="validationCustom01"
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                    value="<?php echo $docente['NOMBRE_DOC']; ?>" required>
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
                                    maxlength="30" value="<?php echo $docente['APELLIDO_DOC']; ?>" required>
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
                                    maxlength="30" value="<?php echo $docente['ID_DOC']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese un código válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom04" class="form-label">Celular:</label>
                                <input type="text" name="celular" class="form-control bg-info" id="validationCustom05"
                                    pattern="^[0-9]{8}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" value="<?php echo $docente['CELULAR_DOC']; ?>" readonly>
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
                                <label for="validationCustom05" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control bg-info" id="validationCustom05"
                                    autocomplete="off" spellcheck="false" maxlength="50" value="<?php echo $docente['CORREO_DOC']; ?>"
                                    readonly>
                                <div class="invalid-feedback">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label">¿Quieres cambiar tu contraseña?</label>
                            </div>
                        </div>
                    </div>
                    
                    <?php

                    $success = "Guardar";
                    $danger = "Cancelar";
                    include ('templates/buttonsForms.php');

                    $mensaje = "¿Está seguro de que desea registrar este docente?";
                    include ('templates/modalForm.php');

                    include ('templates/finForm.php');
                    ?>
    </main>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>