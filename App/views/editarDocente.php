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
    if($docente_id = visualizar_datos_docente($id_doc)){
        $docente= $docente_id->fetch_array(MYSQLI_BOTH);
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h2 class="h2">
                    Editar datos
                </h2>
            </div>
            <div class="card-body">
            <form id="admin-form" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/editarUsuarioAction.php" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nombre:</label>
                                <input type="text" name="name" class="form-control" id="validationCustom01"
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false" value="<?php echo $docente['NOMBRE_DOC']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                            <!-- Input del codigoSis -->
                            <div class="mb-3">
                                <label for="validationCustom03" class="form-label">Código SIS:</label>
                                <input type="text" name="codigo" class="form-control" id="validationCustom03"
                                    pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su código" value="<?php echo $docente['ID_DOC']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un código válido.
                                </div>
                            </div>
                            <!-- Input del correo -->
                            <div class="mb-3">
                                <label for="validationCustom05" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control" id="validationCustom05"
                                    autocomplete="off" spellcheck="false" maxlength="50" placeholder="Ingrese su correo"
                                    value="<?php echo $docente['CORREO_DOC']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Apellido/s:</label>
                                <input type="text" name="apellido" class="form-control" id="validationCustom02"
                                    pattern="[a-zA-Z\s]{3,90}" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su apellido" value="<?php echo $docente['APELLIDO_DOC']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un apellido válido.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom04" class="form-label">Celular:</label>
                                <input type="text" name="celular" class="form-control" id="validationCustom04"
                                    pattern="^[0-9]{8}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" placeholder="Ingrese su numero" value="<?php echo $docente['CELULAR_DOC']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese un numero válido.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label">¿Quiere cambiar su contraseña?</label>
                            </div>
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
    </section>


    <?php

    include('templates/scripts.php');

    ?>
    <script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>

</html>