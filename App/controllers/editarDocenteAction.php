<?php 
include("../models/funcionAdmin.php");

// Variables
$codigo = $_POST['codigo'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$existe = false;
$existe2 = false;

$result = verificar_id($codigo);
if($result){
    while($row = $result->fetch_array(MYSQLI_BOTH)){
        if($row['CELULAR_DOC'] == $celular){ 
            $existe = true;
        }
    }
}
if($result){
    while($row = $result->fetch_array(MYSQLI_BOTH)){
        if($row['CORREO_DOC'] == $correo){ 
            $existe2 = true;
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
                    <p>El celular ya existe. Por favor, ingrese un celular diferente.</p>
                </div>
                <div class="modal-footer">
                    <a href="../views/editarDocente.php?id_sit=<?php echo $id_doc;?>" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
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
    if($existe2){
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
                        <p>El correo ya existe. Por favor, ingrese un correo diferente.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../views/editarDocente.php?id_sit=<?php echo $id_doc;?>" rel="noopener noreferrer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
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
}
?>