<!DOCTYPE html>
<html lang="en">

<?php
ob_start();
$title = "Registrar estadia";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');

    if ($_SESSION['rol'] != "Guardia") {
        header('Location: visualizarSitio.php');
        ob_end_flush();
    }

    include('../models/funcionGuardia.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="container-busqueda">
            <form action="../controllers/buscarDocente.php" method="POST">
                <div class="input-container">
                    <div class="container-input-buscar">
                        <input type="text" class="input-buscar" name="nombre" id="fecha"
                            placeholder="Ingrese nombre o apellido">
                    </div>
                    <div class="container-button-buscar">
                        <input type="submit" value="Buscar" class="button-buscar" id="buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="solicitud-header">
            <h2 class="h2">
                Ingreso clientes
            </h2>
            <?php
            if (isset($_GET['mensaje'])) {
                if ($_GET['mensaje'] == "exitoso") {
                    echo '<span id="mensaje" class="mensaje">Registro exitoso.</span>';
                } else {
                    if ($_GET['mensaje'] == "fallido") {
                        echo '<span id="mensaje" class="mensaje">Registro fallido.</span>';
                    }
                }
            }
            ?>
        </div>

        <div class="reporte">
            <div class="container-lista" id="data">
                <?php

                $cadena = isset($_GET["nombre"]) ? $_GET["nombre"] : "";
                $docentes = buscar_docente($cadena);

                if ($docentes) {
                    while ($fila = mysqli_fetch_array($docentes)) {
                        $buttons = "flush-collapse";
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" id="libre" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo $buttons . $fila["ID_DOC"]; ?>" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <?php

                                    echo $fila["NOMBRE_DOC"] . " " . $fila["APELLIDO_DOC"];

                                    ?>
                                </button>
                            </h2>
                            <div id="<?php echo $buttons . $fila["ID_DOC"]; ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?php echo $buttons . $fila["ID_DOC"]; ?>"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        <?php

                                        echo "Nombre: " . $fila["NOMBRE_DOC"] . " " . $fila["APELLIDO_DOC"] . "<br>";
                                        echo "Celular: " . $fila["CELULAR_DOC"] . "<br>";
                                        echo "Correo: " . $fila["CORREO_DOC"];
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function azul">
                                            <a href="../controllers/ingresoAction.php?id_doc=<?php echo $fila["ID_DOC"]; ?>"
                                                class="fa-solid fa-door-open blanco"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>