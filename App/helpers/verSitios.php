<?php

require_once('../config/conexion.php');

session_start();
$conn = get_connection();
$seccion = $_POST['seccion'];
if (!empty($seccion)) {
    $sql = "CALL DB_SP_SITIO_VISTA_ID_SEC($seccion)";
}
include('../models/funcionSitio.php');
include('../models/funcionDocente.php');
$result = mysqli_query($conn, $sql);

try {
    if (mysqli_num_rows($result) > 0) {
        //Aqui debe imprimirse todo lo que contiene las vistas
        while ($fila = mysqli_fetch_assoc($result)) {
            $buttons = "flush-collapse";
            echo '<div class="accordion-item">
                <h2 class="accordion-header">
                    <button id="';
            if ($fila['DISPONIBLE_SIT'] == 1) {
                echo "libre";
            } else {
                echo "ocupado";
            }
            echo '" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#' . $buttons . $fila["ID_SIT"] . '" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        Sitio # ' . $fila["NOMBRE_SIT"] . '
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
            echo 'Precio: ' . $fila["PRECIO_SIT"] . ' PARCK';
            echo '</div><div class="acordion-btn w-50">';
            if ($_SESSION['rol'] != "Administrador") {
                if ($fila['DISPONIBLE_SIT'] != 0) {
                    echo '<div class="function verde" title="Solicitar sitio"><a href="realizarSolicitud.php?id_sit=' . $fila["ID_SIT"] . '&id_sec=' . $fila["ID_SEC"] . '" target="_self" class="fa-solid fa-id-card-clip blanco"></a></div>';
                }
            } else {
                if ($fila['DISPONIBLE_SIT'] == 0) {
                    echo '<div class="function celeste" title="Desocupar sitio"><a href="../controllers/liberarSitio.php?id_sit=' . $fila['ID_SIT'] . '" target="_self" class="fa-solid fa-lock blanco"></a></div>';
                }
            }
            echo '
            </div>
            </div>
                </div>
            </div>';
        }
    } else {
        echo "No se econtraron resultados.";
    }
} catch (Exception $e) {
    header("Location: ../views/visualizarSitio.php");
}