<!DOCTYPE html>
<html lang="en">

<?php

$title = "Buscar sitio";
include('head.php');

?>

<body>
    <!-- Include del header.php -->
    <?php

    $user = "Jhonny Herbas";
    $role = "Administrador";
    $lista = "<ul>
                    <li><a href=''>Inicio</a></li>
                    <li><a href=''>Visualizar</a></li>
                    <li><a href=''>Configurar horario</a></li>
                    <li><a href=''>Ver solicitudes</a></li>
                </ul>";

    include('header.php');
    include('../models/funcionSeccion.php');
    include('../models/funcionSitio.php');

    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->

    <main>
        <div class="main">
            <div class="container-busqueda">
                <form action="" method="POST">
                    <div class="input-container">
                        <div class="container-input-buscar">
                            <input type="text" class="input-buscar">
                        </div>
                        <div class="container-button-buscar">
                            <input type="submit" value="Buscar" class="button-buscar">
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

                    $sitios = visualizar_sitio();
                    if ($sitios) {
                        while ($fila = mysqli_fetch_array($sitios)) {
                            $buttons = "flush-collapse";
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
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

                                            echo "Precio: " . $fila["PRECIO_SIT"] . " PARCK";

                                            ?>
                                        </div>
                                        <div class="acordion-btn w-50">
                                            <div class="function celeste">
                                                <a href="" target="_self" class="fa-solid fa-lock blanco"></a>
                                            </div>
                                            <div class="function verde">
                                                <a href="" target="_self" class="fa-solid fa-id-card-clip blanco"></a>
                                            </div>
                                            <div class="function azul">
                                                <a href="editarSitio.php?nombre=<?php echo $fila['NOMBRE_SIT']; ?>&precio=<?php echo $fila['PRECIO_SIT']; ?>"
                                                    target="_self" class="fa-solid fa-pencil blanco"></a>
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
        </div>
    </main>

    <!-- Include de los scripts.php -->
    <?php

    include('scripts.php');

    ?>

</body>

</html>