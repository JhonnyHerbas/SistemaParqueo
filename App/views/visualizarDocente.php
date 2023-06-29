<!DOCTYPE html>
<html lang="en">

<?php

$title = "Ver docentes";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    include('../models/funcionAdmin.php');

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <main>
        <div class="container-docente">
            <h3 class="font-weight-bold">DOCENTES</h3>
            <div class="container-lista">
                <!-- Aqui vendra toda la vista de docentes -->
                <?php

                $docentes = visualizar_docente();

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
                                        echo "Correo: " . $fila["CORREO_DOC"] . "<br>";
                                        echo "Saldo: " . $fila["PARK_COIN_DOC"];
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function azul" title="Editar datos">
                                            <a href="editarDatosUser.php?id_doc=<?php echo $fila["ID_DOC"];?>" target="_self" class="fa-solid fa-pencil blanco"></a>
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