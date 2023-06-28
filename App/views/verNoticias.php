<!DOCTYPE html>
<html lang="en">

<?php

$title = "Noticias";
include('templates/head.php');
?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    include('../models/funcionAdmin.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="container container-solicitud ">
        <div class="solicitud-header">
            <h3 class="font-weight-bold">
                Noticias
            </h3>
        </div>
        <div class="data">


            <?php

            $noticias = visualizar_noticias();

            if ($noticias) {
                while ($fila = mysqli_fetch_array($noticias)) {
                    ?>
            <div class="card noticia">
                <div class="card-body card-noticias">
                    <h5 class="card-title title-notice">
                        <?php echo $fila['TITULO_NOT']; ?>
                    </h5>
                    <div class="body-card">
                        <p class="card-text text-card <?php if ($_SESSION['rol'] == "Administrador"){echo "w-50";}?>">
                            <?php echo $fila['DESCRIPCION_NOT']; ?>
                        </p>

                        <?php 
                        
                        if ($_SESSION['rol'] == "Administrador"){
                            echo "<div class='acordion-btn w-50'>
                                    <div class='function azul'>
                                        <a href='editarNoticia.php?id_not=" . $fila['ID_NOT'] . "' class='fa-solid fa-pencil blanco'></a>
                                    </div>
                                    <div class='function rojo'>
                                        <a href='../controllers/eliminarNoticiaAction.php?id_not=" . $fila['ID_NOT'] . "' class='fa-solid fa-trash blanco'></a>
                                    </div>
                                  </div>";
                        }
                        ?>

                    </div>
                </div>
            </div>
                    <?php
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