<?php

require_once('../models/funcionSitio.php');
$nombre = $_POST['nombre'];

if (!empty($nombre) && isset($nombre)) {
    $result = buscar_sitio($nombre);
    if ($result) {
        $fila = mysqli_fetch_assoc($result);
        //Aqui debe imprimirse todo lo que contiene las vistas
        $buttons = "flush-collapse";
        echo '<div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#' . $buttons . $fila["ID_SIT"] . '" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        Sitio #' . $fila["NOMBRE_SIT"] . '
                    </button>
                </h2>
                <div id="' . $buttons . $fila["ID_SIT"] . '" class="accordion-collapse collapse"
                    aria-labelledby="' . $buttons . $fila["ID_SIT"] . '" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body body-sitio">
                        <div class="acordion-text w-50">';
        if ($fila["DISPONIBLE_SIT"] == 1) {
            echo 'Disponible: Si<br>';
        } else {
            echo 'Disponible: No<br>';
        }
        if ($fila["DISPONIBLE_SIT"] == 1) {
            echo 'Asignado: No<br>';
        } else {
            echo 'Asignado: Si<br>';
        }
        echo 'Precio: ' . $fila["PRECIO_SIT"] . ' PARCK
                        </div>
                        <div class="acordion-btn w-50">
                            <div class="function celeste">';
        if ($fila['DISPONIBLE_SIT'] == 1) {
            echo '<a href="../controllers/liberarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-lock-open blanco"></a>';
        } else {
            echo '<a href="../controllers/liberarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-lock blanco"></a>';
        }
        echo '<a href="" target="_self" class="fa-solid fa-lock blanco"></a>
                            </div>
                            <div class="function verde">
                                <a href="" target="_self" class="fa-solid fa-id-card-clip blanco"></a>
                            </div>
                            <div class="function azul">
                                <a href="editarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-pencil blanco"></a>
                            </div>
                            <div class="function rojo">
                                <a href="" target="_self" class="fa-solid fa-trash blanco"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    } else {
        echo "No se econtraron resultados.";
    }
} else {
    header("Location: ../views/visualizarSitio.php");
}

?>