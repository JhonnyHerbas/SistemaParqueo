<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar sitio";
include('head.php');
include('../models/funcionSitio.php')
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

    include('header.php');
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
            <h2 class="h2">Editar sitio</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/editarSitioAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Nombre del sitio:</label>
                    <input type="text" name="name" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" value="<?php echo $sitio['NOMBRE_SIT']; ?>" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Precio: </label>
                  <input type="number" class="form-control bg-info" id="validationCustom02" min="1" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="10" pattern="^[0-9]*$" value="<?php echo $sitio['PRECIO_SIT']; ?>"
                  >

                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
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
            </form>
        </div>
    </div>
</section>


    

    <!-- Include de los scripts.php -->
    <?php
    
    include('scripts.php');

    ?>
    
    
<script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>
</html>