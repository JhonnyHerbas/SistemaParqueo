<?php

require_once('../config/conexion.php');

$conn = get_connection();
$seccion = $_POST['seccion'];
if (!empty($seccion)) {
    $sql = "CALL DB_SP_SITIO_VISTA_ID_SEC($seccion)";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    //Aqui debe imprimirse todo lo que contiene las vistas
    while ($fila = mysqli_fetch_assoc($result)) {
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
                        <div class="function celeste">
                            <a href="" target="_self" class="fa-solid fa-lock blanco"></a>
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
    }
} else {
    echo "No se econtraron resultados.";
}

?>