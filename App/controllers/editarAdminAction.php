<?php 
include("../models/funcionAdmin.php");
$celular = $_POST['celular'];
$nombre = $_POST['name'];
$id_doc = $_POST['codigo'];
$result = verificar_celular($celular);
$existe = false;
if($result){
    while($row = $result->fetch_array(MYSQLI_BOTH)){
        if($row['ID_DOC'] == $id_doc ){ 
            $existe = true;
        }
    }
}
if($existe){
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
                    <p>El usuario ya existe. Por favor, ingrese un código sis diferente.</p>
                </div>
                <div class="modal-footer">
                    <a href="../views/editarAdmin.php?id_sit=<?php echo $id_doc;?>" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
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
}else{
    editar_docente($_POST['codigo'], $_POST['codigo'], $_POST['nombre'], $_POST['apellido'],$_POST['celular'],$_POST['correo']);
    header("Location: /SistemaParqueo/App/views/modalConf.php");
    exit();
}
?>