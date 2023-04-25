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
        <a href="/SistemaParqueo/App/views/visualizarSitio.php" class="logo">
            <img src="/SistemaParqueo/public/img/FCYT.png" alt="logo" class="logo">
        </a>
        <h2>Sistema de parqueo FCYT</h2>
    </div>
    <div class="line"></div>

    <div class="container-user">
        <img src="/SistemaParqueo/public/img/Usuario.png" alt="usuario" class="logo">
        <div class="info-user">
            <h3 class="info">
                <?php echo $user; ?>
            </h3>
            <h5 class="info">
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
                <a class='btn' data-bs-toggle='collapse' href='#collapse-sitio' role='button'
                    aria-expanded='false' aria-controls='collapse-sitio'>
                    Docentes
                </a>
            </p>
                <div class='collapse' id='collapse-sitio'>
                    <ul>
                        <li><a href='visualizarDocente.php'>Ver docentes</a></li>
                        <li><a href='registrarCliente.php'>Registrar docente</a></li>
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
                    <a href='visualizarSolicitudes.php'>Ver solicitudes</a>
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