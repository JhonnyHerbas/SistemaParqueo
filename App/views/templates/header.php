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

        $lista = "
        <ul>
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
                    <a class='btn' data-bs-toggle='collapse' href='#collapse-solicitud' role='button'
                        aria-expanded='false' aria-controls='collapse-sitio'>
                        Solicitudes
                    </a>
                </p>
                <div class='collapse' id='collapse-solicitud'>
                    <ul>
                        <li><a href='visualizarSolicitudes.php'>Ver solicitudes</a></li>
                        <li><a href='realizarSolicitud.php'>Solicitar sitio</a></li>
                    </ul>
                </div>
            </li>
        </ul>";
        echo $lista;
        ?>
    </nav>

    <div class="redes_sociales">
        <a href="https://www.facebook.com/fcytumssOficial" target="_blank" class="fab fa-facebook-f"></a>
        <a href="http://abcd.fcyt.umss.edu.bo/cgi-bin//wxis/iah/scripts/?IsisScript=iah.xis&lang=es&base=TECLI"
            target="_blank" class="fa-solid fa-book"></a>
    </div>
</header>