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
        <div class="solicitud-header">
            <h2 class="h2">
                Salida clientes
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

                $docentes = visualizar_salida();

                if ($docentes) {
                    while ($fila = mysqli_fetch_array($docentes)) {
                        $buttons = "flush-collapse";
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" id="libre" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo $buttons . $fila["ID_ACT"]; ?>" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <?php

                                    echo $fila["NOMBRE_DOC"] . " " . $fila["APELLIDO_DOC"];

                                    ?>
                                </button>
                            </h2>
                            <div id="<?php echo $buttons . $fila["ID_ACT"]; ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?php echo $buttons . $fila["ID_ACT"]; ?>"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        <?php

                                        echo "Nombre: " . $fila["NOMBRE_DOC"] . " " . $fila["APELLIDO_DOC"] . "<br>";
                                        echo "COD SIS: " . $fila["ID_DOC"] . "<br>";
                                        echo "Fecha/Hora ingreso: " . $fila["FECHA_INGRESO_ACT"];
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function azul">
                                            <a href="../controllers/salidaAction.php?id_act=<?php echo $fila["ID_ACT"]; ?>"
                                                class="fa-solid fa-door-closed blanco"></a>
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