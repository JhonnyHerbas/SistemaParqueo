<?php

session_start();
if (isset($_SESSION['nombre'])) {
    $user = $_SESSION['nombre'];
    $role = $_SESSION['rol'];
} else {
    header('Location: iniciarSesionDocente.php');
}
?>

<div id="menu-bars" class="fas fa-bars"></div>
<header>
    <div class="container-logo">
        <a href="visualizarSitio.php" class="logo">
            <img src="../../public/img/FCYT.png" alt="logo" class="logo">
        </a>
        <h4>Sistema de parqueo FCYT</h4>
    </div>
    <div class="line"></div>

    <div class="container-user">
        <img src="../../public/img/Usuario.png" alt="usuario" class="logo">
        <div class="info-user">
            <h4 class="info text">
                <?php echo $user; ?>
            </h3>
            <h5 class="info text">
                <?php echo $role; ?>
            </h5>
        </div>
    </div>

    <nav class="navbar">
        <?php
        $listaDocente = "<ul>
            <li>
                <p>
                    <a href='editarDatosUser.php'>Editar datos</a>
                </p>
            </li>
            <li>
                <p>
                    <a href='visualizarSitio.php'>Ver sitios</a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' href='visualizarPagos.php'>
                        Ver pagos pendientes
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' href='comprarMoneda.php'>
                        Comprar monedas
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' href='realizarConsulta.php'>
                        Realizar consulta
                    </a>
                    <a class='btn' href='realizarReclamo.php'>
                        Realizar reclamo
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' href='../controllers/cerrarSesion.php'>
                        Cerrar sesión
                    </a>
                </p>
            </li>
        </ul>";
        $listaAdmin = "
        <ul>
            <li>
                <p>
                    <a class='btn' data-bs-toggle='collapse' href='#collapse-reporte' role='button'
                        aria-expanded='false' aria-controls='collapse-sitio'>
                        Reportes
                    </a>
                </p>
                <div class='collapse' id='collapse-reporte'>
                    <ul>
                        <li><a href='reporteMensual.php'>Reporte mensual</a></li>
                        <li><a href='reporteSemanal.php'>Reporte semanal</a></li>
                    </ul>
                </div>
            </li>
            <li>
            <p>
                <a class='btn' data-bs-toggle='collapse' href='#collapse-docente' role='button'
                    aria-expanded='false' aria-controls='collapse-sitio'>
                    Docentes
                </a>
            </p>
                <div class='collapse' id='collapse-docente'>
                    <ul>
                        <li><a href='visualizarDocente.php'>Ver docentes</a></li>
                        <li><a href='registrarCliente.php'>Registrar docente</a></li>
                        <li><a href='visualizarClienteMora.php'>Docentes mora</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <p>
                    <a class='btn' data-bs-toggle='collapse' href='#collapse-guardia' role='button'
                        aria-expanded='false' aria-controls='collapse-sitio'>
                        Guardias
                    </a>
                </p>
                <div class='collapse' id='collapse-guardia'>
                    <ul>
                        <li><a href='visualizarGuardia.php'>Ver guardias</a></li>
                        <li><a href='registrarGuardia.php'>Registrar guardia</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <p>
                    <a class='btn' href='configuracionHorario.php'>
                        Configurar horario
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' href='crearSeccion.php'>
                        Crear seccion
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class='btn' data-bs-toggle='collapse' href='#collapse-sitio' role='button'
                        aria-expanded='false' aria-controls='collapse-sitio'>
                        Sitio
                    </a>
                </p>
                <div class='collapse' id='collapse-sitio'>
                    <ul>
                        <li><a href='visualizarSitio.php'>Ver sitios</a></li>
                        <li><a href='crearSitio.php'>Crear sitio</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <p>
                    <a class='btn' data-bs-toggle='collapse' href='#collapse-notificacion' role='button'
                        aria-expanded='false' aria-controls='collapse-sitio'>
                        Notificaciones
                    </a>
                </p>
                <div class='collapse' id='collapse-notificacion'>
                    <ul>
                        <li><a href='visualizarConsulta.php'>Visualizar consultas</a></li>
                        <li><a href='visualizarReclamo.php'>Visualizar reclamos</a></li>
                        <li><a href='visualizarSolicitudes.php'>Visualizar solicitudes</a></li>
                        <li><a href='visualizarCompraMoneda.php'>Visualizar compra</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <p>
                    <a class='btn' href='../controllers/cerrarSesion.php'>
                        Cerrar sesión
                    </a>
                </p>
            </li>
        </ul>";

        if ($_SESSION['rol'] == "Administrador") {
            echo $listaAdmin;
        } else {
            echo $listaDocente;
        }

        ?>
    </nav>

    <div class="redes_sociales">
        <a href="https://www.facebook.com/fcytumssOficial" target="_blank" class="fab fa-facebook-f"></a>
        <a href="http://abcd.fcyt.umss.edu.bo/cgi-bin//wxis/iah/scripts/?IsisScript=iah.xis&lang=es&base=TECLI"
            target="_blank" class="fa-solid fa-book"></a>
    </div>
</header>