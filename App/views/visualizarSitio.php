<!DOCTYPE html>
<html lang="es">

<?php

$title = "Ver sitios";
include('templates/head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php
    include('templates/header.php');
    include('../models/funcionSeccion.php');
    include('../models/funcionSitio.php');
    include('../models/funcionDocente.php');
    include('../models/funcionConfiguracionHorario.php');

    $configuraciones = visualizar_horario();
    $configuracion = $configuraciones->fetch_array(MYSQLI_BOTH);
    if ($_SESSION['rol'] == "Guardia") {
        header('Location: vistaGuardia.php');
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <div class="horario">
        <span><?= $configuracion['DIA_CON']; ?></span>
        <span>Apertura: <?= $configuracion['HORA_APERTURA_CON']; ?></span>
        <span>Cierre: <?= $configuracion['HORA_CIERRE_CON']; ?></span>
    </div>
    <main>
        <div class="main">
            <div class="container-busqueda">
                <form action="../controllers/buscarSitio.php" method="POST">
                    <div class="input-container">
                        <div class="container-input-buscar">
                            <input type="text" class="input-buscar" pattern="[0-9]*" name="nombre" id="nombre">
                        </div>
                        <div class="container-button-buscar">
                            <input type="submit" value="Buscar" class="button-buscar" id="buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="visual">
                <div class="container-seccion">
                    <select class="seccion" id="seccion" name="seccion">
                        <option value="todos">Todos</option>
                        <!-- Implementacion de la visualizacion de secciones -->
                        <?php
                        $result = visualizar_seccion();
                        if ($result) {
                            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                                $id = $row['ID_SEC'];
                                $nombre = $row['NOMBRE_SEC'];
                                echo "<option value='$id'>$nombre</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="container-vista" id="container-vista">
                    <!-- Aqui vendra toda la vista por secciones del script -->
                    <?php
                    // Obtener el parámetro "nombre" de la URL usando el operador ternario
                    $name = isset($_GET["nombre"]) ? $_GET["nombre"] : "";

                    // Verificar si el parámetro "nombre" está presente y no está vacío
                    if (!empty($name)) {
                        $sitios = buscar_sitio($name);
                    } else {
                        $sitios = visualizar_sitio();
                    }

                    if ($sitios) {
                        while ($fila = mysqli_fetch_array($sitios)) {
                            $buttons = "flush-collapse";
                    ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button id="<?php if ($fila['DISPONIBLE_SIT'] == 1) {
                                                    echo "libre";
                                                } else {
                                                    echo "ocupado";
                                                } ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $buttons . $fila["ID_SIT"]; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <?php

                                        echo "Sitio #" . $fila["NOMBRE_SIT"];

                                        ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $buttons . $fila["ID_SIT"]; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $buttons . $fila["ID_SIT"]; ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body body-sitio">
                                        <div class="acordion-text w-50">
                                            <?php

                                            if ($fila["DISPONIBLE_SIT"] == 1) {
                                                echo "Disponible: Si<br>";
                                            } else {
                                                echo "Disponible: No<br>";
                                            }
                                            if ($fila["DISPONIBLE_SIT"] == 1) {
                                                echo "Asignado: No<br>";
                                            } else {
                                                echo "Asignado: Si<br>";
                                                $sitios1 = visualizar_sitio_docente($fila['ID_SIT']);
                                                $sitio1 = $sitios1->fetch_array(MYSQLI_BOTH);
                                                $docentes = visualizar_docente_id($sitio1['ID_DOC']);
                                                $docente = $docentes->fetch_array(MYSQLI_BOTH);
                                                echo "Docente: " . $docente['NOMBRE_DOC'] . ' ' . $docente['APELLIDO_DOC'] . '<br>';

                                                $compartidos = visualizar_sitio_compartido_true($fila['ID_SIT']);

                                                if ($compartidos && mysqli_num_rows($compartidos) > 0) {
                                                    $compartido = mysqli_fetch_array($compartidos);
                                                    $docentes2 = visualizar_docente_id($compartido['ID_SUPLENTE_COMP']);
                                                    $docente2 = $docentes2->fetch_array(MYSQLI_BOTH);
                                                    echo "Docente a compartir: " . $docente2['NOMBRE_DOC'] . ' ' . $docente2['APELLIDO_DOC'] . '<br>';
                                                }
                                            }


                                            echo "Precio: " . $fila["PRECIO_SIT"] . " PARCK <br>";
                                            echo "Sección: # " . $fila["ID_SEC"];
                                            ?>
                                        </div>
                                        <?php
                                        echo '<div class="acordion-btn w-50">';
                                        if ($_SESSION['rol'] != "Administrador") {
                                            if ($fila['DISPONIBLE_SIT'] != 0) {
                                                echo '<div class="function verde" title="Solicitar sitio"><a href="realizarSolicitud.php?id_sit=' . $fila["ID_SIT"] . '&id_sec=' . $fila["ID_SEC"] . '" target="_self" class="fa-solid fa-id-card-clip blanco"></a></div>';
                                            }
                                        } else {
                                            if ($fila['DISPONIBLE_SIT'] == 0) {
                                                echo '<div class="function celeste"><a href="../controllers/liberarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-lock blanco"></a></div>';
                                            }
                                            echo '<div class="function azul">
                                                    <a href="editarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-pencil blanco"></a>
                                                </div>
                                                <div class="function rojo">
                                                    <a href="eliminarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-trash blanco"></a>
                                                </div>';
                                        }

                                        echo '</div>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<h1>El sitio no existe</h1>";
                    }
                    ?>
                </div>
                <div class="elements-descripcion" id="elements">
                    <div class="container-descripcion" id="container-descripcion">

                    </div>

                    <?php
                    
                    if ($_SESSION['rol'] == "Administrador") {
                        echo "<div class='function-seccion azul'>
                                <a href='' target='_self' class='fa-solid fa-pencil blanco editar-seccion' id='editar-hidden'></a>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Include de los scripts.php -->
    <?php

    include('templates/scripts.php');

    ?>

</body>

</html>