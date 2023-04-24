<!DOCTYPE html>
<html lang="en">

<?php

$title = "Realizar pago";
include('templates/head.php');
include('../models/funcionAdmin.php');
?>

<body>
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    $id_sol = $_GET['id_sol'];
    $pago = [];
    if ($solicitud_id = visualizar_pago($id_sol)) {
        $pago = $solicitud_id->fetch_array(MYSQLI_BOTH);
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <main>
        <div class="form-containerG">
            <div class="header-containerG">
                <h2 class="title-form">
                    Realizar pago
                </h2>
            </div>
            <div class="card-body grande">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="/SistemaParqueo/App/controllers/realizarPagoAction.php" method="post">

                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nombre del sitio:</label>
                                <input type="text" name="nombreSitio" class="form-control bg-info" id="validationCustom01"
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                    value="<?php echo $pago['NOMBRE_SIT']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                        <div class="mb-3">
                                <label for="validationCustom03" class="form-label">Precio:</label>
                                <input type="text" name="precio" class="form-control bg-info" id="validationCustom03"
                                    pattern="^[0-9]{9}$" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" value="<?php echo $pago['PRECIO_SIT']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un código válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nombre del docente:</label>
                                <input type="text" name="nombreDocente" class="form-control bg-info" id="validationCustom01"
                                    pattern="[a-zA-Z\s]{3,30}" autocomplete="off" spellcheck="false"
                                    value="<?php echo $pago['NOMBRE_DOC']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Apellido/s:</label>
                                <input type="text" name="apellido" class="form-control bg-info" id="validationCustom02"
                                    pattern="[a-zA-Z\s]{3,90}" autocomplete="off" spellcheck="false" minlength="5"
                                    maxlength="30" value="<?php echo $pago['APELLIDO_DOC']; ?>" readonly>
                                <div class="invalid-feedback">
                                    Ingrese un apellido válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columnas">
                        <div class="izquierda">
                            <!-- Input del nombre -->
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Fecha final:</label>
                                <input type="text" name="fecha" class="form-control bg-info" id="validationCustom01"
                                    autocomplete="off" spellcheck="false" maxlength="50" value="<?php echo $pago['FECHA_FIN_ASI']; ?>"
                                    readonly>
                                <div class="invalid-feedback">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                        <div class="derecha">
                            <div class="mb-3">
                                <label for="validationCustom05" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control bg-info" id="validationCustom05"
                                    autocomplete="off" spellcheck="false" maxlength="50" value="<?php echo $pago['CORREO_DOC']; ?>"
                                    readonly>
                                <div class="invalid-feedback">
                                    Ingrese un correo válido.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php

                    $success = "Aceptar";
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