<!DOCTYPE html>
<html lang="en">

<?php

$title = "Horarios de atencion";
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
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Horarios de atención
            </h3>
        </div>
        <div class="data">
            <?php
            $result = visualizar_horarios();
            $i = 1;
            if ($result) {
                while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                    $collapse = "flush-collapse" . $i;
            ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <?php
                                echo $row["DIA_CON"];
                                ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-50">
                                    <?php
                                    echo "Hora de ingreso: " . $row["HORA_APERTURA_CON"] . '<br>';
                                    echo "Hora de salida: " . $row["HORA_CIERRE_CON"] . '<br>';
                                    ?>
                                </div>
                                <div class="acordion-btn w-50 ">
                                    <div class="function verde" title="Editar horario de atención">
                                        <a href="./actualizarHorario.php?codigo=<?php echo $row['ID_CON']; ?>" class="fa-solid fa-pencil blanco"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    $i = $i + 1;
                }
            }
            ?>
        </div>
    </div>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>
</body>

</html>