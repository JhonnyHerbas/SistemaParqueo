<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar contrasena";
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
                            <!-- Input de la contraseña actual-->
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label">Contraseña actual:</label>
                                <input type="password" name="pass" class="form-control" id="validationCustom06"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña válida.
                                </div>
                            </div>
                            <!-- Input de la contraseña -->
                            <div class="mb-3">
                                <label for="validationCustom06" class="form-label">Contraseña nueva:</label>
                                <input type="password" name="pass" class="form-control" id="validationCustom06"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña válida.
                                </div>
                            </div>
                            <!-- Input de verificar contraseña -->
                            <div class="mb-3">
                                <label for="validationCustom07" class="form-label">Verificar contraseña:</label>
                                <input type="password" name="verPass" class="form-control" id="validationCustom07"
                                    pattern="^[a-zA-Z0-9]{8,20}$" autocomplete="off" spellcheck="false"
                                    placeholder="Ingrese su contraseña" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña válida.
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