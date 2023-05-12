<?php

require_once('../models/funcionAdmin.php');

$codigo = $_POST["id_doc"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = ver_contrasena($codigo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_DOC'];
    if ($hash == $password) {
        $contrasenia = $_POST['passNuevo'];
        $verContrasenia = $_POST['verPassNuevo'];
        if ($contrasenia == $verContrasenia) {
            $hashNuevo = md5($contrasenia);
           editar_docente_contrasena($_POST['id_doc'], $hashNuevo);
           header("Location: ../views/editarDatosUser.php");
           exit();
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
    
        <?php
            $title = "Error";
            include '../views/templates/head.php';       
        ?>       
        <body>
        <!-- Include del header.php -->
        <?php 
        $user = "Jhonny Herbas";
        $role = "Administrador";
        $lista =    "<ul>
                        <li><a href=''>Inicio</a></li>
                        <li><a href=''>Visualizar</a></li>
                        <li><a href=''>Configurar horario</a></li>
                        <li><a href=''>Ver solicitudes</a></li>
                    </ul>";
    
        include('../views/templates/header.php');
        ?>
        <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    
        <div class="modal error" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Algo salio mal.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../views/editarContrasena.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Include de los scripts.php -->
        <?php
        include('../views/templates/scripts.php');
        ?>
    </body>
    </html>
      <?php
    }

} else {
    ?>
        <!DOCTYPE html>
        <html lang="en">
    
        <?php
            $title = "Error";
            include '../views/templates/head.php';       
        ?>       
        <body>
        <!-- Include del header.php -->
        <?php 
        $user = "Jhonny Herbas";
        $role = "Administrador";
        $lista =    "<ul>
                        <li><a href=''>Inicio</a></li>
                        <li><a href=''>Visualizar</a></li>
                        <li><a href=''>Configurar horario</a></li>
                        <li><a href=''>Ver solicitudes</a></li>
                    </ul>";
    
        include('../views/templates/header.php');
        ?>
        <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    
        <div class="modal error" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Contraseña incorrecta.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../views/editarContrasena.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Include de los scripts.php -->
        <?php
        include('../views/templates/scripts.php');
        ?>
    </body>
    </html>
      <?php
}
?>