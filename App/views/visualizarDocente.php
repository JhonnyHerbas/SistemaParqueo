<!DOCTYPE html>
<html lang="en">

<?php

$title = "Ver sitios";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    include('../models/funcionAdmin.php');

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <main>
        <div class="form-container">
            <div class="visual">

                <h2>DOCENTES</h2>
                <!-- Aqui vendra toda la vista de docentes -->
                <?php

                $docentes = visualizar_docente();

                if ($docentes) {
                    while ($fila = mysqli_fetch_array($docentes)) {
                        $buttons = "flush-collapse";
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
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
                                        echo "Correo: " . $fila["CORREO_DOC"] . "<br>";
                                        echo "Saldo: " . $fila["PARK_COIN_DOC"];
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function azul">
                                            <a href="" target="_self" class="fa-solid fa-pencil blanco"></a>
                                        </div>
                                        <div class="function rojo">
                                            <a href="" target="_self" class="fa-solid fa-trash blanco"></a>
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
    </main>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>

</body>

</html>