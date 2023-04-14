<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar usuario";
include('templates/head.php');
include('../models/funcionSitio.php')
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    include('../models/funcionSeccion.php');
    $id_sit = $_GET['id_sit'];
    $sitio = [];
    if($sitio_id = visualizar_nombre_sitio($id_sit)){
        $sitio = $sitio_id->fetch_array(MYSQLI_BOTH);
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la creacion-->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Editar datos</h2>
        </div>
        <div class="card-body">
            <form id="admin-form" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/editarSitioAction.php" method="post">
            <div class="row">   
                <div class="col-sm-6">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" value="<?php echo $sitio['NOMBRE_SIT']; ?>" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Código sis: </label>
                  <input type="number" class="form-control bg-info" id="validationCustom02" min="1" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="10" pattern="^[0-9]*$" value="<?php echo $sitio['PRECIO_SIT']; ?>"
                  >
                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
                  </div>
                </div> 
                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Celular: </label>
                  <input type="number" class="form-control bg-info" id="validationCustom02" min="8" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="8" pattern="^[0-9]*$" value="<?php echo $sitio['PRECIO_SIT']; ?>"
                  >
                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
                  </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Apellido/s:</label>
                    <input type="text" name="apellido" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" value="<?php echo $sitio['NOMBRE_SIT']; ?>" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Correo electronico:</label>
                    <input type="email" name="correo" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" value="<?php echo $sitio['NOMBRE_SIT']; ?>" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div>
                    <label for="validationCustom01" class="form-label">¿Quieres cambiar tu contraseña?</label>
                </div>
                </div>
                <div> 
                    <input type="hidden" value="<?php echo $sitio['ID_SIT'];?>" name="id_sit" style="display: none;">
                    <input type="hidden" value="<?php echo $sitio['ID_SEC'];?>" name="id_sec" style="display: none;">
                </div>
                <div class="col-12 button">
                    <button class="btn btn-success" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                    <a href="modalCancel.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>

        <!-- Modal -->
                <div class="container-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de editar este sitio?
                            </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success" id="confirmButton">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"id="cancelButton" >Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>


    

    <!-- Include de los scripts.php -->
    <?php
    
    include('templates/scripts.php');

    ?>
    
</body>
</html>