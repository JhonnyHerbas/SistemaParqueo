<!DOCTYPE html>
<html lang="en">

<?php

$title = "Ver guardias";
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
            <h3 class="font-weight-bold">GUARDIAS</h3>
            <div class="container-lista">
                <!-- Aqui vendra toda la vista de docentes -->
                <?php

                $guardias = visualizar_guardia();

                if ($guardias) {
                    while ($fila = mysqli_fetch_array($guardias)) {
                        $buttons = "flush-collapse";
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" id="<?php if ($fila['ESTADO_GUA'] == "ACTIVO") {
                                        echo "libre";
                                    } else {
                                        echo "ocupado";
                                    } ?>" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo $buttons . $fila["ID_GUA"]; ?>" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <?php

                                    echo $fila["NOMBRE_GUA"] . " " . $fila["APELLIDO_GUA"];

                                    ?>
                                </button>
                            </h2>
                            <div id="<?php echo $buttons . $fila["ID_GUA"]; ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?php echo $buttons . $fila["ID_GUA"]; ?>"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        <?php
                                        echo "Nombre: " . $fila["NOMBRE_GUA"] . "<br>";
                                        echo "Apellido: " . $fila["APELLIDO_GUA"] . "<br>";
                                        echo "Estado: " . $fila["ESTADO_GUA"] . "<br>";
                                        ?>
                                    </div>
                                    <div class="acordion-btn w-50">
                                        <div class="function azul">
                                            <a href="editarDatosGuardia.php?id_guardia=<?php echo $fila["ID_GUA"];?>" target="_self" class="fa-solid fa-pencil blanco"></a>
                                        </div>
                                        <?php if($fila["ESTADO_GUA"] == "ACTIVO"){?>
                                        <div class="function naranja">
                                            <a href="./desahabilitarActionGuardia.php?id_guardia=<?php echo $fila["ID_GUA"];?>" target="_self" class="fa-solid fa-lock-open blanco"></a>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="function verde">
                                            <a href="./habilitarActionGuardia.php?id_guardia=<?php echo $fila["ID_GUA"];?>" target="_self" class="fa-solid fa-lock blanco"></a>
                                        </div>
                                        <?php } ?>
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