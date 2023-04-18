<!DOCTYPE html>
<html lang="en">

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

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <main>
        <div class="main">
            <div class="container-busqueda">
                <form action="../controllers/buscarSitio.php" method="POST">
                    <div class="input-container">
                        <div class="container-input-buscar">
                            <input type="text" class="input-buscar" name="nombre" id="nombre">
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
                                    <button
                                        id="<?php if ($fila['DISPONIBLE_SIT'] == 1) {
                                            echo "libre";
                                        } else {
                                            echo "ocupado";
                                        } ?>"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo $buttons . $fila["ID_SIT"]; ?>" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <?php

                                        echo "Sitio #" . $fila["NOMBRE_SIT"];

                                        ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $buttons . $fila["ID_SIT"]; ?>" class="accordion-collapse collapse"
                                    aria-labelledby="<?php echo $buttons . $fila["ID_SIT"]; ?>"
                                    data-bs-parent="#accordionFlushExample">
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
                                            }

                                            echo "Precio: " . $fila["PRECIO_SIT"] . " PARCK <br>";
                                            echo "Sección: # " . $fila["ID_SEC"];
                                            ?>
                                        </div>
                                        <div class="acordion-btn w-50">
                                            <?php

                                            if ($fila['DISPONIBLE_SIT'] == 0) {
                                                echo '<div class="function celeste"><a href="../controllers/liberarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-lock blanco"></a></div>';
                                            } else {
                                                echo '<div class="function verde"><a href="" target="_self" class="fa-solid fa-id-card-clip blanco"></a></div>';
                                            }
                                            ?>
                                            <div class="function azul">
                                                <a href="editarSitio.php?id_sit=<?php echo $fila['ID_SIT'] ?>" target="_self"
                                                    class="fa-solid fa-pencil blanco"></a>
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
                <div class="elements-descripcion" id="elements">
                    <div class="container-descripcion" id="container-descripcion">

                    </div>
                    <div class="function-seccion azul">
                        <a href="" target="_self" class="fa-solid fa-pencil blanco editar-seccion"
                            id="editar-hidden"></a>
                    </div>
                    <div class="function-seccion rojo">
                        <a href="" target="_self" class="fa-solid fa-trash blanco eliminar-seccion"
                            id="seccion-hidden"></a>
                    </div>
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