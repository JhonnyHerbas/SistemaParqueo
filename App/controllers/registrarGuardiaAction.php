<?php
include '../models/funcionAdmin.php';
$contrasenia = $_POST['pass'];
$verContrasenia = $_POST['verPass'];
if ($contrasenia == $verContrasenia) {
    $hash = md5($contrasenia);
    insertar_guardia($_POST['codigo'],$_POST['id_amd'], $_POST['nombre'], $_POST['apellido'],$hash);
    header("Location: ../views/visualizarGuardia.php");
    exit();
}else{ 
    include('../views/templates/head.php');
?>    
    <div class="modal error" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p><?php
                    echo "Las contraseñas no coinciden"
                    ?></p>
                </div>
                <div class="modal-footer">
                    <a href="../views/registrarGuardia.php" rel="noopener noreferrer"><button type="button" class="btn btn-danger data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>